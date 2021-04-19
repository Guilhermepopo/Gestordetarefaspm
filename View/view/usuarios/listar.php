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
							<h4 class="card-title">Todos os Usuarios</h4>
							<h6 class="card-subtitle">Listagem de todos os usuarios.</h6>
						</div>
						<div class="col-6 text-right">
							<button class="btn btn-primary btn-outline ml-auto" id="adicionar" name="adicionar" title="Adicionar nova aitivdade" data-toggle="modal" data-target="#modal-adicionar">
								<i class="m-0 pr-lg-1 mdi mdi-plus"></i> 
								<span class="hidden-xs">Novo usuarios</span> 
							</button>
						</div>
					</div>
					<?php if(!empty($dados)){ ?>
						<div class="table-responsive m-t-40">
							<table class="display nowrap table table-hover table-striped table-bordered text-center" id="table"	cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>ID</th>
										<th>Nome</th>
										<th>Setor</th>
										<th>Gestor</th>
										<th>Login</th>
										<th>Ações</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										foreach($dados as $value){
									?>
											<tr>
												<td><?php echo $value['idusuario']; ?></td>
												<td>
													<a href="javascript:void(0)" data="<?php echo $value['idusuario'];?>" class="text-dark btn-detalhes" title="Detalhes do Usuarios">
														<?php echo $value['nome']; ?></td>
													</a>
												<td><?php echo $value['setor']; ?></td>
												<td>
													<?php echo ($value['gestor'] == 1 ? 'Sim' : 'Não'); ?>
												</td>
												<td>
													<?php echo $value['login']; ?>
												</td>
												<td>
													<a  href="javascript:void(0)" data="<?php echo $value['idusuario'];?>" class="btn btn-info btn-xs btn-editar" title="Editar usuarios">
														<i class="mdi mdi-pencil"></i>
													</a>
													<a href="javascript:void(0)" data="<?php echo $value['idusuario'];?>" class="btn btn-info btn-xs btn-remover" title="Remover o Usuarios">
														<i class="mdi mdi-close"></i>
													</a>
												</td>
											</tr>
									<?php
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
	// Modais usados nessa pagina
	require_once(BASE_URL.'View/view/usuarios/editar.php');
	require_once(BASE_URL.'View/view/usuarios/detalhes.php');
	require_once(BASE_URL.'View/view/usuarios/adicionar.php');
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
			$.get('/Gestordetarefaspm/app/usuarios/detalhes/'+$(this).attr('data'), function(data){
				var dados = JSON.parse(data);
				$('#modal-editar .id').val(dados.idusuario);
				$('#modal-editar .nome').val(dados.nome);
				$('#modal-editar .setor').val(dados.setor);
				$('#modal-editar .gestor').val(dados.gestor);
				$('#modal-editar .login').val(dados.login);
				$('#modal-editar').modal('show');
			}).fail(function(e){
				alert("Não foi possível carregar as informações.");
			});			
		});

		$('.btn-detalhes').on('click', function(e) {
			$.get('/Gestordetarefaspm/app/usuarios/detalhes/'+$(this).attr('data'), function(data){
				var dados = JSON.parse(data);
				$('#modal-detalhes .nome').val(dados.nome);
				$('#modal-detalhes .setor').val(dados.setor);
				$('#modal-detalhes .gestor').val(dados.gestor);
				$('#modal-detalhes .login').val(dados.login);
				$('#modal-detalhes').modal('show');
			}).fail(function(e){
				alert("Não foi possível carregar as informações.");
			});			
		});

		$('.btn-remover').on('click', function(e) {
			if(confirm('Tem certeza que deseja remover esse usuario?')){
				$.get('/Gestordetarefaspm/app/usuarios/remover/'+$(this).attr('data'), function(data){
					alert('Usuario removido com sucesso!');
					location.reload();
				}).fail(function(e){
					alert("Não foi possível carregar as informações.");
				});
			}			
		});

		// Enviando dados para adicionar um usuario para o controller
		$('#modal-adicionar #formAdicionar').on('submit', function(e){
			e.preventDefault();
			$.ajax({
				url: '/Gestordetarefaspm/app/usuarios/adicionar',
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

		// Enviando dados para alterar um usuario para o controller
		$('#modal-editar #formEditar').on('submit', function(e){
			e.preventDefault();
			$.ajax({
				url: '/Gestordetarefaspm/app/usuarios/editar/'+$('#modal-editar .id').val(),
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