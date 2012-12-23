<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
echo form_open(base_url().'index.php/usuario/cadastrar');
echo form_fieldset('Usuários');
echo '<br />';
echo form_label('Nome','nome');
echo form_input('nome', set_value('nome'));
echo '<br />';
echo form_label('Login', 'login');
echo form_input('login', set_value('login'));
echo '<br />';
echo form_label('Senha','senha');
echo form_password('senha');
echo '<br />';
echo form_label('E-Mail', 'email');
echo form_input('email', set_value('email'));
echo '<br />';
echo form_label('Lembrete','lembrete');
echo form_input('lembrete', set_value('lembrete'));
echo '<br />';
echo form_submit('enviar','Enviar');
echo form_reset('limpar','Limpar');

echo form_fieldset_close();
echo form_close();
?>
