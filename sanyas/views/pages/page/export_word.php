<table cellpadding="10" cellspacing="10" width="100%">
<tr><td style="width:20%"><h4>Legal Name</h4></td><td><?php echo $row->legal_name; ?></td></tr>
<tr><td style="width:20%"><h4>Sannyas Name</h4></td><td><?php echo $row->sanyas_name; ?></td></tr>
<tr><td style="width:20%"><h4>DOB</h4></td><td><?php echo $row->dob; ?></td></tr>
<tr><td style="width:20%"><h4>Gender</h4></td><td><?php echo $row->gender; ?></td></tr>
<tr><td style="width:20%"><h4>Country</h4></td><td><?php $row_country = $this->help_model->get_country_sel($row->country); echo  $row_country->country_name ; ?></td></tr>
<tr><td style="width:20%"><h4>Address</h4></td><td><?php echo $row->address; ?></td></tr>
<tr><td style="width:20%"><h4>Profession</h4></td><td><?php echo $row->profession; ?></td></tr>
<tr><td style="width:20%"><h4>Phone Number</h4></td><td><?php echo $row->phone_no; ?></td></tr>
<tr><td style="width:20%"><h4>Email</h4></td><td><?php echo $row->email; ?></td></tr>
<tr><td style="width:20%"><h4>Website</h4></td><td><?php echo $row->website; ?></td></tr>
<tr><td style="width:20%"><h4>Sannyas Date</h4></td><td><?php echo $row->sanyas_date; ?></td></tr>
<tr><td style="width:20%"><h4>Remarks</h4></td><td><?php echo $row->remarks; ?></td></tr>	
</table>