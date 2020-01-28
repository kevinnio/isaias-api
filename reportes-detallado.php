<?php
    require_once("inc/functions.php");
    if(!isset($_COOKIE["idUsuario"])) {
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en" class="nav-no-js">

<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    
    
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
                    $idCliente=0;
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $razonSocial = $_POST["razonsocial"];
                        $idCliente = $_POST["idCliente"];
                        $fechaInicio = $_POST["fechaInicio"];
                        $fechaFin = $_POST["fechaFin"];
                        if($idCliente==0){
                            $result=query("SELECT V.idViaje,C.RazonSocial AS Cliente,V.CartaPorte,V.Contenedor1,V.Contenedor2,V.Contenedor3,V.Contenedor4,V.Contenedor5,V.Contenedor6,V.Contenedor7,V.Contenedor8,V.Contenedor9,V.Contenedor10,TC.TipoContenedor,V.Pagado,V.FechaAlta FROM viajes V INNER JOIN TiposContenedores TC ON V.idTipoContenedor=TC.idTipoContenedor LEFT JOIN clientes C ON V.idCliente=C.idCliente WHERE V.FechaAlta>='".$fechaInicio." 00:00:00' and V.FechaAlta<='".$fechaFin." 23:59:59' ORDER BY V.idViaje DESC");
                        }else{
                            $result=query("SELECT V.idViaje,C.RazonSocial AS Cliente,V.Referencia,V.Destino,V.Contenedor1,V.Contenedor2,TC.TipoContenedor,V.FechaAlta FROM viajes V INNER JOIN TiposContenedores TC ON V.idTipoContenedor=TC.idTipoContenedor LEFT JOIN clientes C ON V.idCliente=C.idCliente WHERE V.FechaAlta>='".$fechaInicio." 00:00:00' and V.FechaAlta<='".$fechaFin." 23:59:59' and V.idCliente=" . $idCliente . " ORDER BY V.idViaje DESC");
                        }
                    }
                    ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <form id="ncliente" name="ncliente" method="post" action="" class="form-horizontal">
                            <div class="form-group">
                                <h3 style="margin-left:20px;">Filtros</h3>
                                <div class="col-sm-3"><label class="font-normal">Fecha inicio</label><input type="date" name="fechaInicio" value="<?php echo date('Y-m-d');?>" class="form-control"></div>
                                <div class="col-sm-3"><label class="font-normal">Fecha fin</label><input type="date" name="fechaFin" value="<?php echo date('Y-m-d');?>" class="form-control"></div>
                                <div class="col-sm-4">
                                    <label class="font-normal">Cliente</label>
                                    <input name="razonsocial" type="text" autocomplete="off" class="typeahead_2 form-control" <?php if($_COOKIE["lvl"]==2){echo 'value="'. $_COOKIE["usuario"] . '"';}?> />
                                    <input id="idCliente" name="idCliente" type="hidden" value="<?php if($_COOKIE["lvl"]==2){echo $_COOKIE["idUsuario"];} ?>" />
                                </div>
                                <div class="col-sm-2" style="margin:22px 0 0;">
                                    <button class="btn btn-primary" type="submit">Consultar</button>
                                </div>
                            </div>
                        </form>

                        <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="ibox float-e-margins">
                                    <table class="table table-striped table-bordered table-hover dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Fecha</th>
                                                <th>Cliente</th>
                                                <th>Referencia</th>
                                                <th>Contenedor</th>
                                                <th>Tipo de Contenedor</th>
                                                <!--<th>Pagado</th>-->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                        $Pag=0;
                        $contenedores="";
                        while($row = mysqli_fetch_array($result)) {
                            $contenedores="";
                            for ($i=1; $i <=10 ; $i++) {
                                $contenedor='Contenedor'.$i; 
                                if($row[$contenedor] != ''){
                                    $contenedores.=(empty($contenedores))? $row[$contenedor]: ' - '.$row[$contenedor];
                                }
                            }
                            $Pag=$row["Pagado"];
                                            ?>
                                            <tr class="gradeA">
                                                <td><?php echo $row["FechaAlta"]; ?></td>
                                                <td><?php echo $row["Cliente"]; ?></td>
                                                <td><?php echo $row["CartaPorte"]; ?></td>
                                                <td><?php echo $contenedores; ?></td>
                                                <td><?php echo $row["TipoContenedor"]; ?></td>
                                                <!--<td><?php echo $Pag; ?></td>-->
                                            </tr>
                                            <?php
                        }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Fecha</th>
                                                <th>Cliente</th>
                                                <th>Referencia</th>
                                                <th>Contenedor</th>
                                                <th>Tipo de Contenedor</th>
                                                <!--<th>Pagado</th>-->
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
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
