<?php include './layout/header.php'; ?>
<?php include './layout/menu.php'; ?>
<?php 
	require 'classes/Veiculo.php';
	require 'classes/VeiculoDAO.php';
	$veiculo = new Veiculo();
	if(isset($_GET['id']) && $_GET['id'] != '') {
		$id = $_GET['id'];
		$veiculoDAO = new VeiculoDAO();
		$veiculo = $veiculoDAO->get($id);
	}

?>
<?php 
	if(isset($_GET['msg']) && $_GET['msg'] != '') {
	 echo '<div class="alert alert-info">'.$_GET['msg'].'</div>';
	}
?>
<div class="row" style="margin-top:40px">
	<div class="col-6 offset-3">
		<h2>Cadastrar Veículo</h2>
	</div>
</div>

<form action="controle_veiculos.php?acao=<?= ( $veiculo->getId() != '' ? 'editar' : 'cadastrar' )?>" method="post" enctype="multipart/form-data">

		<div class="col-6">
			<p>&nbsp;</p>

				<div class="form-group">
					<label for="modelo">Modelo:</label>
					<input type="text" class="form-control" name="modelo" id="modelo" required value="<?= ($veiculo->getModelo() != '' ? $veiculo->getModelo() : '') ?>">
				</div>
				<div class="form-group">
					<label for="ano">Ano:</label>
					<input type="ano" name="ano" id="ano" class="form-control" required value="<?= ($veiculo->getAno() != '' ? $veiculo->getAno() : ''); ?>">
				</div>
				<div class="form-group">
					<label for="placa">Placa:</label>
					<input type="text" name="placa" id="placa" class="form-control" required value="<?= ($veiculo->getPlaca() != '' ? $veiculo->getPlaca() : ''); ?>">
				</div>		
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Salvar</button>
				</div>
		</div>
	</div>
</form>

