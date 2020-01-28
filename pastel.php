<?php
    require_once("conexion.php");
    $conexion=conexion();
    $sql="SELECT mes, neto, ingresos, orbe, reembolsos FROM reporte2019";
    $result=mysqli_query($conexion,$sql);
    $valoresX=array();//fecha
    $valoresY=array();//montos
    $valoresW=array();
    $valoresZ=array();
    $valoresV=array();
    while ($ver=mysqli_fetch_row($result)){
        $valoresX[]=$ver[0];
        $valoresY[]=$ver[1];
        $valoresW[]=$ver[2];
        $valoresZ[]=$ver[3];
        $valoresV[]=$ver[4];
    } 
    $datosX=json_encode($valoresX);
    $datosY=json_encode($valoresY);
    $datosW=json_encode($valoresW);
    $datosZ=json_encode($valoresZ);
    $datosV=json_encode($valoresV);    
?>
<div id="graficaPastel"></div>
<script type="text/javascript">
    function crearCadenaLineal(json) {
        var parsed = JSON.parse(json);
        var arr = [];
        for (var x in parsed) {
            arr.push(parsed[x]);
        }
        return arr;
    }

</script>
<script type="text/javascript">
    datosX = crearCadenaLineal('<?php echo $datosX ?>');
    datosY = crearCadenaLineal('<?php echo $datosY ?>');
    datosW = crearCadenaLineal('<?php echo $datosW ?>');
    datosZ = crearCadenaLineal('<?php echo $datosZ ?>');
    datosV = crearCadenaLineal('<?php echo $datosV ?>');
    var trace1 = {
        x: datosX,
        y: datosY,
        type: 'scatter',
        name: 'Utilidades',
    };
    var trace2 = {
        x: datosX,
        y: datosZ,
        type: 'scatter',
        name: 'Terceros',
        line: {
            color: 'red',
            width: 2
        },
        marker: {
            color: 'red',
            size: 6
        }
    };
    var trace3 = {
        x: datosX,
        y: datosW,
        type: 'scatter',
        name: 'Ingresos'
    };
    var trace4 = {
        x: datosX,
        y: datosV,
        type: 'scatter',
        name: 'Reembolsos'
    };
    var layout = {
        title: 'ENERO - DICIEMBRE 2019',
        xaxis: {
            title: 'Fechas'
        },
        yaxis: {
            title: 'Montos'
        }
    };
    var data = [trace1, trace2, trace3, trace4];
    Plotly.newPlot('graficaPastel', data, layout);

</script>
