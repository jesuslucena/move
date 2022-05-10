<?php

$servidor = "127.0.0.1:3306";
$nombreusuario = "u909913696_softmcy";
$password = "1234**Covid19";
$db = "u909913696_jovenespormcy";
$cont=0;

    $files = $_FILES['pic'];

  foreach ($files as $key => $file) {

    $uid = $_POST['uid'];
    $name = $_FILES["pic"]["name"];
    $tmp_name = $_FILES["pic"]["tmp_name"];
    $tipo_denuncia = $_POST['tipo_denuncia'];
    $uploads_dir = 'denuncias/'.$tipo_denuncia.'/'.$uid;
    if (!is_dir($uploads_dir)) {
        mkdir($uploads_dir, 0777, true);
    }
    $finish = $uploads_dir/$name;
    move_uploaded_file($tmp_name, $finish);
    $cont++;
    $lins = 'https://jovenespormcy.org/'.$finish;
    $sql = "UPDATE denuncias SET img$cont='$lins' WHERE uid='$uid'";

    $result = $conexion->query($sql);

  }
?>