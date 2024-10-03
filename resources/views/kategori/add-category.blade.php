<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LARAVEL CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                    KATEGORI BUKU
                    <a href="/kategori/create" class="btn btn-success btn-sm float-end">Add New</a>
            </div>
            <div class="card-body">
                <table class="table table-sm table stripped table-bordered">    
                    <thead>
                        <th>ID KAT</th>
                        <th>KATEGORI</th>
                        <th>DESKRIPSI</th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</body>
</html>