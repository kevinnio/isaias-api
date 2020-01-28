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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
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
                    <li><a href="mercancias.php">Ver viaje</a></li>
                    <li><a href="grafica.php">Reporte</a></li>
                </ul>
            </li>
            <?php
            }
            ?>
            <li><a href="inc/logout.php">Cerrar sesion</a></li>
        </ul>
    </nav>
            <div class="wrapper wrapper-content animated fadeInRight">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $razonSocial = $_POST["razonsocial"];
    $idCliente = $_POST["idCliente"];
    $cliente = $_POST["cliente"];
    $tipoContenedor = $_POST["tipoContenedor"];
    $contenedor1 = $_POST["contenedor1"];
    $contenedor2 = $_POST["contenedor2"];
    $contenedor3 = $_POST["contenedor3"];
    $contenedor4 = $_POST["contenedor4"];
    $contenedor5 = $_POST["contenedor5"];
    $contenedor6 = $_POST["contenedor6"];
    $contenedor7 = $_POST["contenedor7"];
    $contenedor8 = $_POST["contenedor8"];
    $contenedor9 = $_POST["contenedor9"];
    $contenedor10 = $_POST["contenedor10"];
    $cartaPorte = $_POST["cartaPorte"];
    $referencia = $_POST["referencia"];
    $origen = $_POST["origen"];
    $destino = $_POST["destino"];
    $placa = $_POST["placas"];
    $operador = $_POST["operador"];
    $tipoOperacion = $_POST["tipoOperacion"];
    $fechaAlta = $_POST["fecha"];

    query("UPDATE viajes SET Cliente='".$cliente."', idTipoContenedor=".$tipoContenedor.", Contenedor1='".$contenedor1."', Contenedor2='".$contenedor2."', Contenedor3='".$contenedor3."', Contenedor4='".$contenedor4."', Contenedor5='".$contenedor5."', Contenedor6='".$contenedor6."', Contenedor7='".$contenedor7."', Contenedor8='".$contenedor8."', Contenedor9='".$contenedor9."', Contenedor10='".$contenedor10."', 
    Referencia='".$referencia."', CartaPorte='".$cartaPorte."', Origen='".$origen."', Destino='".$destino."', Placas='".$placa."', Operador='".$operador."',
    TipoOperacion='".$tipoOperacion."', FechaAlta='".$fechaAlta."' WHERE idViaje=".$_GET["id"]);
}

if (isset($_GET["id"])) {
    $result=query("SELECT C.idCliente,UCASE(C.RazonSocial) AS 'RazonSocial',UCASE(V.Cliente) AS 'Cliente', TC.idTipoContenedor, UCASE(TC.TipoContenedor) AS 'TipoContenedor', UCASE(V.Contenedor1) AS 'Contenedor1', UCASE(V.Contenedor2) AS 'Contenedor2', UCASE(V.Contenedor3) AS 'Contenedor3', UCASE(V.Contenedor4) AS 'Contenedor4', UCASE(V.Contenedor5) AS 'Contenedor5', UCASE(V.Contenedor6) AS 'Contenedor6', UCASE(V.Contenedor7) AS 'Contenedor7', UCASE(V.Contenedor8) AS 'Contenedor8', UCASE(V.Contenedor9) AS 'Contenedor9', UCASE(V.Contenedor10) AS 'Contenedor10', UCASE(V.Pagado) AS 'Pagado', UCASE(V.Referencia) AS 'Referencia', V.CartaPorte, V.Origen, V.Destino, V.Placas, V.Operador, UCASE(V.TipoOperacion) AS 'TipoOperacion', V.FechaAlta, S.Precio, S.LimitMaxRespons, S.DeducibleMaterial, S.DeducibleRobo FROM viajes V LEFT JOIN clientes C ON V.idCliente=C.idCliente LEFT JOIN Servicios S ON (V.idTipoContenedor=S.idTipoContenedor and V.idCliente=S.idCliente) LEFT JOIN TiposContenedores TC ON TC.idTipoContenedor=V.idTipoContenedor WHERE V.idViaje=".$_GET["id"]);
    $rowp = mysqli_fetch_array($result);
}
?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <form id="ncliente" name="ncliente" method="post" action="" class="form-horizontal">
                                <div class="form-group">
                                    <h3 style="margin-left:20px;">Datos del Cliente</h3>
                                    <label class="col-sm-2 control-label">Razon Social</label>
                                    <div class="col-sm-4">
                                        <input name="razonsocial" type="text" value="<?php echo $rowp["RazonSocial"]; ?>" autocomplete="off" class="typeahead_2 form-control" />
                                        <input id="idCliente" name="idCliente" type="hidden" value="<?php echo $row["idCliente"]; ?>" />
                                    </div>
                                    <label class="col-sm-2 control-label">Fecha</label>
                                    <div class="col-sm-4"><input type="datetime-local" name="fecha" value="<?php echo date('Y-m-d\TH:i');?>" class="form-control"></div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <h3 style="margin-left:20px;">Datos del Contenedor</h3>
                                    <label class="col-sm-2 control-label">Cliente</label>
                                    <div class="col-sm-4"><input type="text" name="cliente" class="form-control m-b" value="<?php echo $rowp["Cliente"]; ?>"></div>
                                    <label class="col-sm-2 control-label">Tipo de Contenedor</label>
                                    <div class="col-sm-4">
                                        <select name="tipoContenedor" id="tipoContenedor" class="form-control m-b">
                                        <option value="0">Selecciona el tipo de contenedor</option><?php $result=query("SELECT * FROM TiposContenedores ORDER BY TipoContenedor ASC;");while($row = mysqli_fetch_array($result)) {?>
                                            <option value="<?php echo $row["idTipoContenedor"]; ?>" <?php if($row["idTipoContenedor"]==$rowp["idTipoContenedor"]) echo 'selected="selected"';  ?>><?php echo $row["TipoContenedor"]; ?></option><?php } ?>
                                        </select>
                                    </div>
                                    
                                    <label class="col-sm-2 control-label">Contenedor 1</label>
                                    <div class="col-sm-4"><input type="text" name="contenedor1" class="form-control m-b" value="<?php echo $rowp["Contenedor1"]; ?>" maxlength="11"></div>
                                    
                                    <label class="col-sm-2 control-label">Contenedor 2</label>
                                    <div class="col-sm-4"><input type="text" name="contenedor2" class="form-control m-b" value="<?php echo $rowp["Contenedor2"]; ?>" maxlength="11"></div>
                                    
                                    <label class="col-sm-2 control-label">Contenedor 3</label>
                                    <div class="col-sm-4"><input type="text" name="contenedor3" class="form-control m-b" value="<?php echo $rowp["Contenedor3"]; ?>" maxlength="11"></div>
                                    
                                    <label class="col-sm-2 control-label">Contenedor 4</label>
                                    <div class="col-sm-4"><input type="text" name="contenedor4" class="form-control m-b" value="<?php echo $rowp["Contenedor4"]; ?>" maxlength="11"></div>
                                    
                                    <label class="col-sm-2 control-label">Contenedor 5</label>
                                    <div class="col-sm-4"><input type="text" name="contenedor5" class="form-control m-b" value="<?php echo $rowp["Contenedor5"]; ?>" maxlength="11"></div>
                                    
                                    <label class="col-sm-2 control-label">Contenedor 6</label>
                                    <div class="col-sm-4"><input type="text" name="contenedor6" class="form-control m-b" value="<?php echo $rowp["Contenedor6"]; ?>" maxlength="11"></div>
                                    
                                    <label class="col-sm-2 control-label">Contenedor 7</label>
                                    <div class="col-sm-4"><input type="text" name="contenedor7" class="form-control m-b" value="<?php echo $rowp["Contenedor7"]; ?>" maxlength="11"></div>
                                    
                                    <label class="col-sm-2 control-label">Contenedor 8</label>
                                    <div class="col-sm-4"><input type="text" name="contenedor8" class="form-control m-b" value="<?php echo $rowp["Contenedor8"]; ?>" maxlength="11"></div>
                                    
                                    <label class="col-sm-2 control-label">Contenedor 9</label>
                                    <div class="col-sm-4"><input type="text" name="contenedor9" class="form-control m-b" value="<?php echo $rowp["Contenedor9"]; ?>" maxlength="11"></div>
                                    
                                    <label class="col-sm-2 control-label">Contenedor 10</label>
                                    <div class="col-sm-4"><input type="text" name="contenedor10" class="form-control m-b" value="<?php echo $rowp["Contenedor10"]; ?>" maxlength="11"></div>
                                    
                                    <label class="col-sm-2 control-label">Pagado</label>
                                    <div class="col-sm-4"><input type="text" name="pagado1" class="form-control m-b" disabled value="<?php echo $rowp["Pagado"]; ?>"></div>
                                    
                                </div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <h3 style="margin-left:20px;">Datos del Viaje</h3>
                                    
                                    <label class="col-sm-2 control-label">No de Referencia</label>
                                    <div class="col-sm-4"><input type="text" name="cartaPorte" class="form-control m-b" value="<?php echo $rowp["CartaPorte"]; ?>"></div>
                                    <label class="col-sm-2 control-label">No de Carta Porte</label>
                                    <div class="col-sm-4"><input type="text" name="referencia" class="form-control m-b" value="<?php echo $rowp["Referencia"]; ?>"></div>

                                    <label class="col-sm-2 control-label">Origen</label>
                                    <div class="col-sm-4"><input type="text" name="origen" class="form-control m-b" value="<?php echo $rowp["Origen"]; ?>"></div>
                                    <label class="col-sm-2 control-label">Destino</label>
                                    <div class="col-sm-4"><input type="text" name="destino" class="form-control m-b" value="<?php echo $rowp["Destino"]; ?>"></div>

                                    <label class="col-sm-2 control-label">Placas</label>
                                    <div class="col-sm-4"><input type="text" name="placas" class="form-control m-b" value="<?php echo $rowp["Placas"]; ?>"></div>
                                    <label class="col-sm-2 control-label">Operador</label>
                                    <div class="col-sm-4"><input type="text" name="operador" class="form-control m-b" value="<?php echo $rowp["Operador"]; ?>"></div>

                                    <label class="col-sm-2 control-label">Tipo de Operacion</label>
                                    <div class="col-sm-4">
                                        <select name="tipoOperacion" id="tipoOperacion" class="form-control">
                                            <option value="Impo">Impo</option>
                                            <option value="Expo">Expo</option>
                                            <option value="Ambos">Ambos</option>
                                        </select>
                                    </div>
                                </div>

                                
                                
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-8">
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
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="js/plugins/dataTables/datatables.min.js"></script>
    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
    <!-- jQuery UI -->
    <script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Page-Level Scripts -->
    <!-- Typehead -->
    <script src="js/plugins/typehead/bootstrap3-typeahead.min.js"></script>
    <script>
        $(document).ready(function(){
            $.get('inc/json-clientes.php', function(data){
                $(".typeahead_2").typeahead({ source:data,afterSelect: function (data) {$('#idCliente').val(data.code);}});
            },'json');
        });
    </script>
</body>
</html>