<?php
    require_once("inc/functions.php");
    if(!isset($_COOKIE["idUsuario"])) {
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en" class="nav-no-js">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    
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
$idCliente=$_GET["id"];

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

    query("UPDATE clientes SET RazonSocial='".$razonSocial."', RFC='".$rfc."', Calle='".$calle."', NoExt='".$noExt."', Colonia='".$colonia."', Municipio='".$municipio."', Estado='".$estado."', CP=".$cp.", Telefono='".$telefono."', Correo='".$correo."', usuario='".$user."', pass='".$pass."', contra='".$pass."' WHERE idCliente=".$idCliente);
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

                        <div class="ibox-content">
                           <h3 style="margin-left:1px;">Datos del Cliente</h3>
                            <form id="mcliente" name="mcliente" method="post" action="" class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Razon Social</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="razonsocial"  class="form-control" value="<?php echo $row["RazonSocial"] ?>" >
                                    </div>
                                    <label class="col-sm-2 control-label">RFC</label>
                                    <div class="col-sm-4"><input type="text" name="rfc" class="form-control" value="<?php echo $row["RFC"] ?>"></div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Calle</label>
                                    <div class="col-sm-4"><input type="text" name="calle" class="form-control m-b" value="<?php echo $row["Calle"] ?>"></div>
                                    <label class="col-sm-2 control-label">Numero</label>
                                    <div class="col-sm-4"><input type="text" name="no" class="form-control m-b" value="<?php echo $row["NoExt"] ?>"></div>
                                    <label class="col-sm-2 control-label">Colonia</label>
                                    <div class="col-sm-4"><input type="text" name="colonia" class="form-control m-b" value="<?php echo $row["Colonia"] ?>"></div>
                                    <label class="col-sm-2 control-label">Municipio</label>
                                    <div class="col-sm-4"><input type="text" name="municipio" class="form-control m-b" value="<?php echo $row["Municipio"] ?>"></div>
                                    <label class="col-sm-2 control-label">Estado</label>
                                    <div class="col-sm-4">
                                        <select name="estado" id="estado" class="form-control m-b">
                                            <option value="estado">Estado</option>
                                            <option value="Aguascalientes" <?php if($row["Estado"]=='Aguascalientes') echo 'selected="selected"'; ?>>Aguascalientes</option>
                                            <option value="Baja California" <?php if($row["Estado"]=='') echo 'selected="selected"'; ?>">Baja California</option>
                                            <option value="Baja California Sur" <?php if($row["Estado"]=='') echo 'selected="selected"'; ?>">Baja California Sur</option>
                                            <option value="Campeche" <?php if($row["Estado"]=='Campeche') echo 'selected="selected"'; ?>">Campeche</option>
                                            <option value="Chiapas" <?php if($row["Estado"]=='Chiapas') echo 'selected="selected"'; ?>">Chiapas</option>
                                            <option value="Chihuahua" <?php if($row["Estado"]=='Chihuahua') echo 'selected="selected"'; ?>">Chihuahua</option>
                                            <option value="Ciudad de Mexico" <?php if($row["Estado"]=='Ciudad de Mexico') echo 'selected="selected"'; ?>">Ciudad de Mexico</option>
                                            <option value="Coahuila" <?php if($row["Estado"]=='Coahuila') echo 'selected="selected"'; ?>">Coahuila</option>
                                            <option value="Colima" <?php if($row["Estado"]=='Colima') echo 'selected="selected"'; ?>">Colima</option>
                                            <option value="Durango" <?php if($row["Estado"]=='Durango') echo 'selected="selected"'; ?>">Durango</option>
                                            <option value="Guanajuato" <?php if($row["Estado"]=='Guanajuato') echo 'selected="selected"'; ?>">Guanajuato</option>
                                            <option value="Guerrero" <?php if($row["Estado"]=='Guerrero') echo 'selected="selected"'; ?>">Guerrero</option>
                                            <option value="Hidalgo" <?php if($row["Estado"]=='Hidalgo') echo 'selected="selected"'; ?>">Hidalgo</option>
                                            <option value="Jalisco" <?php if($row["Estado"]=='Jalisco') echo 'selected="selected"'; ?>">Jalisco</option>
                                            <option value="Estado de Mexico" <?php if($row["Estado"]=='Estado de Mexico') echo 'selected="selected"'; ?>">Estado de Mexico</option>
                                            <option value="Michoacan" <?php if($row["Estado"]=='Michoacan') echo 'selected="selected"'; ?>">Michoacan</option>
                                            <option value="Morelos" <?php if($row["Estado"]=='Morelos') echo 'selected="selected"'; ?>">Morelos</option>
                                            <option value="Nayarit" <?php if($row["Estado"]=='Nayarit') echo 'selected="selected"'; ?>">Nayarit</option>
                                            <option value="Nuevo Leon" <?php if($row["Estado"]=='Nuevo Leon') echo 'selected="selected"'; ?>">Nuevo Leon</option>
                                            <option value="Oaxaca" <?php if($row["Estado"]=='Oaxaca') echo 'selected="selected"'; ?>">Oaxaca</option>
                                            <option value="Puebla" <?php if($row["Estado"]=='Puebla') echo 'selected="selected"'; ?>">Puebla</option>
                                            <option value="Queretaro" <?php if($row["Estado"]=='Queretaro') echo 'selected="selected"'; ?>">Queretaro</option>
                                            <option value="Quintana Roo" <?php if($row["Estado"]=='Quintana Roo') echo 'selected="selected"'; ?>">Quintana Roo</option>
                                            <option value="San Luis Potosi" <?php if($row["Estado"]=='San Luis Potosi') echo 'selected="selected"'; ?>">San Luis Potosi</option>
                                            <option value="Sinaloa" <?php if($row["Estado"]=='Sinaloa') echo 'selected="selected"'; ?>">Sinaloa</option>
                                            <option value="Tabasco" <?php if($row["Estado"]=='Tabasco') echo 'selected="selected"'; ?>">Tabasco</option>
                                            <option value="Tamaulipas" <?php if($row["Estado"]=='Tamaulipas') echo 'selected="selected"'; ?>">Tamaulipas</option>
                                            <option value="Tlaxcala" <?php if($row["Estado"]=='Tlaxcala') echo 'selected="selected"'; ?>">Tlaxcala</option>
                                            <option value="Veracruz" <?php if($row["Estado"]=='Veracruz') echo 'selected="selected"'; ?>">Veracruz</option>
                                            <option value="Yucatan" <?php if($row["Estado"]=='Yucatan') echo 'selected="selected"'; ?>">Yucatan</option>
                                            <option value="Zacatecas" <?php if($row["Estado"]=='Zacatecas') echo 'selected="selected"'; ?>">Zacatecas</option>
                                        </select>
                                    </div>
                                    <label class="col-sm-2 control-label">CP</label>
                                    <div class="col-sm-4"><input type="text" name="cp" class="form-control m-b" value="<?php echo $row["CP"] ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Telefono</label>
                                    <div class="col-sm-4"><input type="text" name="telefono" class="form-control m-b" value="<?php echo $row["Telefono"] ?>"></div>
                                    <label class="col-sm-2 control-label">Correo</label>
                                    <div class="col-sm-4"><input type="text" name="correo" class="form-control m-b" value="<?php echo $row["Telefono"] ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <h3 style="margin-left:20px;">Datos del usuario</h3>
                                    <label class="col-sm-2 control-label">Usuario</label>
                                    <div class="col-sm-4"><input type="text" name="user" value="<?php echo $row['usuario']; ?>" class="form-control m-b"></div>
                                    <label class="col-sm-2 control-label">Contrase&ntilde;a</label>
                                    <div class="col-sm-4"><input type="text" name="pass" value="<?php echo $row['contra'];; ?>" class="form-control m-b"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-8">
                                        <button class="btn btn-primary" type="submit">Modificar</button>
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
</body>
</html>
