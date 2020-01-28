<?php
require_once("functions.php");
if(!isset($_COOKIE["idUsuario"])) {
    header("Location: ../login.php");
}

$result=query("SELECT * FROM clientes");
echo "[";
$cont=1;
while($row = mysqli_fetch_array($result)) {
    if($cont==1){
        echo '{"code":"'.$row["idCliente"].'",';
        echo '"name":"'.$row["RazonSocial"].'"}';
    }else{
        echo ',{"code":"'.$row["idCliente"].'",';
        echo '"name":"'.$row["RazonSocial"].'"}';
    }
    $cont=$cont+1;
}
echo "]";
?>