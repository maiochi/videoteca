<?php

/*
 * @todo no método de alteração implementar uma alternativa pra setar todas as colunas da PK 
 */
class MY_Model extends CI_Model {
    
    protected $tabela;
    
    public function __construct() {
        parent::__construct();
    }


    /*
     * Método responsável por inserir os dados na tabela
     */
    public function insere($aDados) {
        // Vamos verificar se foi setado o nome da tabela
        if (!isset($this->tabela)) {
            show_error('Não foi setado uma tabela padrão para o model <b>'. get_called_class().'</b>');
        } else {
            return $this->db->insert($this->tabela,$aDados);
        }
    }
    
    public function altera() {
        $aDadosForm = $this->input->post();       
        $this->db->where('usucodigo', $aDadosForm['usucodigo']);
        return $this->db->update('tbusuario', $aDadosForm);
    }
    
    public function exclui() {
        
    }
}