<?php
    require_once("inc/functions.php");
    if(!isset($_COOKIE["idUsuario"])) {
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="es">

<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>CONTAINER ALL RISK</title>
    <link rel="shortcut icon" href="favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="favicon.ico" />
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
                $cliente = $_POST["cliente"];
                $tipoContenedor = $_POST["tipoContenedor"];
                $contenedores=[];
                $contenedores['Contenedor1']=strtoupper(trim($_POST['contenedor1']));
                $contenedores['Contenedor2']=strtoupper(trim($_POST['contenedor2']));
                $contenedores['Contenedor3']=strtoupper(trim($_POST['contenedor3']));
                $contenedores['Contenedor4']=strtoupper(trim($_POST['contenedor4']));
                $contenedores['Contenedor5']=strtoupper(trim($_POST['contenedor5']));
                $contenedores['Contenedor6']=strtoupper(trim($_POST['contenedor6']));
                $contenedores['Contenedor7']=strtoupper(trim($_POST['contenedor7']));
                $contenedores['Contenedor8']=strtoupper(trim($_POST['contenedor8']));
                $contenedores['Contenedor9']=strtoupper(trim($_POST['contenedor9']));
                $contenedores['Contenedor10']=strtoupper(trim($_POST['contenedor10']));
                $tipoOperacion = $_POST["tipoOperacion"];
                $fechaAlta = $_POST["fecha"];
                if($contenedores['Contenedor10']=='X'){
                    $contenedores['Contenedor10']='';
                }
                $cantCont=0;
                foreach ($contenedores as $contenedor) {
                    if($contenedor <> ''){
                        $cantCont++;
                    }
                }
                ini_set('max_execution_time', 15); //300 seconds = 5 minutes
                $asegurados=[];
                foreach ($contenedores as $contenedor => $value) {
                    if($value != ""){
                        $sql="SELECT * FROM viajes WHERE Contenedor1='".$value."' OR Contenedor2='".$value."' OR Contenedor3='".$value."' OR Contenedor4='".$value."' OR Contenedor5='".$value."' OR Contenedor6='".$value."' OR Contenedor7='".$value."' OR Contenedor8='".$value."' OR Contenedor9='".$value."' OR Contenedor10='".$value."'";
                        $consulta = query($sql);
                        $row_cnt = mysqli_num_rows($consulta);
                        if ($row_cnt){
                            $asegurados[]=$contenedor;
                        }
                    }
                }
                if(count($asegurados) > 0){
                    echo  $razonSocial." No se guardo registro, contenedores repetidos: ".'<br>';
                    foreach ($asegurados as $contenedor) {
                        echo $contenedor." -> ".$value.'<br>';
                    }
                }else{
                    query("INSERT INTO viajes (idCliente, Cliente, idTipoContenedor, Contenedor1, Contenedor2, Contenedor3, Contenedor4, Contenedor5, Contenedor6, Contenedor7, Contenedor8, Contenedor9, Contenedor10, CantCont, TipoOperacion, FechaAlta) VALUES (".$idCliente.",'".$cliente."',".$tipoContenedor.",'".$contenedores['Contenedor1']."','".$contenedores['Contenedor2']."','".$contenedores['Contenedor3']."','".$contenedores['Contenedor4']."','".$contenedores['Contenedor5']."','".$contenedores['Contenedor6']."','".$contenedores['Contenedor7']."','".$contenedores['Contenedor8']."','".$contenedores['Contenedor9']."','".$contenedores['Contenedor10']."', ".$cantCont.", '".$tipoOperacion."', '".$fechaAlta."')"); 
                }
   
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
                                    <input name="razonsocial" type="text" autocomplete="off" required title="Completar campo" class="typeahead_2 form-control" <?php
if($_COOKIE["lvl"]==2){
    echo 'value="'. $_COOKIE["usuario"] . '" disabled';
}
?> />
                                    <input id="idCliente" name="idCliente" type="hidden" value="<?php
if($_COOKIE["lvl"]==2){
    echo $_COOKIE["idUsuario"];
}
?>" />
                                </div>
                                <label class="col-sm-2 control-label">Fecha</label>
                                <div class="col-sm-4"><input type="datetime-local" name="fecha" value="<?php echo date('Y-m-d\TH:i');?>" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <h3 style="margin-left:20px;">Datos del Contenedor</h3>
                                <label class="col-sm-2 control-label">Cliente</label>
                                <div class="col-sm-4"><input type="text" name="cliente" required title="Completar campo" class="form-control m-b" required></div>

                                <label class="col-sm-2 control-label">Tipo de Contenedor</label>
                                <div class="col-sm-4">
                                    <select name="tipoContenedor" id="tipoContenedor" required title="Seleccionar tipo de contenedor" class="form-control m-b" required>
                                        <option value="0">Selecciona el tipo de contenedor</option><?php $result=query("SELECT * FROM TiposContenedores ORDER BY TipoContenedor ASC;");while($row = mysqli_fetch_array($result)) {?>
                                        <option value="<?php echo $row["idTipoContenedor"]; ?>"><?php echo $row["TipoContenedor"]; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <label class="col-sm-2 control-label">Contenedor 1</label>
                                <div class="col-sm-4"><input type="text" placeholder="ej: ABCD1234567  sin caracteres ( - , . @)" name="contenedor1" class="form-control m-b" required title="El formato debe tener 4 letras mayúsculas y 7 números" maxlength="11"></div>

                                <label class="col-sm-2 control-label">Contenedor 2</label>
                                <div class="col-sm-4"><input type="text" placeholder="ej: ABCD1234567  sin caracteres ( - , . @)" name="contenedor2" class="form-control m-b" required title="El formato debe tener 4 letras mayúsculas y 7 números" maxlength="11"></div>

                                <label class="col-sm-2 control-label">Contenedor 3</label>
                                <div class="col-sm-4"><input type="text" placeholder="ej: ABCD1234567  sin caracteres ( - , . @)" name="contenedor3" class="form-control m-b" maxlength="11"></div>

                                <label class="col-sm-2 control-label">Contenedor 4</label>
                                <div class="col-sm-4"><input type="text" placeholder="ej: ABCD1234567  sin caracteres ( - , . @)" name="contenedor4" class="form-control m-b" maxlength="11"></div>

                                <label class="col-sm-2 control-label">Contenedor 5</label>
                                <div class="col-sm-4"><input type="text" placeholder="ej: ABCD1234567  sin caracteres ( - , . @)" name="contenedor5" class="form-control m-b" maxlength="11"></div>

                                <label class="col-sm-2 control-label">Contenedor 6</label>
                                <div class="col-sm-4"><input type="text" placeholder="ej: ABCD1234567  sin caracteres ( - , . @)" name="contenedor6" class="form-control m-b" maxlength="11"></div>

                                <label class="col-sm-2 control-label">Contenedor 7</label>
                                <div class="col-sm-4"><input type="text" placeholder="ej: ABCD1234567  sin caracteres ( - , . @)" name="contenedor7" class="form-control m-b" maxlength="11"></div>

                                <label class="col-sm-2 control-label">Contenedor 8</label>
                                <div class="col-sm-4"><input type="text" placeholder="ej: ABCD1234567  sin caracteres ( - , . @)" name="contenedor8" class="form-control m-b" maxlength="11"></div>

                                <label class="col-sm-2 control-label">Contenedor 9</label>
                                <div class="col-sm-4"><input type="text" placeholder="ej: ABCD1234567  sin caracteres ( - , . @)" name="contenedor9" class="form-control m-b" maxlength="11"></div>

                                <label class="col-sm-2 control-label">Contenedor 10</label>
                                <div class="col-sm-4"><input type="text" placeholder="ej: ABCD1234567  sin caracteres ( - , . @)" name="contenedor10" class="form-control m-b" maxlength="11"></div>


                                <label class="col-sm-2 control-label">Tipo de Operacion</label>
                                <div class="col-sm-4">
                                    <select name="tipoOperacion" id="tipoOperacion" class="form-control">
                                        <option value="Impo">Impo</option>
                                        <option value="Expo">Expo</option>
                                        <option value="Ambos">Ambos</option>
                                    </select>
                                </div>

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
<script>
        $(document).ready(function() {
            $(".navbar a, footer a[href='#inicio']").on('click', function(event) {
                if (this.hash !== "") {
                    event.preventDefault();
                    var hash = this.hash;
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 900, function() {
                        window.location.hash = hash;
                    });
                }
            });
            $(window).scroll(function() {
                $(".slideanim").each(function() {
                    var pos = $(this).offset().top;
                    var winTop = $(window).scrollTop();
                    if (pos < winTop + 600) {
                        $(this).addClass("slide");
                    }
                });
            });
        })

    </script>

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
        $(document).ready(function() {
            $.get('inc/json-clientes.php', function(data) {
                $(".typeahead_2").typeahead({
                    source: data,
                    afterSelect: function(data) {
                        $('#idCliente').val(data.code);
                    }
                });
            }, 'json');

            $("#ncliente").validate({
                rules: {
                    razonsocial: {
                        required: true,
                        minlength: 5
                    },
                    cliente: {
                        required: true,
                        minlength: 5
                    },
                    tipoContenedor: {
                        required: true,
                        min: 1
                    },
                    contenedor1: {
                        required: true,
                        minlength: 11
                    }
                }
            });
        });

    </script>

    <script>
        $('#dataDelete').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Bot�n que activ� el modal
            var id = button.data('id') // Extraer la informaci�n de atributos de datos
            var modal = $(this)
            modal.find('#idViaje').val(id)
        })

        $("#eliminarDatos").submit(function(event) {
            var parametros = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "eliminar-viaje.php",
                data: parametros,

                beforeSend: function(objeto) {
                    $(".datos_ajax_delete").html("Mensaje: Cargando...");
                },
                success: function(datos) {
                    $(".datos_ajax_delete").html(datos);
                    var url = "viajes.php";
                    setTimeout(function() {
                        $(location).attr('href', url);
                    }, 2000);
                    $('#dataDelete').modal('hide');
                    load(1);
                }
            });
            event.preventDefault();
        });

        $(document).ready(function() {
            $('.dataTables-example').DataTable({
                pageLength: 10,
                responsive: true,
                "order": [
                    [0, "desc"]
                ],
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [{
                        extend: 'copy'
                    },
                    {
                        extend: 'csv'
                    },
                    {
                        extend: 'excel',
                        title: 'ExampleFile'
                    },
                    {
                        extend: 'pdf',
                        title: 'ExampleFile'
                    },

                    {
                        extend: 'print',
                        customize: function(win) {
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    }
                ]

            });

        });

    </script>


    <script src="js/nav.jquery.min.js"></script>
    <script>
        $('.nav').nav();

    </script>

</body>

</html>
