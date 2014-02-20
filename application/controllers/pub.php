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
            $data['password'] = $this->pub_m->hash($data['password']);
            $this->pub_m->save($data, $id);
            redirect('');
        }

		$this->load->view('pub', $this->data);
    }


}