<style type="text/css">
    *{
        margin: 0px;
        padding: 0px;
    }
</style>
<?php echo $error;?>
<?php echo form_open_multipart('upload/do_upload');?>
<input type="file" name="userfile" size="10" />
<input type="submit" value="上传头像" />

</form>