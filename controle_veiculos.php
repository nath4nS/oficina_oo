<?php 
session_start();
require 'classes/Veiculo.php';
require 'classes/VeiculoDAO.php';

$veiculo = new Veiculo();
$veiculoDAO = new VeiculoDAO();

$acao = $_GET['acao'];
$id = '';
if(isset($_GET['id']) && $_GET['id'] != '') {
	$id = $_GET['id'];
}

if($acao == 'deletar') {

	$veiculoDAO->deletar($id);
	$msg = 'Veiculo excluído com sucesso';

	header("Location: veiculo.php?msg=$msg");

} else if($acao == 'cadastrar') {

	$veiculo->setModelo($_POST['modelo']);
	$veiculo->setAno($_POST['ano']);
	$veiculo->setPlaca($_POST['placa']);

	$id = $veiculoDAO->insereVeiculo($veiculo);
	$msg = 'Veículo cadastrado com sucesso';
	header("Location: form_veiculos.php?id=$id&msg=$msg");

} else if($acao == 'editar') {
	$id = $_POST['id'];

	$veiculo->setModelo($_POST['modelo']);
	$veiculo->setAno($_POST['ano']);
	$veiculo->setPlaca($_POST['placa']);
	//print_r($veiculos); exit;

	$veiculoDAO->alteraVeiculo($veiculo);
	$msg = 'Veículos alterado com sucesso';

	header("Location: form_veiculos.php?id=$id&msg=$msg");
}