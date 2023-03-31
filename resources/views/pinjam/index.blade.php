@extends('layouts/master')

@section('layoutContent')
<div class="row">
    <a name="" class="btn btn-primary" href="{{route('pinjam.create')}}" role="button">+ Tambah Data</a>
    <div class="w-full table-responsive">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Peminjam</th>
                    <th scope="col">Barang</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Tanggal Pinjam</th>
                    <th scope="col">Tanggal Kembali</th>
                    <th scope="col">Surat</th>
                    <th scope="col">Status</th>
                    @if (auth()->user()->role == 'peminjam')
                    <th scope="col">Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($pinjam as $p)
                <tr>
                    <th scope="row">{{$p->id}}</th>
                    <td>{{$p->peminjam}}</td>
                    <td>{{$p->barang}}</td>
                    <td>{{$p->jumlah}}</td>
                    <td>{{$p->tgl_pinjam}}</td>
                    <td>{{$p->tgl_kembali}}</td>
                    <td>{{$p->surat}}</td>
                    <td>{{$p->status}}</td>
                    @if (auth()->user()->role == 'peminjam')
                    <td>
                        <a name="" class="btn btn-warning btn-line btn-rect" href="{{route('pinjam.edit', $p->id)}}"
                            role="button">
                            <i class="ti-pencil-alt"></i> EDIT</a>
                        <a class="btn btn-danger btn-line btn-rect" href="{{ route('pinjam.index') }}" onclick="event.preventDefault();
                    document.getElementById('delete-form-{{$p->id}}').submit();"> <i class="ti-trash"></i> DELETE</a>
                    </td>
                    <form id="delete-form-{{$p->id}}" + action="{{route('pinjam.destroy', $p->id)}}" method="post">
                        @csrf @method('DELETE')
                    </form>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</div>
@endsection