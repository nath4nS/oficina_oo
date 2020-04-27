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
				<th></th>
				<th>#ID</th>
				<th>Nome</th>
				<th>Sexo</th>
				<th>E-mail</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($usuarios as $usuario){ ?>
			<tr>
				<td class="text-center">
					<img src="/assets/img/usuarios/<?= ($usuario->getImagem() != '' && file_exists('assets/img/usuarios/'.$usuario->getImagem()) ? $usuario->getImagem() : 'usuario.png') ?>" alt="" width="50" class="rounded-circle">
				</td>
				<th><?= $usuario->getId() ?></th>
				<td><?= $usuario->getNome() ?></td>
				<td><?= $usuario->getSexo() ?></td>
				<td><?= $usuario->getEmail() ?></td>
				<td align="center">
					<a href="form_usuario.php?id=<?= $usuario->getId() ?>" class="btn btn-warning">
						<i class="fas fa-user-edit"></i>
					</a> | 
					<a href="controle_usuario.php?acao=deletar&id=<?= $usuario->getId() ?>" onclick="return confirm('Deseja realmente excluir?')" class="btn btn-danger">
						<i class="fas fa-trash-alt"></i>
					</a> 
					| 
					<a href="controle_usuario.php?acao=removeImagem&id=<?= $usuario->getId() ?>" onclick="return confirm('Deseja realmente remover a imagem?')" class="btn btn-danger">
						<i class="fas fa-user-times"></i>
					</a>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>

<?php include './layout/footer.php'; ?>