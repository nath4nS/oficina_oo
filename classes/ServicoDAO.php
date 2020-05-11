<?php
require_once 'Model.php';
class ServicoDAO extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->tabela = 'servicos';
		$this->class = 'Servico';
	}

    public function insereServico(Servico $servico)
    {
    	$values = "null, 
    				'{$servico->getServico()}',
    				'{$servico->getPeca()}',  
                    '{$servico->getValor()}'";
    	return $this->inserir($values);
    }

    public function alteraServico(Servico $servico) {
    	$values = "modelo = '{$servico->getServico()}',
    				ano = '{$servico->getPeca()}',
    				placa = '{$servico->getValor()}'";
    	$this->alterar($servico->getId(), $values);
    }

}