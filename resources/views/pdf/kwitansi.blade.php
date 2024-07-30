@php
  use Akaunting\Money\Money;
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Kwitansi</title>
  <style>
    table {
      width: 100%;
    }

    .page-break {
      page-break-after: always;
    }

    header,
    footer {
      width: 100%;
      text-align: center;
      position: fixed;
    }
    @page { margin: 0px; }
    body { margin: 0px; }
    header {
      top: 0px;
      height: 140px;
      display: none;
    }

    .content {
      /* border: 6px solid #228ff5; */
      border: 5px solid black;
      border-style: double;
      padding: 10px;
      
    }
    .kiri {
      border: 5px solid black;
      border-style: double;
      padding: 10px;
      position: relative;
    }
    .img-logo {
      width: 100px;
      height: 100px;
    }
    .va-top {
      vertical-align: top;
    }
    hr {
      background-color:white;
      margin:10px 0 45px 0;
      border-width:0;
    }
    hr.s1 {
      height:3px;
      border-top: 2px solid black;
      border-bottom: 1px solid black;
    }
    .underline {
      text-decoration: underline;
    }
    .underline::after {
      content: '';
      width: 200px;
      height: 10px;
      background: red;
    }
    .content td {
      padding: 3px;
    }
    .nominal {
      padding: 8px 12px;
      border: 1px dashed black;
      border-radius: 10px;
      min-width: 200px;
      font-style: italic;
      text-align: center;
      display: block;
      font-weight: bold;
    }
    .miring {
      position: absolute;
      top: 50%;
      text-align: center;
      font-weight: 700;
      font-size: 18px;
      width: 200px;
      left: 50%;
      transform: translateY(-50%) translateX(-50%) rotate(270);
    }
    .judul {
      text-align: center; font-weight: bold; margin-bottom: 10px;
    }
    .wrapper {
      padding: 15px;
      border-bottom: 1px dashed #1d1d1d;
    }
  </style>
</head>

<body>
  @foreach ($list_tagihan as $tagihan)
  <table class="wrapper">
    <tr>
      <td style="width: 15%">
        <div class="kiri" style="height: 250px">
          <div class="miring">
            PAMSIMAS<br>TIRTA AMERTA<br>KALIBAROS
          </div>
        </div>
      </td>
      <td style="width: 85%">
        <div class="content" style="height: 250px">
          <div class="underline judul">KWITANSI</div>
          <table>
            <tr>
              <td style="width: 200px"><strong>No.</strong></td>
              <td>#{{ $tagihan->id }}</td>
            </tr>
            <tr>
              <td style="width: 200px"><strong>Telah Diterima Dari</strong></td>
              <td>{{ $tagihan->pelanggan->nama }}</td>
            </tr>
            <tr>
              <td style="width: 200px"><strong>Uang Sejumlah</strong></td>
              <td>{{ Money::IDR($tagihan->total_tagihan)->formatWithoutZeroes() }}</td>
            </tr>
            <tr>
              <td style="width: 200px"><strong>Untuk Pembayaran</strong></td>
              <td>PAMSIMAS bulan {{ \Carbon\Carbon::create()->day(1)->month($tagihan->bulan)->translatedFormat('F') }} {{ $tagihan->tahun }}</td>
            </tr>
            <tr>
              <td style="width: 200px"><strong>Pemakaian Air</strong></td>
              <td>{{ $tagihan->jumlah_pemakaian }} m&sup3; @ {{ Money::IDR($tagihan->tarif_permeter)->formatWithoutZeroes() }}/m&sup3;</td>
            </tr>
          </table>
    
          @php
            $terbilang = ucwords(Helper::terbilang($tagihan->total_tagihan));
          @endphp
          <table>
            <tr>
              <td style="width: 66%">
                <div class="nominal"  @if(strlen($terbilang) > 50) style="font-size: 14px" @endif>
                  {{ $terbilang }} Rupiah
                </div>
              </td>
              <td style="text-align:center">
                Pekalongan, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
                <br>
                <br>
                <br>
                __________________
              </td>
            </tr>
          </table>
        </div>
      </td>
    </tr>
  </table>
   
   @endforeach
</body></html>
