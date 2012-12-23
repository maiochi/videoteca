<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Principal extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->auth->checkLogged($this->router->class,$this->router->method);
        //$this->load->view('principal');
    }
}