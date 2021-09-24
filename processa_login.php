<?php
session_start();

require("./funcoes.php");

if(isset($_POST['txt_usuario']) || isset($_POST['txt_senha'])){
  
realizarLogin($_POST['txt_usuario'],$_POST['txt_senha'], lerArquivo("usuarios.json")); 

}else if ($_GET["logout"]){

    finalizarLogin();
}