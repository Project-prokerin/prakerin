<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DATA PERUSAHAAN MANGANG SMK TARUNA BHAKTI</title>
    <style>
        h1{
            font-size: 20px;
            text-align: center;
            color: black;
        }
		table tr td,
		table tr th{
			font-size: 9pt;

		}
        table tr td{
            font-size: 10px;

        }
        table, td{
            border: 1px solid black;
            border-collapse: collapse;
        }
        thead, th{
            background-color: black;
            color: white;
        }
        table{
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>DATA PERUSAHAAN <br> MAGANG SMK TARUNA BHAKTI</h1>
    <table>
        <thead>
            <tr>
            <th>nama</th>
            <th>nama petinggi</th>
            <th>lokasi</th>
            <th>deskripsi perusahaan</th>
            <th>ranggal mou</th>
            <th>status mou</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($perusahaan as $item)
                <tr>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->nama_petinggi }}</td>
                    <td>{{ $item->lokasi }}</td>
                    <td>{{ $item->deskripsi_perusahaan }}</td>
                    <td>{{ $item->tanggal_mou }}</td>
                    <td>{{ $item->status_mou }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
