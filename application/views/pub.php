<!DOCTYPE html>
<html>
<head>
	<title><?php echo $site_name;?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo $site_url;?>css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo $site_url;?>css/bootstrap-datetimepicker.css">
	<link rel="stylesheet" href="<?php echo $site_url;?>css/my.css">

	<!--[if lt IE 9]>
	<script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.min.js"></script>
	<script src="http://cdn.bootcss.com/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
</head>
<body>
<p></p>
<div class="container">
	<div class="row">
		<?php
		$subdata = array(
			'class' => 'form_horizontal',
			'role' => 'form',
		);
		echo form_open('', $subdata);
		?>
		<table class="table table-hover table-bordered">
			<tr>
				<td class="text-right" width="120">用户名：</td>
				<td><?php echo form_input('name','','class="form-control"');?></td>
			</tr>
			<tr>
				<td class="text-right">密码：</td>
				<td><?php echo form_password('password','','class="form-control"'); ?></td>
			</tr>
			<tr>
				<td class="text-right">性别：</td>
				<td><label>男<?php echo form_radio('gender','boy', TRUE);?></label>&nbsp;&nbsp;
					<label>女<?php echo form_radio('gender','girl'); ?></label></td>
			</tr>
			<tr>
				<td class="text-right">生日：</td>
				<td>
                    <div class="form-group">
                        <div class="input-group date form_datetime col-md-7"
                             data-date=""
                             data-date-format="yyyy MM dd - HH:ii:ss p"
                             data-link-field="dtp_input1">
                            <input class="form-control" size="16" type="text" value="" readonly>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                        </div>
                        <input type="hidden" id="dtp_input1" value="" />
                    </div>

                </td>
			</tr>
			<tr>
				<td class="text-right">地区：</td>
				<td>
					<?php
					$area_array = array(
						'0' => '请选择',
						'1' => '河南省',
						'2' => '北京市',
						'3' => '广东省',
						'4' => '上海市',
					);
					echo form_dropdown('area', $area_array);?>
				</td>
			</tr>
			<tr>
				<td class="text-right">头像：</td>
				<td><?php echo form_upload('avatar');?></td>
			</tr>
			<tr>
				<td class="text-right">爱好：</td>
				<td>
					<label>飞行<?php echo form_checkbox('love', 'fly');?></label>&nbsp;&nbsp;
					<label>游戏<?php echo form_checkbox('love', 'game');?></label>&nbsp;&nbsp;
					<label>射击<?php echo form_checkbox('love', 'shoot');?></label>&nbsp;&nbsp;
					<label>编程<?php echo form_checkbox('love', 'code');?></label>&nbsp;&nbsp;
				</td>
			</tr>
			<tr>
				<td class="text-right">个人简介：</td>
				<td>
					<?php
					$data = array(
						'name' => 'about',
						'rows' => '10',
						'cols' => '70',
					);
					echo form_textarea($data);
					?>
				</td>
			</tr>
			<tr>
				<td class="text-right"></td>
				<td>
					<?php echo form_submit('submit','提交');?>&nbsp;&nbsp;
					<?php echo form_reset('reset', '重置');?>
				</td>
			</tr>

		</table>
		<?php echo form_close(); ?>
	</div>
</div>


<script type="text/javascript" src="<?php echo $site_url;?>js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="<?php echo $site_url;?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo $site_url;?>js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="<?php echo $site_url;?>js/bootstrap-datetimepicker.zh-CN.js"></script>
<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        language:  'zh-CN',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
    });
</script>
</body>
</html>