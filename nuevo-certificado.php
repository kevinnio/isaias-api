<?php
    require_once("inc/functions.php");
    if(!isset($_COOKIE["idUsuario"])) {
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    <script type="text/javascript">
        function marcar(source) {
            checkboxes = document.getElementsByClassName('noCont'); //obtenemos todos los controles del tipo Input
            for (i = 0; i < checkboxes.length; i++) //recoremos todos los controles
            {
                if (checkboxes[i].type == "checkbox") //solo si es un checkbox entramos
                {
                    checkboxes[i].checked = source.checked; //si es un checkbox le damos el valor del checkbox que lo llamo (Marcar/Desmarcar Todos)
                }
            }
        }

    </script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Nuevo Certificado - Container All Risk</title>

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
    <meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/defaults.min.css">
    <link rel="stylesheet" href="css/nav-core.min.css">
    <link rel="stylesheet" href="css/nav-layout.min.css">
    <script src="js/rem.min.js"></script>

    <style>
        #div1 {
            margin: 5px;
        }

        #span.derecha {
            display: block;
            float: right
        }

        span {
            display: none;
        }

    </style>
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

        <!-- idViaje | idCliente | Cliente | rfc | moneda | mercancia | importe | TipoOperacion | FechaAlta | detalles | TipoTransporte | FechaSalida | FechaLlegada | folio | porigen | eorigen | corigen | pdestino | edestino | cdestino | poliza | cuota | prima	| gastosexp | iva | total |-->
        <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $razonSocial = $_POST["razonsocial"];
    $idCliente = $_POST["idCliente"];
    $cliente = $_POST["Cliente"];
    $rfc = $_POST["rfc"];
    $moneda = $_POST["moneda"];
    $mercancia = $_POST["mercancia"];
    $importe = $_POST["importe"];
    $tipoOperacion = $_POST["TipoOperacion"];
    $fechaAlta = $_POST["FechaAlta"];
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
    $coberturas1 = $_POST["Coberturas1"];
    $coberturas2 = $_POST["Coberturas2"];
    $coberturas3 = $_POST["Coberturas3"];
    $coberturas4 = $_POST["Coberturas4"];
    $cuota = $_POST["cuota"];
    $prima = $_POST["prima"];
    $gastosexp = $_POST["gastosexp"];
    $iva = $_POST["iva"];
    $total = $_POST["total"];
    
        
    if($cliente == 'X'){
        $cliente ='';
  
    }else{
       query("INSERT INTO merca (idViaje, idCliente, Cliente, rfc, moneda, mercancia, 
importe, TipoOperacion, FechaAlta, detalles, TipoTransporte, FechaSalida, 
FechaLlegada, folio, porigen, eorigen, corigen, pdestino, edestino, cdestino, 
Coberturas1, Coberturas2, Coberturas3, Coberturas4, cuota, prima, gastosexp, iva, total) VALUES 
(DEFAULT,'".$idCliente."', '".$cliente."', '".$rfc."', '".$moneda."', 
'".$mercancia."', '".$importe."', '".$tipoOperacion."', '".$fechaAlta."', 
'".$detalles."', '".$tipoTransporte."', '".$fechaSalida."', '".$fechaLlegada."', 
'".$folio."','".$porigen."','".$eorigen."', '".$corigen."', '".$pdestino."', 
'".$edestino."', '".$cdestino."', '".$coberturas1."', '".$coberturas2."', '".$coberturas3."', '".$coberturas4."', '".$cuota."', 
'".$prima."', '".$gastosexp."', '".$iva."', '".$total."')");
       
}
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
                                    <input id="nombre1" name="razonsocial" type="text" autocomplete="off" required title="Completar campo" class="typeahead_2 form-control" onkeyup="PasarValor();" <?php
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
                                <label class="col-sm-2 control-label">Fecha Alta</label>
                                <div class="col-sm-3"><input type="datetime-local" name="FechaAlta" class="form-control" value="<?php echo date('Y-m-d\TH:i');?>"></div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <h3 style="margin-left:20px;">Beneficiario Preferente</h3>
                                <label class="col-sm-2 control-label">Cliente</label>
                                <div class="col-sm-4"><input type="text" id="nombre2" name="Cliente" required title="Completar campo" class="form-control m-b"></div>

                                <label class="col-sm-2 control-label">RFC</label>
                                <div class="col-sm-4"><input type="text" name="rfc" required title="Completar campo" class="form-control m-b" maxlength="13"></div>

                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <h3 style="margin-left:20px;">Detalles del Certificado</h3>
                                <label class="col-sm-2 control-label">Moneda</label>
                                <div id="div1" class="col-sm-2">
                                    <select name="moneda" id="tipoOperacion" class="form-control">

                                        <option value="MXN">MXN</option>
                                        <option value="USD">USD</option>
                                    </select>
                                </div>
                                <label class="col-sm-2 control-label">Estado de la Mercancia</label>
                                <div class="col-sm-2">
                                    <select name="mercancia" id="tipoOperacion" class="form-control">

                                        <option value="NUEVA">NUEVA</option>
                                        <option value="USADA">USADA</option>
                                    </select></div>
                                <label class="col-sm-1 control-label">Importe Asegurado</label>
                                <div class="col-sm-2"><input id="valor" type="number" onkeyUp="calcular();" name="importe" required title="Completar campo" class="form-control m-b"></div>
                                <label class="col-sm-3 control-label">Bienes Asegurados</label>
                                <div id="div1" class="col-sm-8">
                                    <select name="TipoOperacion" id="tipoOperacion" class="form-control">

                                        <option value="MATERIA PRIMA">Materia Prima</option>
                                        <option value="ABARROTES NO PERECEDEROS">Abarrotes No Perecederos</option>
                                        <option value="APARATOS ELECTRODOMESTICOS">Aparatos Electrodomesticos</option>
                                        <option value="ARTICULOS DE MERCANCIA">ArtIculos de Merceria</option>
                                        <option value="ARTICULOS DE PAPELERIA">ArtIculos de Papeleria</option>
                                        <option value="ARTICULOS DE PERFUMERIA">ArtIculos de Perfumeria</option>
                                        <option value="ARTICULOS DE PIEL">ArtIculos de Piel</option>
                                        <option value="ARTICULOS DE PLASTICO">ArtIculos de Plastico</option>
                                        <option value="ARTICULOS DE VIDRIO">ArtIculos de Vidrio</option>
                                        <option value="ARTICULOS DECORATIVOS">ArtIculos Decorativos</option>
                                        <option value="ARTICULOS PARA EL HOGAR">ArtIculos para el Hogar</option>
                                        <option value="AUTOS">Autos</option>
                                        <option value="AZUCAR">Azucar </option>
                                        <option value="BICICLETAS">Bicicletas</option>
                                        <option value="CD´S">CD's</option>
                                        <option value="CEREALES">Cereales</option>
                                        <option value="CONTENEDORES">Contenedores</option>
                                        <option value="DISCOS MUSICALES">Discos Musicales</option>
                                        <option value="DVD´S">DVD's</option>
                                        <option value="ELECTRONICOS Y SIMILARES (EXCLUYE CELULARES, TABLETAS, APARATOS DE JUEGO Y ACCESORIOS)">Electronicos y Similares (Excluye celulares, iPod, Ipad, Iphone, Equipos Conocidos como Tablets o Tabletas, Aparatos de Juego de Video y sus Accesorios)</option>
                                        <option value="EMBARQUES DE MATERIA PRIMA">Embarques de Materia Prima</option>
                                        <option value="EQUIPO">Equipo </option>
                                        <option value="EQUIPO DE COMPUTO">Equipo de Computo</option>
                                        <option value="EQUIPO MEDICO">Equipo Medico</option>
                                        <option value="FERRETERIA">Ferreteria</option>
                                        <option value="GANADO EN PIE (UNICAMENTE CONTRA ROT Y ROBO TOTAL)">Ganado en Pie (unicamente contra ROT y Robo Total)</option>
                                        <option value="GRANOS Y SEMILLAS EMPACADOS Y/O A GRANEL">Granos y Semillas Empacados y/o a Granel</option>
                                        <option value="INSTRUMENTOS MUSICALES">Instrumentos Musicales</option>
                                        <option value="JUGUETES">Juguetes</option>
                                        <option value="MAQUINARIA">Maquinaria</option>
                                        <option value="MATERIAL DE EMPAQUE">Material de Empaque </option>
                                        <option value="MENAJE DE CASA">Menaje de Casa </option>
                                        <option value="METALES NO PRECIOSOS (EXCLUYENDO COBRE)">Metales no Preciosos (Excluyendo Cobre)</option>
                                        <option value="MINERALES (EXCLUYENDO METALES PRECIOSOS)">Minerales (Excluyendo Metales Preciosos) </option>
                                        <option value="MOBILIARIO Y EQUIPO DE OFICINA">Mobiliario y Equipo de Oficina </option>
                                        <option value="MOTOCICLETAS Y CAMIONES (EN MADRINAS O CAMION CAJA CERRADA, EXCLUYENDO TRASLADO POR SU PROPIO IMPULSO O GRUA)">Motocicletas y Camiones (en Madrinas o Camion Caja Cerrada, Excluyendo Traslado por su Propio Impulso o Grua)</option>
                                        <option value="MUEBLES">Muebles</option>
                                        <option value="MADERA">Madera</option>
                                        <option value="PARAFINA LIQUIDA Y SOLIDA">Parafina Liquida y Solida</option>
                                        <option value="PRODUCTOS EN PROCESO">Producto en Proceso</option>
                                        <option value="PRODUCTO TERMINADO">Producto Terminado </option>
                                        <option value="PRODUCTOS CERAMICOS">Productos Ceramicos</option>
                                        <option value="PRODUCTOS QUIMICOS">Productos Quimicos </option>
                                        <option value="PURO Y CIGARROS">Puro y Cigarros</option>
                                        <option value="REFACCIONES AUTOMOTRICES (EXCLUYENDO LLANTAS DE CUALQUIER TIPO)">Refacciones Automotrices (Excluyendo Llantas de cualquier tipo)</option>
                                        <option value="REFACCIONES Y ACCESORIOS">Refacciones y Accesorios</option>
                                        <option value="REFRESCOS EMBOTELLADOS">Refrescos Embotellados</option>
                                        <option value="ROPAS Y TELAS">Ropas y Telas</option>
                                        <option value="TABACO">Tabaco</option>
                                        <option value="TELEFONOS FIJOS">Telefonos Fijos </option>
                                        <option value="TODO RELACIONADO CON LA FABRICACION Y COMERCIALIZACION DE ABARROTES PERECEDEROS (EXCLUTE CARNE, PESCADO Y MARISCOS)">Todo lo relacionado con la Fabricacion Y Comercializacion de Abarrotes Perecederos (Excluyendo Carne, Pesado y Mariscos)</option>
                                        <option value="VINOS Y LICORES">Vinos y Licores</option>
                                        <option value="ZAPATOS">Zapatos</option>
                                        <option value="COMBUSTIBLES">Combustible</option>
                                        <option value="FRUTAS Y VERDURAS">Frutas y Verduras</option>
                                        <option value="ABARROTES PERECEDEROS">Abarrotes Perecederos</option>
                                        <option value="MATERIAL PARA CONTRUCCION">Material para construccion</option>
                                        <option value="ACCESORIOS DEPORTIVOS">Accesorios Deportivos</option>
                                        <option value="EQUIPO INDUSTRIAL">Equipo Industrial</option>
                                        <option value="ALIMENTOS ACUICOLAS">Alimentos Acuicolas</option>
                                        <option value="PANAL DE ABEJA">Panal de Abeja</option>
                                        <option value="ARTICULOS DE BELLEZA">ArtIculos de Belleza</option>
                                        <option value="PESCADOS Y MARISCOS">Pescados y Mariscos</option>
                                        <option value="PRODUCTO VETERINARIO">Producto Veterinario</option>
                                        <option value="LLANTAS">Llantas</option>
                                        <option value="FERTILIZANTE">Fertilizante</option>
                                        <option value="CONFITERIA">Confiteria</option>
                                        <option value="CERVEZA">Cerveza</option>
                                        <option value="CARNE">Carne</option>
                                        <option value="PRODUCTOS FARMACEUTICOS">Productos Farmaceuticos</option>
                                        <option value="LIBROS">Libros</option>
                                        <option value="MATERIAL ELECTRICO">Material electrico</option>
                                        <option value="ARTICULOS DE FIERRO">ArtIculos de Fierro</option>
                                        <option value="EMBUTIDOS">Embutidos</option>
                                        <option value="EQUIPO AVICOLA">Equipo Avicola</option>
                                        <option value="ARTICULOS DE PLASTICO">ArtIculos de plastico</option>
                                        <option value="TELA">Tela</option>
                                        <option value="JUEGOS MECANICOS">Juegos mecanicos</option>
                                    </select>
                                </div>
                                <label class="col-sm-3 control-label">Descripcion del Embarque</label>
                                <div class="col-sm-8"><textarea type="text" name="detalles" placeholder="Descripcion de producto" required title="Completar campo" class="form-control m-b"></textarea></div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <h3 style="margin-left:20px;">Transito / Medio de Trasporte</h3>
                                <div id="div1" class="col-sm-3">
                                    <select name="TipoTransporte" id="tipoOperacion" class="form-control">
                                        <option value="Terrestre">Terrestre</option>
                                        <option value="Maritimo">Maritimo</option>
                                        <option value="Aereo">Aereo</option>

                                        <option value="Maritimo y Terrestre">Maritimo y Terrestre</option>
                                        <option value="Ferrocaril">Ferrocaril</option>
                                        <option value="Paqueteria">Paqueteria</option>
                                    </select>
                                </div>
                                <label class="col-sm-12 control-label"></label>

                                <label class="col-sm-1 control-label">Fecha de Salida</label>
                                <div class="col-sm-3"><input type="date" name="FechaSalida" class="form-control" value="<?php echo date("Y-m-d");?>"></div>
                                <label class="col-sm-1 control-label">Fecha de Llegada</label>
                                <div class="col-sm-3"><input type="date" name="FechaLlegada" class="form-control" value="<?php echo date("Y-m-d");?>"></div>
                                <label class="col-sm-1 control-label">Folio Factura</label>
                                <div class="col-sm-3"><input type="text" name="folio" required title="Completar campo" class="form-control m-b"></div>
                            </div>


                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <h3 style="margin-left:20px;">Origen y Destino</h3>
                                <label class="col-sm-2 control-label">Pais Origen</label>
                                <div class="col-sm-2"><input type="text" name="porigen" value="MEXICO" required title="Completar campo" class="form-control m-b"></div>
                                <label class="col-sm-2 control-label">Estado Origen</label>
                                <div class="col-sm-2"><input type="text" name="eorigen" required title="Completar campo" class="form-control m-b"></div>
                                <label class="col-sm-2 control-label">Ciudad Origen</label>
                                <div class="col-sm-2"><input type="text" name="corigen" required title="Completar campo" class="form-control m-b"></div>
                                <label class="col-sm-2 control-label">Pais Destino</label>
                                <div class="col-sm-2"><input type="text" name="pdestino" value="MEXICO" required title="Completar campo" class="form-control m-b"></div>
                                <label class="col-sm-2 control-label">Estado Destino</label>
                                <div class="col-sm-2"><input type="text" name="edestino" required title="Completar campo" class="form-control m-b"></div>
                                <label class="col-sm-2 control-label">Ciudad Destino</label>
                                <div class="col-sm-2"><input type="text" name="cdestino" required title="Completar campo" class="form-control m-b"></div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <h3 style="margin-left:20px;">Coberturas</h3>
                                <label class="col-sm-3 control-label">Marcar/Desmarcar Todos</label>
                                <div class="col-sm-1"><input type="checkbox" onclick="marcar(this);" class="form-control m-b"></div>


                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Continuacion de Viaje</label>
                                <div class="col-sm-1"><input type="checkbox" name="Coberturas1" value="ROT (Volcadura) 10% Riesgos ordinarios de transito 5% Robo total 20% Huelgas y alborotos populares 5%" class="form-control m-b" checked></div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">No Continuacion de Viaje</label>
                                <div class="col-sm-1"><input type="checkbox" name="Coberturas2" value="Riesgos ordinarios de transito (Cobertura Basica) 5% Robo total con violencia y/o asalto 20% Robo parcial con violencia y/o asalto 20% Rapiña, arteria, pillaje y hurto a consecuencia de un riesgo ordinario de transito20% Mojadura y Oxidacion 5%" class="form-control m-b noCont"></div>
                                <div class="col-sm-1"><input type="checkbox" name="Coberturas3" value="Contaminacion y Manchas por contacto con otras cargas 5% Rotura y Rajadura 5% Merma 5% Derrame 5% Bodega a bodega 5% Maniobras a bodega 5% Fallas en el sistema de refrigeracion y calefaccion 5%" class="form-control m-b noCont"></div>
                                <div class="col-sm-1"><input type="checkbox" name="Coberturas4" value="Maniobras de carga y descarga 5% Estadia en recintos fiscales y fiscalizados por 30 dias 5% Barredura 5% Echazon 5% Barateria del capitan y la tripulacion 5% Huelgas y alborotos populares 5% ROT (Volcadura) 10%" class="form-control m-b noCont"></div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div id="span.derecha" class="form-group">
                                <h3 style="margin-left:20px;">Informacion de emision</h3>
                                <label class="col-sm-4 control-label"></label>

                                <label class="col-sm-2 control-label">Cuota Base (%)</label>
                                <div class="col-sm-2">
                                    <input id="valor2" type="text" onkeyUp="calcular()" name="cuota" required title="Completar campo" class="form-control m-b">
                                </div>
                                <label class="col-sm-2 control-label">Prima Neta</label>
                                <div class="col-sm-2">
                                    <input type="text" id="result-input" name="prima" class="form-control m-b">
                                    <span id="result" type="text" name="prima">7</span>
                                </div>

                                <label class="col-sm-3 control-label">Gastos de Expedicion</label>
                                <div class="col-sm-1"><input type="text" name="gastosexp" class="form-control m-b" value="0"></div>

                                <label class="col-sm-2 control-label">IVA (16%)</label>
                                <div class="col-sm-2">
                                    <input type="text" id="resultado3-input" name="iva" class="form-control m-b">
                                    <span id="resultado3" type="text" name="iva">5</span>

                                </div>
                                <label class="col-sm-2 control-label">Total</label>
                                <div class="col-sm-2">
                                    <input type="text" id="total-input" name="total" class="form-control m-b">
                                    <span id="total" type="text" name="total">3</span>
                                </div>

                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-5">
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
                    rfc: {
                        required: true,
                        minlength: 12
                    },
                    Cliente: {
                        required: true,
                        minlength: 5
                    }

                }
            });
        });

    </script>

    <script>
        function PasarValor() {
            document.getElementById("nombre2").value = document.getElementById("nombre1").value;
        }

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
<script src="js/nav.jquery.min.js"></script>
    <script>
        $('.nav').nav();
    </script>
</body>

</html>
