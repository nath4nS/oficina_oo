<?php
require_once 'Model.php';
class VeiculoDAO extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->tabela = 'veiculos';
		$this->class = 'Veiculo';
	}

    public function insereVeiculo(Veiculo $veiculo)
    {
    	$values = "null, 
    				'{$veiculo->getModelo()}',
    				'{$veiculo->getAno()}',  
                    '{$veiculo->getPlaca()}'";
    	return $this->inserir($values);
    }

    public function alteraVeiculo(Veiculo $veiculo) {
    	$values = "modelo = '{$veiculo->getModelo()}',
    				ano = '{$veiculo->getAno()}',
    				placa = '{$veiculo->getPlaca()}'";
    	$this->alterar($veiculo->getId(), $values);
    }

}