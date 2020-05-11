<?php include './layout/header.php'; ?>
<?php include './layout/menu.php'; ?>
<?php 

require 'classes/Servico.php';
require 'classes/ServicoDAO.php';
$servicoDAO = new servicoDAO();
$servicos = $servicoDAO->listar();

?>
<?php 
	if(isset($_GET['msg']) && $_GET['msg'] != '') {
	 echo '<div class="alert alert-info">'.$_GET['msg'].'</div>';
	}
?>
<div class="row" style="margin-top:40px">
	<div class="col-10">
		<h2>Gerenciar serviços</h2>
	</div>
	<div class="col-2">
		<a href="form_servicos.php" class="btn btn-success">Novo</a>
	</div>
</div>
<div class="row">
	<table class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
				<th>Serviço</th>
				<th>Peça</th>
				<th>Valor</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($servicos as $servico){ ?>
				<td><?= $servico->getServico() ?></td>
				<td><?= $servico->getPeca() ?></td>
				<td><?= $servico->getValor() ?></td>
				<td align="center">
					<a href="form_servicos.php?id=<?= $servico->getId() ?>" class="btn btn-warning">
						<i class="fas fa-user-edit"></i>
					</a> | 
					<a href="controle_servicos.php?acao=deletar&id=<?= $servico->getId() ?>" onclick="return confirm('Deseja realmente excluir?')" class="btn btn-danger">
						<i class="fas fa-trash-alt"></i>
					</a> 
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>

<?php include './layout/footer.php'; ?>
