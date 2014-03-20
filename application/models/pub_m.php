<?php
class Pub_m extends MY_Model {

    protected $_table_name = 'pub';
    public $rules = array(
        'name' => array(
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'trim|required|xss_clean'
        ),
        'password' => array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|required|xss_clean'
        ),
        'gender' => array(
            'field' => 'gender',
            'label' => 'Gender',
            'rules' => 'trim|required|xss_clean'
        ),
        'birthday' => array(
            'field' => 'birthday',
            'label' => 'Birthday',
            'rules' => 'trim|required|xss_clean'
        ),
        'area' => array(
            'field' => 'area',
            'label' => 'Area',
            'rules' => 'trim|required|xss_clean'
        ),

        'avatar' => array(
            'field' => 'avatar',
            'label' => 'Avatar',
            'rules' => 'trim|required|xss_clean'
        ),
        'love' => array(
            'field' => 'love',
            'label' => 'Love',
            'rules' => 'required|xss_clean'
        ),

        'about' => array(
            'field' => 'about',
            'label' => 'About',
            'rules' => 'trim|required|xss_clean'
        ),

    );

    function __construct() {
        parent::__construct();
    }
    //加密方法
    public function hash($string){
        return hash('sha512', $string . config_item('encryption_key'));
    }

}