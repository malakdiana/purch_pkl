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

		margin-right: 0px;
		margin-top: -25px;
		width: 200px;
			border-collapse: collapse;
		
		}
		.dua td{
			border: 1px solid black;
				padding-top:-2px;


		}
		.satu td{
			vertical-align: top;
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
		.lima td{
			font-size: 11px;
		}
		.parallelogram {

	width:180px;
	height: 30px;
	transform: skew(-20deg);
    border: 1px solid;

}
	.border {
text-align: right;
align-content: right;
	width:120px;
	height: 40px;
	padding-top:7px;
	transform: skew(0deg);
    border: 1px solid;
    vertical-align: center;
    align-self: right;

}
.empat {
	font-size: 8px;
}

	
	</style>
</head>

<body>
	<table class="satu">
	<tr>
		<td width="640px" colspan="2"></td>
		<td width="200px" style="margin-left: 50px"><p align="right"><div class="border"><b>CONFIDENTAL</b></div></p></td>
	<tr>
		<td><font size="28px" style="vertical-align: top;margin-top: -15px" ><b>SAI</b></font></td>
		<td style="width: 460px;"> 
			<center><font size="16px"><b>PT. SURABAYA AUTOCOMP INDONESIA <br></font><font size="13px"> <i> Wiring Harness Manufacturer </i></b></font> <br><font size="18px"><b><u>VOUCHER PAYING</u></b></font></center></td>
			<td>
				<table class="lima">
					<tr>
						<td>No.</td>
						<td>:</td>
						<td>....................................</td>
					</tr>
					<tr>
						<td>Date</td>
						<td>:</td>
						<td>....................................</td>
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
	<table class="dua" style="margin-top: 7px" >
		<tr style="padding-top: 20px">
			<td style="width: 270px;">Paid to : <br><p align="center"><font size="14px"><b>CENTRAL ENGINEERING</b></font></p></td>
			<td style="border-bottom: 0px; width: 410px">
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
			<td style="padding-top: 0px">Date :<br><p align="center" style="margin-top: 0px;font-size: 12px"><b>19-JUN-19</b></p> </td>
			<td  style="border-top: 0px">
			<table><tr>
					<td style="border: 0px;padding-left: 10px;">
						Say
					</td>
					<td style="border: 0px;padding-left: 30px;">
						<p align="center" style="font-size: 10px"><b># Tiga Puluh Lima Juta Empat Ratus Ribu Rupiah #</b></p>
					</td>
				</tr>
				</table>
			</td>
		</tr>
		
	</table>
	<table class="tiga" style="margin-top: 0px">
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
			


					
				</table>
			</td>
			<td colspan="4" style="border-top:0px;height: 30px;width: 280px" width="">General Ledger</td>
		</tr>
		<tr style="height: 30px">
			<td>Profil Center</td>
			<td>Account Code</td>
			<td>Activity Centre</td>
			<td>Amount</td>
		</tr>
		<tr style="height: 40px">
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td colspan="5" style="text-align: left;height: 10px">Paid Thru :</td>
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
		<tr style="height: 40px">
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>

		</tr>
		</table>
</body>
</html>
