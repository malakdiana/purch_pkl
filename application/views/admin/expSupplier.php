<?php 

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=$title.xlsx");

header("Pragma: no-cache");

header("Expires: 0");

?>

<table border="1" width="100%">

<thead>

<tr>

<tr>
                        <th>NO</th>                   
                        <th>NAMA SUPPLIER</th>
                        <th>ALAMAT</th> 
                        <th>KOTA</th> 
                        <th>NO TELEPON</th> 
                        <th>NO FAX</th> 
                        <th>ATTENTION</th>
                        <th>NO HP</th>
                        <th>TANGGAL INPUT</th>
                        <th>TERMS</th>
                        <th>PPN</th>
                        <th>SUPPLY</th>
                        <th>STATUS</th>
                        <th>PERJANJIAN</th>
                        <th>REMARKS</th>
 </tr>

</thead>

<tbody>

<?php $i=1; foreach($user as $user) { ?>

<tr>

 <th><?php echo $user->id_supplier ?></th>
 <th><?php echo $user->nama_supplier ?></th>
 <th><?php echo $user->alamat ?></th>
   <th><?php echo $user->kota ?></th>
    <th><?php echo $user->no_telp ?></th>
     <th><?php echo $user->no_fax ?></th>
      <th><?php echo $user->attentiom ?></th>
       <th><?php echo $user->no_hp ?></th>
        <th><?php echo $user->tgl_input ?></th>
         <th><?php echo $user->terms ?></th>
          <th><?php echo $user->ppn ?></th>
           <th><?php echo $user->supply ?></th>
            <th><?php echo $user->status ?></th>
            <th><?php echo $user->perjanjian ?></th>
             <th><?php echo $user->remarks ?></th>

 </tr>

<?php $i++; } ?>

</tbody>

</table>