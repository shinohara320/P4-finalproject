<?php

namespace App\Http\Controllers\Pelamar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\DetailUsers;
use App\Models\Pendaftaran;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PendaftaranController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $id_users = Auth::user()->id;
        $data = [
            'title' => "Data Pendaftaran",
            'users' => DetailUsers::where('id_users', $id_users)->first(),
        ];

        return view('pelamar/pendaftaran')->with('data', $data);
    }
    public function insert(Request $request)
{
    $id_users = Auth::user()->id;
    $cek_pendaftaran = Pendaftaran::where('status_pendaftaran', 'pengajuan')->where('id_users', $id_users)->count();
    if ($cek_pendaftaran > 0) {
        return redirect()->back()->with('err_message', 'Hasil Lamaran Masih Dalam Proses!');
    }

    // Define the target upload directory paths
    $tujuan_upload = public_path('berkas');
    $tujuan_gambar = public_path('gambar');

    // Ensure directories exist and are writable, create if not exist
    $this->checkAndCreateDirectory($tujuan_upload);
    $this->checkAndCreateDirectory($tujuan_gambar);

    // Handling file uploads
    try {
        $cv = $request->file('cv');
        $nama_document_cv = time() . "_" . $cv->getClientOriginalName();
        $cv->move($tujuan_upload, $nama_document_cv);

        $gambar = $request->file('gambar');
        $nama_document_gambar = time() . "_" . $gambar->getClientOriginalName();
        $gambar->move($tujuan_gambar, $nama_document_gambar);

        $ktp = $request->file('ktp');
        $nama_document_ktp = time() . "_" . $ktp->getClientOriginalName();
        $ktp->move($tujuan_upload, $nama_document_ktp);

        $surat_rekomendasi = $request->file('surat_rekomendasi');
        $nama_document_surat_rekomendasi = time() . "_" . $surat_rekomendasi->getClientOriginalName();
        $surat_rekomendasi->move($tujuan_upload, $nama_document_surat_rekomendasi);

        $proposal = $request->file('proposal');
        $nama_proposal = '';
        if ($proposal) {
            $nama_proposal = time() . "_" . $proposal->getClientOriginalName();
            $proposal->move($tujuan_upload, $nama_proposal);
        }
    } catch (\Exception $e) {
        return redirect()->back()->with('err_message', 'Error handling file uploads: ' . $e->getMessage());
    }

    // Data for database entry
    $data = [
        'gambar' => $nama_document_gambar,
        'ktp' => $nama_document_ktp,
        'cv' => $nama_document_cv,
        'proposal' => $nama_proposal,
        'surat_rekomendasi' => $nama_document_surat_rekomendasi,
        'status_pendaftaran' => 'pengajuan',
        'id_users' => $id_users,
        'created_at' => Carbon::now(),
    ];

    Pendaftaran::insert($data);
    return redirect('data-lamaran')->with('suc_message', 'Data Pendaftaran berhasil!');
}

/**
 * Check if a directory exists and is writable, create if it does not exist
 *
 * @param string $path The path to the directory
 */
private function checkAndCreateDirectory($path)
{
    if (!file_exists($path)) {
        mkdir($path, 0777, true);
    }
    if (!is_writable($path)) {
        chmod($path, 0777);  // Change the permissions to be writable
    }
}

}
