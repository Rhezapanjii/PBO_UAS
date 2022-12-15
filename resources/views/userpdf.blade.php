
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
            <th>Nama</th>
            <th>Email</th>
            <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
        @foreach($user as $key => $user)
                            <tr>
                            <td>{{$key+1}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                
                            </tr>
                        @endforeach
        </tbody>
    </table>
</div>
</body>
  
</script>
</html>