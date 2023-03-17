<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Daftar Mahasiswa</h1>
        <ul>
            <li>
                Nama : Annelise Mellema <br>
                NIM : 301402001 <br>
                Jurusan : Teknologi Informasi <br>
                <form action="/detail_mahasiswa" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Lihat Detail Mahasiswa [POST]</button>
                </form> 
                <br>
                <form action="/detail_mahasiswa" method="GET">
                    @csrf
                    <button type="submit" class="btn btn-primary">Lihat Detail Mahasiswa [GET]</button>
                </form>
                
            </li>
            <li>
                Nama : Hannah Grace <br>
                NIM : 301402002 <br>
                Jurusan : Teknologi Informasi
            </li>
        </ul>
    </div>
    
</body>
</html>