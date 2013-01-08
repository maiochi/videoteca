<?php
echo doctype('html5');
echo '<html><head>';
echo $this->javascript->external(base_url().'application/js/jquery-183.js');

$this->javascript->blur('#usunome','mensagem();');
//$this->javascript->ready('teste()');
$this->javascript->submit('#formUsuario','processaDados(e,"formUsuario");');
$this->javascript->compile('usuario');
echo $this->load->get_var('usuario');

echo '</head><body><div id="msg"></div>';
echo form_open('',Array('id' => 'formUsuario'));

echo form_fieldset('Usuários');
echo '<br />';
echo form_label('Código','usucodigo');
echo form_input('usucodigo',$this->trataValorInput('usucodigo'),'readonly');
echo '<br />';
echo form_label('Nome','usunome');
echo form_input('usunome',$this->trataValorInput('usunome'));
echo '<br />';
echo form_label('Login', 'usulogin');
echo form_input('usulogin', $this->trataValorInput('usulogin'));
echo '<br />';
echo form_label('Senha','ususenha');
echo form_password('ususenha');
echo '<br />';
echo form_label('E-Mail', 'usumail');
echo form_input('usumail', $this->trataValorInput('usumail'));
echo '<br />';
echo form_label('Lembrete','usulembrete');
echo form_input('usulembrete', $this->trataValorInput('usulembrete'));
echo '<br />';
echo form_submit('enviar','Enviar');
echo form_reset('limpar','Limpar');

echo form_fieldset_close();
echo form_close();

?>
<script>
    function teste() {
        alert('teste');
    }
    
    function mensagem() {
        $("#msg").append('Hello World');
    }
    
    function processaDados(e,nomeForm,metodoGravacao) {
        var oForm = $("#"+nomeForm);
        var oDadosFormulario = oForm.serializeArray();
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "<?php echo site_url('usuario'); ?>/metodoGravacao",
            data: {dadosForm : oDadosFormulario},
            dataType : 'json',
            complete : function(oRes) {
                    $("#msg").html('Enviando dados. Aguarde...');
                },
                success: function(oRes){
                    console.log('success',oRes);
                    if (oRes.status) {
                        setTimeout(function() {
                            $("#msg").html(oRes.msg);
                        },500);
                    }
                    },
                error : function(oRes) {
                    console.warn(oRes.responseText);
                }
        });
        return false;
    }
    
    
</script>
</body></html>