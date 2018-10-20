
<table class="table table-striped table-bordered responsive" id="">
<thead>
<tr>
<th >Sn</th>
<th >Legal Name</th>
<th >Sannyas Name</th>
<th >DOB</th>
<th >Gender</th>
<th >Country</th>
<th >Address</th>
<th >Profession</th>
<th >Phone No</th>
<th >Email</th>
<th >Website</th>
<th >Sannyas Date</th>
<th >Remarks</th>
</tr>
</thead>
<tbody>
<?php 
$sn=1;
if($result!=''){
foreach($result as $row){
?>
<tr >
<td><?php echo $sn;?></td>
<td><?php echo $row->legal_name; ?></td>
<td> <?php echo $row->sanyas_name; ?></td>
<td> <?php echo $row->dob; ?></td>
<td> <?php echo $row->gender; ?></td>
<td><?php $row_country = $this->help_model->get_country_sel($row->country); echo  $row_country->country_name ;?></td>
<td> <?php echo $row->address; ?></td>
<td> <?php echo $row->profession; ?></td>
<td> <?php echo $row->phone_no; ?></td>
<td> <?php echo $row->email; ?></td>
<td> <?php echo $row->website; ?></td>
<td><?php echo $row->sanyas_date; ?></td>
<td><?php echo $row->remarks; ?></td>
</tr>
<?php  
$sn++;      
} } else {
?>  
<tr><td colspan="5">Record Not Found</td></tr>
<?php }  ?>                               
</tbody>
</table>

