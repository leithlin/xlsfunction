<?php if (!defined('THINK_PATH')) exit();?><html>
	<head>
		<script src="/test/Public/jquery-1.11.1.min.js"></script>
<script src="/test/Public/bootstrap/js/bootstrap.min.js"></script>
<link href="/test/Public/bootstrap/css/bootstrap.css" rel="stylesheet">

<script type="text/javascript" src="/test/Public/plugins/DataTables/jquery.dataTables.js"></script>
<script type="text/javascript" src="/test/Public/plugins/DataTables/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="/test/Public/plugins/DataTables/dataTable.fixedColumns.js"></script>
<link rel="stylesheet" type="text/css" href="/test/Public/plugins/DataTables/dataTables.bootstrap.css">
<link rel="stylesheet" type="text/css" href="/test/Public/plugins/DataTables/bootstrap-responsiv.css">
<script type="text/javascript" src="/test/Public/plugins/Validate/jquery.validationEngine-en.js"></script>
<script type="text/javascript" src="/test/Public/plugins/Validate/jquery.validationEngine.js"></script>
<link rel="stylesheet" type="text/css" href="/test/Public/plugins/Validate/validationEngine.jquery.css">

<link rel="stylesheet" type="text/css" href="/test/Public/plugins/Select2/select2.css">
<link rel="stylesheet" type="text/css" href="/test/Public/plugins/Select2/select2.bootstrap.css">
<script type="text/javascript" src="/test/Public/plugins/Select2/select2.js"></script>
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
		<style>
			body {
				font-family: 'Microsoft YaHei',YaHei, SimHei,sans-serif,serif;
			}
			.dataTables_wrapper {
			  margin-top: 0px;
			}
		</style>
	</head>
	<body>
		<div class="col-md-12">
			<h3 style="text-align: center;">通讯录
				<a>
					<li data-toggle="modal" data-target="#addNew" class="btn btn-info">
						<i class="glyphicon glyphicon-plus"></i>添加
					</li>
				</a></h3>	
		</div>
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-12">
				</div>
			</div>

			<table id="ContactListTable" class="datatable table table-striped table-bordered table-hover" style="center">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>First Name</th>
						<th>Street</th>
						<th>Zip-Code</th>
						<th>City</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php if(is_array($all_contact_list)): $i = 0; $__LIST__ = $all_contact_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							<td><?php echo ($key+1); ?></td>
							<td id="<?php echo ($vo["id"]); ?>_name"><?php echo ($vo["name"]); ?></td>
							<td id="<?php echo ($vo["id"]); ?>_first_name"><?php echo ($vo["first_name"]); ?></td>
							<td id="<?php echo ($vo["id"]); ?>_street"><?php echo ($vo["street"]); ?></td>
							<td id="<?php echo ($vo["id"]); ?>_zip_code"><?php echo ($vo["zip_code"]); ?></td>
							<td id="<?php echo ($vo["id"]); ?>_city"><?php echo ($vo["city"]); ?></td>
							<td contact_list_id="<?php echo ($vo["id"]); ?>">
								<span style="margin-left: 10px;margin-right: 10px;cursor: pointer;">
								 <img title="编辑"  alt="编辑" src="/test/Public/img/edit.png" data-toggle="modal" data-target="#edit"> 
								 </span>
								 <span style="margin-left: 10px;margin-right: 10px;cursor: pointer;"> 
								 	<img title="删除" alt="删除" src="/test/Public/img/delete.png"> 
								 </span>
							</td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
			</table>
		</div>
		<div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">
							<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
						</button>
						<h4 class="modal-title" id="myModalLabel">新增</h4>
					</div>
					<form id="add_new_form"  class="form-horizontal" role="form" method="post" action="addContactItem">
						<div class="modal-body">
							<div class="form-group">
								<label class="col-sm-4 control-label">Name</label>
								<div class="col-sm-6">
									<input type="text" class="form-control validate[required]" name="add_new_name">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">First Name</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="add_new_first_name">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Street</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="add_new_street">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Zip-Code</label>
								<div class="col-sm-6">
									<input type="text" class="form-control validate[required,custom[zipcode]]" name="add_new_zip_code">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">City</label>
								<div class="col-sm-6">
									<select class="form-control" id="add_new_city_list" name="add_new_city">
										<option></option>
											<?php if(is_array($all_city)): $i = 0; $__LIST__ = $all_city;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["city"]); ?>"><?php echo ($vo["city"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
										
									</select>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<input type="button" class="btn btn-default" data-dismiss="modal" value="取消"/>
							<input type="submit" class="btn btn-primary" value="确定"/>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">
							<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
						</button>
						<h4 class="modal-title" id="myModalLabel">修改</h4>
					</div>
					<form id="edit_form" class="form-horizontal" role="form" action="editContactItem" method="post">
						<div class="modal-body">
							<div class="form-group">
								<label class="col-sm-4 control-label">Nmae</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="edit_name" id="edit_name">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">First Name</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="edit_first_name" id="edit_first_name">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Street</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="edit_street" id="edit_street">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Zip-Code</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="edit_zip_code" id="edit_zip_code">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">City</label>
								<div class="col-sm-6">
									<select class="form-control" id="edit_city_list" name="edit_city">
										<option></option>
											<?php if(is_array($all_city)): $i = 0; $__LIST__ = $all_city;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option  value="<?php echo ($vo["city"]); ?>"><?php echo ($vo["city"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
										
									</select>
								</div>
							</div>
							<input type="text" id="edit_id" name="edit_id" class="hidden" />
						</div>
						<div class="modal-footer">
							<input type="button" class="btn btn-default" data-dismiss="modal" value="取消"/>
							<input type="submit" class="btn btn-primary" value="确定"/>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
<script>
	$("#ContactListTable").dataTable({
		
	});
	//$("div.toolbar").html('<b>Custom tool bar! Text/images etc.</b>');
	
	$("#add_new_form").validationEngine('attach');
	$("#edit_form").validationEngine('attach');
	$("#add_new_city_list").select2({
			placeholder : "请选择城市"
		});
	$("#edit_city_list").select2({
			placeholder : "请选择城市"
		});
	$("#ContactListTable tbody").on("click", "tr td span img:even", function() {
		var edit_id = $(this).parent().parent().attr('contact_list_id');
		var edit_name = $("#" + edit_id + "_name").text();
		var edit_first_name = $("#" + edit_id + "_first_name").text();
		var edit_street = $("#" + edit_id + "_street").text();
		var edit_zip_code = $("#" + edit_id + "_zip_code").text();
		var edit_city = $("#" + edit_id + "_city").text();
		$("#edit_id").val(edit_id);
		$("#edit_name").val(edit_name);
		$("#edit_first_name").val(edit_first_name);
		$("#edit_street").val(edit_street);
		$("#edit_zip_code").val(edit_zip_code);
		// $("#edit_city_list").find("option[text='"+edit_city+"']").attr("selected",true);
		//$("#edit_city_list").find("option[text='上海']").attr("selected",true);
		$("#edit_city_list").val(edit_city).trigger("change");
	});
	$("#ContactListTable tbody").on("click", "tr td span img:odd", function() {
		var temp = confirm("确认删除该条信息吗？");
		if (temp) {
			var delete_id = $(this).parent().parent().attr('contact_list_id');
			$.post("/test/index.php/Home/Index/deleteContactListItem", {
				"delete_id" : delete_id,
			}, function(data) {
				window.location.href = "/test/index.php/Home/Index/loadContactList";
			});
		}
	}); 
</script>