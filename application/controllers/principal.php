<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Principal extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        //$this->auth->checkLogged($this->router->class,$this->router->method);
        //$this->load->view('principal');
        
        $aIncludeHeader = Array('js' => $this->__carregaJs(),
                                'css' => $this->__carregaCss());
        $this->load->view('template/header',$aIncludeHeader);
        $this->load->view('template/container');
        //$this->load->view('ManutencaoUsuario');
        $this->load->view('template/footer');
    }
    
    private function __carregaJs() {
        $sRetorno = '';
        foreach (getLoadJs() as $sJs) {
            $sRetorno .= $this->javascript->external(base_url().'application/js/'.$sJs.'.js');
        }
        return $sRetorno;
    }
    
    private function __carregaCss() {
        $sRetorno = '';
        foreach (getLoadCss() as $sCss) {
            $sRetorno .= load_css($sCss).ENTER;
        }
        return $sRetorno;
    }
}