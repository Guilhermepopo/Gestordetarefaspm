<?php 
define('BASE_URL', __DIR__ . '/');
@$base = $_GET['page'];
$url = explode('/', $base);
// Declara os controllers
require_once('Controller/Usuarios.php');
require_once('Controller/Atividades.php');

// Página de login
if($url[0] == 'login' || $url[0] == ''){
	// Autenticação
	Usuarios::ValidandoUser($url[0]);

// Verifica se ainda está logado e atualiza as sessions
}elseif (Usuarios::VerificaSession()){
	// Dentro da aplicação
	if($url[0] == 'app'){
		if($url[1] == 'inicio'){
			// Página inicial
			Usuarios::Home();
		}elseif($url[1] == 'logout'){
			// Saindo do gestor
			Usuarios::Logout();
		}elseif($url[1] == 'atividades'){
			if($_SESSION['gestor'] == 1){ 
				// Todas funcionalidades para gestores
				if($url[2] == 'listar'){	
					// Listar atividades
					Atividades::Listando();
				}elseif($url[2] == 'adicionar'){
					// Adicionando as atividades
					Atividades::Adicionar();
				}elseif($url[2] == 'editar'){
					// Editar a atividades
					Atividades::Editar($url[3]);
				}elseif($url[2] == 'detalhes'){
					// Detalhes da atividades
					Atividades::Detalhes($url[3]);
				}elseif($url[2] == 'remover'){
					// Detalhes da atividades
					Atividades::Remover($url[3]);
				}elseif($url[2] == 'andamento'){
					// Alterar status da atividades
					Atividades::Andamento($url[3]);
				}elseif($url[2] == 'finalizar'){
					// Alterar status da atividades
					Atividades::Finalizado($url[3]);
				}
			}else{
				// Todas funcionalidades de usuarios comuns
				if($url[2] == 'listar'){	
					// Listar atividades
					Atividades::Listando();
				}elseif($url[2] == 'andamento'){
					// Alterar status da atividades
					Atividades::Andamento($url[3]);
				}elseif($url[2] == 'finalizar'){
					// Alterar status da atividades
					Atividades::Finalizado($url[3]);
				}elseif($url[2] == 'detalhes'){
					// Detalhes da atividades
					Atividades::Detalhes($url[3]);
				}
			}
		}elseif($url[1] == 'usuarios'){
			if($_SESSION['gestor'] == 1){
				// Todas funcionalidades para gestores
				if($url[2] == 'listar'){
					// Listar atividades
					Usuarios::Listando();
				}elseif($url[2] == 'adicionar'){
					// Adicionando as atividades
					Usuarios::Adicionar();
				}elseif($url[2] == 'detalhes'){
					// Adicionando as atividades
					Usuarios::Detalhes($url[3]);
				}elseif($url[2] == 'editar'){
					// Adicionando as atividades
					Usuarios::Editar($url[3]);
				}elseif($url[2] == 'remover'){
					// Adicionando as atividades
					Usuarios::Remover($url[3]);
				}
			}else{
				Usuarios::Error403();
			}
		}else{
			Usuarios::Error404();
		}
	}else{
		Usuarios::Error404();
	}
		
}else{
	Usuarios::Error404();
}
?>			


