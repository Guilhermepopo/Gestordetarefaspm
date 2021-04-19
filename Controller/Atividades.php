<?php
require_once BASE_URL.'Model/Atividade.php'; 
/**
* Classe Atividades
*/
class Atividades {

	// Listando as atividades
	static public function Listando(){
		$objeto = new Atividade;
		$dados = $objeto->Listar();
		require_once(BASE_URL.'View/view/atividades/listar.php');
	}

	// Adicionar as atividades
	static public function Adicionar(){
		$atividade = new Atividade;

		if(@$_POST['titulo']){
			// Tratamento de strings
			$arr = ['titulo','setor','descricao'];
			foreach($arr as $a){
				if (!empty(@$_POST[$a]) and is_string(@$_POST[$a])){
					$$a = @$_POST[$a];
				}else{
					return false;
				}
			}

			// Puxando dados do usuário
			$usuario = $_SESSION['id'];
			$status = "aberto";
			$created_at = date('Y-m-d H:i:s');
			$updated_at = date('Y-m-d H:i:s');

			// Inserindo no banco
			if($banco = $atividade->Adicionar($titulo, $setor, $descricao, $usuario, $status, $created_at , $updated_at) == true){
				return true;
			}else{
				return false;
			}
		}
	}

	// Editar a atividades
	static public function Editar($id){
		$atividade = new Atividade;

		if(@$_POST['titulo']){
			// Tratamento de strings
			$arr = ['titulo','setor','descricao', 'status'];
			foreach($arr as $a){
				if (!empty(@$_POST[$a]) and is_string(@$_POST[$a])){
					$$a = @$_POST[$a];
				}else{
					return false;
				}
			}

			// Puxando dados do usuário
			$updated_at = date('Y-m-d H:i:s');

			// Inserindo no banco
			if($banco = $atividade->Editar($titulo, $setor, $descricao, $status, $updated_at, $id) == true){
				return true;
			}else{
				return false;
			}
		}
	}

	// Alterando o status de uma atividade para em andamento a atividade
	static public function Andamento($id){
		$atividade = new Atividade;
		$status = "andamento";
		$dados = $atividade->Alterar($id, $status);
		return true;
	}

	//  Alterando o status de uma atividade para finalizado a atividade
	static public function Finalizado($id){
		$atividade = new Atividade;
		$status = "finalizado";
		$dados = $atividade->Alterar($id, $status);
		return true;
	}

	// Remover a atividade
	static public function Remover($id){
		$atividade = new Atividade;
		$dados = $atividade->Remover($id);
		return true;
	}

	// Detalhes da atividade
	static public function Detalhes($id){
		$atividade = new Atividade;
		$dados = $atividade->Detalhes($id);
		echo json_encode($dados);
	}

}	
?>
