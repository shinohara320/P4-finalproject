@extends('template.master')
@section('contents')
<div class="blog-page area-padding">
    <div class="container">
        <div class="card mt-5">
            <div class="card-body">
                <div class="col-md-12">
                    <div class="text-center"><h2>PENGISIAN BERKAS</h2></div>
                    <hr>
                 
                    @if (session()->has('err_message'))
                        <div class="alert alert-danger alert-dismissible" role="alert" auto-close="120">
                            <strong>Gagal! </strong>{{ session()->get('err_message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (session()->has('suc_message'))
                        <div class="alert alert-success alert-dismissible" role="alert" auto-close="120">
                            <strong>Success! </strong>{{ session()->get('suc_message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                   <form action="{{url('insert-pendaftaran')}}" method="post" enctype='multipart/form-data' >
                    @csrf                
                        <div class="form-group ">
                            <label for="frist_name">Gambar</label>
                            <input id="frist_name" type="file" class="form-control" name="gambar" autofocus required>
                        </div>
                        <div class="form-group ">
                            <label for="frist_name">CV</label>
                            <input id="frist_name" type="file" class="form-control" name="cv" autofocus required>
                        </div>
                        <div class="form-group ">
                            <label for="frist_name">Surat Rekomendasi</label>
                            <input id="frist_name" type="file" class="form-control" name="surat_rekomendasi" autofocus required>
                        </div>
                        <div class="form-group ">
                            <label for="frist_name">KTP / KTM</label>
                            <input id="frist_name" type="file" class="form-control" name="ktp" autofocus required>
                        </div>
                        <div class="form-group ">
                            <label for="frist_name">Proposal</label>
                            <input id="frist_name" type="file" class="form-control" name="proposal" autofocus>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                            Kirim
                            </button>
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection