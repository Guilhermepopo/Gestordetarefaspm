<?php	
require_once BASE_URL.'Model/conexao.php';

class Atividade extends Conexao {

	public $banco;

	function __construct(){
		#
	}

	// Listando todas tarefas
	static function Listar(){

		try {
			$banco = Conexao::getInstance();
			$statement = $banco->prepare("SELECT * FROM tarefas");
			$dados = $statement->execute();
			$dados = $statement->fetchAll();
			return $dados;
			
		} catch (Exception $e) {
			return false;
		}
	}

	// Adicionar atividade no banco
	static function Adicionar($titulo, $setor, $descricao, $usuario, $status, $created_at , $updated_at){		

		try {
			$banco = Conexao::getInstance();
			$statement = $banco->prepare("INSERT INTO tarefas (`titulo`, `setor`, `status`, `descricao`, `created_at`, `updated_at`, `idusuario`) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $statement->bindParam(1, $titulo, PDO::PARAM_STR);
            $statement->bindParam(2, $setor, PDO::PARAM_STR);
            $statement->bindParam(3, $status, PDO::PARAM_STR);
            $statement->bindParam(4, $descricao, PDO::PARAM_STR);
            $statement->bindParam(5, $created_at);
            $statement->bindParam(6, $updated_at);
            $statement->bindParam(7, $usuario);
            $dados = $statement->execute();
			return true;
			
		} catch (Exception $e) {
			return false;
		}
	}

	// Aleterando os dados de uma atividade ja inserida no banco
	static function Editar($titulo, $setor, $descricao, $status, $updated_at, $id){		

		try {
			$banco = Conexao::getInstance();
			$statement = $banco->prepare("UPDATE tarefas SET `titulo` = ?, `setor` = ?, `status` = ?, `descricao` = ?, `updated_at` = ? WHERE idtarefas = ?");
            $statement->bindParam(1, $titulo, PDO::PARAM_STR);
            $statement->bindParam(2, $setor, PDO::PARAM_STR);
            $statement->bindParam(3, $status, PDO::PARAM_STR);
            $statement->bindParam(4, $descricao, PDO::PARAM_STR);
            $statement->bindParam(5, $updated_at);
            $statement->bindParam(6, $id);
            $dados = $statement->execute();
			return true;
			
		} catch (Exception $e) {
			return false;
		}
	}

	// Buscando uma atividade do banco
	static function Detalhes($id){		

		try {
			$banco = Conexao::getInstance();
			$statement = $banco->prepare("SELECT * FROM tarefas WHERE idtarefas = ?");
            $statement->bindParam(1, $id, PDO::PARAM_STR);
            $dados = $statement->execute();
            $dados = $statement->fetch();
			return $dados;
			
		} catch (Exception $e) {
			return false;
		}
	}

	// Removendo uma atividade no banco
	static function Remover($id){		

		try {
			$banco = Conexao::getInstance();
			$statement = $banco->prepare("DELETE FROM tarefas WHERE idtarefas = ?");
            $statement->bindParam(1, $id, PDO::PARAM_STR);
            $dados = $statement->execute();
            $dados = $statement->fetch();
			return $dados;
			
		} catch (Exception $e) {
			return false;
		}
	}

	// Alterando o status de uma atividade
	static function Alterar($id, $status){		

		try {
			$banco = Conexao::getInstance();
			$statement = $banco->prepare("UPDATE tarefas SET `status` = ? WHERE idtarefas = ?");
            $statement->bindParam(1, $status, PDO::PARAM_STR);
            $statement->bindParam(2, $id, PDO::PARAM_STR);
            $dados = $statement->execute();
            $dados = $statement->fetch();
			return $dados;
			
		} catch (Exception $e) {
			return false;
		}
	}

}
?>