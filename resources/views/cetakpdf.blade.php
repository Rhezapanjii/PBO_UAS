
<!DOCTYPE html>
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
                <th>No.</th>
                <th>Nama Barang</th>
                <th>Jumlah Barang</th>
                <th>Harga Barang</th>
                <th>Tanggal Kadaluarsa</th>
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
                                
                            </tr>
                        @endforeach
        </tbody>
    </table>
</div>
</body>
  
</script>
</html>