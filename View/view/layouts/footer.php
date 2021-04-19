    </div>
       
    <!--Scripts -->
    <script src="/Gestordetarefaspm/View/resources/js/popper.js"></script>
	<script src="/Gestordetarefaspm/View/resources/js/bootstrap.js"></script>
    <script src="/Gestordetarefaspm/View/resources/vendors/jquery/jquery-3.6.0.js"></script>
    <script src="/Gestordetarefaspm/View/resources/vendors/datatables/datatables.js"></script>
    <script src="/Gestordetarefaspm/View/resources/js/custom.js"></script>
    <script src="/Gestordetarefaspm/View/resources/js/sidebarmenu.js"></script>
    <script src="/Gestordetarefaspm/View/resources/js/perfect-scrollbar.jquery.min.js"></script>
   	<script type="text/javascript">
		$(document).ready( function (){
	   		// Saindo da aplicação
	   		$('.sair').on('click', function(){
	   			if(confirm('Tem certeza que deseja sair?')){
	   				window.location.href = "/Gestordetarefaspm/app/logout/";
	   			}
	   		});

	   		// Fechando o modal
			$('.fechar').on('click', function () {
				$('.modal').modal('hide');
			});
		});
   	</script>
</body>

</html>