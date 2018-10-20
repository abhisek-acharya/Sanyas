
<div class="col-md-2"><h4>Legal Name</h4></div><div class="col-md-4">&nbsp;<?php echo $row->legal_name; ?></div>
<div class="col-md-2"><h4>Sannyas Name</h4></div><div class="col-md-4">&nbsp;<?php echo $row->sanyas_name; ?></div>
<div class="col-md-2"><h4>DOB</h4></div><div class="col-md-4">&nbsp;<?php echo $row->dob; ?></div>
<div class="col-md-2"><h4>Gender</h4></div><div class="col-md-4">&nbsp;<?php echo $row->gender; ?></div>
<div class="col-md-2"><h4>Country</h4></div><div class="col-md-4">&nbsp;<?php $row_country = $this->help_model->get_country_sel($row->country); echo  $row_country->country_name ; ?></div>
<div class="col-md-2"><h4>Address</h4></div><div class="col-md-4">&nbsp;<?php echo $row->address; ?></div>
<div class="col-md-2"><h4>Profession</h4></div><div class="col-md-4">&nbsp;<?php echo $row->profession; ?></div>
<div class="col-md-2"><h4>Phone Number</h4></div><div class="col-md-4">&nbsp;<?php echo $row->phone_no; ?></div>
<div class="col-md-2"><h4>Email</h4></div><div class="col-md-4">&nbsp;<?php echo $row->email; ?></div>
<div class="col-md-2"><h4>Website</h4></div><div class="col-md-4">&nbsp;<?php echo $row->website; ?></div>
<div class="col-md-2"><h4>Sannyas Date</h4></div><div class="col-md-4">&nbsp;<?php echo $row->sanyas_date; ?></div>
<div class="col-md-2"><h4>Remarks</h4></div><div class="col-md-4">&nbsp;<?php echo $row->remarks; ?></div>	
