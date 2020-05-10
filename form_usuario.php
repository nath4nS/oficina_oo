<?php include './layout/header.php'; ?>
<?php include './layout/menu.php'; ?>
<?php 
	require 'classes/Usuario.php'; 
	require 'classes/UsuarioDAO.php';
	$usuario = new Usuario();
	if(isset($_GET['id']) && $_GET['id'] != '') {
		$id = $_GET['id'];
		$usuarioDAO = new UsuarioDAO();
		$usuario = $usuarioDAO->get($id);
	}

?>
<?php 
	if(isset($_GET['msg']) && $_GET['msg'] != '') {
	 echo '<div class="alert alert-info">'.$_GET['msg'].'</div>';
	}
?>
<div class="row" style="margin-top:40px">
	<div class="col-6 offset-3">
		<h2>Cadastrar usuário</h2>
	</div>
</div>

<form action="controle_usuario.php?acao=<?= ( $usuario->getId() != '' ? 'editar' : 'cadastrar' )?>" method="post" enctype="multipart/form-data">

		<div class="col-6">
			<p>&nbsp;</p>

				<div class="form-group">
					<label for="nome">Nome</label>
					<input type="text" class="form-control" name="nome" id="nome" required value="<?= ($usuario->getNome() != '' ? $usuario->getNome() : '') ?>">
				</div>
				<div class="form-group">
					<label for="email">E-mail</label>
					<input type="email" name="email" id="email" class="form-control" required value="<?= ($usuario->getEmail() != '' ? $usuario->getEmail() : ''); ?>">
				</div>
				<div class="form-group">
					<label for="senha">Senha</label>
					<input type="password" name="senha" id="senha" class="form-control" required value="<?= ($usuario->getSenha() != '' ? $usuario->getSenha() : ''); ?>">
				</div>		
				<div class="form-group">
					<label for="cpf">CPF</label>
					<input type="text" class="form-control" name="cpf" id="cpf" value="<?=($usuario->getCpf() != '' ? $usuario->getCpf() : '')?>">
				</div>
				<div class="form-group">
					<label for="celular">Celular</label>
					<input type="text" class="form-control" name="celular" id="celular" required value="<?= ($usuario->getCelular() != '' ? $usuario->getCelular() : '') ?>">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Salvar</button>
				</div>
		</div>
	</div>
</form>

<?php include './layout/footer.php'; ?>

<script type="text/javascript">

function showThumbnail(files) {
    if (files && files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
       fotopreview.src = e.target.result;
    }

        reader.readAsDataURL(files[0]);
    }
}

$('input[name="cpf"]').mask('999.999.999-99');
$('input[name="celular"]').mask('99999-9999');
</script>