<?php include './layout/header.php'; ?>
<?php include './layout/menu.php'; ?>
<?php 

require 'classes/Veiculo.php';
require 'classes/VeiculoDAO.php';
$veiculoDAO = new VeiculoDAO();
$veiculos = $veiculoDAO->listar();

?>
<?php 
	if(isset($_GET['msg']) && $_GET['msg'] != '') {
	 echo '<div class="alert alert-info">'.$_GET['msg'].'</div>';
	}
?>
<div class="row" style="margin-top:40px">
	<div class="col-10">
		<h2>Gerenciar veículos</h2>
	</div>
	<div class="col-2">
		<a href="form_veiculos.php" class="btn btn-success">Novo</a>
	</div>
</div>
<div class="row">
	<table class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
				<th>#ID</th>
				<th>Modelo</th>
				<th>Ano</th>
				<th>Placa</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($veiculos as $veiculo){ ?>
				<th><?= $veiculo->getId() ?></th>
				<td><?= $veiculo->getModelo() ?></td>
				<td><?= $veiculo->getAno() ?></td>
				<td><?= $veiculo->getPlaca() ?></td>
				<td align="center">
					<a href="form_veiculos.php?id=<?= $veiculo->getId() ?>" class="btn btn-warning">
						<i class="fas fa-user-edit"></i>
					</a> | 
					<a href="controle_veiculos.php?acao=deletar&id=<?= $veiculo->getId() ?>" onclick="return confirm('Deseja realmente excluir?')" class="btn btn-danger">
						<i class="fas fa-trash-alt"></i>
					</a> 
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>

<?php include './layout/footer.php'; ?>
