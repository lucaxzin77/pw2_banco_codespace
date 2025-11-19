<?php 

require_once 'Conta.php';

class Titular{
    protected string $nome;
    protected string $cpf;
    protected string $endereco;

    public function __construct($nome, $cpf, $endereco){
        $this->setNome($nome);
        $this->setCpf($cpf);
        $this->setEndereco($endereco);
    }

    public function setNome($nome){
        if(strlen(trim($nome)) < 3){
            throw new InvalidArgumentException("O nome do titular deve ter pelo menos 3 caracteres!");
        }

        if(preg_match('/\d/', $nome)){
            throw new InvalidArgumentException("O nome do titular não pode conter números!");
        }

        $this->nome = $nome;
    }

    public function setCpf($cpf){
        if(strlen(trim($cpf)) != 11){
            throw new InvalidArgumentException("O CPF deve conter exatamente 11 dígitos numéricos!");
        }

        $this->cpf = $cpf;
    }

    public function setEndereco($endereco){
        if(is_null($endereco))
        {
            throw new InvalidArgumentException("O endereço não pode ser vazio!");
        }
        $this->endereco = $endereco;
    }

    public function getNome():string{
        return $this->nome;
    }
    public function getCpf():string{
        return $this->cpf;
    }
    public function getEndereco():string{
        return $this->endereco;
    }

    #[Override]
    public function toString(): string {
        return 'Nome: ' . $this->nome . ', CPF: ' . $this->cpf . ', Endereço: ' . $this->endereco;
    }
}