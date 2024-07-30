<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Laporan Pemakaian Air</title>
  <style>
    table {
      width: 100%;
    }
    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
    }
    .text-center {
      text-align: center;
    }
    .angka {
      width: 50px;
    }
    td {
      padding: 3px;
    }
  </style>
</head>

<body>
  <h4>LAPORAN PEMAKAIAN AIR</h4>
  <h5>RT. {{ $info->rt }} / RW. {{ $info->rw }}</h5>

  <table>
    
    <tr>
      <th rowspan="2" style="min-width: 20px">No</th>
      <th rowspan="2">No. Pelanggan</th>
      <th rowspan="2">Nama</th>
      <th colspan="12">Bulan</th>
    </tr>
    <tr>
      @for ($i = 1; $i <= 12; $i++)
        <th>{{ $i }}</th>
      @endfor
    </tr>

    </tr>
    @foreach ($list_pemakaian as $row)
    <tr>
      <td class="text-center">{{ $loop->iteration }}.</td>
      <td>{{ $row['no_pelanggan'] }}</td>
        <td>{{ $row['nama'] }}</td>
        @for ($bulan = 1; $bulan <= 12; $bulan++)
        <td class="text-center angka">{{ $row['pemakaian'][$bulan] ?? '-' }}</td>
        @endfor
      
      
    </tr>
    @endforeach
  </table>

</body>

</html>
