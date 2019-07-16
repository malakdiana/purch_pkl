<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	ob_start();
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Voucher Paying</title>
	<style>
	body{
		font-size: 11px;
	}
	
		.dua, .satu, .tiga {	

		margin-right: 0px;
		margin-top: -25px;
	
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
	padding-top: -7px;
	padding-bottom: 5px;

    border: 1px solid;

}
	.border {
text-align: center;
align-content: center;
	width:140px;
	height: 30px;
	padding-top:15px;
	transform: skew(0deg);
    border: 2px solid;
    vertical-align: center;
margin-left: 25px;
}
.empat {
	font-size: 8px;
}

	
	</style>
</head>

<body>
	<table class="satu">
	<tr>
		<td width="670px" colspan="2"></td>
		<td  style="margin-left: 50px;font-size: 16px"><p align="center"><div class="border"><b>CONFIDENTIAL</b></div></p></td>
	<tr>
		<td><font size="34px" style="vertical-align: top;margin-top: -15px" ><b>SAI</b></font></td>
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
						<td><?php 	echo $vp_date; ?></td>
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
		<tr>
			<td style="width: 270px; padding-top: 2px;padding-left: 2px;">Paid to : <br><p align="center"><font size="12px"><b>MAJU KAWAN TECHNINDO</b></font></p></td>
			<td style="border-bottom: 0px; width: 410px">
				<table>
					<tr>
					<td style="border: 0px;padding-left: 10px;">
						Amount Rp.  
					</td>
					<td style="border: 0px;padding-left: 30px;padding-top: -20px"> <br><div class="parallelogram" ><p style="transform: skew(20deg);vertical-align: top;" align="center"><b><?php 	echo number_format($total,2,',','.'); ?></b></p></div></td>
				</tr>
				</table>
			</td>

		</tr>
		<tr>
			<td style="padding-top: 2px;padding-left: 2px;">Date :<br><p align="center" style="margin-top: 0px;font-size: 12px"><b><?php 	echo $tf_date; ?></b></p> </td>
			<td  style="border-top: 0px">
			<table><tr>
					<td style="border: 0px;padding-left: 10px;">
						Say
					</td>
					<td style="border: 0px;padding-left: 30px;">
						<p align="center" style="font-size: 10px"><b># <?php 	echo $say; ?> #</b></p>
					</td>
				</tr>
				</table>
			</td>
		</tr>
		
	</table>
	<table class="tiga" style="margin-top: 0px">
		<tr >
			<td rowspan="3" style="width: 370px; border-top:0px; text-align: left;vertical-align: top;padding-top: 2px;padding-left: 2px;"> Payment for : <br> <p align="center"><b><?php foreach ($inv as $key ) {
				 echo $key->no_invoice.",";
			} ?>
			</b></p>
				<table style="border: 0px" class="empat">
					<tr>
						<td style="text-align: left;">MATERIAL = <?php echo $qtymat; ?> x <?php echo number_format($material,2,',','.');?> </td>
						<td > = </td>
						<td style="text-align: right;"> <?php echo number_format($totalmat,2,',','.');?></td>
					</tr>
					<tr>
						<td style="text-align: left;">JASA = <?php echo $qtyjas; ?> x <?php echo number_format($jasa,2,',','.'); ?></td>
						<td > = </td>
						<td style="text-align: right;"> <?php echo number_format($totaljas,2,',','.'); ?></td>
					</tr>
					<tr >
						<td ></td>
						<td ></td>
						<td style="padding-top: -10px;border-top:1px solid black;"><td style="padding-top: -8px;">+</td></td>
					</tr>
					<tr style="margin-top: -8px">
						<td ></td>
						<td ></td>
						<td style="text-align: right;"><?php echo number_format($subtotal,2,',','.');; ?></td>
					</tr>
					<tr >
						<td style="text-align: left;">PPN</td>
						<td > = </td>
						<td style="text-align: right;"> <?php echo number_format($totalppn,2,',','.'); ?></td>
					</tr>
					<tr>
						<td ></td>
						<td ></td>
						<td style="padding-top: -10px;border-top:1px solid black;"><td style="padding-top: -8px;">+</td></td>
					</tr>
					<tr>
						<td ></td>
						<td > </td>
						<td style="text-align: right;"> <?php $x= $totalppn+$subtotal; echo number_format($x,2,',','.');; ?></td>
					</tr>
					<tr>
						<td style="text-align: left;">PPH = Total Jasa x <?php 	echo $pph; ?>%</td>
						<td > = </td>
						<td style="text-align: right;"><?php echo number_format($totalpph,2,',','.'); ?></td>
					</tr>
					<tr>
						<td ></td>
						<td ></td>
						<td style="padding-top: -10px;border-top:1px solid black;"><td style="padding-top: -8px;">-</td></td>
					</tr>
					<tr>
						<td ></td>
						<td > </td>
						<td style="text-align: right;"> <?php echo number_format($total,2,',','.'); ?></td>
					</tr>		
				</table>
			</td>
			<td height="20px" colspan="4" style="border-top:0px;width: 310px;">General Ledger</td>
		</tr>
		<tr >
			<td style="padding-bottom: 2px;padding-top: 2px" >Profil Center</td>
			<td style="padding-bottom: 2px;padding-top: 2px">Account Code</td>
			<td style="padding-bottom: 2px;padding-top: 2px">Activity Centre</td>
			<td style="padding-bottom: 2px;padding-top: 2px">Amount</td>
		</tr>
		<tr >
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td colspan="5" style="text-align: left;padding-bottom: 2px;padding-top: 2px;padding-left: 2px;" height="30px">Paid Thru :</td>
		</tr>

	</table>
	<table class="tiga" style="margin-top: -1px;width: 687px" >
		<tr>
			<td style="border-top:0px" height="20px">Cashier / Treasurer</td>
			<td style="border-top:0px">Verified</td>
			<td style="border-top:0px">Approved</td>
			<td style="border-top:0px">Prepared</td>
			<td style="border-top:0px">Received</td>
		</tr >
		<tr>
		<td height="50px"></td>
		<td></td>
			<td style="vertical-align: bottom;"> <?php echo $kode_nama; ?> </td>
		<td style="vertical-align: bottom;"> DDW </td>
		<td></td>

		</tr>
		</table>
</body>
</html>
