@extends('layout.layout')
@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Peminjaman</h4>
                        <div class="table-responsive">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCreate"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                            </svg>Tambah</button>
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Judul Buku</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($peminjaman as $item)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$item->nama}}</td>
                                            <td>{{$item->judul_buku}}</td>
                                            <td>{{$item->tgl_pinjam}}</td>
                                            <td>{{$item->tgl_kembali}}</td>
                                            <td>
                                            <a href=# data-toggle="modal" data-target="#modalEdit{{$item->id}}"  class="btn btn-ss btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                              </svg></a>
                                            <a href="{{ asset('admin/delete-peminjaman/' . $item->id) }}" class="btn btn-ss btn-danger" onclick="return confirm('Yakin ingin hapus data ini?')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                              </svg></a>
                                            </td>
                                        </tr>
                                    @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalCreate">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Peminjaman Buku</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="create-peminjaman" method="POST">
                @csrf
            <div class="modal-body">
                <label for="">Nama</label>
                <div class="form-group">
                    <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama">
                </div>
                <label for="">Judul Buku</label>
                <div class="form-group">
                    <input type="text" class="form-control" name="judul_buku" placeholder="Masukkan Judul">
                </div>
                <label for="">Tanggal Pinjam</label>
                <div class="form-group">
                    <input type="date" class="form-control" name="tgl_pinjam">
                </div>
                <label for="">Tanggal Kembali</label>
                <div class="form-group">
                    <input type="date" class="form-control" name="tgl_kembali">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit-->
@foreach ($peminjaman as $item)
<div class="modal fade" id="modalEdit{{$item->id}}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="edit-peminjaman" method="POST">
            @csrf
            <div class="modal-body">
                <input type="hidden" class="form-control" id="id" value="{{$item->id}}">
                <label>Nama</label>
                <div class="form-group">
                    <input type="text" class="form-control" name="nama" value="{{$item->nama}}" placeholder="masukkan nama">
                </div>
                <label>Judul Buku</label>
                <div class="form-group">
                    <input type="text" class="form-control" name="judul_buku" value="{{$item->judul_buku}}"  placeholder="masukkan judul buku">
                </div>
                <label>Tanggal Peminjaman</label>
                <div class="form-group">
                    <input type="date" class="form-control" name="tgl_peminjaman" value="{{$item->tgl_peminjaman}}"  placeholder="masukkan tanggal peminjaman">
                </div>
                <label>Tanggal Kembali</label>
                <div class="form-group">
                    <input type="date" class="form-control" name="tgl_kembali" value="{{$item->tgl_kembali}}"  placeholder="masukkan tanggal kembali">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan perubahan</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection
