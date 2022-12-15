<!DOCTYPE html>
@extends('adminlte::page')
@section('title', 'List Barang')
@section('content_header')
@stop
@section('content')
<html>
<head>
    <title>Data Barang</title>
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">List Barang</h2>
    <table class="table table-bordered yajra-datatable" id="yajra-datatable">
        <thead>
            <tr>
            <a href="{{route('barang.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>
            <a href="/barang/cetakpdf" class="btn btn-primary mb-2 ml-3">
                        Cetak PDF
                    </a>
                <th>No.</th>
                <th>Nama Barang</th>
                <th>Jumlah Barang</th>
                <th>Harga Barang</th>
                <th>Tanggal Kadaluarsa</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
   <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
  $(function () {
    
    var table = $('#yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('barang.index') }}",
        columns: [
            {data: 'no', name: 'no', render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                    }, width: '5%', class: 'text-center'},
            {data: 'nama', name: 'nama'},
            {data: 'jumlah', name: 'jumlah'},
            {data: 'harga', name: 'harga'},
            {data: 'tanggalKadaluarsa', name: 'tanggalKadaluarsa'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });
    
  });
  function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }
</script>
</html>