<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="<?php echo base_url(); ?>admin/images/favicon.ico">
<title>Osho Tapoban: A Seekers home in the hills : Admin</title>

<link href="<?php echo base_url(); ?>admin/css/style.default.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>admin/css/style.datatables.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>admin/css/dataTables.responsive.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>admin/css/select2.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>admin/css/nepaliDatePicker.css" rel="stylesheet" >
<link rel="stylesheet" href="<?php echo base_url(); ?>admin/css/uploadfile.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin/css/jquery.datetimepicker.css"/>
<link href="<?php echo base_url(); ?>admin/css/prettyPhoto.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>admin/css/spectrum.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>admin/css/perfect-scrollbar.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>admin/css/colorpicker.css" rel="stylesheet" />

<style type="text/css">

.custom-date-style {
	background-color: red !important;
}

</style>
<script src="<?php echo base_url(); ?>admin/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url(); ?>/admin/js/jquery.uploadfile.js"></script>
<script src="<?php echo base_url(); ?>admin/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>admin/js/bootstrap-wizard.min.js"></script>
<script src="<?php echo base_url(); ?>admin/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>/admin/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
selector: "textarea",
theme: "modern",
fontsize_formats: "8pt 9pt 10pt 11pt 12pt 14pt 16pt 18pt 20pt 22pt 24pt 26pt 28pt 30pt 35pt 40pt 45pt 50pt 55pt",
plugins: [
"advlist autolink lists link image charmap print preview hr anchor pagebreak",
"searchreplace wordcount visualblocks visualchars code fullscreen",
"insertdatetime media nonbreaking save table contextmenu directionality",
"emoticons template paste textcolor  responsivefilemanager colorpicker textpattern "
],
toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
toolbar2: "print preview media | responsivefilemanager | forecolor backcolor emoticons | fontselect | fontsizeselect | table",
image_advtab: true,
relative_urls: false, 
table_class_list: [
    {title: 'None', value: ''},
    {title: 'table', value: 'table'},
    {title: 'table-bordered', value: 'table-bordered'},
	{title: 'table-striped', value: 'table-striped'},
	{title: 'table-striped-bordered', value: 'table table-striped table-bordered tabel-hover'},
  ],  

style_formats: [
	{title: 'Title border',selector: 'h1,h2,h3,h4,h5,h6', classes: 'yellow_title title'},
 	{title: 'Custom Bullet Arrow-1',selector: 'ul', classes: 'bullet'},
	{title: 'Custom Bullet Arrow-2',selector: 'ul', classes: 'bullet1'},
	{title: 'Custom Bullet Decimal',selector: 'ul', classes: 'decimal'},
	{title: 'Custom Bullet Dot Small',selector: 'ul', classes: 'dote_list yell_dote_list mt_5'},
	{title: 'button style-1',selector: 'a', classes: 'btn btn-primary'},
	{title: 'button style-2',selector: 'a', classes: 'fw-btn fw-btn-sm fw-btn-2'},
	{title: 'button style-3',selector: 'a', classes: 'fw-btn fw-btn-sm fw-btn-3'},
	{title: 'button style-4',selector: 'a', classes: 'fw-btn fw-btn-sm fw-btn-4'},
	{title: 'button style-5',selector: 'a', classes: 'fw-btn fw-btn-sm fw-btn-5'},
	{title: 'Image Popup',selector: 'a', classes: 'image-popup-vertical-fit'},
	{title: 'Text White Color',selector: 'h2', classes: 'text-color-white'}
],

style_formats_merge: true,
 filemanager_title:"Responsive Filemanager",
    external_filemanager_path:"<?php echo base_url(); ?>admin/js/filemanager/",
    external_plugins: { "filemanager" : "<?php echo base_url(); ?>admin/js/filemanager/plugin.min.js"},

});


</script>

<script src="<?php echo base_url(); ?>admin/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>admin/js/dataTables.bootstrap.js"></script>
<script src="<?php echo base_url(); ?>admin/js/dataTables.responsive.js"></script>
<script src="<?php echo base_url(); ?>admin/js/jquery.prettyPhoto.js"></script>
<script src="<?php echo base_url(); ?>admin/js/custom.js"></script>
<script src="<?php echo base_url(); ?>admin/js/select2.min.js"></script>
<script src="<?php echo base_url(); ?>admin/js/perfect-scrollbar.js"></script>
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
</head>

<body>

<header>
<div class="headerwrapper">
<div class="header-left">
<a href="<?php echo base_url("/myadmin");?>" class="logo">
<img src="<?php echo base_url(); ?>admin/images/logo-primary1.png" alt="" /> 
</a>
<div class="pull-right">
<a href="" class="menu-collapse">
<i class="fa fa-bars"></i>
</a>
</div>
</div><!-- header-left -->

<div class="header-right">
<?php $this->load->view('admin/include/header_pannel'); ?>
<!-- pull-right -->
</div><!-- header-right -->

</div><!-- headerwrapper -->
</header>

<section>
<div class="mainwrapper">
<div class="leftpanel" id="perfect-scrollbar">
<?php $this->load->view('admin/include/left_pannel');?>
</div><!-- leftpanel -->
<div class="mainpanel">
<?php if($this->session->flashdata('message')):?>
<div class="alert alert-info">
<button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
<?php echo $this->session->flashdata('message');?>
</div>
<?php  endif?>  