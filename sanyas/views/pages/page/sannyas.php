<?php
$keyword = isset($_GET['keyword'])? $_GET['keyword']: '';
$country = isset($_GET['country'])? $_GET['country']: '';
$st_date= isset($_GET['start_date'])? $_GET['start_date']: '';
$ed_date = isset($_GET['end_date'])? $_GET['end_date']: '';
?>
<div class="items-sorting">
<div class="row clearfix">
<div class="col-md-10 col-sm-10 col-xs-12 contact-form">
<form   action="<?php echo base_url('page')?>" method="get" accept-charset="utf-8">
<div class="col-md-5 col-sm-5 col-xs-12">
<div class="form-group">
<input type="text"  name="keyword" value="<?=$keyword?>"   placeholder="search keyword by  sannyas name, legal name, address, profession" > 
</div>
</div>
<div class="col-md-2 col-sm-2 col-xs-12">
<div class="form-group">
<select name="country" id="industries_id" data-placeholder="Choose One"   aria-required="true" >
<option value="" >Choose One</option>
<?php
$result_country = $this->help_model->get_country_list();	
foreach ($result_country as $row_country){
?>            
<option value="<?php echo $row_country->id; ?>" <?php echo ($row_country->id==$country) ? "selected":""; ?>><?php echo $row_country->country_name; ?></option>
<?php  } ?>
</select>
</div>
</div>
<div class="col-md-2 col-sm-2 col-xs-12">
<div class="form-group">
<input type="text"  name="start_date" value="<?=$st_date?>" id="date_timepicker_start" >
</div>
</div>
<div class="col-md-2 col-sm-2 col-xs-12">
<div class="form-group">
<input type="text"  name="end_date" value="<?=$ed_date?>"  id="date_timepicker_end">
</div>
</div>
<div class="col-md-1 col-sm-1 col-xs-12">
<button type="submit" class="btn btn-default" style="margin-top: 16px;">Submit</button>
</div>
</form>
</div>
<div class="results-column pull-left col-md-2 col-sm-2 col-xs-12">

<h4><a href="<?php echo base_url('export_excel').'?'.$_SERVER['QUERY_STRING'];?>" title="Export To Excel"><i class="fa fa-file-excel-o"></i></a> Total Result: <?=$tot_record?></h4>
</div>
</div>
</div>






<?php if($tot_record!=0){?>
<table class="table table-striped table-bordered responsive" id="">
<thead>
<tr>
<th >Sn</th>
<th >Legal Name</th>
<th >Sannyas Name</th>
<th >Phone No</th>
<th >Country</th>
<th >Sannyas Date</th>
<th >Action</th>
</tr>
</thead>
<tbody>
<?php 
$sn=1;
$count1 = $count + 1;
if($sanyasi!=''){
foreach($sanyasi as $row){
?>
<tr >
<td><?php echo $count1;?></td>
<td><?php echo $row->legal_name; ?></td>
<td> <?php echo $row->sanyas_name; ?></td>
<td> <?php echo $row->phone_no; ?></td>
<td><?php $row_country = $this->help_model->get_country_sel($row->country); echo  $row_country->country_name ;; ?></td>
<td><?php echo $row->sanyas_date; ?></td>
<td>
<ul class="social-icon-three">
<li><a href="<?php echo base_url('single')."/".$row->id;?>" title="View"><i class="fa fa-eye"></i></a></li>
<li><a href="<?php echo base_url('export_word')."/".$row->id;?>" title="Export to word"><i class="fa fa-file-text"></i></a></li>
</ul>

</td>
</tr>
<?php  
$sn++;           
$count1++;
} }  else {
?>  
<tr><td colspan="5">Record Not Found</td></tr>
<?php }  ?>                             
</tbody>
</table>
<div style="clear:both"></div>
<div class="styled-pagination centered">
<?php echo $links; ?>
</div>
<?php } else {?>
Record Not Found
<?php } ?>
