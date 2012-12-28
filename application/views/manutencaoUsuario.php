<?php
echo form_open(base_url().'index.php/usuario/'.$acao);
echo form_fieldset('Usuários');
echo '<br />';
echo form_label('Código','codigo');
echo form_input('usucodigo',$this->trataValorInput('usucodigo'),'readonly');
echo '<br />';
echo form_label('Nome','nome');
echo form_input('usunome',$this->trataValorInput('usunome'));
echo '<br />';
echo form_label('Login', 'login');
echo form_input('usulogin', $this->trataValorInput('usulogin'));
echo '<br />';
echo form_label('Senha','senha');
echo form_password('ususenha');
echo '<br />';
echo form_label('E-Mail', 'email');
echo form_input('usumail', $this->trataValorInput('usumail'));
echo '<br />';
echo form_label('Lembrete','lembrete');
echo form_input('usulembrete', $this->trataValorInput('usulembrete'));
echo '<br />';
echo form_submit('enviar','Enviar');
echo form_reset('limpar','Limpar');

echo form_fieldset_close();
echo form_close();
?>
