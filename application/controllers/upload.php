<?php

class Upload extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'array'));
    }

    function index()
    {
        $this->load->view('upload', array('error' => ' ' ));
    }

    function do_upload()
    {

        $config['upload_path'] = $uploaddir = './uploads/' . $this->config->item('addtime');
        if(!file_exists($uploaddir)){
            mkdir($uploaddir,0777);
        }

        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1000';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';
        // 自动随机加密文件
        $config['encrypt_name'] =TRUE;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload())
        {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('upload', $error);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $this->load->view('upload_success', $data);
        }
    }
}
?>