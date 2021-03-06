<?php

//chamando o caminho do banco de dados
    require_once('modulo.php');
//conexao com o banco de dados
    Conexao_Database();
//a session é responsavel por dar o ok na pagina home e encaminha a 
//pagina cms
$trava_conteudo = "";
$trava_fale_conosco = "";
$trava_produto = "";
$trava_usuarios = "";

// inicianda a variavel de sessao
session_start();



if($_SESSION['idNivelUsuario'] != 0){
    
    $sql = "SELECT * FROM tbl_nivel WHERE idNivel = ".$_SESSION['idNivelUsuario'];
    $select = mysql_query($sql);
    $rsN = mysql_fetch_array($select);
    $conteudo = $rsN['conteudo'];
    $f_c = $rsN['faleConosco'];
    $produto = $rsN['produtos'];
    $usuario = $rsN['usuario'];
    
    if($conteudo == 1)
    {
        $trava_conteudo = " href='cms.php' ";
    }else{
        $trava_conteudo = "";
    }
    
    if($f_c == 1)
    {
        $trava_fale_conosco = " href='faleConoscoAdm.php' ";
    }else{
        $trava_fale_conosco = "";
    }
    
    if($produto == 1)
    {
        $trava_produto = " href='produtos_CMS.php' ";
    }else{
        $trava_produto = "";
    }
    
    if($usuario == 1)
    {
        $trava_usuarios = " href='usuarios.php' ";
    }else{
        $trava_usuarios = "";
    }
}


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>CMS</title>
        <link rel="stylesheet" type="text/css" href="Css/style_cms.css"/>
    </head>
    <body>
        <!-- Pricipal responsavel por conter o cabeçalho, menu, corpo e roda pé -->
        <div id="principal">
            <!-- CABEÇALHO-->
            <header>
				<div id="titulo">
					<strong>CMS</strong> - Sistema de Gerenciamento do Site
				</div>
				
				<div id="logo">
					<img id="imagem-logo" alt="log" src="Imagens/logo.png"/>
				</div>
            </header>
            <!-- MENU -->
            <nav>
				<div id="menu">
					<div id="cont-imagens">
						<div class="caixinhas">
							<img class="imagem-caxinha" alt="log" src="Imagens/Apple%20Script.png"/>
						</div>

						<div class="caixinhas">
							<img class="imagem-caxinha" alt="log" src="Imagens/faleConosco.ico"/>
						</div>

						<div class="caixinhas">
							<img class="imagem-caxinha" alt="log" src="Imagens/iconPizza.png"/>
						</div>

						<div class="caixinhas">
							<img class="imagem-caxinha" alt="log" src="Imagens/users.png"/>
						</div>
					</div>
					
					<div id="cont-rotulos">
                        <a <?php echo($trava_conteudo) ?>>
						<div class="rotulos">
							Adm. Conteúdo
						</div>
                        </a>
						
                        <a <?php echo($trava_fale_conosco) ?>>
						<div class="rotulos">
							Adm. Fale Conosco
						</div>
                        </a>
                        
                        <a <?php echo($trava_produto) ?>>
						<div class="rotulos">
							Adm. Produtos
						</div>
                        </a>
						
						<a <?php echo($trava_usuarios) ?>> <div class="rotulos">
							Adm. Usuarios
                        </div>
						</a>
					</div>
				</div>
				
				<div id="user">
					<div id="bemVindo">
						Bem vindo, <?php echo($_SESSION['nomeUsuario']);?>
					</div>
					
					<a href="../home.php">
					<div id="logout">
						Logout
					</div>
					</a>	
				
				</div>
            </nav>
            <!-- CORPO -->
            <div id="main">
				<div class="conteiner">
					<div class="cont-conteiner">
						<div class="cont-conteiner-imagens">
							<img class="imagens2" alt="log" src="Imagens/curiosidades.png"/>
						</div>
						
                        <a href="curiosidades_CMS.php">
						<div class="cont-conteiner-rotulos">
							Curiosidades
						</div>
                        </a>
                        
					</div>
					
					<div class="cont-conteiner">
						<div class="cont-conteiner-imagens">
							<img class="imagens2" alt="log" src="Imagens/home.png"/>
						</div>
						
                        <a href="home_CMS.php">
						<div class="cont-conteiner-rotulos">
							Home
						</div>
                        </a>
                        
					</div>
					
					<div class="cont-conteiner">
						<div class="cont-conteiner-imagens">
							<img class="imagens2" alt="log" src="Imagens/fork2.png"/>
						</div>
						
                        <a href="nossosAmbientes_CMS.php">
						<div class="cont-conteiner-rotulos">
							Nossos Ambientes
						</div>
                        </a>
					</div>
					
					<div class="cont-conteiner">
						<div class="cont-conteiner-imagens">
							<img class="imagens2" alt="log" src="Imagens/promocoes.png"/>
						</div>
						
                        <a href="promocoes_CMS.php">
						<div class="cont-conteiner-rotulos">
							Promoçoes
						</div>
                        </a>
                        
					</div>
				</div>
					
				<div class="conteiner">
					<div class="cont-conteiner">
						<div class="cont-conteiner-imagens">
							<img class="imagens2" alt="log" src="Imagens/sobrePizzaria.png"/>
						</div>
						
                        <a href="sobrePizzaria_CMS.php">
						<div class="cont-conteiner-rotulos">
							Sobre a Pizzaria
						</div>
                        </a>
                        
						<div class="cont-conteiner-imagens">
							<img class="imagens2" alt="log" src="Imagens/pizzaMes.png"/>
						</div>
						
                        <a href="pizzaMes_CMS.php">
						<div class="cont-conteiner-rotulos">
							A pizza do mês
						</div>
                        </a>
					</div>
				</div>
					
				<div class="conteiner">
				</div>
            </div>
            <!-- RODA PÉ-->
            <footer>
				Desenvolvido por Bruna Sousa
            </footer>
        </div>
    </body>
</html>