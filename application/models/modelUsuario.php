<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once BASEPATH.'/core/MY_Model.php';
class ModelUsuario extends MY_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    function setTabela() {
        $this->tabela = 'tbusuario';
    }
    
    function setPk() {
        $this->pk = Array('usucodigo');
    }
    
    /*
     * Função responsável por recuperar os registros do banco
     */
    public function listarUsuarios() {
        $sSql = 'select usucodigo,
                        usulogin,
                        usunome,
                        usumail,
                        usulembrete
                   from tbusuario
               order by usucodigo';
        return $this->db->query($sSql);
    }
    
    public function getUser($iId) {
        return $this->db->get_where('tbusuario', Array('usucodigo' => $iId))->result();
    }
}