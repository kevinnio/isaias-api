<?php
require_once("inc/functions.php");
if(!isset($_COOKIE["idUsuario"])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pagar viaje - Container All Risk</title>
    <link rel="shortcut icon" href="favicon.ico" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <!-- Toastr style -->
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <!-- Gritter -->
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
                <ul class="nav navbar-top-links navbar-right">
                    <li><span class="m-r-sm text-muted welcome-message">Bienvenido a SE app.</span></li>
                    <li><a href="inc/logout.php"><i class="fa fa-sign-out"></i>Cerrar sesión</a></li>
                </ul>
            </nav>
        </div>
        <div class="row  border-bottom white-bg dashboard-header">
            <h1 style='font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;font-weight: 400;color: #23282d;font-size: 23px;padding: 9px 0 4px;line-height: 29px;font-weight: 400;'>Pagar viaje</h1>
            <ol class="breadcrumb">
                <li>
                    <a href="index.php">Inicio</a>
                </li>
                <li>
                    Viajes
                </li>
                <li class="active">
                    <strong>Viajes</strong>
                </li>
            </ol>
        </div>
            <div class="wrapper wrapper-content animated fadeInRight">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $razonSocial = $_POST["razonsocial"];
    $idCliente = $_POST["idCliente"];
    $cliente = $_POST["cliente"];
    $tipoContenedor = $_POST["tipoContenedor"];
    $contenedor1 = $_POST["contenedor1"];
    $contenedor2 = $_POST["contenedor2"];
    $pagado1 = $_POST["pagado1"];
    $cartaPorte = $_POST["cartaPorte"];
    $referencia = $_POST["referencia"];
    $origen = $_POST["origen"];
    $destino = $_POST["destino"];
    $placa = $_POST["placas"];
    $operador = $_POST["operador"];
    $tipoOperacion = $_POST["tipoOperacion"];
    //$fechaAlta = $_POST["fecha"];

    query("UPDATE viajes SET Cliente='".$cliente."', idTipoContenedor=".$tipoContenedor.", Contenedor1='".$contenedor1."', Contenedor2='".$contenedor2."', Pagado='".$pagado1."',
    Referencia='".$referencia."', CartaPorte='".$cartaPorte."', Origen='".$origen."', Destino='".$destino."', Placas='".$placa."', Operador='".$operador."',
    TipoOperacion='".$tipoOperacion."' WHERE idViaje=".$_GET["id"]);
}

if (isset($_GET["id"])) {
    $result=query("SELECT C.idCliente,UCASE(C.RazonSocial) AS 'RazonSocial',UCASE(V.Cliente) AS 'Cliente', TC.idTipoContenedor, UCASE(TC.TipoContenedor) AS 'TipoContenedor', UCASE(V.Contenedor1) AS 'Contenedor1', UCASE(V.Contenedor2) AS 'Contenedor2', UCASE(V.Pagado) AS 'Pagado', UCASE(V.Referencia) AS 'Referencia', V.CartaPorte, V.Origen, V.Destino, V.Placas, V.Operador, UCASE(V.TipoOperacion) AS 'TipoOperacion', V.FechaAlta, S.Precio, S.LimitMaxRespons, S.DeducibleMaterial, S.DeducibleRobo FROM viajes V LEFT JOIN clientes C ON V.idCliente=C.idCliente LEFT JOIN Servicios S ON (V.idTipoContenedor=S.idTipoContenedor and V.idCliente=S.idCliente) LEFT JOIN TiposContenedores TC ON TC.idTipoContenedor=V.idTipoContenedor WHERE V.idViaje=".$_GET["id"]);
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
                                    <div class="col-sm-4"><input type="text" name="contenedor1" class="form-control m-b" value="<?php echo $rowp["Contenedor1"]; ?>"></div>
                                    
                                    <label class="col-sm-2 control-label">Contenedor 2</label>
                                    <div class="col-sm-4"><input type="text" name="contenedor2" class="form-control m-b" value="<?php echo $rowp["Contenedor2"]; ?>"></div>
                                    
                                    <label class="col-sm-2 control-label">Pagado</label>
                                    <div class="col-sm-4"><input type="text" name="pagado1" class="form-control m-b" value="<?php echo $rowp["Pagado"]; ?>"></div>
                                    
                                </div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <h3 style="margin-left:20px;">Datos del Viaje</h3>
                                    
                                    <label class="col-sm-2 control-label">No de Carta Porte</label>
                                    <div class="col-sm-4"><input type="text" name="cartaPorte" class="form-control m-b" value="<?php echo $rowp["CartaPorte"]; ?>"></div>
                                    <label class="col-sm-2 control-label">No de referencia</label>
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