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
	</head>
	<body>
		<div class="col-xs-12">
			<div class="row" style="margin-top: 25px;">
				<div class="col-md-12">
				<a>
				<li data-toggle="modal" data-target="#addNew" class="btn btn-info">
					添加城市
				</li></a>
				</div>
			</div>

			<table id="cityTable" class="datatable table table-striped table-bordered table-hover" style="center">
				<thead>
					<tr>
						<th>#</th>
						<th>City</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php if(is_array($all_city)): $i = 0; $__LIST__ = $all_city;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							<td><?php echo ($key+1); ?></td>
							<td id="<?php echo ($vo["id"]); ?>_city"><?php echo ($vo["city"]); ?></td>
							<td city_id="<?php echo ($vo["id"]); ?>"><span style="margin-left: 10px;margin-right: 10px;cursor: pointer;"> <img title="Edit"  alt="编辑" src="/test/Public/img/edit.png" data-toggle="modal" data-target="#edit"> </span><span style="margin-left: 10px;margin-right: 10px;cursor: pointer;"> <img title="Delete" alt="删除" src="/test/Public/img/delete.png"> </span></td>
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
					<form id="add_new_form"  class="form-horizontal" role="form" method="post" action="addCity">
						<div class="modal-body">
							<div class="form-group">
								<label class="col-sm-4 control-label">城市</label>
								<div class="col-sm-6">
									<input type="text" class="form-control validate[ajax[ajaxCityCall]]" id="add_new_city" name="add_new_city">
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
					<form id="edit_form" class="form-horizontal" role="form" action="editCity" method="post">
						<div class="modal-body">
							<div class="form-group">
								<label class="col-sm-4 control-label">城市</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="edit_city" id="edit_city">
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
	$("#cityTable").dataTable({});
	$("#add_new_form").validationEngine('attach');
	$("#edit_form").validationEngine('attach');
	$("#cityTable tbody").on("click","tr td span img:even",function() {
			var edit_id = $(this).parent().parent().attr('city_id');
			var edit_city = $("#"+edit_id+"_city").text();
			$("#edit_id").val(edit_id);
			$("#edit_city").val(edit_city);
		});
	$("#cityTable tbody").on("click","tr td span img:odd",function() {
			var temp = confirm("确认删除该条信息吗？");
			if(temp){
				var delete_id = $(this).parent().parent().attr('city_id');
				$.post("/test/index.php/Home/Index/deleteCity", {
					"delete_id" : delete_id,
				}, function(data) {
					window.location.href="/test/index.php/Home/Index/loadCityList";
				});
			}
		});
</script>