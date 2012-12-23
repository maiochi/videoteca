<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Biblioteca de autenticação do usuário
 * @package Estrutura
 * @author Diego Maiochi
 * @since 10/11/2012
 */
class Auth {
    const STATUS_PUBLICO = 0;
    const STATUS_PRIVADO = 1;
    
    /* @return CI_Controller */
    private $ci;
    function __construct() {
        $this->ci = &get_instance();        
    }
    
    public function checkLogged($sClasse, $sMetodo) {
        // Vamos verificar se já foi criado a instancia do Code Igniter
        if (!isset($this->ci)) {
            $this->ci = &get_instance();
        }
        
        $aCondicao = Array('metclasse' => $sClasse,
                           'metmetodo' => $sMetodo);
        // Vamos buscar no banco a classe e o método que está sendo acessado nesse momento
        $this->ci->db->where($aCondicao);
        $oQuery = $this->ci->db->get('tbmetodos');
        $oRes = $oQuery->result();
        // se não existir esse método, vamos salvar no banco
        if (count($oRes) == 0) {
            // Vamos preparar o array com as informações a serem adicionadas
            $aDados = Array('metclasse'  => $sClasse,
                            'metmetodo'  => $sMetodo,
                            'metapelido' => $sClasse.'/'.$sMetodo,
                            'metprivado' => self::STATUS_PRIVADO);
            // insere as informações no banco
            $this->ci->db->insert('tbmetodos',$aDados);
            // redireciona para a classe e método acessado
            redirect(base_url().$sClasse.'/'.$sMetodo, 'refresh');
        // se essa classe e método já tiverem cadastrados no banco
        } else {
            // vamos verificar se a classe e metodo acessado é publico ou privado
            if ($oRes[0]->metprivado == self::STATUS_PUBLICO) {
                return true;
            } else {
                // Vamos buscar os dados da sessão do usuário
                $sNome      = $this->ci->session->userdata('nome');
                $sLogado    = $this->ci->session->userdata('logado');
                $sData      = $this->ci->session->userdata('data');
                $sMail      = $this->ci->session->userdata('email');
                $iIdUsuario = $this->ci->session->userdata('idUsuario');
                $iIdMetodos = $oRes[0]->metid;
                if ($sNome && $sLogado && $iIdUsuario) {
                    $aInfo = Array('metid' => $iIdMetodos,
                                   'usucodigo' => $iIdUsuario);
                    $this->ci->db->where($aInfo);
                    $oQueryPermissao = $this->ci->db->get('tbpermissao');
                    $oResultPermissao = $oQueryPermissao->result();
                    // usuário sem permissao
                    if (count($oResultPermissao) == 0) {
                        redirect(base_url().'sempremissao','refresh');
                    } else {
                        return true;
                    }
                } else {
                    redirect(base_url().'index.php/login/index/'.$sClasse.'/'.$sMetodo,'refresh');
                }
            }
        }      
    }
}
?>