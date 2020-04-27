<?php include './layout/header.php'; ?>
<?php include './layout/menu.php'; ?>
<?php 
	require 'classes/Veiculo.php';
	require 'classes/VeiculoDAO.php';
	$veiculo = new VeiculoDAO();
	if(isset($_GET['id']) && $_GET['id'] != '') {
		$id = $_GET['id'];
		$veiculoDAO = new VeiculoDAO();
		$veiculo = $veiculoDAO->get($id);
	}

?>

<div class="row" style="margin-top:40px">
	<div class="col-6 offset-3">
		<h2>Cadastrar Veículos</h2>
	</div>
<div class="row">
	<div class="col-6 <?= ( $veiculo->getId() != '' ? '' : 'offset-3' )?>">
		<p>&nbsp;</p>
		<form action="controle_veiculos.php?acao=<?= ( $veiculo->getId() != '' ? 'editar' : 'cadastrar' )?>" method="post">
			<div class="row">
				<div class="col-3">
					<div class="form-group">
						<label for="id">ID</label>
						<input type="text" class="form-control" name="id" id="id" value="<?=($veiculo->getId() != '' ? $veiculo->getId() : '')?>" readonly>
					</div>
				</div>
				<div class="col-9">
					<div class="form-group">
						<label for="modelo">Modelo</label>
						<input type="text" class="form-control" name="modelo" id="modelo" required value="<?= ($veiculo->getModelo() != '' ? $veiculo->getModelo() : '') ?>">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-3">	
					<div class="form-group">
						<label for="ano">Ano</label>
						<input type="text" name="ano" id="ano" value="<?= ($veiculo->getAno() != '' ? $veiculo->getAno() : '0' ) ?>" class="form-control">
					</div>
				</div>
				<div class="col-3">	
					<div class="form-group">
						<label for="placa">Placa</label>
						<input type="text" name="placa" id="placa" value="<?= ($veiculo->getPlaca() != '' ? $veiculo->getPlaca() : '0,00' ) ?>" class="form-control moeda">
					</div>
				</div>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Salvar</button>
			</div>
		</form>
	</div>
</div>
</div>