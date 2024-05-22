<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Informasi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Informasi;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class DataInformasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data = [
            'title' => "Data Informasi",
            'data_informasi' => Informasi::all(),
        ];

        // Use the correct view name
        return view('admin.datainfromasi', ['data' => $data]);
    }

    public function insert(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'judul' => 'required',
            'deskripsi' => 'required',
            'tgl_informasi' => 'required|date',
            'penulis' => 'required'
        ]);

        $gambar = $request->file('gambar');
        $nama_document_gambar = time() . "_" . $gambar->getClientOriginalName();
        $tujuan_upload = 'assets_admin/img/informasi';

        try {
            $gambar->move($tujuan_upload, $nama_document_gambar);
        } catch (\Exception $e) {
            return redirect()->back()->with('err_message', 'Upload failed: ' . $e->getMessage());
        }

        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tgl_informasi' => $request->tgl_informasi,
            'gambar_informasi' => $nama_document_gambar,
            'penulis' => $request->penulis,
            'created_at' => Carbon::now(),
        ];

        Informasi::create($data);

        return redirect()->back()->with('suc_message', 'Data Berhasil disimpan!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'tgl_informasi' => 'required|date',
            'penulis' => 'required',
        ]);

        $id_informasi = $request->id_informasi;
        $gambar = $request->file('gambar');

        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tgl_informasi' => $request->tgl_informasi,
            'penulis' => $request->penulis,
        ];

        if ($gambar) {
            $request->validate([
                'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $nama_document_gambar = time() . "_" . $gambar->getClientOriginalName();
            $tujuan_upload = 'assets_admin/img/informasi';

            try {
                $gambar->move($tujuan_upload, $nama_document_gambar);
            } catch (\Exception $e) {
                return redirect()->back()->with('err_message', 'Upload failed: ' . $e->getMessage());
            }

            $data['gambar_informasi'] = $nama_document_gambar;
        }

        Informasi::where('id_informasi', $id_informasi)->update($data);

        return redirect()->back()->with('suc_message', 'Data Berhasil diupdate!');
    }

    public function delete($id_informasi)
    {
        Informasi::where('id_informasi', $id_informasi)->delete();
        return redirect()->back()->with('suc_message', 'Data Berhasil Dihapus!');
    }
}
