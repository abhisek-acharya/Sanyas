<?=$header?>
<script type="text/javascript">
function setPreference(menu_id,admin_id,rowmp_id)
{  //alert(rowmp_id);
$.ajax({
type: "POST",
url: "<?php echo base_url('myadmin/admin_menu/admin_menu_set_preference')?>",
data: "menu_id="+menu_id+"&admin_id="+admin_id+"&rowmp_id="+rowmp_id,
success: function(msg){
//alert( msg );
parent.location.reload(1);
}
});	

}

function setForUser(ids)
{    var myUrl  =   "<?php echo base_url('myadmin/admin_menu/admin_menu_setting')?>";
myUrl  = myUrl+"/"+ids;
window.location.href = myUrl;
}
</script>
<div class="pageheader">
<div class="media">
<div class="pageicon pull-left">
<i class="fa fa-th-list"></i>
</div>
<div class="media-body">
<ul class="breadcrumb">
<li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
<li><a href="#">Admin Menu</a></li>
</ul>
<h4>Admin Menu Setting</h4>
</div>
</div><!-- media -->
</div>
<div class="contentpanel">
<div class="well mt10">
<div class="row">
<div class="col-md-3 form-group">
<label class="control-label">Select User</label>
<select name="user_id" id="industries_id" onchange="setForUser(this.value);" data-placeholder="Choose One" class="width300">
<option value="">Choose One</option>
<?php foreach($users as $row):?>
<?php $admin_id = $this->uri->segment(4);?>
<option value="<?php echo $row->id; ?>" <?php echo ($row->id==$admin_id) ? "selected":""; ?> ><?php echo $row->admin_full_name; ?></option>
<?php $sn++; endforeach; ?> 
</select>
</div>
</div>
</div><!-- panel-heading -->




<div class="table-responsive">
<table class="table table-bordered " id="basicTable">
<thead>
<tr>
<th >Sn</th>
<th >Menu Title</th>
<th >Status</th>
</tr>
</thead>
<tbody>
<?php $sn=1;?>
<?php foreach($menu as $row):?>
<tr >
<td><?php echo $sn;?></td>
<td><?php echo $row->title; ?></td>
<td align="center" >
<?php $data['row']= $this->admin_menu_model->get_admin_menu_permission_status_sel($admin_id, $row->id);?>
<input type="checkbox" name="status" id="status<?php echo $row->id; ?>" value="1" <?php echo (isset($data['row']->status)?$data['row']->status:""==1) ?"checked":""; ?> onclick="setPreference('<?php echo $row->id; ?>','<?php echo $admin_id; ?>','<?php echo isset($data['row']->id)?$data['row']->id:""; ?>')"  />
</td>

</tr>
<?php $sn++; endforeach; ?>                                       
</tbody>
</table>
</div>
</div>               
<?=$footer?>