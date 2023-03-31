@extends('layouts/master')

@section('layoutContent')
<div class="row">
    <a name="" class="btn btn-primary" href="{{route('barang.create')}}" role="button">+ Tambah Barang</a>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Nama</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Kondisi</th>
                @if (auth()->user()->role == 'admin')
                <th scope="col">Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($barang as $b)
            <tr>
                <th scope="row">{{$b->id}}</th>
                <td>{{$b->nama}}</td>
                <td>{{$b->jumlah}}</td>
                <td>{{$b->kondisi}}</td>
                @if (auth()->user()->role == 'admin')
                <td>
                    <a name="" class="btn btn-warning btn-line btn-rect" href="{{route('barang.edit', $b->id)}}"
                        role="button">
                        <i class="ti-pencil-alt"></i> EDIT</a>
                    <a class="btn btn-danger btn-line btn-rect" href="{{ route('barang.index') }}" onclick="event.preventDefault();
                    document.getElementById('delete-form-{{$b->id}}').submit();"> <i class="ti-trash"></i> DELETE</a>
                </td>
                <form id="delete-form-{{$b->id}}" + action="{{route('barang.destroy', $b->id)}}" method="post">
                    @csrf @method('DELETE')
                </form>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>


</div>
@endsection