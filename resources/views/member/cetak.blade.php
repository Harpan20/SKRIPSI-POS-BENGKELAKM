<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Kartu Member</title>

    <style>
        .box {
            position: relative;
        }

        .card {
            width: 85.60mm;
        }

        .logo {
            position: absolute;
            top: 3pt;
            right: 0pt;
            font-size: 16pt;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
            color: #fff !important;
        }

        .logo p {
            text-align: right;
            margin-right: 16pt;
        }

        .logo img {
            position: absolute;
            margin-top: -5pt;
            width: 40px;
            height: 40px;
            right: 16pt;
        }

        .nama {
            position: absolute;
            top: 100pt;
            right: 16pt;
            font-size: 12pt;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
            color: #fff !important;
        }

        .telepon {
            position: absolute;
            margin-top: 120pt;
            top: 0;
            right: 16pt;
            color: #fff;
            font-size: 12pt;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
        }

        .barcode {
            position: absolute;
            top: 105pt;
            left: .860rem;
            border: 1px solid #fff;
            padding: .5px;
            background: #fff;
        }

        .text-left {
            text-align: left;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }
    </style>

    <style>
        .inside {
            position: absolute;
            right: 0;
            bottom: 0;
            margin-bottom: 2rem;
            margin-right: 2rem;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
        }

        .text {
            color: #fff;
            font-size: 25pt;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
            text-align: right;

        }

        .qrcode {
            position: absolute;
            bottom: 0;
            left: 0;
            z-index: 1;
            background: white;
            margin-bottom: 2rem;
            margin-left: 2rem;
        }

        .logos {
            position: absolute;
            top: 0;
            right: 0;
            z-index: 1;
            margin-top: 2rem;
            margin-right: 2rem;
        }
    </style>
</head>

<body>
    @foreach ($datamember as $key => $data)
        @foreach ($data as $item)
            <div class="logos">
                <img style="aspect-ratio: 425/139; width: 300px;" src="{{ env('APP_URL') . $setting->path_logo }}"
                    alt="logo">
            </div>
            <img style="position:absolute; inset:0;" src="{{ env('APP_URL') . $setting->path_kartu_member }}" alt="card"
                width="100%">
            <div class="inside">
                <div class="text" style="margin-bottom: 1rem; font-size: 35pt;">
                    {{ $setting->nama_perusahaan }}
                </div>
                <div class="text">{{ $item->nama }}</div>
                <div class="text">{{ $item->telepon }}</div>
            </div>
            <div class="qrcode">
                <img src="data:image/png;base64, {{ DNS2D::getBarcodePNG("$item->kode_member", 'QRCODE') }}"
                    alt="qrcode" height="125" widht="125">
            </div>
        @endforeach
    @endforeach


    {{-- <section style="border: 1px solid #fff">
        <table width="100%">
            @foreach ($datamember as $key => $data)
                <tr>
                    @foreach ($data as $item)
                        <td class="text-center">
                            <div class="box">
                                <img src="{{ env('APP_URL') . $setting->path_kartu_member }}" alt="card" width="100%">
                                <div class="logo">
                                    <p>{{ $setting->nama_perusahaan }}</p>
                                    <img src="{{  env('APP_URL') . $setting->path_logo }}" alt="logo">
                                </div>
                                <div class="nama">{{ $item->nama }}</div>
                                <div class="telepon">{{ $item->telepon }}</div>
                                <div class="barcode text-left">
                                    <img src="data:image/png;base64, {{ DNS2D::getBarcodePNG("$item->kode_member", 'QRCODE') }}"
                                        alt="qrcode" height="45" widht="45">
                                </div>
                            </div>
                        </td>

                        @if (count($datamember) == 1)
                            <td class="text-center" style="width: 50%;"></td>
                        @endif
                    @endforeach
                </tr>
            @endforeach
        </table>
    </section> --}}
</body>

</html>
