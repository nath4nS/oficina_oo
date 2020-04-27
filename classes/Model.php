<?php
require 'Conexao.php';
class model
{
	protected $tabela;
	protected $class;
	protected $db;

	public function __construct()
	{
		$conexao = new Conexao();
		$this->db = $conexao->conectar();
	}

	public function inserir($values)
	{
		$sql = "INSERT INTO {$this->tabela} VALUES ($values)";
		$stmt = $this->db->prepare($sql);
		$stmt->execute();
		return $this->db->lastInsertId();
	}

	public function listar()
    {
    	$sql = "SELECT * FROM {$this->tabela}";
    	$stmt = $this->db->prepare($sql);
    	$stmt->setFetchMode(PDO::FETCH_CLASS, $this->class);
    	$stmt->execute();
    	return $stmt->fetchAll();
    }

    public function get($id)
    {
    	$sql = "SELECT * FROM {$this->tabela} WHERE id = {$id}";
    	$stmt = $this->db->prepare($sql);
    	$stmt->setFetchMode(PDO::FETCH_CLASS, $this->class);
    	$stmt->execute();
    	return $stmt->fetch();
    }

    public function alterar($id, $values)
    {
    	$sql = "UPDATE {$this->tabela} SET {$values} WHERE id = {$id}";
    	$stmt = $this->db->prepare($sql);
    	$stmt->execute();
    }

    public function deletar($id)
    {
    	$sql = "DELETE FROM {$this->tabela} WHERE id = {$id}";
    	$stmt = $this->db->prepare($sql);
    	$stmt->execute();
    }
}