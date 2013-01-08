<?php
echo doctype('html5');
echo '<html><head>';
echo $this->javascript->external(base_url().'application/js/jquery-183.js');
echo '<link rel="stylesheet" type="text/css" href="'.  base_url().'application/css/estilo.css"/>';
echo '</head><body>';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
echo $js;
//echo '<a href="'. site_url('usuario/add').'">Adicionar</a><br />';
echo form_button(Array('id' => 'btnAdicionar',
                       'onClick' => 'abreJanelaAdicionar();'),
                'Adicionar');
echo $dados;
?>

<script>
    function excluir(iCodigo) {
        console.log(iCodigo);
    }
    
    function abreJanelaAdicionar() {
        console.log('oi');
        var oDiv = $(document.createElement('div'));
        oDiv.attr('id','area_form');
        oDiv.load("<?= site_url('usuario/add')?>");  
        $(document).append(oDiv);
    }
</script>
