<!DOCTYPE html>
<html>
<head>
	<title>Laporan Penjualan</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<style>
		.invoice-title h2, .invoice-title h3 {
    		display: inline-block;
		}
		.table > tbody > tr > .no-line {
    		border-top: none;
		}
		.table > thead > tr > .no-line {
			border-bottom: none;
		}
		.table > tbody > tr > .thick-line {
    		border-top: 2px solid;
		}
	</style>
</head>
<body>
	<div class="container">
    <div class="row">
    	<div align="center">
    		<br>
    		<img style="width: 100px;height: 100px;" src="https://image.ibb.co/gjM09J/satean.jpg">
    		<h3>Laporan Penjualan </h3>
    		<strong>Periode : {{$date}} </strong>
    	</div>
    	<hr>
    <div class="row">
        @foreach($cabang as $cabang)
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Transaksi Cabang {{$cabang->nama}}</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            @if($penjualan->where('cabang_id', $cabang->id)->count() == NULL)
                            <div align="center">
                                <h5>Belum Ada Transaksi</h5>
                            </div>
                            @else
                            <thead>
                                <tr>
                                    <td><strong>ID Transaksi</strong></td>
                                    <td class="text-center"><strong>Menu</strong></td>
                                    <td class="text-center"><strong>Kategori</strong></td>
                                    <td class="text-center"><strong>Jumlah</strong></td>
                                    <td class="text-right"><strong>Waktu Transaksi</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                <?php $hasil = $penjualan->where('cabang_id', $cabang->id);?>
                                @foreach($hasil as $penjualan)
                                <tr>
                                    <td>{{$penjualan->id}}</td>
                                    <td class="text-center">{{$penjualan->Katalog->nama}}
                                    <td class="text-center">{{$penjualan->Katalog->Kategori->nama}}</td>
                                    <td class="text-center">{{$penjualan->jumlah}}</td>
                                    <td class="text-right">{{$penjualan->created_at}}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line text-center"></td>
                                    <td class="thick-line text-right"></td>
                                </tr>
                                <?php $Kategori = $kategori;?>
                                @foreach($Kategori as $kategori)
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Total {{$kategori->nama}} Terjual</strong></td>
                                    <td class="no-line text-right">
                                        {{$penjualan->where('cabang_id', $cabang->id)->where('kategori_id', $kategori->id)->sum('jumlah')}}
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div>

                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<hr>
<div align="center">
    <h5>Develop by <b>raditya113@icloud.com</b></h5>
</div>
</body>
</html>