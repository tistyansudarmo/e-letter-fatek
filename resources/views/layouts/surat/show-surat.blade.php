<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    
    .center {
        text-align: center;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 12px;
        
    }

    .kop h2 {
            margin: 8px 0px; /* Mengatur jarak atas dan bawah sebesar 10px, dan margin kiri dan kanan 0 */
            margin-left: -90px;
        }

    table {
            border-bottom: 3px solid #000;
    }

    img {
        margin-bottom: 6px;
    }

    .alamat {
        margin-left: -73px;
        margin-top: 3px;
       
    }

    h5{
        margin-left: -70px;
        margin-top: 3px;
    }

    .title {
        text-align: center;
        margin-top: 25px;
    }

    .nomor_surat {
        text-align: center;
        margin-bottom: 25px;
        margin-top : -10px;
        font-weight: bold;
    }
    
</style>

<body>
        
        <div class="kop">
        <table width="100%">
            <tr>
                {{-- <img src="{{ asset('storage/' . $surat->logo) }}" alt=""> --}}
                <td><img src="assets/img/Logo-Universitas-Negeri-Manado-Logo-Unima.jpg" width="120px" alt=""></td>
                <td class="center">
                    <h2>Kementrian Pendidikan, Kebudayaan, Riset dan Teknologi</h2>
                    <h2>Universitas Negeri Manado</h2> 
                    <h2>Fakultas Teknik</h2> 
                    <p class="alamat">Alamat : Kampus UNIMA di Tondano 95618</p>
                    <h5>Telp : (0431) 32845, 321847 Fax : (0431) 321866</h5>
                </td>
            </tr>
        </table>
        </div>
        <p class="title">{{ $surat->title }}</p>
        <@php
            $createdAt = $surat->created_at;
            $formattedDate = date('Y-m-d', strtotime($createdAt));
        @endphp
        <p class="nomor_surat">No Surat : {{ $surat->no_surat }}-{{ $formattedDate }}</p>
        <p>{!! $surat->content_surat !!}</p>

</body>
</html>