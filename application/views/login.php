<?
echo form_open('login/doLogin');
?>
<label for="login">Login</label>
<input type="text" name="login" value="<?= set_value('login') ?>" />
<br />
<label for="senha">Senha</label>
<input type="password" name="senha" />
<br />
<?
echo form_submit('ok','Enviar');
echo form_close();
?>