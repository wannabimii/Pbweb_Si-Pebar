@extends('layouts/master')

@section('layoutContent')
<div class="content mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{route('pinjam.store')}}" method="post" enctype="multipart/form-data">
                        <a href="{{route('pinjam.index')}}" class="btn btn-inverse btn-round"> <i class="ti-close"></i>
                            CANCEL</a>
                        @csrf
                        <div class="form-group">
                            <label>Peminjam</label>
                            <select name="peminjam" class="form-control">
                                @foreach($users as $u)
                                <option value="{{$u->id}}">{{$u->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Barang</label>
                            <select name="barang" class="form-control">
                                @foreach($barang as $b)
                                <option value="{{$b->id}}">{{$b->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="number" name="jumlah" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Tanggal Pinjam</label>
                            <input type="date" name="tgl_pinjam" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Tanggal Kembali</label>
                            <input type="date" name="tgl_kembali" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Surat</label>
                            <input type="file" name="surat" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="pending">Pending</option>
                                <option value="pakai">Pakai</option>
                                <option value="selesai">Selesai</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" />
                        </div>
                        <button type="submit" class="btn btn-primary btn-round"><i class="ti-plus"></i> TAMBAH</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </html>
    </body>
</div>
@endsection