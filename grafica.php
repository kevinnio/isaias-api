<!DOCTYPE html>
<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    
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
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
    <script src="librerias/jquery-3.4.1.min.js"></script>
    <script src="librerias/plotly-latest.min.js"></script>

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

    <div class="container">
        <div class="row">
            <div class="col-sm-13">
                <div class="panel panel-primary">
                    <div class="panel panel-heading">
                        <center>REPORTE ANUAL DE MERCANCIAS</center>
                    </div>
                    <div class="panel panel-body">
                        <div class="row">
                            <div class="col-sm-13">
                                <div id="cargaLineal"></div>
                            </div>
                            <div class="col-sm-13">
                                <div id="cargaBarras"></div>
                            </div>
                            <div class="col-sm-13">
                                <div id="cargaPastel"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script type="text/javascript">
    $(document).ready(function() {
        $('#cargaLineal').load('lineal.php');
        $('#cargaBarras').load('barras.php');
        $('#cargaPastel').load('pastel.php');
    });

</script>

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
