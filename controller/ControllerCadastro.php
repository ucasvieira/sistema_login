<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once("$root/sistema_login/model/cadastro.php");

class cadastroController
{

    private $cadastro;

    public function __construct()
    {
        $this->cadastro = new Cadastro();
        if (isset($_GET['funcao']) && $_GET['funcao'] == "cadastro") {
            $this->incluir();
        }
    }

    private function incluir()
    {
        $this->cadastro->setEmail($_POST['txtEmail']);
        $this->cadastro->setSenha($_POST['txtSenha']);
        $this->cadastro->setEndereco($_POST['txtEndereco']);
        $this->cadastro->setBairro($_POST['txtBairro']);
        $this->cadastro->setCep($_POST['txtCep']);
        $this->cadastro->setCidade($_POST['txtCidade']);
        $this->cadastro->setEstado($_POST['txtEstado']);
        $result = $this->cadastro->incluir();
        if ($result >= 1) {
            echo "<script>alert('Registro incluído com sucesso! 🥳');document.location='../index.php'</script>";
        } else {
            echo "<script>alert('Erro ao gravar registro!');</script>";
        }
    }

}
new cadastroController();
?>