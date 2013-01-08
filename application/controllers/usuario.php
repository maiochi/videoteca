<?php

/**
 * @property CI_Javascript $javascript
 * @property CI_Jquery $jquery
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Usuario extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('javascript');
    }
    
    function trataDadosForm($aDados) {
	foreach($aDados as $aInfo) {
	 	$aRetorno[$aInfo['name']] = htmlspecialchars($aInfo['value']);
	 }
	
	return $aRetorno;
    }

    public function index() {
        $this->consulta();
    }
    
    public function cadastrar() {
        $aDados = $this->trataDadosForm($this->input->post('dadosForm'));
        $this->db->select_max('usucodigo','maximo');
        $aRes = $this->db->get('tbusuario')->result();
        $aDados['usucodigo'] = ++$aRes[0]->maximo;
        // Vamos buscar os campos do formulario
        /*$aDados = Array('usulogin'    => $this->input->post('usulogin'),
                        'usunome'     => $this->input->post('usunome'),
                        'ususenha'    => md5($this->input->post('ususenha')),
                        'usumail'     => $this->input->post('usumail'),
                        'usulembrete' => $this->input->post('usulembrete'));*/
        // Vamos carregar o modelo
        $this->load->model('ModelUsuario');
        if ($this->ModelUsuario->insere($aDados)) {
            //redirect(base_url().'index.php/usuario','refresh');
            echo $this->javascript->generate_json(Array('status' => true,
                                                        'msg' => 'Dados gravados com sucesso'));
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
                              anchor('usuario/edit/'.$oRes->usucodigo,'Alterar'),
                              form_button(Array('id'      => 'btnExcluir',
                                                'onClick' => 'excluir('.$oRes->usucodigo.');'), 'Excluir'));
            $this->table->add_row($aRetorno);
        }
        
        $this->javascript->compile('js_consulta');
        
        // vamos criar a tabela com as informações do banco
        $this->table->set_heading('Código','Login','Nome','E-Mail','Ações');
        $sTabela = $this->table->generate();
        // vamos chamar a view
        $this->load->view('ConsultaUsuario', Array('dados' => $sTabela,'js' => $this->load->get_var('js_consulta')));
    }
    
    public function add() {
        $this->criaTela();
    }
    
    public function criaTela($sMetodo = null,$aParam = array()) {
        $aParam['acao']   = 'cadastrar';
        switch ($sMetodo) {
            case 'altera':
                $aParam['update'] = true;
                $aParam['acao']   = 'altera';
            break;
            case 'visualizar':
                $aParam['visualizacao'] = true;
            break;
        }
        
        $this->load->view('ManutencaoUsuario',$aParam);
    }
    
    public function edit() {
        $iId = $this->uri->segment(3);
        $this->load->model('ModelUsuario');
        $aDados = Array('info' => $this->ModelUsuario->getUser($iId));
        $this->criaTela('altera', $aDados);
    }
    
    public function altera() {
        $this->load->model('ModelUsuario');
        if ($this->ModelUsuario->altera()) {
            redirect(base_url().'index.php/usuario','refresh');
        }
    }
    
    public function exclui() {
        $iId = $this->uri->segment(3);
        $this->load->model('ModelUsuario');
        if ($this->ModelUsuario->exclui(Array($iId))) {
            redirect(base_url().'index.php/usuario','refresh');
        }
    }
}
?>