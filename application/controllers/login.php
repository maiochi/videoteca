<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    protected $classe;
    protected $metodo;
    protected $aParam = array();
    
    function __construct(){
        parent::__construct();
        //$this->load->helper('logs');
        //$this->load->helper('cookie');
        $this->load->helper('url');
    }

    function index(){
        $this->aParam = func_get_args();
        //redirect(base_url().'index.php/login', 'refresh');
        $this->load->helper('form');
        $this->load->view('login');
    }

    function void(){
        $sEndereco = implode('/', $this->aParam);
        if (isset($sEndereco) && isset($this->metodo)) {
            redirect($sEndereco);
        } else {
            $this->load->view('principal');
        }
        
        /*$data['js_to_load'] = null;       
        $this->load->view('libs/html-header',$data);
        $this->load->view('libs/menu');
        $this->load->view('libs/html-footer');*/
    }   
    function sempermissao(){
        echo "<html>";
        echo "<title>Acesso Negado</title>";
        echo "<body bgcolor='#EEEEEE'>";
        echo "    <div style='padding:20px;background-color:#FFCC00;'>";
        echo "<h2>Você não tem permissão para acessar esta funcionalidade.</h2>";
        echo "</div>";
        echo "</body>";
        echo "</html>";
        exit();
    }

    function login(){
        $this->load->view('login',$data);
    }

    function doLogin(){
        $sLogin = $this->input->post('login');
        $sSenha = md5($this->input->post('senha'));

        if($sLogin=="" || $this->input->post('senha')==""){
            //redirect(base_url().'login', 'refresh');
            
            exit();
        }

//        if(isset($_POST['lembrar'])){           
        if(false){           
            setcookie("usuario", $usuario);
            setcookie("cnpj", $cnpj);
            setcookie("lembrar", "checked");
        }

        $sSql = "select tbusuario.usucodigo,
                        tbusuario.usulogin,
                        tbusuario.usunome,
                        tbusuario.ususenha,
                        tbusuario.usumail
                   from tbusuario
                  where tbusuario.usulogin = '".$sLogin."'
                    and tbusuario.ususenha = '".$sSenha."'";

        $oQuery = $this->db->query($sSql);
        $oRes = $oQuery->result();
        
        if(count($oRes) < 1){           
            redirect(base_url().'index.php/login', 'refresh');
            exit();
        } else {
            $aDadosLogin = array('id_usuario' => $oRes[0]->usucodigo,
                                 'usuario'    => $oRes[0]->usulogin,
                                 'nome'       => $oRes[0]->usunome,
                                 'email'      => $oRes[0]->usumail,
                                 'logged_in'  => TRUE,
                                 'data'       => date("d/m/Y h:i:s"));

            $aDados['accip'] = getenv("REMOTE_ADDR");
            $aDados['acclogin'] = $oRes[0]->usulogin;
            if ($this->db->insert('tbacesso',$aDados)) {
                $this->session->set_userdata($aDadosLogin);
                redirect(base_url().'index.php/login/void', 'refresh');
            } else {
                throw new Exception('Não foi possível gravar as informações.');
            }            
        }
    }

    function logout() {
        $this->session->sess_destroy();
        $this->login();
    }   
    
    function info() {
        //phpinfo();
        echo md5('o lindo voo da andorinha nunca sera afetado pelos dentes do crocodilo');
    }
  
}