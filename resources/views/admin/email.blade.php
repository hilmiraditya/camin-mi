<!DOCTYPE html>
<html>
<head>
	<title>Laporan Penjualan</title>
	<link rel="stylesheet" href="{{url('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
	<script src="{{url('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
	<script src="{{url('adminlte/bower_components/jquery/dist/jquery.min.js')}}"></script>
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
    		<img style="width: 100px;height: 100px;" src="{{url('satean.jpg')}}">
    		<h3>Laporan Penjualan </h3>
    		<strong>Periode : April 2018 </strong>
    	</div>
    	<hr>
        <div class="col-xs-12">
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				<strong>Cabang :</strong><br>
                        @if($cabang->count() == NULL)
                        Cabang Tidak Ada<br>
                        @endif
                        @foreach($cabang as $cabang)
    					{{$cabang->alamat}}<br>
    					@endforeach
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
        			<strong>Karyawan :</strong><br>
                        @if($karyawan->count() == NULL)
                        Karyawan Tidak Ada<br>
                        @endif
                        @foreach($karyawan as $karyawan)
    					{{$karyawan->name}}<br>
                        @endforeach
    				</address>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Transaksi Periode 7/5/2018</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            @if($penjualan->count() == NULL)
                            <div align="center">
                                <h5>Belum Ada Transaksi</h5>
                            </div>
                            @else
                            <thead>
                                <tr>
                                    <td><strong>Menu</strong></td>
                                    <td class="text-center"><strong>Harga</strong></td>
                                    <td class="text-center"><strong>Keuntungan</strong></td>
                                    <td class="text-center"><strong>Jumlah</strong></td>
                                    <td class="text-center"><strong>Pendapatan Kotor</strong></td>
                                    <td class="text-right"><strong>Total Keuntungan Bersih</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                @foreach($penjualan as $penjualan)
                                <tr>
                                    <td>{{$penjualan->Katalog->nama}}</td>
                                    <td class="text-center">{{$penjualan->Katalog->harga}}</td>
                                    <td class="text-center">{{$penjualan->Katalog->keuntungan}}</td>
                                    <td class="text-center">{{$penjualan->jumlah}}</td>
                                    <td class="text-center">{{$penjualan->Katalog->harga*$penjualan->jumlah}}</td>
                                    <td class="text-right">{{$penjualan->jumlah*$penjualan->Katalog->keuntungan}}/td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line text-center"><strong>Total</strong></td>
                                    <td class="thick-line text-center">$670.99</td>
                                    <td class="thick-line text-right">$670.99</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Detail Transaksi Periode 7/5/2018</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
                            @if($penjualan->count() == NULL)
                            <div align="center">
                                <h5>Belum Ada Transaksi</h5>
                            </div>
                            @else
    						<thead>
                                <tr>
        							<td><strong>ID Transaksi</strong></td>
        							<td class="text-center"><strong>Nama Item</strong></td>
        							<td class="text-center"><strong>Cabang</strong></td>
        							<td class="text-center"><strong>Jumlah</strong></td>
        							<td class="text-right"><strong>Tanggal Transaksi</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
    							<tr>
                                    @foreach($penjualan2 as $penjualan2)
    								<td>{{$penjualan2->idTransaksi}}</td>
                                    <td class="text-center">{{$penjualan2->nama}}</td>
    								<td class="text-center">{{$penjualan2->Cabang->nama}}</td>
    								<td class="text-center">{{$penjualan2->jumlah}}</td>
    								<td class="text-center">{{$penjualan2->created_at}}</td>
                                    @endforeach
    							</tr>
    						</tbody>
                            @endif
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>
<hr>
<div align="center">
    <h5>Develop by <b>raditya113@icloud.com</b></h5>
</div>
</body>
</html>