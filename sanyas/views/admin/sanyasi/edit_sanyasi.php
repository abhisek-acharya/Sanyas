<?=$header?>
<div class="pageheader">
<div class="media">
<div class="pageicon pull-left">
<i class="fa fa-pencil"></i>
</div>
<div class="media-body">
<ul class="breadcrumb">
<li><a href=""><i class="glyphicon glyphicon-home"></i></a></li>
<li><a href="">Sannyas</a></li>
</ul>
<h4>Edit Sannyasi</h4>
</div>
</div><!-- media -->
</div>
<div class="contentpanel">
<?php echo validation_errors(); ?>
<form action="<?php echo base_url('myadmin/sanyasi/edit_sanyasi/'.$this->uri->segment(4))?>" method="post" enctype=""   class="form-bordered" >
<div class="form-group"> 
<label class="col-sm-3 control-label">Legal Name</label>
<div class="col-sm-3" >
<input type="text" class="form-control" name="legal_name" id="legal_name"  value="<?php echo $row->legal_name;?>" required="required">
<input type="hidden" name="added_by" id="added_by" value="<?php echo $row->added_by?>"   >
</div>
</div>

<div class="form-group"> 
<label class="col-sm-3 control-label">Sannyas Name</label>
<div class="col-sm-3" >
<input type="text" class="form-control" name="sanyas_name" id="sanyas_name" value="<?php echo $row->sanyas_name;?>">
</div>
</div>

<div class="form-group"> 
<label class="col-sm-3 control-label">Date Of Birth</label>
<div class="col-sm-6" >
<?php
$dob =  explode('-', $row->dob);
//print_r($y);exit();	
$dob[1] =  substr($row->dob,5,2);
$d =  substr($row->dob,8,2)
?>                                            
<select name="dob[]" id="dob_years"  style="height: 30px;width: 70px;">
<?php
$year  =  range(1900,2025);
foreach($year as $key=>$val){
?>
<option value="<?php echo $val; ?>" <?php echo ($val==$dob[0])?"selected":""; ?>><?php echo $val; ?></option>
<?php } ?> 

</select>
<select name="dob[]" id="dob_months"  style="height: 30px;width: 100px;">
<option value="01" <?php echo ($dob[1]==1)?"selected":""; ?>>Jan</option>
<option value="02" <?php echo ($dob[1]==2)?"selected":""; ?>>Feb</option>
<option value="03" <?php echo ($dob[1]==3)?"selected":""; ?>>Mar</option>
<option value="04" <?php echo ($dob[1]==4)?"selected":""; ?>>Apr</option>
<option value="05" <?php echo ($dob[1]==5)?"selected":""; ?>>May</option>
<option value="06" <?php echo ($dob[1]==6)?"selected":""; ?>>Jun</option>
<option value="07" <?php echo ($dob[1]==7)?"selected":""; ?>>Jul</option>
<option value="08" <?php echo ($dob[1]==8)?"selected":""; ?>>Aug</option>
<option value="09" <?php echo ($dob[1]==9)?"selected":""; ?>>Sept</option>
<option value="10" <?php echo ($dob[1]==10)?"selected":""; ?>>Oct</option>
<option value="11" <?php echo ($dob[1]==11)?"selected":""; ?>>Nov</option>
<option value="12" <?php echo ($dob[1]==12)?"selected":""; ?>>Dec</option>
</select>
<select name="dob[]" id="dob_days"  style="height: 30px;width: 50px;">
<?php
$day  =  range(1,31);
foreach($day as $key=>$val){
?>
<option value="<?php echo $val; ?>" <?php echo ($val==$dob[2])?"selected":""; ?>><?php echo $val; ?></option>
<?php } ?> 

</select> 
</div>
</div>

<div class="form-group"> 
<label class="col-sm-3 control-label">Gender</label>
<div class="col-sm-3" >
<input type="radio" name="gender" value="male" <?php echo ($row->gender=='male')?"checked":""; ?> >&nbsp;&nbsp;Male&nbsp;&nbsp;
<input type="radio" name="gender" value="female" <?php echo ($row->gender=='female')?"checked":""; ?>>&nbsp;&nbsp;Female&nbsp;&nbsp;
<input type="radio" name="gender" value="others"  <?php echo ($row->gender=='others')?"checked":""; ?>>&nbsp;&nbsp;others<br>
</div>
</div>

<div class="form-group"> 
<label class="col-sm-3 control-label">Country</label>
<div class="col-sm-3" >
<select name="country" id="industries_id" data-placeholder="Choose One"  class="width100p" aria-required="true" required>
<option value="">Choose One</option>
<?php	
$result_country = $this->help_model->get_country_list();	
foreach ($result_country as $row_country){
?>            
<option value="<?php echo $row_country->id; ?>" <?php echo ($row_country->id==$row->country) ? "selected":""; ?>><?php echo $row_country->country_name; ?></option>
<?php  } ?>

</select>
</div>
</div>

<div class="form-group"> 
<label class="col-sm-3 control-label">Address</label>
<div class="col-sm-6" >
<input type="text" class="form-control" name="address" id="address" value="<?php echo $row->address;?>">
</div>
</div>

<div class="form-group"> 
<label class="col-sm-3 control-label">Profession</label>
<div class="col-sm-3" >
<input type="text" class="form-control" name="profession" value="<?php echo $row->profession;?>" id="profession" >
</div>
</div>




<div class="form-group"> 
<label class="col-sm-3 control-label">Phone No.</label>
<div class="col-sm-3" >
<input type="text" class="form-control" name="phone_no" value="<?php echo $row->phone_no;?>" id="phone_no" >
</div>
</div>

<div class="form-group"> 
<label class="col-sm-3 control-label">Email</label>
<div class="col-sm-3" >
<input type="text" class="form-control" name="email" value="<?php echo $row->email;?>" id="email" >
</div>
</div>

<div class="form-group"> 
<label class="col-sm-3 control-label">Website</label>
<div class="col-sm-3" >
<input type="text" class="form-control" name="website" id="website" >
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">Sanyas Date</label>
<div class="col-sm-2">
<div class="input-group">
<input type="text" class="form-control" name="sanyas_date" value="<?php echo $row->sanyas_date;?>" id="datepicker_sd"   required="" >
<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
</div>
</div>




<div class="form-group"> 
<label class="col-sm-3 control-label">Remarks</label>
<div class="col-sm-6" >
<input type="text" class="form-control" name="remarks" value="<?php echo $row->remarks;?>" id="remarks" >
</div>
</div>



<div class="form-group">
 <label class="col-sm-3 control-label" >Save and return here</label>
<div class="col-sm-9">
<div class="ckbox ckbox-primary">
<input type="checkbox"  id="sr" name="again" value="1"  id="on_off_on"/>
<label for="sr">&nbsp;</label>
</div>
</div>
</div>

<div class="form-group">
<div class="col-sm-9">
<button type="submit" name="btn_save" class="btn btn-primary mr5">Submit</button>
&nbsp;&nbsp;&nbsp;<button type="button" value="Cancel" class="btn btn-dark" onclick="history.go(-1);" />Cancel</button>
</div>
</div>
</form>
</div>
<?=$footer?>