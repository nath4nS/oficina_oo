<?php include './layout/header.php'; ?>
<?php include './layout/menu.php'; ?>
<?php 
	require 'classes/Servico.php'; 
	require 'classes/ServicoDAO.php';
	$servico = new Servico();
	if(isset($_GET['id']) && $_GET['id'] != '') {
		$id = $_GET['id'];
		$servicoDAO = new ServicoDAO();
		$servico = $servicoDAO->get($id);
	}

?>
<?php 
	if(isset($_GET['msg']) && $_GET['msg'] != '') {
	 echo '<div class="alert alert-info">'.$_GET['msg'].'</div>';
	}
?>
<div class="row" style="margin-top:40px">
	<div class="col-6 offset-3">
		<h2>Cadastrar serviço</h2>
	</div>
</div>

<form action="controle_servicos.php?acao=<?= ( $servico->getId() != '' ? 'editar' : 'cadastrar' )?>" method="post" enctype="multipart/form-data">

		<div class="col-6">
			<p>&nbsp;</p>

				<div class="form-group">
					<label for="servico">Serviço:</label>
					<input type="text" class="form-control" name="servico" id="servico" required value="<?= ($servico->getServico() != '' ? $servico->getServico() : '') ?>">
				</div>
				<div class="form-group">
					<label for="peca">Peça:</label>
					<input type="peca" name="peca" id="peca" class="form-control" required value="<?= ($servico->getPeca() != '' ? $servico->getPeca() : ''); ?>">
				</div>
				<div class="form-group">
					<label for="valor">Valor:</label>
					<input type="text" name="valor" id="valor" class="form-control" required value="<?= ($servico->getValor() != '' ? $servico->getValor() : ''); ?>">
				</div>		
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Salvar</button>
				</div>
		</div>
	</div>
</form>

<?php include './layout/footer.php'; ?>