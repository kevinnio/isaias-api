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
                    $idCliente=$_GET["id"];
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $razonSocial = $_POST["razonsocial"];
                        $enero = $_POST["enero"];
                        $cntr1 = $_POST["cntr1"];
                        $febrero = $_POST["febrero"];
                        $cntr2 = $_POST["cntr2"];
                        $marzo = $_POST["marzo"];
                        $cntr3 = $_POST["cntr3"];
                        $abril = $_POST["abril"];
                        $cntr4 = $_POST["cntr4"];
                        $mayo = $_POST["mayo"];
                        $cntr5 = $_POST["cntr5"];
                        $junio = $_POST["junio"];
                        $cntr6 = $_POST["cntr6"];
                        $julio = $_POST["julio"];
                        $cntr7 = $_POST["cntr7"];
                        $agosto = $_POST["agosto"];
                        $cntr8 = $_POST["cntr8"];
                        $septiembre = $_POST["septiembre"];
                        $cntr9 = $_POST["cntr9"];
                        $octubre = $_POST["octubre"];
                        $cntr10 = $_POST["cntr10"];
                        $noviembre = $_POST["noviembre"];
                        $cntr11 = $_POST["cntr11"];
                        $diciembre = $_POST["diciembre"];
                        $cntr12 = $_POST["cntr12"];
                        $rem1 = $_POST["rem1"];
                        $rem2 = $_POST["rem2"];
                        $rem3 = $_POST["rem3"];
                        $rem4 = $_POST["rem4"];
                        $rem5 = $_POST["rem5"];
                        $rem6 = $_POST["rem6"];
                        $rem7 = $_POST["rem7"];
                        $rem8 = $_POST["rem8"];
                        $rem9 = $_POST["rem9"];
                        $rem10 = $_POST["rem10"];
                        $rem11 = $_POST["rem11"];
                        $rem12 = $_POST["rem12"];
                        $sin1 = $_POST["sin1"];
                        $sin2 = $_POST["sin2"];
                        $sin3 = $_POST["sin3"];
                        $sin4 = $_POST["sin4"];
                        $sin5 = $_POST["sin5"];
                        $sin6 = $_POST["sin6"];
                        $sin7 = $_POST["sin7"];
                        $sin8 = $_POST["sin8"];
                        $sin9 = $_POST["sin9"];
                        $sin10 = $_POST["sin10"];
                        $sin11 = $_POST["sin11"];
                        $sin12 = $_POST["sin12"];
                        query("UPDATE clientes SET RazonSocial='".$razonSocial."', Enero='".$enero."', Cntr1='".$cntr1."', Febrero='".$febrero."', Cntr2='".$cntr2."', Marzo='".$marzo."', Cntr3='".$cntr3."', Abril='".$abril."', Cntr4='".$cntr4."', Mayo='".$mayo."', Cntr5='".$cntr5."', Junio='".$junio."', Cntr6='".$cntr6."', Julio='".$julio."', Cntr7='".$cntr7."', Agosto='".$agosto."', Cntr8='".$cntr8."', Septiembre='".$septiembre."', Cntr9='".$cntr9."', Octubre='".$octubre."', Cntr10='".$cntr10."', Noviembre='".$noviembre."', Cntr11='".$cntr11."', Diciembre='".$diciembre."', Cntr12='".$cntr12."', Rem1='".$rem1."', Rem2='".$rem2."', Rem3='".$rem3."', Rem4='".$rem4."', Rem5='".$rem5."', Rem6='".$rem6."', Rem7='".$rem7."', Rem8='".$rem8."', Rem9='".$rem9."', Rem10='".$rem10."', Rem11='".$rem11."', Rem12='".$rem12."', Sin1='".$sin1."', Sin2='".$sin2."', Sin3='".$sin3."', Sin4='".$sin4."', Sin5='".$sin5."', Sin6='".$sin6."', Sin7='".$sin7."', Sin8='".$sin8."', Sin9='".$sin9."', Sin10='".$sin10."', Sin11='".$sin11."', Sin12='".$sin12."' WHERE idCliente=".$idCliente);
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
                                <h5>Reporte detallado de siniestros</h5>
                            </div>
                            <div class="ibox-content">
                                <form id="mcliente" name="mcliente" method="post" action="" class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Razon Social </label>
                                        <div class="col-sm-4"><input type="text" name="razonsocial" class="form-control" value="<?php echo $row["RazonSocial"] ?>">
                                        </div>
                                        <label class="col-sm-2 control-label">% Siniestralidad</label>
                                        <div class="col-sm-2">
                                            <input type="text" id="total-input" name="" class="form-control m-b">
                                            <span id="total" type="text" name=""></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Enero</label>
                                        <div class="col-sm-2"><input type="text" name="enero" class="form-control m-b" value="<?php echo $row["Enero"] ?>"></div>
                                        <label class="col-sm-1 control-label">Reembolso</label>
                                        <div class="col-sm-2"><input type="text" name="rem1" class="form-control m-b" value="<?php echo $row["Rem1"] ?>"></div>
                                        <label class="col-sm-1 control-label">Cntr(s)</label>
                                        <div class="col-sm-2"><input type="text" name="cntr1" placeholder="Sin registro" class="form-control m-b" value="<?php echo $row["Cntr1"] ?>"></div>
                                        <label class="col-sm-1 control-label">#Sin</label>
                                        <div class="col-sm-2"><input type="text" name="sin1" class="form-control m-b" value="<?php echo $row["Sin1"] ?>"></div>

                                        <label class="col-sm-1 control-label">Febrero</label>
                                        <div class="col-sm-2"><input type="text" name="febrero" class="form-control m-b" value="<?php echo $row["Febrero"] ?>"></div>
                                        <label class="col-sm-1 control-label">Reembolso</label>
                                        <div class="col-sm-2"><input type="text" name="rem2" class="form-control m-b" value="<?php echo $row["Rem2"] ?>"></div>
                                        <label class="col-sm-1 control-label">Cntr(s)</label>
                                        <div class="col-sm-2"><input type="text" name="cntr2" placeholder="Sin registro" class="form-control m-b" value="<?php echo $row["Cntr2"] ?>"></div>
                                        <label class="col-sm-1 control-label">#Sin</label>
                                        <div class="col-sm-2"><input type="text" name="sin2" class="form-control m-b" value="<?php echo $row["Sin2"] ?>"></div>

                                        <label class="col-sm-1 control-label">Marzo</label>
                                        <div class="col-sm-2"><input type="text" name="marzo" class="form-control m-b" value="<?php echo $row["Marzo"] ?>"></div>
                                        <label class="col-sm-1 control-label">Reembolso</label>
                                        <div class="col-sm-2"><input type="text" name="rem3" class="form-control m-b" value="<?php echo $row["Rem3"] ?>"></div>
                                        <label class="col-sm-1 control-label">Cntr(s)</label>
                                        <div class="col-sm-2"><input type="text" name="cntr3" placeholder="Sin registro" class="form-control m-b" value="<?php echo $row["Cntr3"] ?>"></div>
                                        <label class="col-sm-1 control-label">#Sin</label>
                                        <div class="col-sm-2"><input type="text" name="sin3" class="form-control m-b" value="<?php echo $row["Sin3"] ?>"></div>

                                        <label class="col-sm-1 control-label">Abril</label>
                                        <div class="col-sm-2"><input type="text" name="abril" class="form-control m-b" value="<?php echo $row["Abril"] ?>"></div>
                                        <label class="col-sm-1 control-label">Reembolso</label>
                                        <div class="col-sm-2"><input type="text" name="rem4" class="form-control m-b" value="<?php echo $row["Rem4"] ?>"></div>
                                        <label class="col-sm-1 control-label">Cntr(s)</label>
                                        <div class="col-sm-2"><input type="text" name="cntr4" placeholder="Sin registro" class="form-control m-b" value="<?php echo $row["Cntr4"] ?>"></div>
                                        <label class="col-sm-1 control-label">#Sin</label>
                                        <div class="col-sm-2"><input type="text" name="sin4" class="form-control m-b" value="<?php echo $row["Sin4"] ?>"></div>

                                        <label class="col-sm-1 control-label">Mayo</label>
                                        <div class="col-sm-2"><input type="text" name="mayo" class="form-control m-b" value="<?php echo $row["Mayo"] ?>"></div>
                                        <label class="col-sm-1 control-label">Reembolso</label>
                                        <div class="col-sm-2"><input type="text" name="rem5" class="form-control m-b" value="<?php echo $row["Rem5"] ?>"></div>
                                        <label class="col-sm-1 control-label">Cntr(s)</label>
                                        <div class="col-sm-2"><input type="text" name="cntr5" placeholder="Sin registro" class="form-control m-b" value="<?php echo $row["Cntr5"] ?>"></div>
                                        <label class="col-sm-1 control-label">#Sin</label>
                                        <div class="col-sm-2"><input type="text" name="sin5" class="form-control m-b" value="<?php echo $row["Sin5"] ?>"></div>

                                        <label class="col-sm-1 control-label">Junio</label>
                                        <div class="col-sm-2"><input type="text" name="junio" class="form-control m-b" value="<?php echo $row["Junio"] ?>"></div>
                                        <label class="col-sm-1 control-label">Reembolso</label>
                                        <div class="col-sm-2"><input type="text" name="rem6" class="form-control m-b" value="<?php echo $row["Rem6"] ?>"></div>
                                        <label class="col-sm-1 control-label">Cntr(s)</label>
                                        <div class="col-sm-2"><input type="text" name="cntr6" placeholder="Sin registro" class="form-control m-b" value="<?php echo $row["Cntr6"] ?>"></div>
                                        <label class="col-sm-1 control-label">#Sin</label>
                                        <div class="col-sm-2"><input type="text" name="sin6" class="form-control m-b" value="<?php echo $row["Sin6"] ?>"></div>

                                        <label class="col-sm-1 control-label">Julio</label>
                                        <div class="col-sm-2"><input type="text" name="julio" class="form-control m-b" value="<?php echo $row["Julio"] ?>"></div>
                                        <label class="col-sm-1 control-label">Reembolso</label>
                                        <div class="col-sm-2"><input type="text" name="rem7" class="form-control m-b" value="<?php echo $row["Rem7"] ?>"></div>
                                        <label class="col-sm-1 control-label">Cntr(s)</label>
                                        <div class="col-sm-2"><input type="text" name="cntr7" placeholder="Sin registro" class="form-control m-b" value="<?php echo $row["Cntr7"] ?>"></div>
                                        <label class="col-sm-1 control-label">#Sin</label>
                                        <div class="col-sm-2"><input type="text" name="sin7" class="form-control m-b" value="<?php echo $row["Sin7"] ?>"></div>

                                        <label class="col-sm-1 control-label">Agosto</label>
                                        <div class="col-sm-2"><input type="text" name="agosto" class="form-control m-b" value="<?php echo $row["Agosto"] ?>"></div>
                                        <label class="col-sm-1 control-label">Reembolso</label>
                                        <div class="col-sm-2"><input type="text" name="rem8" class="form-control m-b" value="<?php echo $row["Rem8"] ?>"></div>
                                        <label class="col-sm-1 control-label">Cntr(s)</label>
                                        <div class="col-sm-2"><input type="text" name="cntr8" placeholder="Sin registro" class="form-control m-b" value="<?php echo $row["Cntr8"] ?>"></div>
                                        <label class="col-sm-1 control-label">#Sin</label>
                                        <div class="col-sm-2"><input type="text" name="sin8" class="form-control m-b" value="<?php echo $row["Sin8"] ?>"></div>

                                        <label class="col-sm-1 control-label">Septiembre</label>
                                        <div class="col-sm-2"><input type="text" name="septiembre" class="form-control m-b" value="<?php echo $row["Septiembre"] ?>"></div>
                                        <label class="col-sm-1 control-label">Reembolso</label>
                                        <div class="col-sm-2"><input type="text" name="rem9" class="form-control m-b" value="<?php echo $row["Rem9"] ?>"></div>
                                        <label class="col-sm-1 control-label">Cntr(s)</label>
                                        <div class="col-sm-2"><input type="text" name="cntr9" placeholder="Sin registro" class="form-control m-b" value="<?php echo $row["Cntr9"] ?>"></div>
                                        <label class="col-sm-1 control-label">#Sin</label>
                                        <div class="col-sm-2"><input type="text" name="sin9" class="form-control m-b" value="<?php echo $row["Sin9"] ?>"></div>

                                        <label class="col-sm-1 control-label">Octubre</label>
                                        <div class="col-sm-2"><input type="text" name="octubre" class="form-control m-b" value="<?php echo $row["Octubre"] ?>"></div>
                                        <label class="col-sm-1 control-label">Reembolso</label>
                                        <div class="col-sm-2"><input type="text" name="rem10" class="form-control m-b" value="<?php echo $row["Rem10"] ?>"></div>
                                        <label class="col-sm-1 control-label">Cntr(s)</label>
                                        <div class="col-sm-2"><input type="text" name="cntr10" placeholder="Sin registro" class="form-control m-b" value="<?php echo $row["Cntr10"] ?>"></div>
                                        <label class="col-sm-1 control-label">#Sin</label>
                                        <div class="col-sm-2"><input type="text" name="sin10" class="form-control m-b" value="<?php echo $row["Sin10"] ?>"></div>

                                        <label class="col-sm-1 control-label">Noviembre</label>
                                        <div class="col-sm-2"><input type="text" name="noviembre" class="form-control m-b" value="<?php echo $row["Noviembre"] ?>"></div>
                                        <label class="col-sm-1 control-label">Reembolso</label>
                                        <div class="col-sm-2"><input type="text" name="rem11" class="form-control m-b" value="<?php echo $row["Rem11"] ?>"></div>
                                        <label class="col-sm-1 control-label">Cntr(s)</label>
                                        <div class="col-sm-2"><input type="text" name="cntr11" placeholder="Sin registro" class="form-control m-b" value="<?php echo $row["Cntr11"] ?>"></div>
                                        <label class="col-sm-1 control-label">#Sin</label>
                                        <div class="col-sm-2"><input type="text" name="sin11" class="form-control m-b" value="<?php echo $row["Sin11"] ?>"></div>

                                        <label class="col-sm-1 control-label">Diciembre</label>
                                        <div class="col-sm-2"><input type="text" name="diciembre" class="form-control m-b" value="<?php echo $row["Diciembre"] ?>"></div>
                                        <label class="col-sm-1 control-label">Reembolso</label>
                                        <div class="col-sm-2"><input type="text" name="rem12" class="form-control m-b" value="<?php echo $row["Rem12"] ?>"></div>
                                        <label class="col-sm-1 control-label">Cntr(s)</label>
                                        <div class="col-sm-2"><input type="text" name="cntr12" placeholder="Sin registro" class="form-control m-b" value="<?php echo $row["Cntr12"] ?>"></div>
                                        <label class="col-sm-1 control-label">#Sin</label>
                                        <div class="col-sm-2"><input type="text" name="sin12" class="form-control m-b" value="<?php echo $row["Sin12"] ?>"></div>

                                        <label class="col-sm-1 control-label">Total1</label>
                                        <div class="col-sm-2"><input id="valor" type="text" onkeyUp="calcular();" name="importe" required title="Completar campo" class="form-control m-b" value="<?php echo ($row["Enero"]+$row["Febrero"]+$row["Marzo"]+$row["Abril"]+$row["Mayo"]+$row["Junio"]+$row["Julio"]+$row["Agosto"]+$row["Septiembre"]+$row["Octubre"]+$row["Noviembre"]+$row["Diciembre"]); ?>"></div>


                                        <label class="col-sm-1 control-label">Total2</label>
                                        <div class="col-sm-2"><input id="valor2" type="text" onkeyUp="calcular()" name="cuota" required title="Completar campo" class="form-control m-b" value="<?php echo ($row["Rem1"]+$row["Rem2"]+$row["Rem3"]+$row["Rem4"]+$row["Rem5"]+$row["Rem6"]+$row["Rem7"]+$row["Rem8"]+$row["Rem9"]+$row["Rem10"]+$row["Rem11"]+$row["Rem12"]); ?>"></div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-5 col-sm-offset-6">
                                            <button class="btn btn-primary" type="submit">Generar certificado</button>
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
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="js/plugins/dataTables/datatables.min.js"></script>
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
    <script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="js/plugins/typehead/bootstrap3-typeahead.min.js"></script>
    <script src="js/plugins/validate/jquery.validate.min.js"></script>
    <script>
        function formatear(dato) {
            return dato.replace(/./g, function(c, i, a) {
                return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
            });
        }

        function calcular() {
            var valor = document.getElementById("valor").value;
            var valor2 = document.getElementById("valor2").value;
            var porce = parseInt(valor2) * 100 / valor;
            $("#total-input").val(formatear(porce.toFixed(2)))
        }
        calcular();

    </script>
</body>

</html>


<!--<?php
    require_once("inc/functions.php");
    if(!isset($_COOKIE["idUsuario"])) {
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Siniestros - Container All Risk</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="shortcut icon" href="favicon.ico" />
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
        <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">
        <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">
        <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body class="fixed-sidebar skin-3">
        <div id="wrapper">
            <?php require_once("inc/menu.php"); ?>
            <div id="page-wrapper" class="gray-bg dashbard-1">
                <div class="row border-bottom">
                    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                        <div class="navbar-header">
                            <a class="navbar-minimalize minimalize-styl-2 btn btn-success " href="#"><i class="fa fa-bars"></i> </a>
                        </div>
                        
                    </nav>
                </div>
                <div class="row  border-bottom white-bg dashboard-header">
                    <h1 style='font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;font-weight: 400;color: #23282d;font-size: 23px;padding: 9px 0 4px;line-height: 29px;font-weight: 400;'>Reporte</h1>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">Inicio</a>
                        </li>
                        <li class="active">
                            <strong>Siniestros</strong>
                        </li>
                    </ol>
                </div>
                <div class="wrapper wrapper-content animated fadeInRight">
                    <?php
                    $idCliente=$_GET["id"];
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $razonSocial = $_POST["razonsocial"];
                        $enero = $_POST["enero"];
                        $cntr1 = $_POST["cntr1"];
                        $febrero = $_POST["febrero"];
                        $cntr2 = $_POST["cntr2"];
                        $marzo = $_POST["marzo"];
                        $cntr3 = $_POST["cntr3"];
                        $abril = $_POST["abril"];
                        $cntr4 = $_POST["cntr4"];
                        $mayo = $_POST["mayo"];
                        $cntr5 = $_POST["cntr5"];
                        $junio = $_POST["junio"];
                        $cntr6 = $_POST["cntr6"];
                        $julio = $_POST["julio"];
                        $cntr7 = $_POST["cntr7"];
                        $agosto = $_POST["agosto"];
                        $cntr8 = $_POST["cntr8"];
                        $septiembre = $_POST["septiembre"];
                        $cntr9 = $_POST["cntr9"];
                        $octubre = $_POST["octubre"];
                        $cntr10 = $_POST["cntr10"];
                        $noviembre = $_POST["noviembre"];
                        $cntr11 = $_POST["cntr11"];
                        $diciembre = $_POST["diciembre"];
                        $cntr12 = $_POST["cntr12"];
                        $rem1 = $_POST["rem1"];
                        $rem2 = $_POST["rem2"];
                        $rem3 = $_POST["rem3"];
                        $rem4 = $_POST["rem4"];
                        $rem5 = $_POST["rem5"];
                        $rem6 = $_POST["rem6"];
                        $rem7 = $_POST["rem7"];
                        $rem8 = $_POST["rem8"];
                        $rem9 = $_POST["rem9"];
                        $rem10 = $_POST["rem10"];
                        $rem11 = $_POST["rem11"];
                        $rem12 = $_POST["rem12"];
                        $sin1 = $_POST["sin1"];
                        $sin2 = $_POST["sin2"];
                        $sin3 = $_POST["sin3"];
                        $sin4 = $_POST["sin4"];
                        $sin5 = $_POST["sin5"];
                        $sin6 = $_POST["sin6"];
                        $sin7 = $_POST["sin7"];
                        $sin8 = $_POST["sin8"];
                        $sin9 = $_POST["sin9"];
                        $sin10 = $_POST["sin10"];
                        $sin11 = $_POST["sin11"];
                        $sin12 = $_POST["sin12"];
                        query("UPDATE clientes SET RazonSocial='".$razonSocial."', Enero='".$enero."', Cntr1='".$cntr1."', Febrero='".$febrero."', Cntr2='".$cntr2."', Marzo='".$marzo."', Cntr3='".$cntr3."', Abril='".$abril."', Cntr4='".$cntr4."', Mayo='".$mayo."', Cntr5='".$cntr5."', Junio='".$junio."', Cntr6='".$cntr6."', Julio='".$julio."', Cntr7='".$cntr7."', Agosto='".$agosto."', Cntr8='".$cntr8."', Septiembre='".$septiembre."', Cntr9='".$cntr9."', Octubre='".$octubre."', Cntr10='".$cntr10."', Noviembre='".$noviembre."', Cntr11='".$cntr11."', Diciembre='".$diciembre."', Cntr12='".$cntr12."', Rem1='".$rem1."', Rem2='".$rem2."', Rem3='".$rem3."', Rem4='".$rem4."', Rem5='".$rem5."', Rem6='".$rem6."', Rem7='".$rem7."', Rem8='".$rem8."', Rem9='".$rem9."', Rem10='".$rem10."', Rem11='".$rem11."', Rem12='".$rem12."', Sin1='".$sin1."', Sin2='".$sin2."', Sin3='".$sin3."', Sin4='".$sin4."', Sin5='".$sin5."', Sin6='".$sin6."', Sin7='".$sin7."', Sin8='".$sin8."', Sin9='".$sin9."', Sin10='".$sin10."', Sin11='".$sin11."', Sin12='".$sin12."' WHERE idCliente=".$idCliente);
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
                                    <h5>Reporte detallado de siniestros</h5>
                                </div>
                                <div class="ibox-content">
                                    <form id="mcliente" name="mcliente" method="post" action="" class="form-horizontal">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Razon Social </label>
                                            <div class="col-sm-4"><input type="text" name="razonsocial" class="form-control" value="<?php echo $row["RazonSocial"] ?>">
                                            </div>
                                            <label class="col-sm-2 control-label">% Siniestralidad</label>
                                            <div class="col-sm-2"><input type="text" name="" class="form-control" value="<?php echo $row[""] ?>%">
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            
                                            <label class="col-sm-1 control-label">Enero</label>
                                            <div class="col-sm-2"><input type="text" name="enero" class="form-control m-b" value="$<?php echo $row["Enero"] ?>"></div>
                                            <label class="col-sm-1 control-label">Reembolso</label>
                                            <div class="col-sm-2"><input type="text" name="rem1" class="form-control m-b" value="<?php echo $row["Rem1"] ?>"></div>
                                            <label class="col-sm-1 control-label">Cntr(s)</label>
                                            <div class="col-sm-2"><input type="text" name="cntr1" placeholder="Sin registro" class="form-control m-b" value="<?php echo $row["Cntr1"] ?>"></div>
                                            <label class="col-sm-1 control-label">#Sin</label>
                                            <div class="col-sm-2"><input type="text" name="sin1" class="form-control m-b" value="<?php echo $row["Sin1"] ?>"></div>
                                            
                                            <label class="col-sm-1 control-label">Febrero</label>
                                            <div class="col-sm-2"><input type="text" name="febrero" class="form-control m-b" value="<?php echo $row["Febrero"] ?>"></div>
                                            <label class="col-sm-1 control-label">Reembolso</label>
                                            <div class="col-sm-2"><input type="text" name="rem2" class="form-control m-b" value="<?php echo $row["Rem2"] ?>"></div>
                                            <label class="col-sm-1 control-label">Cntr(s)</label>
                                            <div class="col-sm-2"><input type="text" name="cntr2" placeholder="Sin registro" class="form-control m-b" value="<?php echo $row["Cntr2"] ?>"></div>
                                            <label class="col-sm-1 control-label">#Sin</label>
                                            <div class="col-sm-2"><input type="text" name="sin2" class="form-control m-b" value="<?php echo $row["Sin2"] ?>"></div>
                                            
                                            <label class="col-sm-1 control-label">Marzo</label>
                                            <div class="col-sm-2"><input type="text" name="marzo" class="form-control m-b" value="<?php echo $row["Marzo"] ?>"></div>
                                            <label class="col-sm-1 control-label">Reembolso</label>
                                            <div class="col-sm-2"><input type="text" name="rem3" class="form-control m-b" value="<?php echo $row["Rem3"] ?>"></div>
                                            <label class="col-sm-1 control-label">Cntr(s)</label>
                                            <div class="col-sm-2"><input type="text" name="cntr3" placeholder="Sin registro" class="form-control m-b" value="<?php echo $row["Cntr3"] ?>"></div>
                                            <label class="col-sm-1 control-label">#Sin</label>
                                            <div class="col-sm-2"><input type="text" name="sin3" class="form-control m-b" value="<?php echo $row["Sin3"] ?>"></div>
                                            
                                            <label class="col-sm-1 control-label">Abril</label>
                                            <div class="col-sm-2"><input type="text" name="abril" class="form-control m-b" value="<?php echo $row["Abril"] ?>"></div>
                                            <label class="col-sm-1 control-label">Reembolso</label>
                                            <div class="col-sm-2"><input type="text" name="rem4" class="form-control m-b" value="<?php echo $row["Rem4"] ?>"></div>
                                            <label class="col-sm-1 control-label">Cntr(s)</label>
                                            <div class="col-sm-2"><input type="text" name="cntr4" placeholder="Sin registro" class="form-control m-b" value="<?php echo $row["Cntr4"] ?>"></div>
                                            <label class="col-sm-1 control-label">#Sin</label>
                                            <div class="col-sm-2"><input type="text" name="sin4" class="form-control m-b" value="<?php echo $row["Sin4"] ?>"></div>
                                            
                                            <label class="col-sm-1 control-label">Mayo</label>
                                            <div class="col-sm-2"><input type="text" name="mayo" class="form-control m-b" value="<?php echo $row["Mayo"] ?>"></div>
                                            <label class="col-sm-1 control-label">Reembolso</label>
                                            <div class="col-sm-2"><input type="text" name="rem5" class="form-control m-b" value="<?php echo $row["Rem5"] ?>"></div>
                                            <label class="col-sm-1 control-label">Cntr(s)</label>
                                            <div class="col-sm-2"><input type="text" name="cntr5" placeholder="Sin registro" class="form-control m-b" value="<?php echo $row["Cntr5"] ?>"></div>
                                            <label class="col-sm-1 control-label">#Sin</label>
                                            <div class="col-sm-2"><input type="text" name="sin5" class="form-control m-b" value="<?php echo $row["Sin5"] ?>"></div>
                                            
                                            <label class="col-sm-1 control-label">Junio</label>
                                            <div class="col-sm-2"><input type="text" name="junio" class="form-control m-b" value="<?php echo $row["Junio"] ?>"></div>
                                            <label class="col-sm-1 control-label">Reembolso</label>
                                            <div class="col-sm-2"><input type="text" name="rem6" class="form-control m-b" value="<?php echo $row["Rem6"] ?>"></div>
                                            <label class="col-sm-1 control-label">Cntr(s)</label>
                                            <div class="col-sm-2"><input type="text" name="cntr6" placeholder="Sin registro" class="form-control m-b" value="<?php echo $row["Cntr6"] ?>"></div>
                                            <label class="col-sm-1 control-label">#Sin</label>
                                            <div class="col-sm-2"><input type="text" name="sin6" class="form-control m-b" value="<?php echo $row["Sin6"] ?>"></div>
                                            
                                            <label class="col-sm-1 control-label">Julio</label>
                                            <div class="col-sm-2"><input type="text" name="julio" class="form-control m-b" value="<?php echo $row["Julio"] ?>"></div>
                                            <label class="col-sm-1 control-label">Reembolso</label>
                                            <div class="col-sm-2"><input type="text" name="rem7" class="form-control m-b" value="<?php echo $row["Rem7"] ?>"></div>
                                            <label class="col-sm-1 control-label">Cntr(s)</label>
                                            <div class="col-sm-2"><input type="text" name="cntr7" placeholder="Sin registro" class="form-control m-b" value="<?php echo $row["Cntr7"] ?>"></div>
                                            <label class="col-sm-1 control-label">#Sin</label>
                                            <div class="col-sm-2"><input type="text" name="sin7" class="form-control m-b" value="<?php echo $row["Sin7"] ?>"></div>
                                            
                                            <label class="col-sm-1 control-label">Agosto</label>
                                            <div class="col-sm-2"><input type="text" name="agosto" class="form-control m-b" value="<?php echo $row["Agosto"] ?>"></div>
                                            <label class="col-sm-1 control-label">Reembolso</label>
                                            <div class="col-sm-2"><input type="text" name="rem8" class="form-control m-b" value="<?php echo $row["Rem8"] ?>"></div>
                                            <label class="col-sm-1 control-label">Cntr(s)</label>
                                            <div class="col-sm-2"><input type="text" name="cntr8" placeholder="Sin registro" class="form-control m-b" value="<?php echo $row["Cntr8"] ?>"></div>
                                            <label class="col-sm-1 control-label">#Sin</label>
                                            <div class="col-sm-2"><input type="text" name="sin8" class="form-control m-b" value="<?php echo $row["Sin8"] ?>"></div>
                                            
                                            <label class="col-sm-1 control-label">Septiembre</label>
                                            <div class="col-sm-2"><input type="text" name="septiembre" class="form-control m-b" value="<?php echo $row["Septiembre"] ?>"></div>
                                            <label class="col-sm-1 control-label">Reembolso</label>
                                            <div class="col-sm-2"><input type="text" name="rem9" class="form-control m-b" value="<?php echo $row["Rem9"] ?>"></div>
                                            <label class="col-sm-1 control-label">Cntr(s)</label>
                                            <div class="col-sm-2"><input type="text" name="cntr9" placeholder="Sin registro" class="form-control m-b" value="<?php echo $row["Cntr9"] ?>"></div>
                                            <label class="col-sm-1 control-label">#Sin</label>
                                            <div class="col-sm-2"><input type="text" name="sin9" class="form-control m-b" value="<?php echo $row["Sin9"] ?>"></div>
                                            
                                            <label class="col-sm-1 control-label">Octubre</label>
                                            <div class="col-sm-2"><input type="text" name="octubre" class="form-control m-b" value="<?php echo $row["Octubre"] ?>"></div>
                                            <label class="col-sm-1 control-label">Reembolso</label>
                                            <div class="col-sm-2"><input type="text" name="rem10" class="form-control m-b" value="<?php echo $row["Rem10"] ?>"></div>
                                            <label class="col-sm-1 control-label">Cntr(s)</label>
                                            <div class="col-sm-2"><input type="text" name="cntr10" placeholder="Sin registro" class="form-control m-b" value="<?php echo $row["Cntr10"] ?>"></div>
                                            <label class="col-sm-1 control-label">#Sin</label>
                                            <div class="col-sm-2"><input type="text" name="sin10" class="form-control m-b" value="<?php echo $row["Sin10"] ?>"></div>
                                            
                                            <label class="col-sm-1 control-label">Noviembre</label>
                                            <div class="col-sm-2"><input type="text" name="noviembre" class="form-control m-b" value="<?php echo $row["Noviembre"] ?>"></div>
                                            <label class="col-sm-1 control-label">Reembolso</label>
                                            <div class="col-sm-2"><input type="text" name="rem11" class="form-control m-b" value="<?php echo $row["Rem11"] ?>"></div>
                                            <label class="col-sm-1 control-label">Cntr(s)</label>
                                            <div class="col-sm-2"><input type="text" name="cntr11" placeholder="Sin registro" class="form-control m-b" value="<?php echo $row["Cntr11"] ?>"></div>
                                            <label class="col-sm-1 control-label">#Sin</label>
                                            <div class="col-sm-2"><input type="text" name="sin11" class="form-control m-b" value="<?php echo $row["Sin11"] ?>"></div>
                                            
                                            <label class="col-sm-1 control-label">Diciembre</label>
                                            <div class="col-sm-2"><input type="text" name="diciembre" class="form-control m-b" value="<?php echo $row["Diciembre"] ?>"></div>
                                            <label class="col-sm-1 control-label">Reembolso</label>
                                            <div class="col-sm-2"><input type="text" name="rem12" class="form-control m-b" value="<?php echo $row["Rem12"] ?>"></div>
                                            <label class="col-sm-1 control-label">Cntr(s)</label>
                                            <div class="col-sm-2"><input type="text" name="cntr12" placeholder="Sin registro" class="form-control m-b" value="<?php echo $row["Cntr12"] ?>"></div>
                                            <label class="col-sm-1 control-label">#Sin</label>
                                            <div class="col-sm-2"><input type="text" name="sin12" class="form-control m-b" value="<?php echo $row["Sin12"] ?>"></div>
                                            
                                            <label class="col-sm-1 control-label">Total</label>
                                            <div class="col-sm-2"><input type="text" name="" class="form-control m-b" value="<?php echo number_format($row["Enero"]+$row["Febrero"]+$row["Marzo"]+$row["Abril"]+$row["Mayo"]+$row["Junio"]+$row["Julio"]+$row["Agosto"]+$row["Septiembre"]+$row["Octubre"]+$row["Noviembre"]+$row["Diciembre"],2, '.', ','); ?>"></div>
                                            <label class="col-sm-1 control-label">Total</label>
                                            <div class="col-sm-2"><input type="text" name="" class="form-control m-b" value="<?php echo number_format($row["Rem1"]+$row["Rem2"]+$row["Rem3"]+$row["Rem4"]+$row["Rem5"]+$row["Rem6"]+$row["Rem7"]+$row["Rem8"]+$row["Rem9"]+$row["Rem10"]+$row["Rem11"]+$row["Rem12"],2, '.', ','); ?>"></div>
                                            
                                            <div class="form-group">
                                                <div class="col-sm-4 col-sm-offset-8">
                                                    <button class="btn btn-primary" type="submit">Modificar</button>
                                                </div>
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
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
        <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="js/plugins/dataTables/datatables.min.js"></script>
        <script src="js/inspinia.js"></script>
        <script src="js/plugins/pace/pace.min.js"></script>
        <script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script>
            function formatear(dato) {
                return dato.replace(/./g, function(c, i, a) {
                    return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
                });
            }
            function calcular(){
                var valor = document.getElementById("valor").value;
                var valor2 = document.getElementById("valor2").value;
                var result= document.getElementById('result');
                var total= document.getElementById('total');
                var resultado3 = document.getElementById('resultado3');
                var descuento = parseInt(valor)*valor2/100;
                var iva = parseInt(valor)*valor2*1.16/100;
                var t = iva - descuento;
                result.innerHTML = 'Prima: ' + formatear(descuento.toFixed(2));
                total.innerHTML = 'Total: ' + formatear(iva.toFixed(2));
                resultado3.innerHTML = 'iva: ' + formatear(t.toFixed(2));
                $("#result-input").val(formatear(descuento.toFixed(2)));
                $("#resultado3-input").val(formatear(t.toFixed(2)));
                $("#total-input").val(formatear(iva.toFixed(2)))
            }
        </script>
    </body>
</html>

<!--SELECT SUM(Enero+Febrero+Marzo+Abril+Mayo) as resultado FROM clientes WHERE `idCliente` = 3 -->
