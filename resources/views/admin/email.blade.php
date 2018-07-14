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
    					Jl. qwertyuiop<br>
    					Jl. qwertyuiop<br>
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
        			<strong>Karyawan :</strong><br>
    					Nama Orang<br>
    					Nama Orang<br>
    				</address>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Order summary</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Menu</strong></td>
        							<td class="text-center"><strong>Harga</strong></td>
        							<td class="text-center"><strong>Keuntungan</strong></td>
        							<td class="text-center"><strong>Jumlah</strong></td>
        							<td class="text-center"><strong>Pendapatan Kotor</strong></td>
        							<td class="text-right"><strong>Total Keuntungan</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
    							<tr>
    								<td>Sate Mozarella</td>
    								<td class="text-center">15000</td>
    								<td class="text-center">5000</td>
    								<td class="text-center">10</td>
    								<td class="text-center">150000</td>
    								<td class="text-right">50000</td>
    							</tr>
                                <tr>
        							<td>BS-400</td>
    								<td class="text-center">$20.00</td>
    								<td class="text-center">3</td>
    								<td class="text-right">$60.00</td>
    							</tr>
                                <tr>
            						<td>BS-1000</td>
    								<td class="text-center">$600.00</td>
    								<td class="text-center">1</td>
    								<td class="text-right">$600.00</td>
    							</tr>
    							<tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>Subtotal</strong></td>
    								<td class="thick-line text-right">$670.99</td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Shipping</strong></td>
    								<td class="no-line text-right">$15</td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Total</strong></td>
    								<td class="no-line text-right">$685.99</td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>
</body>
</html>