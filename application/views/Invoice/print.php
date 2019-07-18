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
		font-size: 13px;
	font-family: 'Arial Black', Gadget, sans-serif;

padding-top: -13px;
padding-left: -3px;
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
	padding-top: 7px;
	padding-bottom: 5px;

    border: 1px solid;

}
	.border {
text-align: center;
align-content: center;
	width:150px;
	height: 36px;
	padding-top:15px;
	transform: skew(0deg);
    border: 2px solid;
    vertical-align: center;
margin-left: 105px;
}
.empat {
	font-size: 8px;
}

	
	</style>
</head>

<body>
	<table class="satu">
	<tr>
		<td colspan="2"></td>
		<td  style="margin-left: 80px;font-size: 16px;"><p align="center"><div class="border"><b>CONFIDENTIAL</b></div></p></td>
	<tr>
		<td width="60px" style="vertical-align: top; padding-top: -4px;  "><font size="42px" style="vertical-align: top;" ><b>SAI</b></font></td>
		<td width="380px"> 
			<center><font size="16px"><b>PT. SURABAYA AUTOCOMP INDONESIA <br></font></b><font size="14px"> <b><i> Wiring Harness Manufacturer </i></b></font> <br><font size="22px"><b><u>VOUCHER PAYING</u></b></font></center></td>
			<td>
				<table class="lima" style="font-size: 13px">
				
					<tr>
					
						<td><br><font size="12px">No.</font></td>
						<td><br>&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td><br><font size="12px">:</font></td>
						<td><br><font size="12px">.........................................................</font></td>
					</tr>
					<tr>
						
						<td><font size="12px">Date</font></td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td><font size="12px">:</font></td>
						<td><font size="12px"><?php 	echo $vp_date; ?></font></td>
					</tr>
					<tr>
						<td><font size="12px">Dept</font></td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td><font size="12px">:</font></td>
						<td><font size="12px">PURCH</font></td>
					</tr>
				</table>
			</td>
	</tr>
	</table> <br>
	<table class="dua" style="margin-top: -1px" >
		<tr>
			<td style="width: 270px; height: 60px ; ">
				<table border="0">	
						<tr>
							<td style="padding-top: 4px">Paid to :</td>	
						</tr>
						<tr>
							<td style="text-align: center;width: 266px"><font size="14px"><center><b> PT MAJU KAWAN TECHNINDO </b></center></font></td>
						</tr>
				</table>
			<td style="border-bottom: 0px; width: 428px">
				<table>
					<tr>
					<td style="border: 0px;padding-left: 10px;padding-top: 15px">
						Amount Rp.  
					</td>
					<td style="border: 0px;padding-left: 30px;padding-top: -13px"> <br><div class="parallelogram" ><p style="transform: skew(20deg);vertical-align: top; margin-left: 10px" align="left"><b><?php 	echo number_format($total,2,',','.'); ?></b></p></div></td>
				</tr>
				</table>
			</td>

		</tr>
		<tr>
			<td style="padding-top: 2px;padding-left: 2px;height: 60px ; ">
				<table border="0">	
						<tr>
							<td style="padding-top: 4px">Date :</td>	
						</tr>
						<tr>
							<td style="padding-left: 35px"><font size="14px"><center><b> <?php 	echo $tf_date; ?></b></center></font></td>
						</tr>
				</table>

				</td>
			<td  style="border-top: 0px">
			<table><tr>
					<td style="border: 0px;padding-left: 10px;padding-top: 15px">
						Say
					</td>
					<td style="border: 0px;padding-left: 30px;padding-top: 15px">
						<p align="center" style="font-size: 10px"><b># <?php 	echo $say; ?> #</b></p>
					</td>
				</tr>
				</table>
			</td>
		</tr>
		
	</table>
	<table border="0">
		<tr>
			<td width="340px">
	<table class="tiga" style="margin-top: -3px;margin-left: -2px" width="340px">
		<tr >
			<td style="width: 200px;border-top:0px; text-align: left;vertical-align: top;padding-top: 2px;" >
			 <table border="0" width="350px">
				<tr>
					<td style="width: 80px;vertical-align: top">Payment for :</td>
					<td style="width: 260px; height: 33px" ><b><?php foreach ($inv as $key ) {
				 echo $key->no_invoice.",";} ?> </b>
				</td>
				</tr>
			</table >
				<table style="border: 0px" border="0px" class="empat" >
					<tr>	
				<td height="91px" style="text-align: center;font-size: 14px;">	
						<b><?php 	echo $barang; ?></b>
				</td></tr>		
				</table>
			</td>
			
		</tr>

	</table>
</td>
	<td style="padding: -2px;">
	<table  width="351px" style="margin-left: -1px;	border-collapse: collapse;" >
		<tr>
			<td height="20px" colspan="4" style="border-top:0px;border-left:0px;text-align: center;border-right: 1px solid black;">General Ledger</td>
		</tr>
		<tr >
			<td style="text-align:center;border: 1px solid black;border-left:0px;" >Profil Centre</td>
			<td style="text-align:center;border: 1px solid black;border-left:0px;">Account Code</td>
			<td style="text-align:center;border: 1px solid black;border-left:0px;">Activity Centre</td>
			<td style="text-align:center;border: 1px solid black;border-left:0px;">Amount</td>
		</tr>
		<tr >
			<td height="93px" style="border: 1px solid black"></td>
			<td style="border: 1px solid black"></td>
			<td style="border: 1px solid black"></td>
			<td style="border: 1px solid black"></td>
		</tr>
		

	</table>
</td>
</tr></table>
	<table class="tiga" style="margin-top: -2px;width: 687px;padding-top: -2px;padding-bottom: -39px" width="706px" >
		<tr>
			<td colspan="5" style="text-align: left;padding-left: 2px; border-top: 0px" height="30px">Paid Thru :</td>
		</tr>
		<tr>
			<td style="border-top:0px" height="20px" width="160px">Cashier / Treasurer</td>
			<td style="border-top:0px">Verified</td>
			<td style="border-top:0px">Approved</td>
			<td style="border-top:0px">Prepared</td>
			<td style="border-top:0px">Received</td>
		</tr >
		<tr>
		<td height="75px"></td>
		<td></td>
			<td style="vertical-align: bottom;"> <?php echo $kode_nama; ?> </td>
		<td style="vertical-align: bottom;">  <?php echo $prepared; ?>  </td>
		<td></td>

		</tr>
		<tr >
			<td style="border: 0px">
				
			</td>
			<td style="border: 0px"></td>
			<td style="font-size: 11px ;border: 0px">* Please enclose receipts </td>
			<td style="border: 0px"></td>
			<td style="text-align: right; font-size: 8px;border: 0px"> <i>FA-004-A</i></td>
		</tr>
		</table>
</body>
</html>
