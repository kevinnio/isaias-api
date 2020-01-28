<?php
    require_once("inc/functions.php");
    if(!isset($_COOKIE["idUsuario"])) {
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en" class="nav-no-js">

<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    
    
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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="favicon.ico" />
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <!-- Toastr style -->
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <!-- Gritter -->
    <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
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
    <div class="datos_ajax_delete"></div><!-- Datos ajax Final -->
    <div class="datos_ajax_dato"></div>
    <div id="siniestros" class="container-fluid">
        <table class="table table-bordered dataTables-example">
            <thead>
                <tr>
                    <th>FOLIO</th>
                    <th>FECHA</th>
                    <th>FACTURA</th>
                    <th>ASEGURADO</th>
                    <th>COSTOS</th>
                    <th>IMPORTE ASEGURADO</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                <?php
if($_COOKIE["lvl"]==1){
    $result=query("SELECT V.idViaje, V.idCliente, UCASE(V.Cliente) AS 'Cliente', V.rfc, V.moneda, V.mercancia, V.importe, V.TipoOperacion, V.FechaAlta, V.detalles, V.TipoTransporte, V.FechaSalida, V.FechaLlegada, V.folio, V.porigen, V.eorigen, V.corigen, V.pdestino, V.edestino, V.cdestino, V.poliza, V.cuota, V.prima, V.gastosexp, V.iva, V.total FROM merca V LEFT JOIN clientes C ON V.idCliente=C.idCliente ORDER BY V.idViaje DESC");
}
$mercancias="";
while($row = mysqli_fetch_array($result)) {
if($row["idViaje"]<>'' and $row["idCliente"]<>'')
{
    $mercancias=$row["idViaje"] . " - " . $row["idCliente"];
}else
{
    $mercancias=$row["idViaje"];
}
?>
                <tr class="gradeA" style="text-align:center;">
                    <td><?php echo $row["idViaje"]; ?></td>
                    <td><?php echo $row["FechaAlta"]; ?></td>
                    <td><?php echo $row["folio"]; ?></td>
                    <td><?php echo $row["Cliente"]; ?></td>
                    <td><?php echo "$ "; ?><?php echo $row["total"]; ?></td>
                    <td><?php echo "$ "; ?><?php echo number_format($row["importe"],2, '.', ','); ?></td>
                    <td style="width:16%">
                        <a title="Pdf" href="poliza-mercancia.php?id=<?php echo $row["idViaje"]; ?>" target="_blank" class="btn btn-dark btn-bitbucket btn-sm"><i class="fa fa-file-pdf-o "></i></a>
                        <?php
if($_COOKIE["lvl"]==1){
?>
                        <a title="Editar" href="modificar-mercancia.php?id=<?php echo $row["idViaje"]; ?>" class="btn btn-dark btn-bitbucket btn-sm"><i class="fa fa-pencil"></i></a>

                        <a title="Eliminar" type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#dataDelete" data-id="<?php echo $row['idViaje']?>"><i class='glyphicon glyphicon-trash'></i></a>

                        <a title="Pdf sin precio" href="poliza-mercancia2.php?id=<?php echo $row["idViaje"]; ?>" target="_blank" class="btn btn-dark btn-bitbucket btn-sm"><i class="fa fa-download "></i></a>

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
                    <th>FOLIO</th>
                    <th>FECHA</th>
                    <th>FACTURA</th>
                    <th>ASEGURADO</th>
                    <th>COSTOS</th>
                    <th>IMPORTE ASEGURADO</th>
                    <th>ACCIONES</th>
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
                url: "eliminar-mercancia.php",
                data: parametros,

                beforeSend: function(objeto) {
                    $(".datos_ajax_delete").html("Mensaje: Cargando...");
                },
                success: function(datos) {
                    $(".datos_ajax_delete").html(datos);
                    var url = "mercancias.php";
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
