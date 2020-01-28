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
    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet"><!--Revisar para tablas-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script><!--Paginado de tabs-->
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
    <form id="eliminarDatos">
        <div class="modal fade" data-backdrop="static" data-keyboard="false" id="dataDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <input type="hidden" id="idViaje" name="idViaje">
                    <h2 class="text-center text-muted">&iquest;Desea Eliminar Viaje?</h2>
                    <p class="lead text-muted text-center" style="display: block;margin:10px">Esta acci&oacute;n eliminar&aacute; de forma permanente el registro. &iquest;Deseas continuar?</p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-lg btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-lg btn-primary">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div id="siniestros" class="container-fluid">
        <table class="table table-bordered dataTables-example">
            <thead>
                <tr>
                    <th>Clave</th>
                    <th>Fecha</th>
                    <th>Referencia</th>
                    <th>Carta Porte</th>
                    <th>Cliente</th>
                    <th>Destino</th>
                    <th>Contenedor</th>
                    <!--<?php
                        if($_COOKIE["lvl"]==1){
                        ?>
                    <th>Pagado</th>
                    <?php
                        }
                        ?>-->
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
if($_COOKIE["lvl"]==1){
    $result=query("SELECT V.idViaje,V.CartaPorte,V.Referencia,C.RazonSocial AS Cliente,V.Destino,V.Contenedor1,V.Contenedor2,V.Contenedor3,V.Contenedor4,V.Contenedor5,V.Contenedor6,V.Contenedor7,V.Contenedor8,V.Contenedor9,V.Contenedor10,V.FechaAlta,V.Pagado FROM viajes V LEFT JOIN clientes C ON V.idCliente=C.idCliente ORDER BY V.idViaje DESC LIMIT 0,1000");
}else{
    $result=query("SELECT V.idViaje,V.Referencia,V.CartaPorte,C.RazonSocial AS Cliente,V.Destino,V.Contenedor1,V.Contenedor2,V.Contenedor3,V.Contenedor4,V.Contenedor5,V.Contenedor6,V.Contenedor7,V.Contenedor8,V.Contenedor9,V.Contenedor10,V.FechaAlta FROM viajes V LEFT JOIN clientes C ON V.idCliente=C.idCliente WHERE V.idCliente=".$_COOKIE["idUsuario"]." ORDER BY V.idViaje DESC LIMIT 0,200");
}
$contenedores="";
while($row = mysqli_fetch_array($result)) {
$contenedores="";
for ($i=1; $i <=10 ; $i++) {
    $contenedor='Contenedor'.$i; 
    if($row[$contenedor] != ''){
        $contenedores.=(empty($contenedores))? $row[$contenedor]: ' - '.$row[$contenedor];
    }
}
?>
                <tr class="gradeA" style="text-align:center;">
                    <td><?php echo $row["idViaje"]; ?></td>
                    <td style="width:110px"><?php echo $row["FechaAlta"]; ?></td>
                    <td><?php echo $row["CartaPorte"]; ?></td>
                    <td><?php echo $row["Referencia"]; ?></td>
                    <td><?php echo $row["Cliente"]; ?></td>
                    <td><?php echo $row["Destino"]; ?></td>
                    <td><?php echo $contenedores; ?></td>
                    <!--<?php
if($_COOKIE["lvl"]==1){
?>
                    <td><?php echo $row["Pagado"]; ?></td>
                    <?php
}
?>-->
                    <?php
if($_COOKIE["lvl"]==2){
?>
                    <td style="width:16%">
                        <a title="Pdf" href="poliza.php?id=<?php echo $row["idViaje"]; ?>" target="_blank" class="btn btn-info btn-bitbucket btn-sm"><i class="fa fa-file-pdf-o "></i></a>
                        <?php
}
?>
                        <?php
if($_COOKIE["lvl"]==3){
?>
                    <td style="width:16%">
                        <a title="Pdf" href="poliza2.php?id=<?php echo $row["idViaje"]; ?>" target="_blank" class="btn btn-info btn-bitbucket btn-sm"><i class="fa fa-file-pdf-o "></i></a>
                        <?php
}
?>
                        <?php
if($_COOKIE["lvl"]==1){
?>
                    <td style="width:16%">
                        <a title="Pdf" href="poliza.php?id=<?php echo $row["idViaje"]; ?>" target="_blank" class="btn btn-info btn-bitbucket btn-sm"><i class="fa fa-file-pdf-o "></i></a>
                        <a title="Editar" href="modificar-viaje.php?id=<?php echo $row["idViaje"]; ?>" class="btn btn-warning btn-bitbucket btn-sm"><i class="fa fa-pencil"></i></a>
                        <button title="Eliminar" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#dataDelete" data-id="<?php echo $row['idViaje']?>"><i class='glyphicon glyphicon-trash'></i></button>
                        <!--<a title="Facturar" href="pagar-viaje.php?id=<?php echo $row["idViaje"]; ?>" class="btn btn-success btn-bitbucket btn-sm"><i class="glyphicon glyphicon-usd"></i></a>-->
                        <?php
}
?>
                    </td>
                </tr>
                <?php
}
?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Clave</th>
                    <th>Fecha</th>
                    <th>Referencia</th>
                    <th>Carta Porte</th>
                    <th>Cliente</th>
                    <th>Destino</th>
                    <th>Contenedor</th>
                    <!--<?php
if($_COOKIE["lvl"]==1){
?>
                    <th>Pagado</th>
                    <?php
}
?>-->
                    <th>Acciones</th>
                </tr>
            </tfoot>
        </table>
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
    <script>
        $('#dataDelete').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Botón que activó el modal
            var id = button.data('id') // Extraer la información de atributos de datos
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


<!--<?php
    require_once("inc/functions.php");
    if(!isset($_COOKIE["idUsuario"])) {
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>CONTAINER ALL RISK</title>
    <meta charset="utf-8">
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
    <meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    <link href="css/style.css" rel="stylesheet">
    <style>
        body {
            font: 400 15px Lato, sans-serif;
            line-height: 1.8;
            color: #818181;
        }

        h2 {
            font-size: 24px;
            text-transform: uppercase;
            color: #303030;
            font-weight: 600;
            margin-bottom: 30px;
        }

        h4 {
            font-size: 19px;
            line-height: 1.375em;
            color: #303030;
            font-weight: 400;
            margin-bottom: 30px;
        }

        .jumbotron {
            background-color: #000;
            color: #fcc10f;

            font-family: Montserrat, sans-serif;
        }

        /*.container-fluid {
                padding: 60px 50px;
            }*/
        .bg-grey {
            background-color: #f6f6f6;
        }

        .logo-small {
            color: #fcc10f;
            font-size: 50px;
        }

        .logo {
            color: #fcc10f;
            font-size: 200px;
        }

        .thumbnail {
            padding: 0 0 15px 0;
            border: none;
            border-radius: 0;
        }

        .thumbnail img {
            width: 100%;
            height: 100%;
            margin-bottom: 10px;
        }

        .carousel-control.right,
        .carousel-control.left {
            background-image: none;
            color: #fcc10f;
        }

        .carousel-indicators li {
            border-color: #fcc10f;
        }

        .carousel-indicators li.active {
            background-color: #fcc10f;
        }

        .item h4 {
            font-size: 19px;
            line-height: 1.375em;
            font-weight: 400;
            font-style: italic;
            margin: 70px 0;
        }

        .item span {
            font-style: normal;
        }

        .panel {
            border: 1px solid #fcc10f;
            border-radius: 0 !important;
            transition: box-shadow 0.5s;
        }

        .panel:hover {
            box-shadow: 5px 0px 40px rgba(0, 0, 0, .2);
        }

        .panel-footer .btn:hover {
            border: 1px solid #fcc10f;
            background-color: #fff !important;
            color: #fcc10f;
        }

        .panel-heading {
            color: #fff !important;
            background-color: #fcc10f !important;
            padding: 25px;
            border-bottom: 1px solid transparent;
            border-top-left-radius: 0px;
            border-top-right-radius: 0px;
            border-bottom-left-radius: 0px;
            border-bottom-right-radius: 0px;
        }

        .panel-footer {
            background-color: white !important;
        }

        .panel-footer h3 {
            font-size: 32px;
        }

        .panel-footer h4 {
            color: #aaa;
            font-size: 14px;
        }

        .panel-footer .btn {
            margin: 15px 0;
            background-color: #fcc10f;
            color: #fff;
        }

        .navbar {
            margin-bottom: 0;
            background-color: #0000;
            z-index: 9999;
            border: 0;
            font-size: 12px !important;
            line-height: 1.42857143 !important;
            letter-spacing: 4px;
            border-radius: 0;
            font-family: Montserrat, sans-serif;
        }

        .navbar li a,
        .navbar .navbar-brand {
            color: #fcc10f !important;
        }

        .navbar-nav li a:hover,
        .navbar-nav li.active a {
            color: #fcc10f !important;
            background-color: #0000 !important;
        }

        .navbar-default .navbar-toggle {
            border-color: transparent;
            color: #fcc10f !important;
        }

        footer .glyphicon {
            font-size: 20px;
            margin-bottom: 20px;
            color: #fcc10f;
        }

        .slideanim {
            visibility: hidden;
        }

        .slide {
            animation-name: slide;
            -webkit-animation-name: slide;
            animation-duration: 1s;
            -webkit-animation-duration: 1s;
            visibility: visible;
        }

        @keyframes slide {
            0% {
                opacity: 0;
                transform: translateY(70%);
            }

            100% {
                opacity: 1;
                transform: translateY(0%);
            }
        }

        @-webkit-keyframes slide {
            0% {
                opacity: 0;
                -webkit-transform: translateY(70%);
            }

            100% {
                opacity: 1;
                -webkit-transform: translateY(0%);
            }
        }

        @media screen and (max-width: 768px) {
            .col-sm-4 {
                text-align: center;
                margin: 25px 0;
            }

            .btn-lg {
                width: 100%;
                margin-bottom: 35px;
            }
        }

        @media screen and (max-width: 480px) {
            .logo {
                font-size: 150px;
            }
        }

        ul,
        ol {
            list-style: none;
        }

        .nav>li {
            float: left;
        }

        .nav li a {
            color: #fff;
            text-decoration: none;
            padding: 10px 12px;
            display: block;
        }

        .nav li a:hover {
            background-color: #434343;
        }

        .nav li ul {
            display: none;
            position: absolute;
            min-width: 140px;
        }

        .nav li:hover>ul {
            display: block;
        }

        .nav li ul li {
            position: relative;
        }

        .nav li ul li ul {
            right: -140px;
            top: 0px;
        }

    </style>
</head>

<body id="inicio" data-spy="scroll" data-target=".navbar" data-offset="60">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a href=#><img src="img/car-w.png" width="85"></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">

                    <?php
            if($_COOKIE["lvl"]==2){
            ?>
                    <li>
                        <a href="modificar-cliente.php?id=<?php echo $_COOKIE["idUsuario"]; ?>"><i class="fa fa-user"></i> Mis datos</a>
                    </li>
                    <?php
                }else{
            ?>
                    <li>
                        <a href="#"><i class="fa fa-user"></i> Clientes <i class="fa arrow"></i></a>
                        <ul class="nav nav-second-level">
                            <li><a href="clientes.php">Todos los clientes</a></li>
                            <li><a href="nuevo-cliente.php">Nuevo cliente</a></li>
                        </ul>
                    </li>
                    <?php
            }
            ?>
                    <li>
                        <a href="viajes.php"><i class="fa fa-truck"></i> <i class="nav-label">Viajes</i> <i class="fa arrow"></i></a>
                        <ul class="nav nav-second-level">
                            <li><a href="viajes.php">Todos los viajes</a></li>
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
                    <!--<?php
            if($_COOKIE["lvl"]==1){
            ?>
            <li>
                <a href="usuarios.php"><i class="fa fa-user"></i> <i class="nav-label"> Usuarios</i></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-line-chart"></i> <i class="nav-label">Reportes</i> <i class="fa arrow"></i></a>
                <ul class="nav nav-second-level">
                    <li><a href="reportes.php">Reporte general</a></li>
                    <li><a href="reportes-detallado.php">Reporte detallado</a></li>
                </ul>
            </li>
                    <li>
                        <a href="mercancias.php"><i class="fa fa-archive"></i> <i class="nav-label"> Mercancias</i></a>
                    </li>
                    <?php
            }
            ?>
                    <!--<li>
                        <a href="contacto.php"><i class="fa fa-book"></i> <i class="nav-label">Contacto</i></a>
                    </li>

                    <li>
                        <a href="inc/logout.php"><i class="fa fa-sign-out"></i> <i class="nav-label">Cerrar sesi&oacute;n</i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <form id="eliminarDatos">
        <div class="modal fade" data-backdrop="static" data-keyboard="false" id="dataDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <input type="hidden" id="idViaje" name="idViaje">
                    <h2 class="text-center text-muted">&iquest;Decea Eliminar Viaje?</h2>
                    <p class="lead text-muted text-center" style="display: block;margin:10px">Esta acci&oacute;n eliminar&aacute; de forma permanente el registro. &iquest;Deseas continuar?</p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-lg btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-lg btn-primary">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="jumbotron text-center">
        <!--<h1>CONTAINER ALL RISK</h1> 
            <p>&#x1F512; Proteccion de Mercancia y Contenedor &#x1F512;</p>
            <h1><?php echo $_COOKIE["usuario"]; ?></h1>

    </div>
    <div id="siniestros" class="container-fluid">

        <table class="table table-striped table-bordered table-hover dataTables-example">
            <thead>
                <tr>
                    <th>Clave</th>
                    <th>Fecha</th>
                    <th>Referencia</th>
                    <th>Carta Porte</th>
                    <th>Cliente</th>
                    <th>Destino</th>
                    <th>Contenedor</th>
                    <?php
                        if($_COOKIE["lvl"]==1){
                        ?>
                    <th>Pagado</th>
                    <?php
                        }
                        ?>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
if($_COOKIE["lvl"]==1){
    $result=query("SELECT V.idViaje,V.CartaPorte,V.Referencia,C.RazonSocial AS Cliente,V.Destino,V.Contenedor1,V.Contenedor2,V.Contenedor3,V.Contenedor4,V.Contenedor5,V.Contenedor6,V.Contenedor7,V.Contenedor8,V.Contenedor9,V.Contenedor10,V.FechaAlta,V.Pagado FROM viajes V LEFT JOIN clientes C ON V.idCliente=C.idCliente ORDER BY V.idViaje DESC LIMIT 0,20");
}else{
    $result=query("SELECT V.idViaje,V.Referencia,V.CartaPorte,C.RazonSocial AS Cliente,V.Destino,V.Contenedor1,V.Contenedor2,V.Contenedor3,V.Contenedor4,V.Contenedor5,V.Contenedor6,V.Contenedor7,V.Contenedor8,V.Contenedor9,V.Contenedor10,V.FechaAlta FROM viajes V LEFT JOIN clientes C ON V.idCliente=C.idCliente WHERE V.idCliente=".$_COOKIE["idUsuario"]." ORDER BY V.idViaje DESC LIMIT 0,200");
    //$result=query("SELECT * FROM clientes WHERE idCliente=".$_COOKIE["idUsuario"]);
}
$contenedores="";
while($row = mysqli_fetch_array($result)) {
$contenedores="";
for ($i=1; $i <=10 ; $i++) {
    $contenedor='Contenedor'.$i; 
    if($row[$contenedor] != ''){
        
        $contenedores.=(empty($contenedores))? $row[$contenedor]: ' - '.$row[$contenedor];
    }
}
?>
                <tr class="gradeA" style="text-align:center;">
                    <td><?php echo $row["idViaje"]; ?></td>
                    <td style="width:110px"><?php echo $row["FechaAlta"]; ?></td>
                    <td><?php echo $row["CartaPorte"]; ?></td>
                    <td><?php echo $row["Referencia"]; ?></td>
                    <td><?php echo $row["Cliente"]; ?></td>
                    <td><?php echo $row["Destino"]; ?></td>
                    <td><?php echo $contenedores; ?></td>
                    <?php
if($_COOKIE["lvl"]==1){
?>
                    <td><?php echo $row["Pagado"]; ?></td>
                    <?php
}
?>
                    <?php
if($_COOKIE["lvl"]==2){
?>
                    <td style="width:16%">
                        <a title="Pdf" href="poliza.php?id=<?php echo $row["idViaje"]; ?>" target="_blank" class="btn btn-info btn-bitbucket btn-sm"><i class="fa fa-file-pdf-o "></i></a>
                        <?php
}
?>
                        <?php
if($_COOKIE["lvl"]==3){
?>
                    <td style="width:16%">
                        <a title="Pdf" href="poliza2.php?id=<?php echo $row["idViaje"]; ?>" target="_blank" class="btn btn-info btn-bitbucket btn-sm"><i class="fa fa-file-pdf-o "></i></a>
                        <?php
}
?>
                        <?php
if($_COOKIE["lvl"]==1){
?>
                    <td style="width:16%">
                        <a title="Pdf" href="poliza.php?id=<?php echo $row["idViaje"]; ?>" target="_blank" class="btn btn-info btn-bitbucket btn-sm"><i class="fa fa-file-pdf-o "></i></a>

                        <a title="Editar" href="modificar-viaje.php?id=<?php echo $row["idViaje"]; ?>" class="btn btn-warning btn-bitbucket btn-sm"><i class="fa fa-pencil"></i></a>

                        <button title="Eliminar" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#dataDelete" data-id="<?php echo $row['idViaje']?>"><i class='glyphicon glyphicon-trash'></i></button>

                        <a title="Facturar" href="pagar-viaje.php?id=<?php echo $row["idViaje"]; ?>" class="btn btn-success btn-bitbucket btn-sm"><i class="glyphicon glyphicon-usd"></i></a>


                        <?php
}
?>



                    </td>
                </tr>
                <?php
}
?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Clave</th>
                    <th>Fecha</th>
                    <th>Referencia</th>
                    <th>Carta Porte</th>
                    <th>Cliente</th>
                    <th>Destino</th>
                    <th>Contenedor</th>
                    <?php
if($_COOKIE["lvl"]==1){
?>
                    <th>Pagado</th>
                    <?php
}
?>
                    <th>Acciones</th>
                </tr>
            </tfoot>
        </table>
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


    <script>
        $('#dataDelete').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Botón que activó el modal
            var id = button.data('id') // Extraer la información de atributos de datos
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
</body>

</html>-->
