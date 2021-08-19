<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>CETAK LAPORAN ARSIP</title>
    <style type="text/css">
		table {
			border-style: double;
			border-width: 3px;
			border-color: white;
		}
		table tr .text2 {
			text-align: right;
			font-size: 13px;
		}
		table tr .text {
			text-align: right;
			font-size: 13px;
		}
		table tr td {
			font-size: 13px;
		}

	</style>
</head>

<body>

    <center>
        <table>
            <tr>
                <td><img src="{{ asset('img/icon/logo.png') }}" width="100" height="90"></td>
                <td>
                    <center>
                        <font size="4"><b>PEMERINTAH KOTA BANDUNG</b></font><br>
                        <font size="3"><b>KECAMATAN CIDADAP</b></font><br>
                        <font size="4"><b>KELURAHAN LEDENG</b></font><br>
                        <font size="2">Jl. Cipaku Indah IV No.4 Kode Pos 40143 Telp. (022)-87801112</font>
                    </center>
                </td>
            </tr>
            <tr>
                <td colspan="4" width="100%">
                    <b><hr></b>
                </td>
            </tr>

        </table>
        <table class="table-static table-bordered table-hover" align="center" rules="all" width="60%">
            <thead>
                <tr>
                    <th scope="col">Kode Arsip</th>
                    <th scope="col">Jumlah Arsip</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($archive as $a)
                    <tr>
                        <th scope="row">Kode {{ $a->kode_arsip }} - {{ $a->nama_kode_arsip }}</th>
                        <td>{{ $a->archives->count() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        </table>
        <br>
        <table width="625">
            <tr>

                <td width="420"><br><br><br></td>
                <td class="text" align="right">Bandung, {{ $today }}<br>Lurah<br><br><br><br>Budi Prasetio, S. IP.</td>
            </tr>
        </table>
    </center>

    <script type="text/javascript">
        window.print();
    </script>

</body>

</html>
