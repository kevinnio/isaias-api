<?php
    require_once("inc/functions.php");
    if(!isset($_COOKIE["idUsuario"])) {
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en" class="nav-no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html" ; charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>CONTAINER ALL RISK</title>
    <link rel="shortcut icon" href="favicon.ico" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <!--Revisar para tablas-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <!--Paginado de tabs-->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/defaults.min.css">
    <link rel="stylesheet" href="css/nav-core.min.css">
    <link rel="stylesheet" href="css/nav-layout.min.css">
    <script src="js/rem.min.js"></script>
</head>

<body>
    <a href="#" class="nav-button">Menu</a>
    <nav class="nav">
        <ul>
            <li>
                <a href="#"><img src="img/car-w.png" width="85"></a>
            </li>
            <?php
            if($_COOKIE["lvl"]==2){
            ?>
            <li>
                <a href="modificar-cliente.php?id=<?php echo $_COOKIE["idUsuario"]; ?>"><i class="fa fa-user"></i> Mis datos</a>
            </li>
            <?php
                }else{
            ?>
            <li class="nav-submenu"><a href="#">Clientes</a>
                <ul>
                    <li><a href="clientes.php">Todos los clientes</a></li>
                    <li><a href="nuevo-cliente.php">Nuevo cliente</a></li>
                </ul>
            </li>
            <?php
            }
            ?>
            <li class="nav-submenu"><a href="#">Viajes</a>
                <ul>
                    <li><a href="viajes.php">Ver viajes</a></li>
                    <li><a href="nuevo-viaje.php">Nuevo viaje</a></li>
                    <li><a href="varios-contenedores.php">Multiples viajes</a></li>
                    <?php
                    if($_COOKIE["lvl"]==1){
                    ?>
                    <li><a href="reportes.php">Reporte general</a></li>
                    <li><a href="reportes-detallado.php">Reporte detallado</a></li>
                    <?php
                    }
                    ?>
                </ul>
            </li>
            <!--<li class="nav-submenu"><a href="#">Products</a>
                <ul>
                    <li><a href="#">Food</a></li>
                    <li class="nav-submenu"><a href="#">Drinks</a>
                        <ul>
                            <li><a href="#">Water</a></li>
                            <li class="nav-submenu"><a href="#">Cola</a>
                                <ul>
                                    <li class="nav-submenu nav-left"><a href="#">Coca Cola</a>
                                        <ul>
                                            <li><a href="#">This one goes left!</a></li>
                                            <li><a href="#">Too much sugar...</a></li>
                                            <li><a href="#">Yummy</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Pepsi</a></li>
                                    <li><a href="#">River</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Lemonade</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Candy</a></li>
                    <li><a href="#">Ice Cream</a></li>
                </ul>
            </li>-->
            <?php
            if($_COOKIE["lvl"]==1){
            ?>
            <li class="nav-submenu"><a href="#">Mercancias</a>
                <ul>
                    <li><a href="mercancias.php">Ver embarque</a></li>
                    <li><a href="nuevo-certificado.php">Nuevo embarque</a></li>
                    <li><a href="grafica.php">Reporte</a></li>
                </ul>
            </li>
            <?php
            }
            ?>
            <li><a href="inc/logout.php">Cerrar sesion</a></li>
        </ul>
    </nav>
    <div id="page-wrapper" align="center">
        <div class="wrapper wrapper-content animated fadeInRight">
            <?php
$idCliente=$_GET["id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nreg=$_POST["nreg"];
    foreach($_POST as $key=>$value){
        $info=explode("-",$key);
        if($info[0]=="precio") $campo="Precio";
        if($info[0]=="limite") $campo="LimitMaxRespons";
        if($info[0]=="deduciblem") $campo="DeducibleMaterial";
        if($info[0]=="deducibler") $campo="DeducibleRobo";
        if($info[0]=="demoras") $campo="Demoras";
        if($info[0]=="limpiezae") $campo="LimpiezaExtraordinaria";
        
        $result=query("SELECT COUNT(*) AS 'Registro' FROM clientes C RIGHT JOIN Servicios S ON C.idCliente=S.idCliente WHERE C.idCliente=".$idCliente." and S.idTipoContenedor=".$info[1].";");
        $row = mysqli_fetch_array($result);

        if($row["Registro"]==0){
            query("INSERT INTO Servicios (idCliente,idTipoContenedor,".$campo.") VALUES(".$idCliente.",".$info[1].",".$value.");");
        }else{
            query("UPDATE Servicios SET ".$campo."=".$value." WHERE idCliente=".$idCliente." and idTipoContenedor=".$info[1]);
        }
    }
}

if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $idCliente = $_GET["id"];
    $result=query("SELECT * FROM clientes WHERE idCliente=".$idCliente);
    $row = mysqli_fetch_array($result);
}
?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>SERVICIOS DEL CLIENTE - <?php echo $row["RazonSocial"]; ?></h5>
                        </div>
                        <div class="ibox-content">
                            <form id="mcliente" name="mcliente" method="post" action="" class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">&nbsp;</label>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-md-2">Precio</div>
                                            <div class="col-md-2">Lim max de respo</div>
                                            <div class="col-md-2">D / D / M</div>
                                            <div class="col-md-2">D / R</div>
                                            <div class="col-md-2">Demoras</div>
                                            <div class="col-md-2">Limpieza extraordinaria</div>
                                        </div>
                                    </div>

                                    <?php
$result=query("SELECT TC.idTipoContenedor,TC.TipoContenedor, IFNULL((SELECT Precio FROM Servicios WHERE idCliente=".$idCliente." and idTipoContenedor=TC.idTipoContenedor),0) AS Precio, IFNULL((SELECT LimitMaxRespons FROM Servicios WHERE idCliente=".$idCliente." and idTipoContenedor=TC.idTipoContenedor),0) AS LimitMaxRespons, IFNULL((SELECT DeducibleMaterial FROM Servicios WHERE idCliente=".$idCliente." and idTipoContenedor=TC.idTipoContenedor),0) AS DeducibleMaterial, IFNULL((SELECT DeducibleRobo FROM Servicios WHERE idCliente=".$idCliente." and idTipoContenedor=TC.idTipoContenedor),0) AS DeducibleRobo, IFNULL((SELECT Demoras FROM Servicios WHERE idCliente=".$idCliente." and idTipoContenedor=TC.idTipoContenedor),0) AS Demoras, IFNULL((SELECT LimpiezaExtraordinaria FROM Servicios WHERE idCliente=".$idCliente." and idTipoContenedor=TC.idTipoContenedor),0) AS LimpiezaExtraordinaria FROM TiposContenedores TC ORDER BY TC.TipoContenedor;");
$cont=0;
while($row = mysqli_fetch_array($result)) {
    $cont=$cont+1;
?>
                                    <label class="col-sm-2 control-label"><?php echo $row["TipoContenedor"]; ?></label>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-md-2 m-b"><input name="precio-<?php echo $row["idTipoContenedor"]; ?>" type="text" value="<?php echo $row["Precio"] ?>" class="form-control"></div>
                                            <div class="col-md-2 m-b"><input name="limite-<?php echo $row["idTipoContenedor"]; ?>" type="text" value="<?php echo $row["LimitMaxRespons"] ?>" class="form-control"></div>
                                            <div class="col-md-2 m-b"><input name="deduciblem-<?php echo $row["idTipoContenedor"]; ?>" type="text" value="<?php echo $row["DeducibleMaterial"] ?>" class="form-control"></div>

                                            <div class="col-md-2 m-b"><input name="deducibler-<?php echo $row["idTipoContenedor"]; ?>" type="text" value="<?php echo $row["DeducibleRobo"] ?>" class="form-control"></div>

                                            <div class="col-md-2 m-b"><input name="demoras-<?php echo $row["idTipoContenedor"]; ?>" type="text" value="<?php echo $row["Demoras"] ?>" class="form-control"></div>

                                            <div class="col-md-2 m-b"><input name="limpiezae-<?php echo $row["idTipoContenedor"]; ?>" type="text" value="<?php echo $row["LimpiezaExtraordinaria"] ?>" class="form-control"></div>


                                        </div>
                                    </div>
                                    <?php
}
?><input name="nreg" type="hidden" value="<?php echo $cont; ?>">

                                </div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-6">
                                        <button class="btn btn-primary" type="submit">Guardar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="js/plugins/dataTables/datatables.min.js"></script>
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
    <script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>
</body>

</html>