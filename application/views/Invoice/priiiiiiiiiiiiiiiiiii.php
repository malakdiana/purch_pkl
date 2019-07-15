<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	ob_start();
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Voucher Paying</title>
	<style>
	
		.dua, .satu, .tiga {	
		margin-left: 9px;
		margin-right: 9px;
		width: 680px;
			border-collapse: collapse;
		
		}
		.dua td{
			border: 1px solid black;
				padding-top:-2px;


		}
		.tiga td{
				border: 1px solid black;
				text-align: center;
			

		
		}
		.empat td{
			border: 0px;
		margin: 0px;
		padding:0px;
		}
		.parallelogram {

	width:200px;
	height: 40px;
	transform: skew(-20deg);
    border: 1px solid;

}
.empat {
	font-size: 8px;
}

	
	</style>
</head>

<body>
	<table class="satu">
	<tr>
		<td style="width: 80px;"></td>
		<td style="width: 300px;"></td>
		<td style="margin-top: 0px ; align-items: right"><p align="right" ><font style="border: 2px solid ;padding:15px;"><b>CONFIDENTAL</b></font></p></td>
	<tr>
		<td><font size="15px" ><b>SAI</b></font></td>
		<td> 
			<center><br><font size="12px"><b>PT. SURABAYA AUTOCOMP INDONESIA <br> <i> Wiring Harness Manufacturer </i></b></font> <br><font size="5px"><u>VOUCHER PAYING</u></font></center></td>
			<td><br><br>
				<table>
					<tr>
						<td>No.</td>
						<td>:</td>
						<td>.............................................................</td>
					</tr>
					<tr>
						<td>Date</td>
						<td>:</td>
								<td>.............................................................</td>
					</tr>
					<tr>
						<td>Dept</td>
						<td>:</td>
						<td>PURCH</td>
					</tr>
				</table>
			</td>
	</tr>
	</table> <br>
	<table class="dua" >
		<tr style="padding-top: 20px">
			<td style="width: 270px;">Paid to : <br><p align="center"><b>CENTRAL ENGINEERING</b></p></td>
			<td style="border-bottom: 0px">
				<table>
					<tr>
					<td style="border: 0px;padding-left: 10px;">
						Amount Rp.  
					</td>
					<td style="border: 0px;padding-left: 30px;"> <br><div class="parallelogram" ><p style="transform: skew(20deg);" align="center"><b>35,400,400.00</b></p></div></td>
				</tr>
				</table>
			</td>

		</tr>
		<tr>
			<td style="padding-top: 0px">Date :<br><p align="center" style="margin-top: 0px"><b>19-JUN-19</b></p> </td>
			<td  style="border-top: 0px">
			<table><tr>
					<td style="border: 0px;padding-left: 10px;">
						Say
					</td>
					<td style="border: 0px;padding-left: 30px;">
						<p align="center"><b># Tiga Puluh Lima Juta Empat Ratus Ribu Rupiah #</b></p>
					</td>
				</tr>
				</table>
			</td>
		</tr>
		
	</table>
	<table class="tiga">
		<tr >
			<td rowspan="3" style="width: 400px; border-top:0px; text-align: left;vertical-align: top"> Payment for : <br> <p align="center"><b><?php foreach ($inv as $key ) {
				 echo $key->no_invoice.",";
			} ?></b></p>
				<table style="border: 0px" class="empat">
					<tr>
						<td ">MATERIAL = <?php echo $qtymat; ?> x <?php echo $material; ?></td>
						<td "> = </td>
						<td "> <?php echo $totalmat; ?></td>
					</tr>
					<tr>
						<td >JASA = <?php echo $qtyjas; ?> x <?php echo $jasa; ?></td>
						<td > = </td>
						<td > <?php echo $totaljas; ?></td>
					</tr>
					<tr >
						<td ></td>
						<td ></td>
						<td style="padding-top: -10px"><hr><td >+</td></td>
					</tr>
					<tr>
						<td ></td>
						<td ></td>
						<td ><?php echo $subtotal; ?></td>
					</tr>
					<tr >
						<td >PPN</td>
						<td > = </td>
						<td > <?php echo $totalppn; ?></td>
					</tr>
					<tr>
						<td ></td>
						<td ></td>
						<td height="2px"><hr><td >+</td></td>
					</tr>
					<tr>
						<td ></td>
						<td > </td>
						<td > <?php $x= $totalppn+$subtotal; echo $x; ?></td>
					</tr>
					<tr>
						<td >PPH = Total Jasa x 2%</td>
						<td > = </td>
						<td ><?php echo $totalpph; ?></td>
					</tr>
					<tr>
						<td ></td>
						<td ></td>
						<td ><hr> <td style="border: 0px">-</td></td>
					</tr>
					<tr>
						<td ></td>
						<td > </td>
						<td > <?php echo $total; ?></td>
					</tr>



					
				</table>
			</td>
			<td colspan="4" style="border-top:0px;height: 30px">General Ledger</td>
		</tr>
		<tr style="height: 30px">
			<td>Profil Center</td>
			<td>Account Code</td>
			<td>Activity Centre</td>
			<td>Amount</td>
		</tr>
		<tr style="height: 70px">
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td colspan="5" style="text-align: left;height: 40px">Paid Thru :</td>
		</tr>

	</table>
	<table class="tiga">
		<tr>
			<td style="border-top:0px">Cashier / Treasurer</td>
			<td style="border-top:0px">Verified</td>
			<td style="border-top:0px">Approved</td>
			<td style="border-top:0px">Prepared</td>
			<td style="border-top:0px">Received</td>
		</tr >
		<tr style="height: 70px">
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>

		</tr>
		</table>
</body>
</html>
