<?php
$htmlData = '';
if (!empty($_POST['about'])) {
    if (get_magic_quotes_gpc()) {
        $htmlData = stripslashes($_POST['about']);
    } else {
        $htmlData = $_POST['about'];
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
	<title><?php echo $site_name;?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo $site_url;?>css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo $site_url;?>css/bootstrap-datetimepicker.css">
	<link rel="stylesheet" href="<?php echo $site_url;?>css/my.css">
    <link rel="stylesheet" href="<?php echo $site_url;?>editor/themes/default/default.css" />
    <link rel="stylesheet" href="<?php echo $site_url;?>editor/plugins/code/prettify.css" />
    <script charset="utf-8" src="<?php echo $site_url;?>editor/kindeditor.js"></script>
    <script charset="utf-8" src="<?php echo $site_url;?>editor/lang/zh_CN.js"></script>
    <script charset="utf-8" src="<?php echo $site_url;?>editor/plugins/code/prettify.js"></script>
    <script>
        KindEditor.ready(function(K) {
            var editor1 = K.create('textarea[name="about"]', {
                cssPath : '<?php echo $site_url;?>editor/plugins/code/prettify.css',
                uploadJson : '<?php echo $site_url;?>editor/php/upload_json.php',
                fileManagerJson : '<?php echo $site_url;?>editor/php/file_manager_json.php',
                allowFileManager : true,
                afterCreate : function() {
                    var self = this;
                    K.ctrl(document, 13, function() {
                        self.sync();
                        K('form[name=example]')[0].submit();
                    });
                    K.ctrl(self.edit.doc, 13, function() {
                        self.sync();
                        K('form[name=example]')[0].submit();
                    });
                }
            });
            prettyPrint();
        });
    </script>
    <script>
        KindEditor.ready(function(K) {
            var editor = K.editor({
                allowFileManager : true
            });
            K('#image3').click(function() {
                editor.loadPlugin('image', function() {
                    editor.plugin.imageDialog({
                        showRemote : false,
                        imageUrl : K('#url3').val(),
                        clickFn : function(url, title, width, height, border, align) {
                            K('#url3').val(url);
                            editor.hideDialog();
                        }
                    });
                });
            });
        });
    </script>
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
            'id' => 'subform',
		);
		echo form_open('', $subdata);
		?>
		<table class="table table-hover table-bordered">
			<tr class="field">
				<td class="text-right" width="120"><label for="name">用户名：</label></td>
				<td><input type="text" name="name" id="name" value=""  minlength="2" required /></td>
			</tr>
			<tr>
				<td class="text-right"><label for="password">密码：</label></td>
				<td><input id="password" type="password" name="password" value="" minlength="6" required="" /></td>
			</tr>
			<tr>
				<td class="text-right"><label for="confirm_password">重复密码：</label></td>
				<td><input type="password" id="confirm_password" name="confirm_password" value="" minlength="6" required /></td>
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
                            <input class="form-control" name='birthday' size="16" type="text" value="" readonly required>
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
                    <select name="area" class="valid" required>
                        <option value="">请选择</option>
                        <option value="1">河南省</option>
                        <option value="2">北京市</option>
                        <option value="3">广东省</option>
                        <option value="4">上海市</option>
                    </select>
				</td>
			</tr>
			<tr>
				<td class="text-right">头像：</td>
				<td>
                    <input type="text" id="url3" name="avatar" value=""  readonly="readonly" minlength="2" required />
                    <input type="button" id="image3" value="选择图片" />
                </td>
			</tr>
			<tr>
				<td class="text-right">爱好：</td>
				<td>
                    <p>
                        <label for="fly">飞行<input type="checkbox" id="fly" name="love[]" value="1" required minlength="2"  /></label>&nbsp;&nbsp;
                        <label for="game">游戏<input type="checkbox" id="game" name="love[]" value="2"  /></label>&nbsp;&nbsp;
                        <label for="shooter">射击<input type="checkbox" id="shooter" name="love[]" value="3"  /></label>&nbsp;&nbsp;
                        <label for="code">编程<input type="checkbox" id="code" name="love[]" value="4"  /></label>&nbsp;&nbsp;
                    </p>
                    <label for="love[]" class="error"></label>
				</td>
			</tr>
			<tr>
				<td class="text-right">个人简介：</td>
				<td>
                    <textarea name="about" style="width:700px;height:200px;visibility:hidden;" required>
                        <?php echo htmlspecialchars($htmlData); ?></textarea>
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
<!--表单验证-->
<script type="text/javascript" src="<?php echo $site_url;?>js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo $site_url;?>js/additional-methods.js"></script>
<script>
    $("#subform").validate({
        rules: {
            confirm_password:{
                equalTo: "#password"
            }
        },
        messages: {
            name: "请输入用户名",
            password: {
                required: "请输入密码",
                minlength: "最少6个字符"
            },
            confirm_password: {
                required: "请再次输入密码",
                minlength: "最少6个字符",
                equalTo: "两次输入的密码不一样"
            }
        }
    });
</script>
<!--日期选择-->
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