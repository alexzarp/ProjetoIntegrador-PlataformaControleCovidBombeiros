<?php

    class Militar {

        private $nome;
        private $matricula;
        private $faixaEtaria;
        private $email;
        private $senha;

        public function getNome() {
            return $this->nome;
        }
        public function setNome($nome) {
            $this->nome = $nome;
        }
        // 
        public function getMatricula() {
            return $this->matricula;
        }
        public function setMatricula($matricula) {
            $this->matricula = $matricula;
        }
        // 
        public function getEtaria() {
            return $this->faixaEtaria;
        }
        public function setEtaria($faixaEtaria) {
            $this->faixaEtaria = $faixaEtaria;
        }
        // 
        public function getEmail() {
            return $this->email;
        }
        public function setEmail($email) {
            $this->email = $email;
        }
        // 
        public function getSenha() {
            return $this->senha;
        }
        public function setSenha($senha) {
            $this->senha = $senha;
        }
    }

?>