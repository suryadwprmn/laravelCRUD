<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambahkan Mahasiswa</title>
</head>
<body>
    <h1>Tambah User</h1>
    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <ul>
            <li>
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama">
            </li>
            <li>
                <label for="tgl_lahir">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" id="tgl_lahir">
            </li>
            <li>
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat">
            </li>
            <li>
                <label for="cita_cita">Cita-Cita</label>
                <input type="text" name="cita_cita" id="cita_cita">
            </li>
        </ul>
            <button type="submit">Tambahkan</button>
    </form>
</body>
</html>