@extends('adminlte::page')
@section('title', 'List Barang')
@section('content_header')
    <h1 class="m-0 text-dark">List Barang</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('barang.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>
                    <a href="/barang/cetakpdf" class="btn btn-primary mb-2">
                        Cetak PDF
                    </a>
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Barang</th>
                            <th>Harga Barang</th>
                            <th>Tanggal Kadaluarsa</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($barang as $key => $barang)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$barang->nama}}</td>
                                <td>{{$barang->jumlah}}</td>
                                <td>{{$barang->harga}}</td>
                                <td>{{$barang->tanggalKadaluarsa}}</td>
                                <td>
                                    <a href="{{route('barang.edit', $barang)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('barang.destroy', $barang)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        Delete
                                    </a>
                                </td>

                                
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
@push('js')