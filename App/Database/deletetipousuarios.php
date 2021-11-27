<?php
require_once '../auth.php';
require_once '../Models/tiposusuarios.class.php';

if(isset($_GET['id']) != NULL){
	$idtipo_Usuario = $_GET['id'];	
	$tiposUsuarios->DeleteTipoUsuarios($idtipo_Usuario);

 } else {

	header('Location: ../../views/usuarios/tiposusuario.php');

}	