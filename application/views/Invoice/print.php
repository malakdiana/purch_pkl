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
font-family: "arial black", "Arial Bold", Gadget, sans-serif;
padding-left: -3px;
padding-top: -19px;
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
	padding-bottom: 17px;

    border: 1px solid;

}
	.border {
text-align: center;
align-content: center;
	width:190px;
	height: 47px;
	padding-top:19px;
	transform: skew(0deg);
    border: 2px solid;
    vertical-align: center;
margin-left: 70px;
}
.empat {
	font-size: 8px;
}
u.dotted {
  border-bottom: 1px dashed #999;
  text-decoration: none;
}

	
	</style>
</head>

<body>
	<table class="satu">
	<tr>
		<td colspan="2"></td>
		<td  style="font-size: 20px;"><p align="center"><div class="border"><b>CONFIDENTIAL</b></div></p></td>
	<tr>
		<td width="110px" style="vertical-align: top"><img src="<?php echo base_url()?>assets/images/sai.png" width="84px" height="35px"></td>
		<td width="410px" border="1"> 
			<center><font size="18px"><b>PT. SURABAYA AUTOCOMP INDONESIA <br></font></b><font size="14px"> <b><i> Wiring Harness Manufacturer </i></b></font> <br><font size="22px"><b><u>VOUCHER PAYING</u></b></font></center></td>
			<td>
				<table class="lima" style="font-size: 13px">
				
					<tr>
					
						<td><br><font size="12px">No.</font></td>
						<td><br>&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td><br><font size="12px">:</font></td>
						<td><br><font size="12px"></font><br><hr style="border-top: 1px dotted black; border-bottom: 0px; margin-top: -1px; width: 200px; border-left: 0px; border-right: 0px"  ></td>
					</tr>
					<tr>
						
						<td style="padding-top: -4px"><font size="12px">Date</font></td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td style="padding-top: -4px"><font size="12px">:</font></td>
						<td style="padding-top: -4px"><font size="12px"><?php 	echo $vp_date; ?></font><br><hr style="border-top: 1px dotted black; border-bottom: 0px; margin-top: -1px; width: 200px; border-left: 0px; border-right: 0px"  ></td>
					</tr>
					<tr>
						<td style="padding-top: -5px"> <font size="12px">Dept</font></td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td style="padding-top: -5px"><font size="12px">:</font></td>
						<td style="padding-top: -5px"><font size="12px">PURCH</font><br><hr style="border-top: 1px dotted black; border-bottom: 0px; margin-top: -1px; width: 200px; border-left: 0px; border-right: 0px"  ></td>
					</tr>
				</table>
			</td>
	</tr>
	</table><br>
	<table class="dua" style="margin-top: -9px" >
		<tr>
			<td style="width: 270px; height: 50px ; ">
				<table border="0">	
						<tr>
							<td style="padding-top: 4px; vertical-align: top">Paid to :</td>	
							<td style="text-align: center;width: 206px; padding-top: 4px"><font size="14px"><center><b> PT MAJU KAWAN TECHNINDO </b></center></font></td>
						</tr>
				</table>
			<td style="border-bottom: 0px; width: 510px">
				<table>
					<tr>
					<td style="border: 0px;padding-left: 10px;padding-top: 15px">
						Amount Rp.  
					</td>
					<td style="border: 0px;padding-left: 30px;padding-top: -13px"> <br><div class="parallelogram" ><p style="transform: skew(20deg);vertical-align: top; margin-left: 10px;font-size: 16px; border-bottom: 1px dotted black;width: 146px" align="left"><b><?php 	echo number_format($total,2,',','.'); ?></b></p></div></td>
				</tr>
				</table>
			</td>

		</tr>
		<tr>
			<td style="padding-top: 2px;padding-left: 2px;height: 65px ; ">
				<table border="0">	
						<tr>
							<td style="padding-top: 4px; width: 50px">Date :</td>
								<td style="text-align: left ;width: 206px; padding-top: 4px"><font size="14px"><b>  <?php 	echo $tf_date; ?></b></font></td>	
						
						</tr>
				</table>

				</td>
			<td  style="border-top: 0px">
			<table style="margin-left: 5px" ><tr>
					<td style="border-top: 1px;border-left:1px;border-right:1px;border-bottom:1px dotted black;padding-top: 15px; vertical-align: top;height: 40px" >
						Say
					</td>
					<td style="border-top: 0px;border-left:0px;border-right:0px;border-bottom:1px dotted black;padding-left: 30px;padding-top: 6px; vertical-align: top; border-bottom: 1px dotted black; width: 430px"><hr style="border-top: 0px;border-left:0px;border-right:0px;border-bottom:1px dotted black;padding-top: 15px;max-height: 40px">
						<p align="left" style="font-size: 13px;padding-top: -29px"># <?php echo $say; ?> #</p>

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
					<td style="width: 270px; height: 51px;text-align: left;vertical-align: top" ><b><?php $no = 1; foreach ($inv as $key ) {
						if($no>1){
				 echo ", ".$key->no_invoice;
				}else{
					 echo $key->no_invoice;
				}
				$no++;} ?></b>
				</td>
				</tr>
			</table>

			<table><tr><td style="border-top:1px dotted black; border-left:0px; border-right: 0px;  border-bottom: 0px dotted black;width: 380px;margin-top:-4px ">
				<table style="border: 0px; " border="0px" class="empat">
					<tr>	
				<td style="text-align: center;font-size: 14px;">	
						<b><?php 	echo $barang; ?><br></b>
				</td></tr>		
				</table>
			</td>
		</tr></table>

			<table><tr><td style="border-bottom:0px; border-left:0px; border-right: 0px;  border-top: 1px dotted black;width: 380px">
				<table style="border: 0px; " border="0px" class="empat">	
					<tr style="margin-top: -8px">
						<td style="text-align: left;width: 130px height:50px" ><br><br></td>
						
					</tr>
					
				</table></td></tr></table>
							<table><tr><td style="border-bottom:0px; border-left:0px; border-right: 0px;  border-top: 1px dotted black;width: 380px">
				<table style="border: 0px; " border="0px" class="empat">	
					<tr>
						<td style="text-align: left;width: 130px"><br><br></td>
						
					</tr>
					
						</table>
			</td>
		</tr>
	</table>
		<table><tr><td style="border-bottom:0px; border-left:0px; border-right: 0px;  border-top: 1px dotted black;width: 380px">
				<table style="border: 0px; " border="0px" class="empat">	
					<tr>
						<td style="text-align: left;width: 130px"><br><br></td>
					</tr>	
					</table>	
				</td>
			</tr>
		</table>
			
			</td>
			
		</tr>

	</table>
</td>
	<td style="padding: -2px;">
	<table  width="396px" style="margin-left: -1px;	border-collapse: collapse;" >
		<tr>
			<td height="20px" colspan="4" style="border-top:0px;border-left:0px;text-align: center;border-right: 1px solid black;">General Ledger</td>
		</tr>
		<tr >
			<td style="text-align:center;border: 1px solid black;border-left:0px;width: 85px" >Profil Centre</td>
			<td style="text-align:center;border: 1px solid black;border-left:0px;width: 85px">Account Code</td>
			<td style="text-align:center;border: 1px solid black;border-left:0px;width: 85px">Activity Centre</td>
			<td style="text-align:center;border: 1px solid black;border-left:0px;width: 85px">Amount</td>
		</tr>
		<tr >
			<td height="135px" style="border: 1px solid black"></td>
			<td style="border: 1px solid black"></td>
			<td style="border: 1px solid black"></td>
			<td style="border: 1px solid black"></td>
		</tr>
		

	</table>
</td>
</tr></table>
	<table class="tiga" style="margin-top: -2px;width: 687px;padding-top: -2px;padding-bottom: -39px" width="786px" >
		<tr>
			<td colspan="5" style="text-align: left;padding-left: 2px; border-top: 0px" height="30px"><p style="margin-left: 2px">Paid Thru :  <?php echo "$paid"; ?></p></td>
		</tr>
		<tr >
			<td style="border-top:0px; height: 27px" height="20px" width="136px">Cashier / Treasurer</td>
			<td style="border-top:0px; height: 27px" width="136px">Verified</td>
			<td style="border-top:0px;height: 27px" width="136px">Approved</td>
			<td style="border-top:0px;height: 27px" width="136px">Prepared</td>
			<td style="border-top:0px;height: 27px" width="136px">Received</td>
		</tr >
		<tr>
		<td height="75px"></td>
		<td></td>
			<td style="vertical-align: bottom;"> <?php echo $kode_nama; ?> </td>
		<td style="vertical-align: bottom;"> <?php echo $prepared; ?> </td>
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
