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
    $rfc = $_POST["rfc"];
    $calle = $_POST["calle"];
    $noExt = $_POST["no"];
    $colonia = $_POST["colonia"];
    $municipio = $_POST["municipio"];
    $estado = $_POST["estado"];
    $cp = $_POST["cp"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $user = $_POST["user"];
    $pass = $_POST["pass"];

    query("INSERT INTO clientes (usuario, pass, contra, RazonSocial, RFC, Calle, NoExt, Colonia, Municipio, Estado, CP,Telefono, Correo, lvl) VALUES ('".$user."', MD5('".$pass."'), '".$pass."', '".$razonSocial."','".$rfc."','".$calle."','".$noExt."','".$colonia."','".$municipio."','".$estado."',".$cp.",'".$telefono."','".$correo."', 2)");
}
?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <form id="ncliente" name="ncliente" method="post" action="" class="form-horizontal">
                                <div class="form-group">
                                    <h3 style="margin-left:20px;">Datos de la empresa</h3>
                                    <label class="col-sm-2 control-label">Razon Social</label>
                                    <div class="col-sm-4"><input type="text" name="razonsocial" class="form-control" required="required"></div>
                                    <label class="col-sm-2 control-label">RFC</label>
                                    <div class="col-sm-4"><input type="text" name="rfc" class="form-control"></div>
                                </div>
                                <div class="form-group">
                                    <h3 style="margin-left:20px;">Datos de domicilio fiscal</h3>
                                    <label class="col-sm-2 control-label">Calle</label>
                                    <div class="col-sm-4"><input type="text" name="calle" class="form-control m-b"></div>
                                    <label class="col-sm-2 control-label">Numero</label>
                                    <div class="col-sm-4"><input type="text" name="no" class="form-control m-b"></div>
                                    <label class="col-sm-2 control-label">Colonia</label>
                                    <div class="col-sm-4"><input type="text" name="colonia" class="form-control m-b"></div>
                                    <label class="col-sm-2 control-label">Municipio</label>
                                    <div class="col-sm-4"><input type="text" name="municipio" class="form-control m-b"></div>
                                    <label class="col-sm-2 control-label">Estado</label>
                                    <div class="col-sm-4">
                                        <select name="estado" id="estado" class="form-control m-b">
                                            <option value="estado">Estado</option>
                                            <option <?php if($estado=="Aguascalientes") echo "selected"; ?> value="Aguascalientes">Aguascalientes</option>
                                            <option <?php if($estado=="Baja California") echo "selected"; ?> value="Baja California">Baja California</option>
                                            <option <?php if($estado=="Baja California Sur") echo "selected"; ?> value="Baja California Sur">Baja California Sur</option>
                                            <option <?php if($estado=="Campeche") echo "selected"; ?> value="Campeche">Campeche</option>
                                            <option <?php if($estado=="Chiapas") echo "selected"; ?> value="Chiapas">Chiapas</option>
                                            <option <?php if($estado=="Chihuahua") echo "selected"; ?> value="Chihuahua">Chihuahua</option>
                                            <option <?php if($estado=="Ciudad de Mexico") echo "selected"; ?> value="Ciudad de Mexico">Ciudad de Mexico</option>
                                            <option <?php if($estado=="Coahuila") echo "selected"; ?> value="Coahuila">Coahuila</option>
                                            <option <?php if($estado=="Colima") echo "selected"; ?> value="Colima">Colima</option>
                                            <option <?php if($estado=="Durango") echo "selected"; ?> value="Durango">Durango</option>
                                            <option <?php if($estado=="Guanajuato") echo "selected"; ?> value="Guanajuato">Guanajuato</option>
                                            <option <?php if($estado=="Guerrero") echo "selected"; ?>value="Guerrero">Guerrero</option>
                                            <option <?php if($estado=="Hidalgo") echo "selected"; ?> value="Hidalgo">Hidalgo</option>
                                            <option <?php if($estado=="Jalisco") echo "selected"; ?>value="Jalisco">Jalisco</option>
                                            <option <?php if($estado=="Estado de Mexico") echo "selected"; ?> value="Estado de Mexico">Estado de Mexico</option>
                                            <option <?php if($estado=="Michoacan") echo "selected"; ?> value="Michoacan">Michoacan</option>
                                            <option <?php if($estado=="Morelos") echo "selected"; ?> value="Morelos">Morelos</option>
                                            <option <?php if($estado=="Nayarit") echo "selected"; ?> value="Nayarit">Nayarit</option>
                                            <option <?php if($estado=="Nuevo Leon") echo "selected"; ?> value="Nuevo Leon">Nuevo Leon</option>
                                            <option <?php if($estado=="Oaxaca") echo "selected"; ?> value="Oaxaca">Oaxaca</option>
                                            <option <?php if($estado=="Puebla") echo "selected"; ?> value="Puebla">Puebla</option>
                                            <option <?php if($estado=="Queretaro") echo "selected"; ?> value="Queretaro">Queretaro</option>
                                            <option <?php if($estado=="Quintana Roo") echo "selected"; ?> value="Quintana Roo">Quintana Roo</option>
                                            <option <?php if($estado=="San Luis Potosi") echo "selected"; ?> value="San Luis Potosi">San Luis Potosi</option>
                                            <option <?php if($estado=="Sinaloa") echo "selected"; ?> value="Sinaloa">Sinaloa</option>
                                            <option <?php if($estado=="Tabasco") echo "selected"; ?> value="Tabasco">Tabasco</option>
                                            <option <?php if($estado=="Tamaulipas") echo "selected"; ?> value="Tamaulipas">Tamaulipas</option>
                                            <option <?php if($estado=="Tlaxcala") echo "selected"; ?> value="Tlaxcala">Tlaxcala</option>
                                            <option <?php if($estado=="Veracruz") echo "selected"; ?> value="Veracruz">Veracruz</option>
                                            <option <?php if($estado=="Yucatan") echo "selected"; ?> value="Yucatan">Yucatan</option>
                                            <option <?php if($estado=="Zacatecas") echo "selected='selected'"; ?> value="Zacatecas">Zacatecas</option>
                                        </select>
                                    </div>
                                    <label class="col-sm-2 control-label">CP</label>
                                    <div class="col-sm-4"><input type="text" name="cp" class="form-control m-b" ></div>
                                </div>
                                <div class="form-group">
                                    <h3 style="margin-left:20px;">Datos del contacto</h3>
                                    <label class="col-sm-2 control-label">Telefono</label>
                                    <div class="col-sm-4"><input type="text" name="telefono"  class="form-control m-b"></div>
                                    <label class="col-sm-2 control-label">Correo</label>
                                    <div class="col-sm-4"><input type="text" name="correo"  class="form-control m-b"></div>
                                </div>
                                <div class="form-group">
                                    <h3 style="margin-left:20px;">Datos del usuario</h3>
                                    <label class="col-sm-2 control-label">Usuario</label>
                                    <div class="col-sm-4"><input type="text" name="user" class="form-control m-b"></div>
                                    <label class="col-sm-2 control-label">Contrase&ntilde;a</label>
                                    <div class="col-sm-4"><input type="text" name="pass" class="form-control m-b"></div>
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
