<!DOCTYPE html>
	
	<head>
		<title>Devedores</title>
		<?php require_once "menu.php"; ?>
	</head>
	<body>
		<div class="container">
			<h1>Administrar Devedores</h1>
			<div class="row">
				<div class="col-sm-4">
					<form id="frmRegistro">
						<label>Nome</label>
						<input type="text" class="form-control input-sm" name="nome" id="nome">
						<label>CPF</label>
						<input type="number" class="form-control input-sm" name="cpf" id="cpf">
						<label>Data Nascimento</label>
						<input type="date" class="form-control input-sm" name="data-nasc" id="nasc">
						<label>Endereço</label>
						<input type="text" class="form-control input-sm" name="endereco" id="endereco">
						<label>Descrição</label>
						<input type="text" class="form-control input-sm" name="descricao" id="descricao">
						<label>Valor</label>
						<input type="number" class="form-control input-sm" name="valor" id="valor">
						<label>Data de Vencimento</label>
						<input type="date" class="form-control input-sm" name="data-vencimento" id="data-vencimento">

						<p></p>
						<span class="btn btn-primary" id="registro">Salvar</span>

					</form>
					<br><br><br><br>
				</div>
				<div class="col-sm-7">
					<div id="tabelaUsuariosLoad"></div>
				</div>
			</div>
		</div>
		


		<!-- Button trigger modal -->


		<!-- Modal -->
		<div class="modal fade" id="atualizaUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Devedor</h4>
					</div>
					<div class="modal-body">
						<form id="frmRegistroU">
						<input type="text" hidden="" id="idUsuarioU" name="idUsuarioU">
						<label>Nome</label>
						<input type="text" class="form-control input-sm" name="nomeU" id="nomeU">
						<label>CPF</label>
						<input type="text" class="form-control input-sm" name="cpfU" id="cpfU">
						<label>Data Nascimento</label>
						<input type="date" class="form-control input-sm" name="data-nascU" id="data-nascU">
						<label>Endereço</label>
						<input type="text" class="form-control input-sm" name="enderecoU" id="enderecoU">
						<label>Descrição</label>
						<input type="text" class="form-control input-sm" name="descricaoU" id="descricaoU">
						<label>Valor</label>
						<input type="text" class="form-control input-sm" name="valorU" id="valorU">
						<label>Data de Vencimento</label>
						<input type="date" class="form-control input-sm" name="data-vencimentoU" id="data-vencimentoU">


						</form>
					</div>
					<div class="modal-footer">
						<button id="btnAtualizaUsuario" type="button" class="btn btn-warning" data-dismiss="modal">Editar</button>

					</div>
				</div>
			</div>
		</div>

	</body>
	</html>

	<script type="text/javascript">
		function adicionarDados(idusuario){

			$.ajax({
				type:"POST",
				data:"idusuario=" + idusuario,
				url:"../procedimentos/usuarios/obterDados.php",
				success:function(r){

					dado=jQuery.parseJSON(r);

					$('#idUsuarioU').val(dado['id']);
					$('#nomeU').val(dado['nome']);
					$('#cpfU').val(dado['cpf']);
					$('#enderecoU').val(dado['endereco']);
					$('#data-nascU').val(dado['dataNasc']);
					$('#descricaoU').val(dado['descricao']);
					$('#valorU').val(dado['valor']);
					$('#data-vencimentoU').val(dado['dataVencimento']);
				}
			});
		}

		function eliminarUsuario(idusuario){
			alertify.confirm('Deseja excluir este usuario?', function(){ 
				$.ajax({
					type:"POST",
					data:"idusuario=" + idusuario,
					url:"../procedimentos/usuarios/eliminarUsuario.php",
					success:function(r){
						if(r==1){
							$('#tabelaUsuariosLoad').load('usuarios/tabelaUsuarios.php');
							alertify.success("Excluido com sucesso!!");
						}else{
							alertify.error("Não excluido :(");
						}
					}
				});
			}, function(){ 
				alertify.error('Cancelado !')
			});
		}


	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#btnAtualizaUsuario').click(function(){

				datos=$('#frmRegistroU').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procedimentos/usuarios/atualizarUsuario.php",
					success:function(r){

						

						if(r==1){
							$('#tabelaUsuariosLoad').load('usuarios/tabelaUsuarios.php');
							alertify.success("Editado com sucesso :D");
						}else{
							alertify.error("Não foi possível editar :(");
						}
					}
				});
			});
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function(){

			$('#tabelaUsuariosLoad').load('usuarios/tabelaUsuarios.php');

			$('#registro').click(function(){

				vazios=validarFormVazio('frmRegistro');

				if(vazios > 0){
					alertify.alert("Preencha os campos!!");
					return false;
				}

				datos=$('#frmRegistro').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procedimentos/login/registrarUsuario.php",
					success:function(r){
						//alert(r);

						if(r==1){
							$('#frmRegistro')[0].reset();
							$('#tabelaUsuariosLoad').load('usuarios/tabelaUsuarios.php');
							alertify.success("Adicionado com sucesso");
						}else{
							alertify.error("Falha ao adicionar :(");
						}
					}
				});
			});
		});
	</script>

