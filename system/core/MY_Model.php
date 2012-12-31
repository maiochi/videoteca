<?php
/**
 * Classe padrao do Modelo - teste alteração
 * @package Estrutura
 * @subpackage Model
 * @author Diego Maiochi <diego@maiochi.eti.br>
 * @since 29/12/2012
 */
abstract class MY_Model extends CI_Model {
    
    public $tabela = null;
    public $pk = Array();
    
   public function __construct() {
       $this->setTabela();
       $this->setPk(); 
       parent::__construct();
    }
    
    abstract public function setTabela();
    abstract public function setPk();

    /*
     * Método responsável por inserir os dados na tabela
     */
    public function insere($aDados) {
        if ($this->trataDados()) {
            return $this->db->insert($this->tabela,$aDados);
        } 
    }
    
    /*
     * Método responsável pela alteração do registro
     */
    public function altera() {
        if ($this->trataDados()) {
            $aWhere     = Array();
            // Vamos buscar todas as informações do formulario
            $aDadosForm = $this->input->post();       
            // Vamos percorrer o array de PK para adicionar as condições da nossa alteração
            foreach ($this->pk as $key => $sNomePk) {
                // Verifica se foi passada a pk
                if (isset($aDadosForm[$sNomePk])) {
                    $aWhere[$sNomePk] = $aDadosForm[$sNomePk];
                } else {
                    show_error('Não foi definido as PK\'s da tabela');
                    break;
                }
            }
            // Vamos tirar do nosso array o botao enviar
            unset($aDadosForm['enviar']);
            return $this->db->update($this->tabela, $aDadosForm,$aWhere);
        }
    }
    /**
     * Método padrão para exclusão
     * @param array $aPk - Valores da chave, deverão ser passados na ordem em que foi definida as PK 
     *                      no método setPk do modelo
     * @return object
     */
    public function exclui(Array $aPk) {
        if ($this->trataDados()) {
            $aWhere = array();
            foreach ($aPk as $key => $xValor) {
                $aWhere[$this->pk[$key]] = $xValor;
            }
            return $this->db->delete($this->tabela, $aWhere);
        }
    }
    
    public function trataDados() {
        if (!isset($this->tabela)) {
            show_error('Não foi setado uma tabela padrão para o model <b>'. get_called_class().'</b>');
        } else {
            return true;
        }
    }
}