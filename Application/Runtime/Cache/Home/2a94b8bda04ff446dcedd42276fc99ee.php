<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script src="/xlsfunction/Public/jquery-1.11.1.min.js"></script>
<script src="/xlsfunction/Public/bootstrap/js/bootstrap.min.js"></script>
<link href="/xlsfunction/Public/bootstrap/css/bootstrap.css" rel="stylesheet">

<script type="text/javascript" src="/xlsfunction/Public/plugins/DataTables/jquery.dataTables.js"></script>
<script type="text/javascript" src="/xlsfunction/Public/plugins/DataTables/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="/xlsfunction/Public/plugins/DataTables/dataTable.fixedColumns.js"></script>
<link rel="stylesheet" type="text/css" href="/xlsfunction/Public/plugins/DataTables/dataTables.bootstrap.css">
<link rel="stylesheet" type="text/css" href="/xlsfunction/Public/plugins/DataTables/bootstrap-responsiv.css">
<script type="text/javascript" src="/xlsfunction/Public/plugins/Validate/jquery.validationEngine-en.js"></script>
<script type="text/javascript" src="/xlsfunction/Public/plugins/Validate/jquery.validationEngine.js"></script>
<link rel="stylesheet" type="text/css" href="/xlsfunction/Public/plugins/Validate/validationEngine.jquery.css">

<link rel="stylesheet" type="text/css" href="/xlsfunction/Public/plugins/Select2/select2.css">
<link rel="stylesheet" type="text/css" href="/xlsfunction/Public/plugins/Select2/select2.bootstrap.css">
<script type="text/javascript" src="/xlsfunction/Public/plugins/Select2/select2.js"></script>
<style>
	.datatable {
		table-layout: fixed;
		word-break: break-all;
		font-size: 13px;
		
	}
	.datatable  th {
		text-align: center;
	}
	.datatable  td {
		text-align: center;
	}
	.dataTables_wrapper{
		margin-top:15px;
	}
	</style>
<script>
	$(function(){
		$(".datatable tbody").on("dblclick","tr",function() {
			$(this).children("td:last()").children("span:eq(0)").children("img").click();
		});
	})
</script>
		<title>批量修改</title>
	</head>
	<body>
		<div class="container-fluid">
			<form class="form-inline" enctype="multipart/form-data" method="post" action="/xlsfunction/index.php/Home/Index/editGmAndSkillRatio">
					<div class="form-group">
						<input type="file"  name="excel_file" class="btn btn-info" value="导入Excel文件" />
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary" value="批量修改总经理浮动比例，技术浮动比例" />
					</div>
				</form>
		</div>
		
		<div class="container-fluid" style="padding-top: 50px">
			<form class="form-inline" enctype="multipart/form-data" method="post" action="/xlsfunction/index.php/Home/Index/deleteContact">
					<div class="form-group">
						<input type="file"  name="excel_file" class="btn btn-info" value="导入Excel文件" />
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary" value="根据合同号批量删除合同" />
					</div>
				</form>
		</div>
		
		<div class="container-fluid" style="padding-top: 50px">
			<form class="form-inline" enctype="multipart/form-data" method="post" action="/xlsfunction/index.php/Home/Index/editDeliveryQuantity">
					<div class="form-group">
						<input type="file"  name="excel_file" class="btn btn-info" value="导入Excel文件" />
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary" value="更改发货数量金额" />
					</div>
				</form>
		</div>
		
		<div class="container-fluid" style="padding-top: 50px">
			<form class="form-inline" enctype="multipart/form-data" method="post" action="/xlsfunction/index.php/Home/Index/importContactMain">
					<div class="form-group">
						<input type="file"  name="excel_file" class="btn btn-info" value="导入Excel文件" />
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary" value="批量导入合同表头" />
					</div>
				</form>
		</div>
		
		<div class="container-fluid" style="padding-top: 50px">
			<form class="form-inline" enctype="multipart/form-data" method="post" action="/xlsfunction/index.php/Home/Index/importContactDetail">
					<div class="form-group">
						<input type="file"  name="excel_file" class="btn btn-info" value="导入Excel文件" />
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary" value="批量导入合同表体" />
					</div>
				</form>
		</div>
	</body>
</html>
<script>
	$(function() {
		
	}); 
</script>