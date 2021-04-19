<?php
require_once BASE_URL.'Model/Usuario.php'; 
/**
* Classe Usuarios
*/
class Usuarios {
	
	// Valida entrada
	static public function ValidandoUser($url) {

		if ((@$_POST['usuario']) and (@$_POST['senha'])){
			
			$_POST['usuario'] = preg_replace('/[^[:alnum:]\.@$]/', '', $_POST['usuario']);

			$login = $_POST['usuario'];
			$senha = md5($_POST['senha']);
			$objeto = new Usuario;
			$dados = $objeto->ValidaUsuario($login, $senha);
			
			if ($dados==true){
				if(isset($dados['setor'])){
					session_start();
					$_SESSION['login'] = true;	
					$_SESSION['id'] = $dados['idusuario'];
					header("Location: /Gestordetarefaspm/app/inicio/");
				}else{
					session_start();
					session_destroy();
					session_unset();
					header ('Location: /Gestordetarefaspm/login');
				}
			}else{
				$repost = "Usuário ou senha não confere.";
			}
		}elseif(!empty($_POST['usuario'])){
			$repost = "Usuário não preenchido.";

		}elseif(!empty($_POST['password'])){
			$repost = "Senha não preenchida.";
		}

		require_once (BASE_URL.'View/view/login.php');	
	}

	// Página Principal
	static public function Home(){
		require_once(BASE_URL.'View/view/home.php');
	}


	// Funções de verificação de session
	static public function VerificaSession(){;
		session_start();
		if (isset($_SESSION['login'])) {
			$id = $_SESSION['id'];
			$objeto = new Usuario;
			$dados = $objeto->Home($id);
			$_SESSION['nome'] = $dados['nome'];
			$_SESSION['setor'] = $dados['setor'];
			$_SESSION['gestor'] = $dados['gestor'];
			return true;	
		}else{
			header ('Location: /Gestordetarefaspm/login');
		}
	}

	// Funções de sair
	static public function Logout(){
		session_start();
		session_destroy();
		session_unset();
		header ('Location: /Gestordetarefaspm/login');
	}

	// Página de endereço não encontrado
	static public function Error404(){
		require_once(BASE_URL.'View/view/404.php');
	}

	// Página de não permissão
	static public function Error403(){
		require_once(BASE_URL.'View/view/403.php');
	}

	// Listando os usuário
	static public function Listando(){
		$objeto = new Usuario;
		$dados = $objeto->Listar();
		require_once(BASE_URL.'View/view/usuarios/listar.php');
	}

	// Adicionando usuario
	static public function Adicionar(){
		$usuario = new Usuario;

		if(@$_POST['nome']){
			// Tratamento de strings
			$arr = ['nome','setor','gestor','login','senha'];
			foreach($arr as $a){
				if (!empty(@$_POST[$a]) and is_string(@$_POST[$a])){
					$$a = @$_POST[$a];
				}elseif(@$_POST['gestor'] == 0){
					$$a = @$_POST[$a];
				}else{
					return false;
				}
			}

			// Inserindo no banco
			if($banco = $usuario->Adicionar($nome, $setor, $gestor, $login, $senha) == true){
				return true;
			}else{
				return false;
			}
		}
	}

	// Editar usuario
	static public function Editar($id){
		$usuario = new Usuario;

		if(@$_POST['nome']){
			// Tratamento de strings
			if ($_POST['senha']) {
				$arr = ['nome','setor','gestor','login','senha'];
				foreach($arr as $a){
					if (!empty(@$_POST[$a]) and is_string(@$_POST[$a])){
						$$a = @$_POST[$a];
					}elseif(@$_POST['gestor'] == 0){
						$$a = @$_POST[$a];
					}else{
						return false;
					}
					print_r(@$_POST[$a]);
				}

				// Inserindo no banco
				if($banco = $usuario->EditarNovaSenha($nome, $setor, $gestor, $login, $senha, $id) == true){
					return true;
				}else{
					return false;
				}
			}else{
				$arr = ['nome','setor','gestor','login'];
				foreach($arr as $a){
					if (!empty(@$_POST[$a]) and is_string(@$_POST[$a])){
						$$a = @$_POST[$a];
					}elseif(@$_POST['gestor'] == 0){
						$$a = @$_POST[$a];
					}else{
						return false;
					}
				}

				// Inserindo no banco
				if($banco = $usuario->EditarSemSenha($nome, $setor, $gestor, $login, $id) == true){
					return true;
				}else{
					return false;
				}
			}
			
		}
	}

	// Remover usuario
	static public function Remover($id){
		$usuario = new Usuario;
		$dados = $usuario->Remover($id);
		return true;
	}

	// Detalhes do usuario
	static public function Detalhes($id){
		$usuario = new Usuario;
		$dados = $usuario->Detalhes($id);
		echo json_encode($dados);
	}
}	
?>
