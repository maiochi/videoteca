<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
    
	public function index()	{
            $aDados = Array('titulo' => 'Xilonfompila',
                            'qualquerCoisa' => 'rá');
            $this->load->view('login',$aDados);
	}
        
        public function info() {
            phpinfo();
        }
}