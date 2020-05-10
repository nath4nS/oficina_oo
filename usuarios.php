<?php include './layout/header.php'; ?>
<?php include './layout/menu.php'; ?>
<?php 
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));
$path = $_SERVER['DOCUMENT_ROOT'];

require 'classes/Usuario.php';
require 'classes/UsuarioDAO.php';
$usuarioDAO = new UsuarioDAO();
$usuarios = $usuarioDAO->listar();

?>
<?php 
	if(isset($_GET['msg']) && $_GET['msg'] != '') {
	 echo '<div class="alert alert-info">'.$_GET['msg'].'</div>';
	}
?>
<div class="row" style="margin-top:40px">
	<div class="col-10">
		<h2>Gerenciar usuários</h2>
	</div>
	<div class="col-2">
		<a href="form_usuario.php" class="btn btn-success">Nova</a>
	</div>
</div>
<div class="row">
	<table class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
				<th>Nome</th>
				<th>E-mail</th>
				<th>CPF</th>
				<th>Celular</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($usuarios as $usuario){ ?>
			<tr>
				<td><?= $usuario->getNome() ?></td>
				<td><?= $usuario->getEmail() ?></td>
				<td><?= $usuario->getCpf() ?></td>
				<td><?= $usuario->getCelular() ?></td>
				<td align="center">
					<a href="form_usuario.php?id=<?= $usuario->getId() ?>" class="btn btn-warning" data-toggle="tooltip" title="Editar usuário">
						<i class="fas fa-user-edit"></i>
					</a> | 
					<a href="controle_usuario.php?acao=deletar&id=<?= $usuario->getId() ?>" onclick="return confirm('Deseja realmente excluir?')" class="btn btn-danger" data-toggle="tooltip" title="Remover usuário">
						<i class="fas fa-trash-alt"></i>
					</a> 
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>

<?php include './layout/footer.php'; ?>