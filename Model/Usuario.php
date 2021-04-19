<?php	
require_once BASE_URL.'Model/conexao.php';

class Usuario extends Conexao {

	public $banco;

	function __construct(){
		#
	}
	// Verificando a existencia do usuário
	static function ValidaUsuario($login, $senha){

		try {
			// Validando Usuario
			$banco = Conexao::getInstance();
			$statement = $banco->prepare("SELECT * FROM usuario WHERE login = ? AND senha = ?");
			$statement->bindParam(1, $login, PDO::PARAM_STR);
			$statement->bindParam(2, $senha, PDO::PARAM_STR);
			$dados = $statement->execute();
			$dados = $statement->fetch();
			return $dados;
			
		} catch (Exception $e) {
			return false;
		}
	}

	// Retornando dados para home
	static function Home($id){

        try{
            $banco = Conexao::getInstance();
            $statement = $banco->prepare("SELECT nome, setor, gestor FROM usuario WHERE idusuario = ?");
            $statement->bindParam(1, $id, PDO::PARAM_STR);
            $dados = $statement->execute();
            $dados = $statement->fetch();
            return $dados;

        }catch(Exeception $e){
            return false;
        }
    }

	// Listando os usuários
    static function Listar(){

		try {
			$banco = Conexao::getInstance();
			$statement = $banco->prepare("SELECT * FROM usuario");
			$dados = $statement->execute();
			$dados = $statement->fetchAll();
			return $dados;
			
		} catch (Exception $e) {
			return false;
		}
	}

	// Adiciona um usuario no banco
	static function Adicionar($nome, $setor, $gestor, $login, $senha){		

		try {
			$banco = Conexao::getInstance();
			$statement = $banco->prepare("INSERT INTO usuario (`nome`, `setor`, `gestor`, `login`, `senha`) VALUES (?, ?, ?, ?, ?)");
            $statement->bindParam(1, $nome, PDO::PARAM_STR);
            $statement->bindParam(2, $setor, PDO::PARAM_STR);
            $statement->bindParam(3, $gestor, PDO::PARAM_STR);
            $statement->bindParam(4, $login, PDO::PARAM_STR);
            $statement->bindParam(5, md5($senha), PDO::PARAM_STR);
            $dados = $statement->execute();
			return true;
			
		} catch (Exception $e) {
			return false;
		}
	}

	// Edita os dados do usuario caso ele não insira a senha
	static function EditarSemSenha($nome, $setor, $gestor, $login, $id){		

		try {
			$banco = Conexao::getInstance();
			$statement = $banco->prepare("UPDATE usuario SET `nome` = ?, `setor` = ?, `gestor` = ?, `login` = ? WHERE idusuario = ?");
            $statement->bindParam(1, $nome, PDO::PARAM_STR);
            $statement->bindParam(2, $setor, PDO::PARAM_STR);
            $statement->bindParam(3, $gestor, PDO::PARAM_STR);
            $statement->bindParam(4, $login, PDO::PARAM_STR);
            $statement->bindParam(5, $id);            
            $dados = $statement->execute();
			return true;
			
		} catch (Exception $e) {
			return false;
		}
	}

	// Altera os dados do usuario caso ele insira a senha
	static function EditarNovaSenha($nome, $setor, $gestor, $login, $senha, $id){		

		try {
			$banco = Conexao::getInstance();
			$statement = $banco->prepare("UPDATE usuario SET `nome` = ?, `setor` = ?, `gestor` = ?, `login` = ?, `senha` = ? WHERE idusuario = ?");
            $statement->bindParam(1, $nome, PDO::PARAM_STR);
            $statement->bindParam(2, $setor, PDO::PARAM_STR);
            $statement->bindParam(3, $gestor, PDO::PARAM_STR);
            $statement->bindParam(4, $login, PDO::PARAM_STR);
            $statement->bindParam(5, md5($senha), PDO::PARAM_STR);
            $statement->bindParam(6, $id);            
            $dados = $statement->execute();
			return true;
			
		} catch (Exception $e) {
			return false;
		}
	}

	// Buscar os dados de um usuario no banco
	static function Detalhes($id){		

		try {
			$banco = Conexao::getInstance();
			$statement = $banco->prepare("SELECT idusuario, nome, setor, gestor, login FROM usuario WHERE idusuario = ?");
            $statement->bindParam(1, $id, PDO::PARAM_STR);
            $dados = $statement->execute();
            $dados = $statement->fetch();
			return $dados;
			
		} catch (Exception $e) {
			return false;
		}
	}

	// Remove um usuario do banco
	static function Remover($id){		

		try {
			$banco = Conexao::getInstance();
			$statement = $banco->prepare("DELETE FROM usuario WHERE idusuario = ?");
            $statement->bindParam(1, $id, PDO::PARAM_STR);
            $dados = $statement->execute();
            $dados = $statement->fetch();
			return $dados;
			
		} catch (Exception $e) {
			return false;
		}
	}
}
?>