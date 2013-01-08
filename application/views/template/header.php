<?= doctype('html5'); ?>
<html>
<head>
    <title>VIDEOTECA</title>
    <?= meta('charset', 'UTF-8')?>
    <?= meta('author', 'Diego Maiochi')?>
    <?= $js ?>
    <?= $css ?>
    <script>
        //*******************  MENU HEADER  *******************//
	$(document).ready(function(){
		$('#login-trigger').click(function(){
                    $(this).next('#login-content').slideToggle();
                    $(this).toggleClass('active');					
		});
                
            $('ul#menu > li').hover(function(){
                $('.drop', this).delay(20).stop().slideToggle();
            });
	});
    </script>
        
</head>
<body>
<section id="main-content">
 <header>
     <div class="centered">
        <h1><a href="#" class="logo">Página Principal</a></h1>
        
            <ul id="menu">
                <li><a href="#">Home</a></li>
                <li><a href="#">Usuários</a>
                    <ul class="drop">
                        <li><a href="#" onclick="abreTela(null,'')">Listar</a></li>
                        <li><a href="#">Cadastrar</a></li>
                    </ul>
                </li>
                <li><a href="#">Sistema</a></li>
            </ul>​
                    
      <nav>
        <ul>
            <li id="login">
                <a id="login-trigger" href="#">
 					<span id="user-panel-check"></span>
  					<span id="user-panel-title">Welcome, <strong>John Doe</strong></span>
                    <span id="user-panel"></span>
                </a>
                <div id="login-content">
                  <ul>
                      <li><a href="#"><span>Settings</span> <img src="<?= CAMINHO_IMAGENS ?>setting.png" alt=""></a></li>
                      <li><a href="#"><span>Help</span> <img src="<?= CAMINHO_IMAGENS ?>help.png" alt=""></a></li>
                      <li><a href="./index.html"><span>Log Out</span> <img src="<?= CAMINHO_IMAGENS ?>logout.png" alt=""></a></li>
                  </ul>
               </div>                     
            </li> 
        </ul>
      </nav>     
       </div>
 </header>