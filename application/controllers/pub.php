<?php
class Pub extends Pub_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index() {

        $rules = $this->pub_m->rules;
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == TRUE) {
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
            $data['password'] = $this->pub_m->hash($data['password']);
            $this->pub_m->save($data, $id);
            redirect('');
        }

		$this->load->view('pub', $this->data);
    }


}