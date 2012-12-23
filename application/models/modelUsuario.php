<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class ModelUsuario extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function inserir($aDados) {
        return $this->db->insert('tbusuario',$aDados);
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
}