<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Trata os valores para serem exibidos no campo
 */
/*function trataValores($sNomeCampo,$aValores = Array(),$bRecuperaValor = true) {
    //$this->_ci_cached_vars
    $a = CI_Loader::getValor('usunome');
    if (isset($aValores['update']) && $aValores['update']) {
        return $aValores['info'][0]->$sNomeCampo;
    } else if ($bRecuperaValor) {
        return set_value($sNomeCampo);
    }
    return null;
}*/
define('CAMINHO_IMAGENS', base_url().'application/img/' );
define('CAMINHO_CSS', base_url().'application/css/' );
define('ENTER','
');

if (!function_exists('isAjax')) {
    function isAjax(){
        return (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
    }
}

if (!function_exists('getLoadJs')) {
    function getLoadJs() {
        return Array('jquery-183','functions');
    }
}

if (!function_exists('getLoadCss')) {
    function getLoadCss() {
        return Array('estilo','principal');
    }
}

if (!function_exists('load_css')) {
	function load_css($data) {
		$CI =& get_instance();
                if(!$CI->config->item('css_path')){
                    $CI->config->set_item('css_path',CAMINHO_CSS);
                }
		$csspath = $CI->config->item('css_path');

		if (!is_array($data)){
                    if (strpos($data, '.css') == 0) {
                        $data = $data.'.css';
                    }
                    
                    return link_tag($csspath . $data, 'stylesheet', 'text/css');
                }
			
		else {
			$return = '';
			foreach ($data as $item) {
				if (!is_array($item)) {
					$return .= link_tag($csspath . $item, 'stylesheet', 'text/css');
				} else {
					$return .= link_tag($csspath . $item[0], 'stylesheet', 'text/css', '', $item[1]);
				}
			}
		}
		return $return;
	}
}
?>
