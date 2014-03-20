<?php
class Pub extends Pub_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index() {
        //导入验证规则
        $rules = $this->pub_m->rules;
        //使用导入的验证规则
        $this->form_validation->set_rules($rules);
        //通过验证后执行数据传输
        if ($this->form_validation->run() == TRUE) {
            //取得数据
            $data = $this->pub_m->array_from_post(array(
                'name',
                'password',
                'gender',
                'birthday',
                'area',
                'avatar',
                'about'
            ));
            //love取出来的是一个数组，在这里单独读取出来，并以，为分隔符存储。
            $data['love'] = implode(',', $this->input->post('love'));
            //取得加密后的密码
            $data['password'] = $this->pub_m->hash($data['password']);
            //执行保存操作
            $this->pub_m->save($data, $id);
            //重定向，刷新当前页
            redirect('');
        }
        //载入视图
		$this->load->view('pub', $this->data);
    }


}