<?php
	require_once(BASE_URL.'View/view/layouts/header.php');
?>
<div class="page-wrapper">
	<div class="row">
		<div class="col-12">
			<div class="card m-4">
				<div class="card-body">
					<div class="row mx-auto">
						<div class="col-6">
							<h4 class="card-title">Todas as tarefas</h4>
							<h6 class="card-subtitle">Listagem das todas as tarefas.</h6>
						</div>
						<div class="col-6 text-right">
							<?php if($_SESSION['gestor'] == 1){ ?>
								<button class="btn btn-primary btn-outline ml-auto" id="adicionar" name="adicionar" title="Adicionar nova aitivdade" data-toggle="modal" data-target="#modal-adicionar">
									<i class="m-0 pr-lg-1 mdi mdi-plus"></i> 
									<span class="hidden-xs">Nova atividade</span> 
								</button>
							<?php } ?>
						</div>
					</div>
					<?php if(!empty($dados)){ ?>
						<div class="table-responsive m-t-40">
							<table class="display nowrap table table-hover table-striped table-bordered text-center" id="table" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>ID</th>
										<th>Titulo</th>
										<th>Setor</th>
										<th>Status</th>
										<th>Data</th>
										<th>Ações</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										foreach($dados as $value){
											if($_SESSION['gestor'] == 1){
									?>
										<tr>
											<td><?php echo $value['idtarefas']; ?></td>
											<td>
												<a href="javascript:void(0)" data="<?php echo $value['idtarefas'];?>" class="text-dark btn-detalhes" title="Detalhes da tarefa">
													<?php echo $value['titulo']; ?></td>
												</a>
											<td><?php echo $value['setor']; ?></td>
											<td>
												<div class="badge badge-<?=($value['status'] == 'aberto' ? 'success' : ($value['status'] == 'andamento' ? 'warning text-white' : 'danger'))?> text-uppercase">
													<?php echo $value['status']; ?>
												</div>
											</td>
											<td>
												<?php echo date('d/m/Y', strtotime($value['created_at'])); ?>
											</td>
											<td>
												<?php if($_SESSION['gestor'] == 1){ ?>
														<a href="javascript:void(0)" data="<?php echo $value['idtarefas'];?>" class="btn btn-info btn-xs btn-editar" title="Editar tarefa">
														<i class="mdi mdi-pencil"></i>
													</a>
													<a href="javascript:void(0)" data="<?php echo $value['idtarefas'];?>" class="btn btn-info btn-xs btn-remover" title="Remover a tarefa">
														<i class="mdi mdi-close"></i>
													</a>
												<?php } ?>
												
												<?php if($value['status'] == 'aberto'){ ?>
													<a href="javascript:void(0)" data="<?php echo $value['idtarefas'];?>" class="btn btn-warning btn-xs btn-andamento" title="Em andamento">
													<i class="mdi mdi-clock"></i>
													</a>
													<a href="javascript:void(0)" data="<?php echo $value['idtarefas'];?>" class="btn btn-danger btn-xs btn-finalizar" title="Finalizar tarefa">
														<i class="mdi mdi-check-all"></i>
													</a>
												<?php }elseif($value['status'] == 'andamento'){ ?>
													<a href="javascript:void(0)" data="<?php echo $value['idtarefas'];?>" class="btn btn-danger btn-xs btn-finalizar" title="Finalizar tarefa">
														<i class="mdi mdi-check-all"></i>
													</a>
												<?php } ?>												
											</td>
										</tr>
									<?php
										}else{
											if($_SESSION['setor'] == $value['setor']){
									?>
										<tr>
											<td><?php echo $value['idtarefas']; ?></td>
											<td>
												<a href="javascript:void(0)" data="<?php echo $value['idtarefas'];?>" class="text-dark btn-detalhes" title="Detalhes da tarefa">
													<?php echo $value['titulo']; ?></td>
												</a>
											<td><?php echo $value['setor']; ?></td>
											<td>
												<div class="badge badge-<?=($value['status'] == 'aberto' ? 'success' : ($value['status'] == 'andamento' ? 'warning text-white' : 'danger'))?> text-uppercase">
													<?php echo $value['status']; ?>
												</div>
											</td>
											<td>
												<?php echo date('d/m/Y', strtotime($value['created_at'])); ?>
											</td>
											<td>
												<?php if($_SESSION['gestor'] == 1){ ?>
														<a href="javascript:void(0)" data="<?php echo $value['idtarefas'];?>" class="btn btn-info btn-xs btn-editar" title="Editar tarefa">
														<i class="mdi mdi-pencil"></i>
													</a>
													<a href="javascript:void(0)" data="<?php echo $value['idtarefas'];?>" class="btn btn-info btn-xs btn-remover" title="Remover a tarefa">
														<i class="mdi mdi-close"></i>
													</a>
												<?php } ?>
												
												<?php if($value['status'] == 'aberto'){ ?>
													<a href="javascript:void(0)" data="<?php echo $value['idtarefas'];?>" class="btn btn-warning btn-xs btn-andamento" title="Em andamento">
													<i class="mdi mdi-clock"></i>
													</a>
													<a href="javascript:void(0)" data="<?php echo $value['idtarefas'];?>" class="btn btn-danger btn-xs btn-finalizar" title="Finalizar tarefa">
														<i class="mdi mdi-check-all"></i>
													</a>
												<?php }elseif($value['status'] == 'andamento'){ ?>
													<a href="javascript:void(0)" data="<?php echo $value['idtarefas'];?>" class="btn btn-danger btn-xs btn-finalizar" title="Finalizar tarefa">
														<i class="mdi mdi-check-all"></i>
													</a>
												<?php } ?>												
											</td>
										</tr>
									<?php
											}
										}
									}
									?>
								</tbody>
							</table>
						</div>
					<?php
						}else{
					?>
						<div class="text-danger text-center mt-5">
							<p>Você não possui nenhuma informação cadastada.</p>
						</div>
					<?php
						}
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
	//Modais usuados nessa pagina
	require_once(BASE_URL.'View/view/atividades/adicionar.php');
	require_once(BASE_URL.'View/view/atividades/editar.php');
	require_once(BASE_URL.'View/view/atividades/alterar.php');
	require_once(BASE_URL.'View/view/atividades/detalhes.php');
	require_once(BASE_URL.'View/view/layouts/footer.php');
?>
<!-- JavaScript -->
<script type="text/javascript">
	$(document).ready( function (){

		// Criando a datatables
		$('#table').DataTable({
			deferRender: true,
			order: [0, 'asc'],
			paginate: true,
			select: true,
			searching: true,
			destroy: true,
			"language": {
	            "lengthMenu": "Exibir _MENU_ registros",
	            "zeroRecords": "Nenhum registro encontrado",
	            "info": "Página _PAGE_ de _PAGES_",
	            "infoEmpty": "Nenhum registro retornado",
	            "infoFiltered": "(Filtrado _MAX_ registros)",
	            "search": "Pesquisar:",
	            "paginate": {
			        "first":      "Primeiro",
			        "last":       "Último",
			        "next":       "Próximo",
			        "previous":   "Anterior"
			    },

	        }
		});	

		// Exibindo o modal
		$('#adicionar').on('click', function () {
			$('#modal-adicionar').modal('show');
		});

		// Modal editar
		$('.btn-editar').on('click', function(e) {
			
			$('#modal-editar form').each(function(){
				this.reset();
			});
			$('#modal-editar #err').html('');
			$.get('/Gestordetarefaspm/app/atividades/detalhes/'+$(this).attr('data'), function(data){
				var dados = JSON.parse(data);
				$('#modal-editar .id').val(dados.idtarefas);
				$('#modal-editar .titulo').val(dados.titulo);
				$('#modal-editar .setor').val(dados.setor);
				$('#modal-editar .status').val(dados.status);
				$('#modal-editar .descricao').val(dados.descricao);
				$('#modal-editar').modal('show');
			}).fail(function(e){
				alert("Não foi possível carregar as informações.");
			});			
		});


		$('.btn-detalhes').on('click', function(e) {
			$.get('/Gestordetarefaspm/app/atividades/detalhes/'+$(this).attr('data'), function(data){
				var dados = JSON.parse(data);
				$('#modal-detalhes .titulo').val(dados.titulo);
				$('#modal-detalhes .setor').val(dados.setor);
				$('#modal-detalhes .descricao').val(dados.descricao);
				$('#modal-detalhes').modal('show');
			}).fail(function(e){
				alert("Não foi possível carregar as informações.");
			});			
		});

		$('.btn-remover').on('click', function(e) {
			if(confirm('Tem certeza que deseja remover essa tarefa?')){
				$.get('/Gestordetarefaspm/app/atividades/remover/'+$(this).attr('data'), function(data){
					alert('Tarefa removida com sucesso!');
					location.reload();
				}).fail(function(e){
					alert("Não foi possível carregar as informações.");
				});
			}			
		});

		$('.btn-andamento').on('click', function(e) {
			if(confirm('Tem certeza que deseja alterar o status para andamento?')){
				$.get('/Gestordetarefaspm/app/atividades/andamento/'+$(this).attr('data'), function(data){
					location.reload();
				}).fail(function(e){
					alert("Não foi possível carregar as informações.");
				});	
			}
		});

		$('.btn-finalizar').on('click', function(e) {
			if(confirm('Tem certeza que deseja alterar o status para finalizado?')){
				$.get('/Gestordetarefaspm/app/atividades/finalizar/'+$(this).attr('data'), function(data){
					location.reload();
				}).fail(function(e){
					alert("Não foi possível carregar as informações.");
				});	
			}
		});

		// Enviando dados para adicionr a atividade para o controller
		$('#modal-adicionar #formAdicionar').on('submit', function(e){
			e.preventDefault();
			$.ajax({
				url: '/Gestordetarefaspm/app/atividades/adicionar',
				type: 'POST',
				data: $('#modal-adicionar #formAdicionar').serialize(),
				beforeSend: function(){
					$('.modal-body, .modal-footer').addClass('d-none');
					$('.carregamento').html('<div class="mx-auto text-center my-5"> <div class="col-12"> <div class="spinner-border my-4" role="status"> <span class="sr-only"> Loading... </span> </div> </div> <label>Salvando informações...</label></div>');
					$('#modal-adicionar #err').html('');
				},
				success: function(data){
					$('.modal-body, .modal-footer').addClass('d-none');
					$('.carregamento').html('<div class="mx-auto text-center my-5"><div class="col-12"><i class="col-2 mdi mdi-check-all mdi-48px"></i></div><label>Informações alteradas com sucesso!</label></div>');
					setTimeout(function(){
						$('#modal-adicionar #formAdicionar').each (function(){
							this.reset();
						});
						location.reload();
					}, 1000);
				}, error: function (data) {
					setTimeout(function(){
						$('.modal-body, .modal-footer').removeClass('d-none');
						$('.carregamento').html('');
						if(!data.responseJSON){
							console.log(data.responseText);
							$('#modal-adicionar #err').html(data.responseText);
						}else{
							$('#modal-adicionar #err').html('');
							$('input').removeClass('border-bottom border-danger');
							$.each(data.responseJSON.errors, function(key, value){
								$('#modal-adicionar #err').append('<div class="text-danger mx-4"><p>'+value+'</p></div>');
								$('input[name="'+key+'"]').addClass('border-bottom border-danger');
							});
						}
					}, 1000);
				}
			});
		});

		// Enviando dados de alteração de uma atividade para controller
		$('#modal-editar #formEditar').on('submit', function(e){
			e.preventDefault();
			$.ajax({
				url: '/Gestordetarefaspm/app/atividades/editar/'+$('#modal-editar .id').val(),
				type: 'POST',
				data: $('#modal-editar #formEditar').serialize(),
				beforeSend: function(){
					$('.modal-body, .modal-footer').addClass('d-none');
					$('.carregamento').html('<div class="mx-auto text-center my-5"> <div class="col-12"> <div class="spinner-border my-4" role="status"> <span class="sr-only"> Loading... </span> </div> </div> <label>Salvando informações...</label></div>');
					$('#modal-editar #err').html('');
				},
				success: function(data){
					$('.modal-body, .modal-footer').addClass('d-none');
					$('.carregamento').html('<div class="mx-auto text-center my-5"><div class="col-12"><i class="col-2 mdi mdi-check-all mdi-48px"></i></div><label>Informações alteradas com sucesso!</label></div>');
					setTimeout(function(){
						$('#modal-editar #formEditar').each (function(){
							this.reset();
						});
						location.reload();
					}, 1000);
				}, error: function (data) {
					setTimeout(function(){
						$('.modal-body, .modal-footer').removeClass('d-none');
						$('.carregamento').html('');
						if(!data.responseJSON){
							console.log(data.responseText);
							$('#modal-editar #err').html(data.responseText);
						}else{
							$('#modal-editar #err').html('');
							$('input').removeClass('border-bottom border-danger');
							$.each(data.responseJSON.errors, function(key, value){
								$('#modal-editar #err').append('<div class="text-danger mx-4"><p>'+value+'</p></div>');
								$('input[name="'+key+'"]').addClass('border-bottom border-danger');
							});
						}
					}, 1000);
				}
			});
		});
	});
</script>