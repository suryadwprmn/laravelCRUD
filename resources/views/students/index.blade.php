<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Mahasiswa</title>
</head>
<body>
    <h1>Data Mahasiswa</h1>
    <h3><a href="{{ route('students.create') }}">Tambahkan Mahasiswa</a></h3>
    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Cita-Cita</th>
        </tr>
        @foreach ($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->nama }}</td>
                <td>{{ $student->tgl_lahir }}</td>
                <td>{{ $student->alamat }}</td>
                <td>{{ $student->cita_cita }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>