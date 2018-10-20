<?=$header?>
<script type="text/javascript">
function teamStatus(id)
	{ // alert(id);
	 if(document.getElementById("status"+id).checked==true)
	  {
		 var act = "1"; 
		 //alert(act); 

	  }
	  else
	  {
		var act = "0"; 
		//alert(act); 
	  }
   $.ajax({
   type: "POST",
   url: "<?php echo base_url('myadmin/team/edit_sub_team_status')?>",
   data: "id="+id+"&act="+act,
   success: function(msg){
   //alert( msg );
   }
 });
	}
</script>
<div class="pageheader">
<div class="media">
<div class="pageicon pull-left">
<i class="fa fa-list"></i>
</div>
<div class="media-body">
<ul class="breadcrumb">
<li><a href=""><i class="glyphicon glyphicon-home"></i></a></li>
<li><a href="">Sannyasi</a></li>
</ul>
<h4>Sannyasi List</h4>
</div>
</div><!-- media -->
</div>
<div class="contentpanel"> 
<div class="row" style="margin-bottom: 20px;">
<div class="col-sm-12">
<form class="form-inline"  action="<?php echo base_url('myadmin/sanyasi/page')?>" method="get" accept-charset="utf-8">
<div class="form-group">
<input type="text" class="form-control" name="keyword"  placeholder="search keyword by  sannyas name, legal name, address, profession">
</div><!-- form-group -->
<button type="submit" class="btn btn-primary mr5">Submit</button>
</form>
</div>
</div>
<?php if($tot_record!=0){?>
<table class="table table-striped table-bordered responsive" id="">
<thead>
<tr>
<th >Sn</th>
<th >Legal Name</th>
<th >Sannyas Name</th>
<th >Phone No.</th>
<th >Country</th>
<th >Actions</th>
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
<td><?php $row_country = $this->help_model->get_country_sel($row->country); echo  $row_country->country_name ; ?></td>
<td colspan="2">
<a href="<?php echo base_url('myadmin/sanyasi/edit_sanyasi')."/".$row->id;?>" class="btn btn-white btn-sm tooltips" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
<?php if($this->session->userdata('admin_id')==1){ ?>
<a href="<?php echo base_url('myadmin/sanyasi/delete_sanyasi')."/".$row->id;?>" onclick="return confirm('Are you sure you want to delete this row!!');" class="btn btn-white btn-sm tooltips" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o"></i></a>
<?php } elseif($row->added_by==$this->session->userdata('admin_id')){?>
<a href="<?php echo base_url('myadmin/sanyasi/delete_sanyasi')."/".$row->id;?>" onclick="return confirm('Are you sure you want to delete this row!!');" class="btn btn-white btn-sm tooltips" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o"></i></a>
<?php } ?>
</td>
</tr>
<?php  
$sn++;           
$count1++;
} }  else {
?>  
<tr><td colspan="6">Record Not Found</td></tr>
<?php }  ?>                             
</tbody>
</table>
<div style="clear:both"></div>
<div class="well">Total Record: <?=$tot_record?></div>
<?php echo $links; ?>
<?php } else {?>
Record Not Found
<?php } ?>
</div>
<?=$footer?>