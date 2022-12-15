@extends('adminlte::page')
@section('title', 'Edit Barang')
@section('content_header')
    <h1 class="m-0 text-dark">Edit Barang</h1>
@stop
@section('content')
    <form action="{{route('barang.update', $barang)}}" method="post">
        @method('PUT')
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
            <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Nama Barang</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="exampleInputName" placeholder="Nama barang" name="nama" value="{{$barang->nama ?? old('nama')}}">
                        @error('nama') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Jumlah Barang</label>
                        <input type="Number" class="form-control @error('jumlah') is-invalid @enderror" id="exampleInputjumlah" placeholder=" jumlah Barang" name="jumlah" value="{{$barang->jumlah ?? old('jumlah')}}">
                        @error('jumlah') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Harga Barang</label>
                        <input type="number" class="form-control @error('harga') is-invalid @enderror" id="exampleInputHarga" placeholder="Harga barang" name="harga" value="{{$barang->harga ?? old('harga')}}">
                        @error('harga') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Tanggal Kadaluarsa</label>
                        <input type="date" class="form-control @error('tanggalKadaluarsa') is-invalid @enderror" id="exampleInputKadaluarsa" placeholder="Tanggal Kadaluarsa" name="tanggalKadaluarsa" value="{{$barang->tanggalKadaluarsa ?? old('tanggalKadaluarsa')}}">
                        @error('tanggalKadaluarsa') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('barang.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop