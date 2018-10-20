<?=$header?>
<script type="text/javascript">
function userStatus(id)
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
url: "<?php echo base_url('myadmin/users/edit_user_status')?>",
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
<i class="fa fa-user"></i>
</div>
<div class="media-body">
<ul class="breadcrumb">
<li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
<li><a href="#">Admin User</a></li>
</ul>
<h4>User List</h4>
</div>
</div><!-- media -->
</div>
<div class="contentpanel">
<div class="row">
<div class="col-sm-4">
<div class="btn-list">
<a href="<?php echo base_url("/myadmin/users/add_users");?>" class="btn  btn-dark">Add New Users</a>
</div>
<!-- list-group -->
                                
</div>
</div>



<div class="table-responsive">
<table id="basicTable" class="table table-bordered ">
<thead>
<tr>
<th >Sn</th>
<th >Admin Type</th>
<th >Full Name</th>
<th >Last Login</th>
<th >No of Time Logn</th>
<th >Ip Address</th>
<th >Status</th>
<th >Actions</th>
</tr>
</thead>
<tbody>
<?php $sn=1;?>
<?php foreach($users as $row):?>
<tr >
<td><?php echo $sn;?></td>
<td class="media-list msg-list">
<?php if($row->feature_image!=''){?>
<a class="pull-left"  href="<?php echo base_url(); ?>images/users/<?php echo $row->feature_image; ?>" data-rel="prettyPhoto">
<img class="media-object img-circle img-online" src="<?php echo base_url(); ?>admin/js/timthumb/timthumb.php?src=<?php echo base_url(); ?>images/users/<?php echo $row->feature_image; ?>&h=50&w=50&q=95" >
</a>
<?php } else { ?>
<a class="pull-left"  >
<img class="media-object img-circle img-online" src="<?php echo base_url(); ?>admin/js/timthumb/timthumb.php?src=<?php echo base_url(); ?>admin/images/photos/user1.png&h=50&w=50&q=95" alt="...">
</a>
<?php }  ?>
<div class="media-body" style="padding:10px;">
<?php if($row->admin_type==1){ ?>Super Admin<?php } elseif($row->admin_type==2) {?>Manager Admin<?php } elseif($row->admin_type==3) {?>Normal Admin<?php } else {?><?php }?>
</div>
</td>
<td>
<?php echo $row->admin_full_name; ?>
</td>
<td><?php echo $row->login_time; ?></td>
<td><?php echo $row->no_of_time_login; ?></td>
<td><?php echo $row->remote_ip_address; ?></td>

<td align="center" >
<?php if($sn!=1){?>
<input type="checkbox" name="status<?php echo $row->id; ?>" id="status<?php echo $row->id; ?>" <?php echo ($row->status==1) ?"checked":""; ?> onclick="userStatus(<?php echo $row->id; ?>);"  />
<?php } ?>
</td>

<td>
<?php if($sn!=1){?>
<a href="<?php echo base_url('myadmin/users/change_password')."/".$row->id;?>" class="btn btn-white btn-sm tooltips" data-toggle="tooltip" title="Change Password"><i class="fa fa-wrench"></i></a>
<a href="<?php echo base_url('myadmin/users/edit_users')."/".$row->id;?>" class="btn btn-white btn-sm tooltips" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
<a href="<?php echo base_url('myadmin/users/delete_users')."/".$row->id;?>" onclick="return confirm('Are you sure you want to delete this row!!');" class="btn btn-white btn-sm tooltips" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o"></i></a>
<?php } ?>
</td>
</tr>
<?php $sn++; endforeach; ?>                                       
</tbody>
</table>
</div>
</div>
<?=$footer?>