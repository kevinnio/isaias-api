<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://containerallrisk.com.mx/api_add.php"></script>
    <title>Formulario</title>
</head>

<body>
    <form action="api_add.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="Cliente" placeholder="Nombre Cliente" required title="Completar campo"><br>
        <input type="text" name="rfc" placeholder="RFC" required title="Completar campo"><br>
        <input type="text" name="moneda" placeholder="Tipo de Moneda" required title="Completar campo"><br>
        <input type="text" name="mercancia" placeholder="Nueva o Usada" required title="Completar campo"><br>
        <input type="text" name="importe" placeholder="Importe Asegurado" required title="Completar campo"><br>
        <input type="text" name="TipoOperacion" placeholder="Bien Asegurado" required title="Completar campo"><br>
        <input type="datetime-local" name="FechaAlta" value="<?php
date_default_timezone_set("America/Mexico_City"); echo "" . date("Y-m-d h:i:sa") . "<br>";?>">
        <label>Fecha de Alta</label><br>
        <input type="text" name="detalles" placeholder="Descripcion" required title="Completar campo"><br>
        <input type="text" name="TipoTransporte" placeholder="Medio de Transporte" required title="Completar campo"><br>
        <input type="datetime-local" name="FechaSalida" value="<?php echo date("Y-m-d");?>">
        <label>Fecha de Salida</label><br>
        <input type="datetime-local" name="FechaLlegada" value="<?php echo date("Y-m-d");?>">
        <label>Fecha de Llegada</label><br>
        <input type="text" name="folio" required title="Completar campo" placeholder="Folio o Pedimento"><br>
        <input type="text" name="porigen" required title="Completar campo" placeholder="Pais Origen"><br>
        <input type="text" name="eorigen" required title="Completar campo" placeholder="Estado Origen"><br>
        <input type="text" name="corigen" required title="Completar campo" placeholder="Ciudad Origen"><br>
        <input type="text" name="pdestino" required title="Completar campo" placeholder="Pais Destino"><br>
        <input type="text" name="edestino" required title="Completar campo" placeholder="Estado Destino"><br>
        <input type="text" name="cdestino" required title="Completar campo" placeholder="Ciudad Destino"><br>
        <input type="text" name="Coberturas1" value="ROT (Volcadura) 10% Riesgos ordinarios de transito 5% Robo total 20% Huelgas y alborotos populares 5%" size="99" readonly><br>
        <input type="text" name="cuota" required title="Completar campo" placeholder="Porcentaje"><br>
        <input type="text" name="prima" required title="Completar campo" placeholder="$0.00"><br>
        <input type="text" name="iva" required title="Completar campo" placeholder="$0.00"><br>
        <input type="text" name="total" required title="Completar campo" placeholder="$0.00"><br>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>
