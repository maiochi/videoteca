<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class ModelUsuario extends MY_Model{
    
    public function __construct() {
        $this->tabela = 'tbusuario';
        parent::__construct();
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