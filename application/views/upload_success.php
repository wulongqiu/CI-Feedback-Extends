<ul>
    <?php foreach ($upload_data as $item => $value):?>
        <li><?php echo $item;?>: <?php echo $value;?></li>
    <?php endforeach; ?>
</ul>
<p>图片的原始地址：
    <?php echo $this->config->item('attachments_path') .
        $this->config->item('addtime'). '/' .
        element('file_name', $upload_data);?>
</p>
<p><?php echo anchor('upload', 'Upload Another File!'); ?></p>