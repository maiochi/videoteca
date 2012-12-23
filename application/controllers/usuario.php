<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Usuario extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->consulta();
    }
    
    public function cadastrar() {
        // Vamos buscar os campos do formulario
        $aDados = Array('usulogin'    => $this->input->post('login'),
                        'usunome'     => $this->input->post('nome'),
                        'ususenha'    => md5($this->input->post('senha')),
                        'usumail'     => $this->input->post('email'),
                        'usulembrete' => $this->input->post('lembrete'));
        // Vamos carregar o modelo
        $this->load->model('ModelUsuario');
        if ($this->ModelUsuario->inserir($aDados)) {
            redirect(base_url().'index.php/usuario','refresh');
        } else {
            echo 'Ferrou';
        }
    }


    public function consulta() {
        $this->load->library('table');
        $this->load->model('ModelUsuario');
        // vamos buscar os dados do banco
        $oQuery = $this->ModelUsuario->listarUsuarios();
        
        foreach ($oQuery->result() as $oRes) {
            $aRetorno = Array($oRes->usucodigo,
                              $oRes->usulogin,
                              $oRes->usunome,
                              $oRes->usumail,
                              anchor('usuario/edit'.$oRes->usucodigo,'Alterar'));
            $this->table->add_row($aRetorno);
        }
        
        // vamos criar a tabela com as informações do banco
        $this->table->set_heading('Código','Login','Nome','E-Mail','Ações');
        $sTabela = $this->table->generate();
        // vamos chamar a view
        $this->load->view('ConsultaUsuario', Array('dados' => $sTabela));
    }
    
    public function add() {
        $this->load->view('ManutencaoUsuario');
    }
}
?>
