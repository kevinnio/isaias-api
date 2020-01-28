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
            <div class="wrapper wrapper-content animated fadeInRight">
                <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $razonSocial = $_POST["razonsocial"];
    $idCliente = $_POST["idCliente"];
    $fechaAlta = $_POST["fecha"];
    $cliente = $_POST["cliente"];
    $rfc = $_POST["rfc"];
    $moneda = $_POST["moneda"];
    $mercancia = $_POST["mercancia"];
    $importe = $_POST["importe"];
    $tipoOperacion = $_POST["TipoOperacion"];
    $detalles = $_POST["detalles"];
    $tipoTransporte = $_POST["TipoTransporte"];
    $fechaSalida = $_POST["FechaSalida"];
    $fechaLlegada = $_POST["FechaLlegada"];
    $folio = $_POST["folio"];
    $porigen = $_POST["porigen"];
    $eorigen = $_POST["eorigen"];
    $corigen = $_POST["corigen"];
    $pdestino = $_POST["pdestino"];
    $edestino = $_POST["edestino"];
    $cdestino = $_POST["cdestino"];
    $cuota = $_POST["cuota"];
    $prima = $_POST["prima"];
    $iva = $_POST["iva"];
    $total = $_POST["total"];
    
    
    query("UPDATE merca SET Cliente='$cliente', rfc='$rfc', moneda='$moneda', mercancia='$mercancia', importe='$importe', TipoOperacion='$tipoOperacion', detalles='$detalles', TipoTransporte='$tipoTransporte', FechaSalida='$fechaSalida', FechaLlegada='$fechaLlegada', folio='$folio', porigen='$porigen', eorigen='$eorigen', corigen='$corigen', pdestino='$pdestino', edestino='$edestino', cdestino='$cdestino', cuota='$cuota', prima='$prima', iva='$iva', total='$total', FechaAlta='".$fechaAlta."' WHERE idViaje=".$_GET["id"]);
}
                
if (isset($_GET["id"])) {
    $result=query("SELECT C.idCliente, UCASE(C.RazonSocial) AS 'RazonSocial', UCASE(C.RFC) AS 'RFC', UCASE(C.Calle) AS 'Calle', UCASE(C.Colonia) AS 'Colonia', UCASE(C.Municipio) AS 'Municipio', UCASE(C.Estado) AS 'Estado', UCASE(C.CP) AS 'CP',UCASE(M.Cliente) AS 'Cliente', UCASE(M.FechaAlta) AS 'FechaAlta', UCASE(M.rfc) AS 'rfc', UCASE(M.moneda) AS 'moneda', UCASE(M.mercancia) AS 'mercancia', UCASE(M.importe) AS 'importe', UCASE(M.TipoOperacion) AS 'TipoOperacion', UCASE(M.detalles) AS 'detalles', UCASE(M.TipoTransporte) AS 'TipoTransporte', UCASE(M.FechaSalida) AS 'FechaSalida', UCASE(M.FechaLlegada) AS 'FechaLlegada', UCASE(M.folio) AS 'folio', UCASE(M.porigen) AS 'porigen', UCASE(M.eorigen) AS 'eorigen', UCASE(M.corigen) AS 'corigen', UCASE(M.pdestino) AS 'pdestino', UCASE(M.edestino) AS 'edestino', UCASE(M.cdestino) AS 'cdestino', UCASE(M.cuota) AS 'cuota', UCASE(M.prima) AS 'prima', UCASE(M.iva) AS 'iva', UCASE(M.total) AS 'total' FROM merca M LEFT JOIN clientes C ON M.idCliente=C.idCliente WHERE M.idViaje=".$_GET["id"]);
    $rowp = mysqli_fetch_array($result);
}
?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                <form id="ncliente" name="ncliente" method="post" action="" class="form-horizontal">
                                    <div class="form-group">
                                        <h3 style="margin-left:20px;">Datos del Asegurado</h3>
                                        <label class="col-sm-2 control-label">Razon Social</label>
                                        <div class="col-sm-4">
                                            <input name="razonsocial" type="text" value="<?php echo $rowp["RazonSocial"]; ?>" autocomplete="off" class="typeahead_2 form-control" />
                                            <input id="idCliente" name="idCliente" type="hidden" value="<?php echo $row["idCliente"]; ?>" />
                                        </div>
                                        <label class="col-sm-2 control-label">Fecha Alta</label>
                                        <div class="col-sm-2"><input type="datetime-local" name="fecha" value="<?php echo date('Y-m-d\TH:i');?>" class="form-control"></div>
                                    </div>

                                    <div class="form-group">
                                        <h3 style="margin-left:20px;">Beneficiario Preferente</h3>
                                        <label class="col-sm-2 control-label">Cliente</label>
                                        <div class="col-sm-4"><input type="text" name="cliente" class="form-control m-b" value="<?php echo $rowp["Cliente"]; ?>"></div>

                                        <label class="col-sm-2 control-label">RFC</label>
                                        <div class="col-sm-3"><input type="text" name="rfc" class="form-control m-b" value="<?php echo $rowp["rfc"]; ?>"></div>
                                    </div>

                                    <div class="form-group">
                                        <h3 style="margin-left:20px;">Detalles del Certificado</h3>

                                        <label class="col-sm-2 control-label">Moneda</label>
                                        <div class="col-sm-2"><input type="text" name="moneda" class="form-control m-b" value="<?php echo $rowp["moneda"]; ?>"></div>
                                        <label class="col-sm-2 control-label">Estado de la Mercancia</label>
                                        <div class="col-sm-2"><input type="text" name="mercancia" class="form-control m-b" value="<?php echo $rowp["mercancia"]; ?>"></div>
                                        <label class="col-sm-2 control-label">Importe Asegurado</label>
                                        <div class="col-sm-2"><input id="valor" type="number" onkeyUp="calcular();" name="importe" class="form-control m-b" value="<?php echo $rowp["importe"]; ?>"></div></br></br></br>

                                        <label class="col-sm-2 control-label">Bienes Asegurados</label>
                                        <div class="col-sm-9"><input type="text" name="TipoOperacion" class="form-control m-b" value="<?php echo $rowp["TipoOperacion"]; ?>">
                                        </div>

                                        <label class="col-sm-3 control-label">Descripcion del Embarque</label>
                                        <div class="col-sm-8"><input type="text" name="detalles" class="form-control m-b" value="<?php echo $rowp["detalles"]; ?>"></div>
                                    </div>

                                    <div class="form-group">
                                        <h3 style="margin-left:20px;">Transito | Medio de Transporte</h3>


                                        <div class="col-sm-2"><input type="text" name="TipoTransporte" class="form-control m-b" value="<?php echo $rowp["TipoTransporte"]; ?>"></div>
                                        <label class="col-sm-1 control-label">Fecha de Salida</label>
                                        <div class="col-sm-2"><input type="text" name="FechaSalida" class="form-control m-b" value="<?php echo $rowp["FechaSalida"]; ?>"></div>

                                        <label class="col-sm-1 control-label">Fecha de Llegada</label>
                                        <div class="col-sm-2"><input type="text" name="FechaLlegada" class="form-control m-b" value="<?php echo $rowp["FechaLlegada"]; ?>"></div>

                                        <label class="col-sm-1 control-label">Folio Factura</label>
                                        <div class="col-sm-2"><input type="text" name="folio" class="form-control m-b" value="<?php echo $rowp["folio"]; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h3 style="margin-left:20px;">Origen y Destino</h3>

                                        <label class="col-sm-2 control-label">Pais Origen</label>
                                        <div class="col-sm-2"><input type="text" name="porigen" class="form-control m-b" value="<?php echo $rowp["porigen"]; ?>"></div>

                                        <label class="col-sm-2 control-label">Estado Origen</label>
                                        <div class="col-sm-2"><input type="text" name="eorigen" class="form-control m-b" value="<?php echo $rowp["eorigen"]; ?>"></div>

                                        <label class="col-sm-2 control-label">Ciudad Origen</label>
                                        <div class="col-sm-2"><input type="text" name="corigen" class="form-control m-b" value="<?php echo $rowp["corigen"]; ?>"></div>

                                        <label class="col-sm-2 control-label">Pais Destino</label>
                                        <div class="col-sm-2"><input type="text" name="pdestino" class="form-control m-b" value="<?php echo $rowp["pdestino"]; ?>"></div>

                                        <label class="col-sm-2 control-label">Estado Destino</label>
                                        <div class="col-sm-2"><input type="text" name="edestino" class="form-control m-b" value="<?php echo $rowp["edestino"]; ?>"></div>

                                        <label class="col-sm-2 control-label">Ciudad Destino</label>
                                        <div class="col-sm-2"><input type="text" name="cdestino" class="form-control m-b" value="<?php echo $rowp["cdestino"]; ?>"></div>
                                    </div>

                                    <div class="form-group">
                                        <h3 style="margin-left:20px;">Informacion de emision</h3>



                                        <label class="col-sm-2 control-label">Cuota Base (%)</label>
                                        <div class="col-sm-1"><input id="valor2" type="text" onkeyUp="calcular()" name="cuota" class="form-control m-b" value="<?php echo $rowp["cuota"]; ?>"></div>

                                        <label class="col-sm-1 control-label">Prima Neta</label>
                                        <div class="col-sm-2"><input type="text" id="result-input" name="prima" class="form-control m-b" value="<?php echo $rowp["prima"]; ?>"><span id="result" type="text" name="prima"></span></div>



                                        <label class="col-sm-1 control-label">IVA (16%)</label>
                                        <div class="col-sm-2"><input type="text" id="resultado3-input" name="iva" class="form-control m-b" value="<?php echo $rowp["iva"]; ?>"><span id="resultado3" type="text" name="iva"></span></div>

                                        <label class="col-sm-1 control-label">Total</label>
                                        <div class="col-sm-2"><input type="text" id="total-input" name="total" class="form-control m-b" value="<?php echo $rowp["total"]; ?>"><span id="total" type="text" name="total"></span></div>
                                    </div>


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
        $(document).ready(function() {
            $.get('inc/json-clientes.php', function(data) {
                $(".typeahead_2").typeahead({
                    source: data,
                    afterSelect: function(data) {
                        $('#idCliente').val(data.code);
                    }
                });
            }, 'json');
        });

    </script>
    <script>
        function formatear(dato) {
            return dato.replace(/./g, function(c, i, a) {
                return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
            });
        }

        function calcular() {
            //Obtienes el valor
            var valor = document.getElementById("valor").value;
            var valor2 = document.getElementById("valor2").value;

            var result = document.getElementById('result');
            var total = document.getElementById('total');
            var resultado3 = document.getElementById('resultado3');

            //le descuentas el 8% y lo agregas al HTML
            var descuento = parseInt(valor) * valor2 / 100;
            var iva = parseInt(valor) * valor2 * 1.16 / 100;
            var t = iva - descuento;

            //agrega los resultados al DOM
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
