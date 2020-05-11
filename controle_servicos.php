<?php 
require 'classes/Servico.php';
require 'classes/ServicoDAO.php';

$servico = new Servico();
$servicoDAO = new ServicoDAO();

$acao = $_GET['acao'];
$id = '';
if(isset($_GET['id']) && $_GET['id'] != '') {
	$id = $_GET['id'];
}

if($acao == 'deletar') {

	$servicoDAO->deletar($id);
	$msg = 'Serviço excluído com sucesso';

	header("Location: servicos.php?msg=$msg");

} else if($acao == 'cadastrar') {

	$servico->setServico($_POST['servico']);
	$servico->setPeca($_POST['peca']);
	$servico->setValor($_POST['valor']);
	$id_servico = $servicoDAO->insereServico($servico);
	$msg = 'Serviço cadastrado com sucesso';

	header("Location: form_servicos.php?id=$id_servico&msg=$msg");

} else if($acao == 'editar') {
	$id_servico = $_POST['id'];

	$servico->setId($_POST['id']);
	$servico->setServico($_POST['servico']);
	$servico->setPeca($_POST['peca']);
	$servico->setValor($_POST['valor']);
	$servicoDAO->alteraServico($servico);
	$msg = 'Serviço alterado com sucesso';
	
	header("Location: form_servicos.php?id=$id_servico&msg=$msg");

} 

