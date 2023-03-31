@extends('layouts/master')

@section('layoutContent')
<div class="content mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{route('barang.update',$barang->id)}}" method="post">
                        <button type="submit" class="btn btn-inverse btn-round"> <i class="ti-close"></i>
                            CANCEL</button>
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{$barang->nama}}"
                                placeholder="Nama barang" />
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea type="text" name="deskripsi" class="form-control" value="{{$barang->deskripsi}}"
                                placeholder="deskripsi"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Kondisi</label>
                            <select name="kondisi" class="form-control">
                                <option value="baik" {{ $barang->kondisi=="baik"?'selected':"" }}>Baik</option>
                                <option value="rusak" {{ $barang->kondisi=="rusak"?'selected':"" }}>Rusak</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="number" name="jumlah" class="form-control" value="{{$barang->jumlah}}"
                                placeholder="Jumlah barang" />
                        </div>
                        <button type="submit" class="btn btn-primary btn-round"><i class="ti-plus"></i> UPDATE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </html>
    </body>
</div>
@endsection