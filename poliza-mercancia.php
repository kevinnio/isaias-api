<?php
require_once("inc/functions.php");
if(!isset($_COOKIE["idUsuario"])) {
        header("Location: login.php");
}
$idViaje=$_GET["id"];
$result=query("SELECT UCASE(C.RazonSocial) AS 'RazonSocial', UCASE(C.RFC) AS RFC, UCASE(C.Calle) AS 'Calle', UCASE(C.Colonia) AS 'Colonia', UCASE(C.Municipio) AS 'Municipio', UCASE(C.Estado) AS 'Estado', UCASE(C.CP) AS 'CP', UCASE(M.idViaje) AS 'idViaje', UCASE(M.idCliente) AS 'idCliente', UCASE(M.Cliente) AS 'Cliente', UCASE(M.rfc) AS 'rfc', UCASE(M.moneda) AS 'moneda', UCASE(M.mercancia) AS 'mercancia', UCASE(M.importe) AS 'importe', UCASE(M.TipoOperacion) AS 'TipoOperacion', UCASE(M.FechaAlta) AS 'FechaAlta', UCASE(M.detalles) AS 'detalles', UCASE(M.TipoTransporte) AS 'TipoTransporte', UCASE(M.FechaSalida) AS 'FechaSalida', UCASE(M.FechaLlegada) AS 'FechaLlegada', UCASE(M.folio) AS 'folio', UCASE(M.porigen) AS 'porigen', UCASE(M.eorigen) AS 'eorigen', UCASE(M.corigen) AS 'corigen', UCASE(M.pdestino) AS 'pdestino', UCASE(M.edestino) AS 'edestino', UCASE(M.cdestino) AS 'cdestino', UCASE(M.Coberturas1) AS 'Coberturas1', UCASE(M.Coberturas2) AS 'Coberturas2', UCASE(M.Coberturas3) AS 'Coberturas3', UCASE(M.Coberturas4) AS 'Coberturas4', UCASE(M.poliza) AS 'poliza', UCASE(M.cuota) AS 'cuota', UCASE(M.prima) AS 'prima', UCASE(M.gastosexp) AS 'gastosexp', UCASE(M.iva) AS 'iva', UCASE(M.total) AS 'total' FROM clientes C JOIN merca M ON C.idCliente=M.idCliente WHERE idViaje=".$idViaje);

$row = mysqli_fetch_array($result);
if(CantidadRegistros($result)>0){

require_once('inc/TCPDF/tcpdf.php');
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Container All Risk');
$pdf->SetTitle('Certificado Container All Risk');
$pdf->SetSubject('Poliza Container All Risk');
$pdf->SetKeywords('Poliza, Container, All, Risk');
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins(PDF_MARGIN_LEFT, 20, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}
$pdf->setFontSubsetting(true);
$pdf->SetFont('dejavusans', '', 14, '', true);
$pdf->AddPage();
$cant=0;
$coberturas="";
for ($i=1; $i <=4 ; $i++) {
    $cobertura='Coberturas'.$i;
    if($row[$cobertura] != ''){
        $cant++;
        $coberturas.=(empty($coberturas))? $row[$cobertura]: ' '.$row[$cobertura];
    }
}
$idCliente=htmlentities(strtoupper($row["idCliente"]));
$origen=htmlentities(strtoupper($row["Cliente"]));
$rfc=htmlentities(strtoupper($row["rfc"]));
$RFC=htmlentities(strtoupper($row["RFC"]));
$Calle=htmlentities(strtoupper($row["Calle"]));
$colonia=htmlentities(strtoupper($row["Colonia"]));
$cp=htmlentities(strtoupper($row["CP"]));
$municipio=htmlentities(strtoupper($row["Municipio"]));
$estado=htmlentities(strtoupper($row["Estado"]));
$RazonSocial=htmlentities(strtoupper($row["RazonSocial"]));
$moneda=htmlentities(strtoupper($row["moneda"]));
$mercancia=htmlentities(strtoupper($row["mercancia"]));
$importe=number_format($row["importe"],2, '.', ',');
$tipoOperacion=htmlentities(strtoupper($row["TipoOperacion"]));
$fechaAlta=htmlentities(strtoupper($row["FechaAlta"]));
$detalles=htmlentities(strtoupper($row["detalles"]));
$tipoTransporte=htmlentities(strtoupper($row["TipoTransporte"]));
$fechaSalida=htmlentities(strtoupper($row["FechaSalida"]));
$fechaLlegada=htmlentities(strtoupper($row["FechaLlegada"]));
$folio=htmlentities(strtoupper($row["folio"]));
$porigen=htmlentities(strtoupper($row["porigen"]));
$eorigen=htmlentities(strtoupper($row["eorigen"]));
$corigen=htmlentities(strtoupper($row["corigen"]));
$pdestino=htmlentities(strtoupper($row["pdestino"]));
$edestino=htmlentities(strtoupper($row["edestino"]));
$cdestino=htmlentities(strtoupper($row["cdestino"]));
$coberturas1=htmlentities(strtoupper($row["Coberturas1"]));
$coberturas2=htmlentities(strtoupper($row["Coberturas2"]));
$coberturas3=htmlentities(strtoupper($row["Coberturas3"]));
$coberturas4=htmlentities(strtoupper($row["Coberturas4"]));
$poliza=htmlentities(strtoupper($row["poliza"]));
$cuota=htmlentities(strtoupper($row["cuota"]));
$prima=htmlentities(strtoupper($row["prima"]));
$gastosexp=htmlentities(strtoupper($row["gastosexp"]));
$iva=htmlentities(strtoupper($row["iva"]));
$total=htmlentities(strtoupper($row["total"]));


/*$precio=(int)$row["Precio"];
$subtotal=$precio*$cant;
$iva=$subtotal*0.16;
$total=$subtotal*1.16;*/

$html = <<<EOD
<div style="text-align:center;">
    <img src="/img/logo.jpg" with="10" alt="">
    <h5>CERTIFICADO DE PROTECCION DE MERCANCIA</h5>
</div>

<table>
<tr bgcolor="#fcc10f">
    <td style="font-size:10px;text-align:center;border: 1px solid yellow; height:18px;line-height:20px;" colspan="6"><b>ESTATUS</b></td>
    <td style="font-size:10px;text-align:center;border: 1px solid yellow; height:18px;line-height:20px;" colspan="6"><b>CERTIFICADO</b></td>
    <td style="font-size:10px;text-align:center;border: 1px solid yellow; height:18px;line-height:20px;" colspan="6"><b>FECHA DE EMISION</b></td>
    <td style="font-size:10px;text-align:center;border: 1px solid yellow; height:18px;line-height:20px;" colspan="6"><b>POLIZA</b></td>
</tr>
</table>
<table>
<tr>
    <td style="font-size:10px;text-align:center;height:18px;line-height:20px;">EMITIDO</td>
    <td style="font-size:10px;text-align:center;height:18px;line-height:20px;">CAR00{$row["idViaje"]}</td>
    <td style="font-size:10px;text-align:center;height:18px;line-height:20px;">{$row["FechaAlta"]}</td>
    <td style="font-size:10px;text-align:center;height:18px;line-height:20px;">{$row["moneda"]}000{$row["idViaje"]}</td>
</tr>
</table>

<table>
<tr bgcolor="#fcc10f">
    <td style="font-size:10px;text-align:center;border: 1px solid yellow; height:18px;line-height:20px;" colspan="6"><b>RAZON SOCIAL</b></td>
    <td style="font-size:10px;text-align:center;border: 1px solid yellow; height:18px;line-height:20px;" colspan="6"><b>RFC</b></td>
</tr>
</table>
<table>
<tr>
    <td style="font-size:10px;text-align:center;height:18px;line-height:20px;">{$row["RazonSocial"]}</td>
    <td style="font-size:10px;text-align:center;height:18px;line-height:20px;">{$row["RFC"]}</td>
</tr>
</table>

<table>
<tr bgcolor="#fcc10f">
    <td style="font-size:10px;text-align:center;border: 1px solid yellow; height:18px;line-height:20px;" colspan="6"><b>DOMICILIO</b></td>
</tr>
</table>
<table>
<tr>
    <td style="font-size:10px;text-align:center;height:18px;line-height:20px;">{$row["Calle"]} {$row["Colonia"]} C.P {$row["CP"]} {$row["Estado"]}, {$row["Municipio"]}</td>
</tr>
</table>

<table>
<tr bgcolor="#fcc10f">
    <td style="font-size:10px;text-align:center;border: 1px solid yellow; height:18px;line-height:20px;" colspan="6"><b>BIENES PROTEGIDOS</b></td>
    <td style="font-size:10px;text-align:center;border: 1px solid yellow; height:18px;line-height:20px;" colspan="6"><b>ESTADO</b></td>
    <td style="font-size:10px;text-align:center;border: 1px solid yellow; height:18px;line-height:20px;" colspan="6"><b>FACTURA</b></td>
</tr>
</table>
<table>
<tr>
    <td style="font-size:10px;text-align:center;height:18px;line-height:20px;">{$row["TipoOperacion"]}</td>
    <td style="font-size:10px;text-align:center;height:18px;line-height:20px;">{$row["mercancia"]}</td>
    <td style="font-size:10px;text-align:center;height:18px;line-height:20px;">{$row["folio"]}</td>
</tr>
</table>

<table>
<tr bgcolor="#fcc10f">
    <td style="font-size:10px;text-align:center;border: 1px solid yellow; height:18px;line-height:20px;" colspan="6"><b>NOTAS/DETALLES SOBRE EL EMBARQUE</b></td>
</tr>
</table>
<table>
<tr>
    <td style="font-size:10px;text-align:center;height:18px;line-height:20px;">{$row["detalles"]}</td>
</tr>
</table>

<table>
<tr bgcolor="#fcc10f">
    <td style="font-size:10px;text-align:center;border: 1px solid yellow; height:18px;line-height:20px;" colspan="6"><b>EMBALAJE</b></td>
    <td style="font-size:10px;text-align:center;border: 1px solid yellow; height:18px;line-height:20px;" colspan="6"><b>INFORMACION DE TRANSPORTE</b></td>
</tr>
</table>
<table>
<tr>
    <td style="font-size:10px;text-align:center;height:18px;line-height:20px;">
    DE ACUERDO A LA NATURALEZA DEL EMBARQUE
    </td>
    <td style="font-size:10px;text-align:center;height:18px;line-height:20px;">{$row["TipoTransporte"]}</td>
</tr>
</table>

<table>
<tr bgcolor="#fcc10f">
    <td style="font-size:10px;text-align:center;border: 1px solid yellow; height:18px;line-height:20px;" colspan="6"><b>ORIGEN</b></td>
    <td style="font-size:10px;text-align:center;border: 1px solid yellow; height:18px;line-height:20px;" colspan="6"><b>DESTINO</b></td>
    <td style="font-size:10px;text-align:center;border: 1px solid yellow; height:18px;line-height:20px;" colspan="6"><b>FECHA SALIDA</b></td>
    <td style="font-size:10px;text-align:center;border: 1px solid yellow; height:18px;line-height:20px;" colspan="6"><b>FECHA LLEGADA</b></td>
</tr>
</table>
<table>
<tr>
    <td style="font-size:10px;text-align:center;height:18px;line-height:20px;">{$row["corigen"]},{$row["eorigen"]},{$row["porigen"]}</td>
    <td style="font-size:10px;text-align:center;height:18px;line-height:20px;">{$row["cdestino"]},{$row["edestino"]},{$row["pdestino"]}</td>
    <td style="font-size:10px;text-align:center;height:18px;line-height:20px;">{$row["FechaSalida"]}</td>
    <td style="font-size:10px;text-align:center;height:18px;line-height:20px;">{$row["FechaLlegada"]}</td>
</tr>
</table>

<table>
<tr bgcolor="#fcc10f">
    <td style="font-size:10px;text-align:center;border: 1px solid yellow; height:18px;line-height:20px;" colspan="6"><b>IMPORTE PROTEGIDO</b></td>
    <td style="font-size:10px;text-align:center;border: 1px solid yellow; height:18px;line-height:20px;" colspan="6"><b>CUOTA NETA</b></td>
    <td style="font-size:10px;text-align:center;border: 1px solid yellow; height:18px;line-height:20px;" colspan="6"><b>GASTOS EXPEDICION</b></td>
    <td style="font-size:10px;text-align:center;border: 1px solid yellow; height:18px;line-height:20px;" colspan="6"><b>IVA</b></td>
    <td style="font-size:10px;text-align:center;border: 1px solid yellow; height:18px;line-height:20px;" colspan="6"><b>CUOTA TOTAL</b></td>
</tr>
</table>
<table>
<tr>
    <td style="font-size:10px;text-align:center;height:18px;line-height:20px;">$ {$importe} {$row["moneda"]}</td>
    <td style="font-size:10px;text-align:center;height:18px;line-height:20px;">$ {$row["prima"]} {$row["moneda"]}</td>
    <td style="font-size:10px;text-align:center;height:18px;line-height:20px;"> {$row["gastosexp"]}</td>
    <td style="font-size:10px;text-align:center;height:18px;line-height:20px;">$ {$row["iva"]} {$row["moneda"]}</td>
    <td style="font-size:10px;text-align:center;height:18px;line-height:20px;">$ {$row["total"]} {$row["moneda"]}</td>
</tr>
</table>

<table>
<tr bgcolor="#fcc10f">
    <td style="font-size:10px;text-align:center;border: 1px solid yellow; height:18px;line-height:20px;" colspan="6"><b>RIESGOS CUBIERTOS (DEDUCIBLES)</b></td>
</tr>
</table>
<table>
<tr>
    <td style="font-size:10px;text-align:center;height:18px;">{$coberturas}</td>
</tr>
</table>

<table>
<tr bgcolor="#fcc10f">
    <td style="font-size:10px;text-align:center;border: 1px solid yellow; height:18px;line-height:20px;" colspan="6"><b>MEDIDAS DE SEGURIDAD</b></td>
</tr>
</table>
<table>
<tr>
    <td style="font-size:8px;text-align:justific;height:18px;">
    EN NINGÚN MOMENTO DEBERÁ LA MERCANCÍA QUEDAR SIN VIGILANCIA (CHOFER COMO MÍNIMO) Y/O SEGURIDAD DURANTE LOS PERÍODOS DE ESPERA. EN CASO DE QUE EL EMBARQUE LLEVE CUSTODIA, ESTA ÚLTIMA DEBERÁ VIGILAR EL EMBARQUE; HASTA QUE LA MERCANCÍA SEA TOTALMENTE RECIBIDA POR LA PERSONA RESPONSABLE; HACER LOS VIAJES DE TAL MANERA QUE AL LLEGAR AL PUNTO DE DESTINO NO SE TENGA QUE ESPERAR FUERA DE ESTAS INSTALACIONES PARA SER RECIBIDO, SIN VIGILANCIA (CHOFER COMO MÍNIMO) Y/O SEGURIDAD DURANTE LOS PERÍODOS DE ESPERA;USO DE CAMINOS DE CUOTA CUANDO ESTÉN DISPONIBLES. USO DE CAJA METÁLICA CERRADA O EN SU DEFECTO, SI LA NATURALEZA DE LA MERCANCÍA LO PERMITE, CONTAR CON LONAS EN EXCELENTE ESTADO (ES DECIR QUE NO ESTÉN ROTAS, RASGADAS O PERFORADAS) PROTEGIENDO LA MERCANCÍA EN SU TOTALIDAD. RUTAS ESTABLECIDAS CON CONTROL DE TIEMPOS. NO SE PERMITEN DESVIACIONES PARA FINES PERSONALES. USO DE SELLOS O CANDADOS DE ACERO O NAVAL LOCKS PARA CONTENEDORES Y TRÁILER USO DE BITÁCORA DE VIAJE. USO DE BITÁCORA DE INSPECCIÓN DE LAS UNIDADES POR VIAJE. ADEMÁS DE LAS CONSIDERACIONES ANTERIORES, PARA EMBARQUES CUYO VALOR SEA MAYOR A 25,000 USD O 300,000 MN Y (SEGÚN VALOR FACTURA) SE REQUIERE EL USO DE SISTEMA DE RASTREO SATELITAL/GPS O SIMILARES. LA EMPRESA DE RASTREO SATELITAL/GPS DEBERÁ CONTAR CON LOS REGISTROS ANTES LAS AUTORIDADES COMPETENTES Y CON SUS PERMISOS VIGENTES, TENER UN PLAN DE EMERGENCIA Y REACCIÓN EN CASO DE UN ACCIDENTE O INCIDENTE EN EL TRANSPORTE DE LA MERCANCÍA AMPARADA BAJO ESTE CERTIFICADO. ADEMÁS DE LAS CONSIDERACIONES ANTERIORES, PARA EMBARQUES CUYO VALOR SEA MAYOR A 100,000 USD O 2,000,000.00 MN (SEGÚN VALOR FACTURA) SE REQUIERE EL USO DE CUSTODIA Y/O ESCOLTA EN VEHÍCULO SEPARADO. LA EMPRESA DE CUSTODIA Y/O ESCOLTA DEBERÁ CONTAR CON LOS REGISTROS ANTES LAS AUTORIDADES COMPETENTES Y CON SUS PERMISOS VIGENTES, A EXCEPCIÓN DE LAS MERCANCÍAS SEÑALADAS EN LA PÓLIZA COMO UN RIESGO ALTO EN ROBO CUYO VALOR SEA MAYOR A 120,000.00 USD O 1,500,000.00 MXN SE REQUIERE EL USO DE CUSTODIA Y/O ESCOLTA EN VEHÍCULO SEPARADO. LA EMPRESA DE CUSTODIA Y/O ESCOLTA DEBERÁ CONTAR CON LOS REGISTROS ANTES LAS AUTORIDADES COMPETENTES Y CON SUS PERMISOS VIGENTES
    </td>
</tr>
</table>

<table>
<tr bgcolor="#fcc10f">
    <td style="font-size:10px;text-align:center;border: 1px solid yellow; height:18px;line-height:20px;" colspan="6"><b>BENEFICIARIO PREFERENTE</b></td>
</tr>
</table>
<table>
<tr>
   <td style="font-size:10px;text-align:center;height:18px;line-height:20px;">{$row["Cliente"]} - {$row["rfc"]}</td>
</tr>
</table>

<table>
<tr bgcolor="#fcc10f">
    <td style="font-size:10px;text-align:center;border: 1px solid yellow; height:18px;line-height:20px;" colspan="6"><b>INFORMACION DE PAGO</b></td>
</tr>
</table>
<table>
<tr>
    <td style="font-size:10px;text-align:center;">
    CONTAINER ALL RISK SC, BANCOMER NO. DE CUENTA <b>0111582178</b> CLABE INTERBANCARIA <b>012095001115821781</b><BR/><BR/><BR/>
    </td>
</tr>
</table>
<table><tr><td></td></tr><BR/><BR/>

<table>
<tr>
    <td style="font-size:8px;text-align:justific;height:18px;">

<b>CLÁUSULA 1 . -</b> PRELACIÓN Sujeto a las Condiciones Generales y a las Condiciones Particulares de la Proteccion de Transporte de Mercancías, teniendo prelación estas últimas sobre las primeras, CONTAINERALLRISK S.C, denominada en lo sucesivo la Compañía, protege los bienes especificados en las Condiciones Particulares del certificado a favor de la persona física o moral denominada como "El Beneficiario" en la carátula del certificado , siempre y cuando demuestre tener algún interés resarcible, contra la pérdida o daño físico directo que sufran éstos a consecuencia de los riesgos que aparezcan cubiertos en Condiciones Particulares, siempre que tales eventos sean súbitos e imprevistos y ocurran durante el curso normal del viaje entre el origen y destino establecidos en dichas Condiciones Particulares.<BR/><BR/>

<b>CLÁUSULA 2 . -</b> VIGENCIA Esta Proteccion entra en vigor desde el momento en que el vehículo cargado con los bienes protegidos inicia el trayecto del embarque cubierto, fuera de la bodega o lugar de almacenaje en el lugar de origen citado en la Cláusula 5.- Tránsito de estas Condiciones Generales. En el caso de que se cubra el transporte marítimo o el transporte aéreo, esta proteccion entrará en vigor desde el momento en que los bienes queden a cargo de los porteadores para su transporte.<BR/><BR/>
<b>CLÁUSULA 3 . -</b> RIESGOS CUBIERTOS DE ACUERDO A CONDICIONES GENERALES Y PARTICULARES CORRESPONDIENTES A CADA COBERTURA QUEDAN AMPARADAS LOS INDICADOS EN EL CERTIFICADO: a) Riesgos Ordinarios de Tránsito, b) Robo Total con violencia y/o asalto, c) Robo Parcial con violencia y/o asalto, d) rapiña, rateria pillaje y hurto consecuencia de un riesgo Ordinario de Tránsito, e) Mojadura y Oxidación, f) Contaminación y Manchas por Contacto con otras cargas, g) Rotura Rajadura h) Abolladura, dobladura y desportilladura a consecuencia de un Riesgos Ordinario de Tránsito, i) Merma, j) Derrame, k) Bodega a Bodega, l) Maniobras de Carga y Descarga, m) Estadía en Recintos Fiscales y Fiscalizados por 30 días, n) Barredura, o) Echazón, p) Baratería del Capitán y de la Tripulación, q) Huelgas y Alborotos Populares, r) Fallas en el sistema de Refrigeración y Calefacción. Esta Proteccion cubre exclusivamente las pérdidas o daños materiales causados a los bienes protegidos ocasionados directamente por alguno de los riesgos mencionados en el inciso 3.a) "Riesgos Ordinarios de Tránsito" (Cobertura Básica), dependiendo del medio de conducción en que sean transportados el cual deberá estar mencionado en las Condiciones Particulares de ese certificado.<BR/><BR/>
<b>CLÁUSULA 4 . -</b> EXCLUSIONES GENERALES En ningún caso esta Proteccion cubrirá pérdida o daño causado directa o indirectamente por: i) Abandono de los bienes protegidos por parte del Beneficiario o de quien sus intereses represente, hasta el momento en que la Compañía haya dado su autorización. ii) Actos de terrorismo y sabotaje, SEGÚN la siguiente definición: Los actos de una o más personas que por si mismas, o en representación de alguien o en conexión con cualquier organización o gobierno, realicen actividades por la fuerza, violencia o por la utilización de cualquier otro medio con fines políticos, religiosos, ideológicos, étnicos o de cualquier otra naturaleza, destinados a derrocar, influenciar o presionar al gobierno de hecho o de derecho para que tome una determinación, o alterar y/o influenciar y/o producir alarma, temor, terror o zozobra en la población, en un grupo o sección de ella o de algún sector de la economía. Con base en lo anterior, quedan excluidas las pérdidas o daños materiales por dichos actos directos e indirectos que, con un origen mediato o inmediato, sean el resultante del empleo de explosivos, sustancias tóxicas, armas de fuego, o por cualquier otro medio, en contra de las personas, de las cosas o de los servicios públicos y que ante la amenaza o posibilidad de repetirse, produzcan alarma, temor, terror o zozobra en la población o en un grupo o sector de ella. También excluye las pérdidas, daños, costos o gastos de cualquier naturaleza, directa o indirectamente causados por, o resultantes de, o en conexión con cualquier acción tomada para el control, prevención o supresión de cualquier acto de terrorismo. iii) Apropiación, captura, embargo, incautación, requisición, arresto, restricción, detención o confiscación de los bienes por personas que estén por derecho facultadas a tener posesión de los mismos, las consecuencias de tales acciones y de cualquier intento de las mismas. iv) Confiscación, destrucción o rechazo de los bienes por parte de autoridades sanitarias, aduaneras o de otro tipo legalmente reconocidas con motivo de sus funciones, mexicanas o extranjeras. v) Cualquier arma de guerra que emplee fisión o fusión atómica, o nuclear, u otra reacción similar o fuerza radioactiva o materia semejante. Radiaciones ionizantes o contaminación por radioactividad de cualquier combustible nuclear o cualquier residuo nuclear o de la combustión de combustible nuclear. Armas o cualquier fuente radiactiva, tóxica, explosiva o nuclear. vi) El estibamiento de los bienes protegidos sobre la cubierta del buque, excepto cuando viajen dentro de contenedores y en buques diseñados específicamente para llevar mercancía sobrecubierta. vii) Culpa grave del chofer del camión que transporta los bienes protegidos, al encontrarse en estado de ebriedad o influencia de alguna droga no prescrita por un médico. El Beneficiario y el chofer de dicho camión deberán permitir y autorizar la aplicación de las pruebas antidoping y de alcohol para verificar si el chofer estaba bajo influencia de los mismos al momento del siniestro. viii) Las propias características de los bienes protegidos como son, pero no limitados a: la naturaleza perecedera inherente a los bienes, el vicio propio (entendiéndose por tal el germen de destrucción o deterioro que llevan en sí las cosas por su propia naturaleza o destino, aunque se les suponga de las más perfecta calidad de su especie), la combustión espontánea, la influencia de la temperatura y/o atmósfera, la merma natural, derrame normal salvo lo previsto por la Cláusula 3.2.8 de estas Condiciones Generales, la evaporación y la pérdida natural de peso y/o de volumen, el uso y desgaste normal de los bienes. ix) Descalibración de maquinaria y equipo, a menos que sea a consecuencia de un Riesgo Ordinario de Tránsito. x) Embalaje, estiba, preparación, empaque y/o envases inapropiados, defectuosos, incompletos o insuficientes, o falta de protección lúbrica para el manejo de los bienes protegidos, de acuerdo con: la naturaleza de las mercancías a transportar, el medio de transporte a utilizar y las especificaciones del fabricante. Estiba se considerará el acomodo o colocación de la mercancía dentro de un contenedor, furgón o remolque. Esta exclusión aplica sólo cuando tal embalaje, estiba, preparación, empaque, envases o protección lúbrica sea realizado o tenga injerencia en el mismo el Beneficiario, sus funcionarios, socios, dependientes, empleados o el beneficiario de esta Proteccion, o sea hecho antes de entrar en vigor esta Proteccion. xi) Extravío, desaparición misteriosa, robo sin violencia y/o falta de entrega o faltantes descubiertos al efectuarse inventarios o cualquier daño que sea descubierto posteriormente a la entrega de la mercancía en destino final, SEGÚN se define en la Cláusula 5.- Tránsito xii) Falta de marcas o simbología internacionalmente aceptada que indique la naturaleza frágil o medidas de precaución para el transporte de los bienes, cuando esto influya directamente en la realización del siniestro. xiii) Guerra, guerra civil, revolución, rebelión, insurrección, contienda civil, o cualquier acto hostil de o contra un poder beligerante. Salvo cuando el Beneficiario haya contratado y pagado la cuota correspondiente a la cobertura de guerra y esto se haga constar en las condiciones particulares o en el endoso respectivo, emitido para tal efecto. xiv) Huelgas, cierres patronales, disturbios laborales, motines, conmociones civiles y tumultos populares. Salvo cuando el Beneficiario haya contratado y pagado la cuota correspondiente a la cobertura de huelgas y esto se haga constar en las condiciones. xv) Humedad del medio ambiente, sudoración o condensación del aire dentro del envase, empaque, embalaje, contenedor o de la bodega donde fueron estibados los bienes protegidos. xvi) Innavegabilidad del buque o embarcación, empleo de un buque, embarcación, medio de transporte, contenedor, furgón, remolque, inadecuados, obsoletos, con fallas o defectos latentes, para la transportación segura de la mercancía protegida, que no pudieran ser ignorados por el Beneficiario, sus funcionarios, socios, dependientes, empleados, permisionarios o el beneficiario de esta Proteccion. xvii) La colisión de la mercancía con objetos fuera del medio de transporte y/o cualquier otro daño a la mercancía por sobrepasar la capacidad dimensional o la superestructura del vehículo, ya sea en su largo, ancho o alto, o por sobrepasar la capacidad de carga bruta del vehículo transportador establecida por el fabricante del mismo. xviii) La falla real o esperada, o la falta de operación de cualquier computadora, aparato electrónico, componente, sistema o programación para asignar, leer, reconocer, interpretar, procesar o calcular cualquier fecha correctamente. xix) La pérdida o frustración del viaje. xx) La violación del Beneficiario o quien sus intereses represente a cualquier ley, disposición o reglamento expedidos por cualquier autoridad extranjera o nacional (federal, estatal, municipal o de cualquier otra especie); siempre y cuando esto influya en la realización del siniestro. xxi) Minas derrelictas, torpedos o bombas u otras armas de guerra abandonadas en el mar. xxii) Insolvencia o incumplimiento financiero de los propietarios, administradores, armadores, fletadores u operadores del barco. xxiii) Pérdidas consecuenciales de cualquier tipo incluyendo pérdida de mercado, de beneficios o cualquier otro perjuicio o dificultad de índole comercial que afecten al Beneficiario, cualesquiera que sea su causa u origen. xiv) Robo, fraude, dolo o mala fe, culpa grave, abuso de confianza, o infidelidad en el que participe directamente o indirectamente el Beneficiario, sus funcionarios, socios, dependientes civilmente, empleados,el beneficiario, sus causahabientes o quien sus intereses represente, ya sea que actúen solos o en complicidad con otras personas. xxv) Actos de piratería según la siguiente definición: acto violento e ilegal que consiste en la detención, robo secuestro y/o saqueo cometido por un propósito personal contra un buque en altamar generalmente hecho por la tripulación de otro buque y/o contra una aeronave. xxvi) Demora o retraso, aún cuando dicha demora o retraso sea a consecuencia de un riesgo protegido, excepto los gastos que deban pagarse de acuerdo con la Cobertura de Avería Gruesa. xxvii) Responsabilidad civil hacia terceros por pérdidas o daños en sus bienes o en sus personas. En ningún caso esta Proteccion cubrirá: a) Daños preexistentes. b) Envíos por mensajería y/o paquetería. c) Traslados dentro de plantas o almacenes. Adicionalmente a las exclusiones ya indicadas, las obligaciones de la Compañía quedarán extinguidas: a) En caso de que el Beneficiario, Beneficiario o sus representantes con el fin de hacer incurrir en el error a la Compañía disimulan o declaran inexactamente hechos que puedan excluir o restringir las obligaciones plasmadas en estas Condiciones Generales, observándose lo mismo, en caso de que, con igual propósito no se remita la documentación que sea solicitada o no sea proporcionada oportunamente. b) Cuando haya omisión o inexacta declaración de los hechos a los que se refieren los Artículos 8, 9 y 10 de la Ley Sobre el Contrato de Proteccion, la Compañía quedará facultada para considerar rescindido de pleno derecho este Contrato de Proteccion, aunque los hechos omitidos o mal informados no hayan influido en la realización del siniestro, como se establece en el Artículo 47 de la Ley Sobre el Contrato de Proteccion.<BR/><BR/><BR/><BR/><BR/>

<b>CLÁUSULA 5 . -</b> TRÁNSITO A) Esta Proteccion entra en vigor conforme lo establece la Cláusula 2.- Vigencia de las presentes Condiciones Generales, continúa durante el curso normal del viaje y termina ya sea: a) con la entrega de dichas mercancías al Consignatario en el lugar de almacenaje en el destino especificado en este certificado, o b) con la entrega de dichos bienes en cualquier otro almacén o lugar de almacenaje, ya sea anterior al o en el destino mencionado en el certificado, que el Beneficiario decida utilizar para almacenaje que no sea en el curso ordinario del tránsito o para asignación, distribución, despacho o reexpedición, o c) para embarques marítimos, a la expiración de 60 días después de finalizar la descarga de las mercancías protegidas, al costado del buque transoceánico en el puerto final de descarga, o d) para embarques aéreos, a la expiración de 30 días después de finalizar la descarga del interés protegido del avión en el lugar final de descarga, o e) Para embarques terrestres, a la expiración de 24 horas, contadas desde la llegada del medio transportador a tal destino o lugar final de descarga y mientras el bien protegido se encuentre depositado en el medio transportador. Si antes de dichas 24 horas se inicia la descarga, entonces en ese momento cesa la cobertura, salvo que se haya contratado la Cobertura de Maniobras de Carga y Descarga. Lo cual deberá estar indicado en las Condiciones Particulares. Lo que en primer término suceda. B) Si después de la descarga al costado del buque transoceánico en el puerto final de descarga o de la descarga del avión, camión o ferrocarril en el lugar final de descarga, pero antes de la terminación de esta Proteccion, las mercancías tuvieran que ser reexpedidas a un destino distinto de aquel para el que fueron protegidas por la presente, esta Proteccion, en tanto subsista subordinado a la terminación como se dispone más arriba, no se prolongará después del comienzo del tránsito a tal otro destino. C) Esta Proteccion permanecerá en vigor (subordinado a la terminación como más arriba se provee y a las estipulaciones de la Cancelación Anticipada durante toda demora fuera del control del Beneficiario, así como durante cualquier desviación, descarga forzosa, reembarque o transbordo y durante cualquier variación forzosa de la aventura que provenga del ejercicio de la facultad concedida a los navieros, armadores o fletadores bajo el contrato de fletamento, sujeto a lo establecido en la "Cláusula 7.-Interrupción en el Transporte y en la Cláusula 8.-Variaciones.<BR/><BR/>
<b>CLÁUSULA 6 . -</b> TERRITORIALIDAD La compañía podrá limitar territorialmente la Cobertura de Proteccion excluyendo los países o regiones que se indiquen en las Condiciones Particulares de este certficado.<BR/><BR/>
<b>CLÁUSULA 7 . -</b> INTERRUPCIÓN EN EL TRANSPORTE Si durante el transporte sobreviniesen circunstancias anormales, ajenas al Beneficiario o quien sus intereses representen, no exceptuadas en este certificado, que hiciesen necesario que, entre los puntos de origen y destino especificados, los bienes quedaren estacionados o almacenados en bodega, muelles, plataforma, embarcaciones, malecones u otros lugares, la Proteccion continuará en vigor y el Beneficiario pagará la cuota adicional que corresponda. Si la interrupción en el transporte se debe en todo o en parte a causas imputables al Beneficiario o de quien sus intereses representen, o a riesgos no amparados o que están excluidos de este  certificado, la Proteccion cesará desde la fecha de tal interrupción. Es obligación del Beneficiario dar aviso a la Compañía tan pronto tenga conocimiento de que se presentó dicha interrupción en el transporte, ya que el derecho a tal protección depende del cumplimiento por parte del Beneficiario de esta obligación de aviso.<BR/><BR/>
<b>CLÁUSULA 8 . -</b> VARIACIONES Esta Proteccion continuará en vigor y se tendrán por cubiertos los bienes bajo los términos originalmente contratados en el certicado, al sobrevenir desviación, cambio de ruta, trasbordo u otra variación del viaje en razón del ejercicio de facultades concedidas al armador o porteador, conforme al Contrato de Fletamento, Carta Porte, Guía Aérea, Conocimiento de Embarque o Talón de Embarque. Para este efecto el Beneficiario tendrá la obligación de dar aviso a la empresa tan pronto como este se entere de dicha variación, dentro de las 24 horas siguientes al momento en que tenga conocimiento de tales circunstancias, ya que el derecho a tal protección depende del cumplimiento por el Beneficiario de esta obligación de aviso. La empresa tendrá derecho a cobrar la cuota adicional que corresponda y podrá modificar los deducibles o alguna otra condición de el certificado.<BR/><BR/>
<b>CLÁUSULA 9 . -</b> AGRAVACIÓN DEL RIESGO El Beneficiario deberá comunicar a la Compañía cualquier circunstancia que durante la vigencia de esta Proteccion provoque una agravación esencial de los riesgos cubiertos, dentro de las 24 horas siguientes a que tenga conocimiento de tales circunstancias. Si el Beneficiario omitiere el aviso o si él mismo provocara la agravación esencial de los riesgos, la Compañía quedará en lo sucesivo liberada de toda obligación derivada de esta Proteccion, de conformidad con lo dispuesto en el Artículo 52 y 53 de la Ley Sobre el Contrato de Proteccion, y en caso de aceptación, se cobrará al Beneficiario la cuota adicional correspondiente y se podrán modificar términos y condiciones del certificado original. En el caso de transporte marítimo y terrestre, la Compañía responderá por la agravación del riesgo aun cuando el Beneficiario omitiere el aviso a que se refiere el párrafo anterior, quedando el Beneficiario obligado a pagar a la Compañía la cuota adicional correspondiente a dicha agravación de acuerdo con lo estipulado en los Artículos 206 de la Ley de Navegación y Comercio Marítimo y 144 de la Ley Sobre el Contrato de Proteccion, respectivamente.<BR/><BR/>
<b>CLÁUSULA 10 . -</b> RESPONSABILIDAD MÁXIMA DE LA COMPAÑÍA (LIMÍTE MÁXIMO POR EMBARQUE) La responsabilidad máxima de la Compañía empresa con motivo de una pérdida o daño físico o gasto indemnizable bajo las condiciones del presente certificado, no podrá ser superior al límite máximo de responsabilidad por cada embarque indicado en las Condiciones Particulares de este certificado. Este último es fijado por el Beneficiario, y no es prueba del valor ni de la preexistencia de los bienes protegidos. Se entenderá por límite máximo por embarque el valor máximo de los bienes protegidos bajo una o más facturas, dirigidos a uno o a varios consignatarios que estén a bordo de un vehículo en un sólo viaje y/o depositados en un sólo lugar, en un solo evento y por una sola vez.<BR/><BR/>
<b>CLÁUSULA 11 . -</b> El valor protegido corresponde al valor de los bienes y/o mercancías sobre los cuales exista interés resarcible por parte del Beneficiario, en el lugar y al momento del inicio del viaje, de acuerdo con las siguientes bases: a) Embarque de compras efectuadas por el Beneficiario en el extranjero: Valor factura de los bienes más gastos tales como fletes, impuestos de importación, gastos aduanales, empaque, embalaje, acarreo y demás gastos directos inherentes al transporte de los bienes si los hubiere y siempre que éstos no se encuentren incorporados en la propia factura de compra. b) Embarques de compras efectuadas por el Beneficiario dentro de la República Mexicana: Valor factura de los bienes más gastos tales como fletes, empaque, acarreo y demás gastos directos inherentes al transporte de los bienes si los hubiere y siempre que éstos no se encuentren incorporados en la propia factura de compra. c) Embarques de ventas efectuadas por el Beneficiario: Valor factura de venta más fletes, empaque, embalaje, acarreo y demás gastos directos inherentes al transporte de los bienes, no incluidos en la factura de venta. d) Embarques de maquila efectuados por el Beneficiario: Costo de la materia cuota y otros gastos que se realicen dentro del proceso de producción, más gastos directos inherentes al transporte de los bienes, si los hubiere. e) Embarques entre filiales en la República Mexicana: Costo de producción o adquisición, más fletes y demás gastos directos inherentes al transporte de los bienes si los hubiere. f) Bienes usados y/o reconstruidos: Valor real de los bienes más gastos tales como fletes, impuestos de importación, gastos aduanales, empaque, embalaje, acarreo y demás gastos inherentes al transporte de los bienes si los hubiere.<BR/><BR/>
<b>CLÁUSULA 12 . -</b> PROPORCIÓN INDEMNIZABLE En cualquier pérdida y/o daño físico indemnizable bajo las Condiciones de la presente certificado, la Compañía nunca será responsable por porcentaje mayor, que el que exista entre el límite máximo de responsabilidad por cada embarque (suma protegida) y el valor de los bienes que lo constituyen en el momento del siniestro determinado conforme a lo establecido en la "Cláusula 15.- Valor para la Proteccion". Dicho porcentaje se aplicará sobre la pérdida para después aplicar el deducible correspondiente.<BR/><BR/>

<b>CLÁUSULA 13 . -</b> DEDUCIBLE En cada siniestro indemnizable bajo las Condiciones de este certificado, siempre quedará a cargo del Beneficiario la cantidad o porcentaje indicado en las Condiciones Particulares como concepto de "Deducible" y la Compañía solamente indemnizará una pérdida cuando sea superior a tal deducible. El deducible es aplicable siempre en toda y cada pérdida o reclamación. Queda entendido y convenido que el deducible se aplica sobre el valor total del embarque. Siendo transporte combinado, se tomará como base el medio de transporte en el cual se encontraban los bienes al momento del siniestro; y cuando no sea posible determinar objetivamente donde ocurrió el siniestro, se tomará como base el medio de transporte que presente la mayor acumulación En caso de que el valor total del embarque exceda la "Responsabilidad Máxima de la Compañía" por Embarque que se indica en el certificado, el deducible deberá aplicarse sobre dicha responsabilidad y se deducirá de la pérdida neta, una vez aplicada la proporción indemnizable, establecida en la "Cláusula 12.- Proporción Indemnizable".<BR/><BR/>
<b>CLÁUSULA 14 . -</b> PROTECCION BAJO DOS O MÁS COBERTURAS Si para la misma pérdida o daño se aplican dos o más coberturas de este certificado, la Compañía no pagará ningún monto mayor al importe efectivo de dicha pérdida o daño, aplicando el deducible de la causa primaria, salvo que se estipule lo contrario en las Condiciones Particulares de este certificado.<BR/><BR/>
<b>CLÁUSULA 15 . -</b> ACUMULACIÓN Si hubiere una acumulación de intereses más allá del límite de responsabilidad expresado en este certificado, por interrupción en el tránsito y/o la ocurrencia de alguna circunstancia fuera del control del Beneficiario o por cualquier accidente en el punto de transbordo y/o conexión con el buque o transportador, la Compañía responderá únicamente hasta el límite máximo de responsabilidad pactado. El Beneficiario podrá notificar a la Compañía cualquier acumulación, tan pronto como tenga conocimiento de los hechos para convenir las condiciones de resarcimiento de tal exceso.<BR/><BR/>
<b>CLÁUSULA 16 . -</b> PÉRDIDA TOTAL CONSTRUCTIVA Ninguna reclamación por Pérdida Total Constructiva será recuperable bajo los términos del presente certificado, a menos que los bienes protegidos sean abandonados porque su pérdida total fuere inevitable o porque los costos por concepto de recuperación, reacondicionamiento y reexpedición de los bienes al destino señalado en el certificado, serían superiores al valor de los bienes al llegar a dicho destino.<BR/><BR/>
<b>CLÁUSULA 17 . -</b> CONCURRENCIA La Compañía no será responsable por un porcentaje mayor al que exista entre el monto de este certificado y el valor conjunto de la Proteccion existente sobre los mismos bienes, que cubran el riesgo que haya originado la pérdida. Dicho porcentaje se aplicará sobre la pérdida. En caso de que exista más de una, sobre los bienes protegidos bajo este certificado y que cubran el riesgo que originó el siniestro, y que el valor de los bienes al momento del siniestro exceda el Límite Máximo por Embarque de este certificado, entonces primero se aplicará lo establecido en la "Cláusula 12.- Proporción Indemnizable", y sobre dicho valor a indemnizar se aplicará el porcentaje que exista entre el Límite Máximo por Embarque de este certificado y el Límite Máximo por Embarque de la Proteccion mencionada en el párrafo anterior de esta Cláusula.<BR/><BR/>
<b>CLÁUSULA 18 . -</b> SUBROGACIÓN En los términos de la Ley Sobre el Contrato de Proteccion artículo 111 , una vez pagada la indemnización correspondiente, la Compañía se subrogará hasta por la cantidad pagada en los derechos del Beneficiario, así como en sus correspondientes acciones contra los autores o responsables del siniestro. Si la Compañía lo solicita a costa de ella, el Beneficiario hará constar la subrogación en escritura pública. Si por hechos u omisiones que provengan del Beneficiario se impide la subrogación, la Compañía quedará liberada de sus obligaciones. Si el daño fue indemnizado sólo en parte, el Beneficiario y la Compañía concurrirán a hacer valer sus derechos en la proporción que les corresponden. La subrogación no procederá en caso de que el Beneficiario tenga relación conyugal o de parentesco por consanguinidad o afinidad hasta el segundo grado, con la persona que haya ocasionado el daño, o bien si es civilmente responsable de la misma.<BR/><BR/>
<b>CLÁUSULA 19 . -</b> PRESCRIPCIÓN Todas las acciones que se deriven de este Contrato de Proteccion prescribirán en 2 años, contados desde la fecha que les dio origen conforme al Artículo 81 , de la Ley Sobre el Contrato de Proteccion, salvo los casos de excepción, consignados en el Artículo 82 de la misma Ley. La prescripción se interrumpirá no solo por las causas ordinarias, sino también por aquellas a que se refiere la Ley de Protección y Defensa al Usuario de los Servicios Financieros. Las acciones derivadas del transporte marítimo mediante conocimiento de embarque prescribirán en un año, contado a partir de que la mercancía fue puesta a disposición del destinatario o de que la embarcación llegó a su destino sin la mercancía de referencia, de acuerdo con el Artículo 137 de la Ley de Navegación y Comercio Marítimos.<BR/><BR/>
<b>CLÁUSULA 20 . -</b> COMPETENCIA Y JURISDICCIÓN En caso de controversia, el Beneficiario podrá hacer valer sus derechos ante la Unidad Especializada de Atención de Consultas y Reclamaciones de la propia Compañía o en la Comisión Nacional para la Protección y Defensa de los Usuarios de Servicios Financieros (CONDUSEF), en términos de los Artículos 50 Bis y 68 de la Ley de Protección y Defensa al Usuario de Servicios Financieros. En todo caso, queda a elección del Beneficiario acudir ante las referidas instancias o directamente ante el juez. Lo anterior dentro del término de dos años contado a partir de que se suscite el hecho que le dio origen, o en su caso a partir de la negativa de la Compañía, a satisfacer las pretensiones del Beneficiario. De no someterse las partes al arbitraje de la CONDUSEF, o de quien ésta proponga, se dejarán a salvo los derechos del Beneficiario para que los haga valer ante el juez, en caso de que el Beneficiario opte por demandar, podrá a su elección, determinar la competencia por territorio, en razón del domicilio de la Compañía o de cualquiera de las Delegaciones de la Comisión Nacional para la Protección y Defensa de los Usuarios de los Servicios Financieros, en términos de lo dispuesto en el Artículo 1 36 de la Ley General de Instituciones y Sociedades Mutualistas.<BR/><BR/>
<b>CLÁUSULA 21 . -</b> LEY Y PRÁCTICA Esta Proteccion está sujeto a las Leyes y prácticas Mexicanas.<BR/><BR/>
<b>CLÁUSULA 22 . -</b> ARTÍCULO 25 DE LA LEY SOBRE EL CONTRATO DE PROTECCION Si el contenido del certificado o sus modificaciones no concordaron con la oferta, el Beneficiario podrá pedir la rectificación correspondiente dentro de los treinta días que sigan al día en que reciba el certificado. Transcurrido este plazo se considerarán aceptadas las estipulaciones del certificado o de sus modificaciones.<BR/><BR/>
<b>CLÁUSULA 23 . -</b> FALLAS EN EL SISTEMA DE REFRIGERACIÓN Y/O CALEFACCIÓN. Esta Proteccion cubre: 1. Pérdidas o daños a que esté sujeto el bien protegido, o pérdidas o daños resultantes de cualquier variación en temperatura causada según el inciso 2. de abajo. 2. Pérdidas o daños del bien protegido resultante de cualquier variación de temperatura atribuible a: - Rotura o descompostura de la máquina de refrigeración y/o calefacción que produzca una interrupción de por lo menos 24 horas consecutivas. - Incendio o explosión. - Encalladura, varadura, hundimiento o zozobra del barco o embarcación. - Vuelco o descarrilamiento del medio de transporte terrestre. - Choque o contacto del barco, embarcación o medio de transporte con cualquier objeto externo, excepto agua. - Descarga de la mercancía en puerto de arribada. Duración de la cobertura: 3. Esta Proteccion entra en vigor a partir del momento en que el vehículo cargado con los bienes inicia el tránsito del embarque cubierto, en el lugar de origen establecido en este certificado, continúa durante el curso ordinario del tránsito y termina: 3.1 a la entrega de dichas mercancías en el almacén final o en el lugar de almacenamiento de los consignatarios en el destino especificado en la presente. 3.2 a la entrega de dichas mercancías en cualquier otro almacén o sitio de almacenamiento, sea antes del destino indicado en la presente o en el que el Beneficiario elija usar, sea: 3.2.1 para almacenamiento, excepto en el curso ordinario del tránsito, o sea 3.2.2 para asignación o distribución, 3.3 al cumplirse cinco días de haber terminado la descarga de las mercancías aquí protegidas del buque transportador o del avión en el puerto final de descarga. Para el caso de transporte terrestre, doce horas después de llegada la mercancía al lugar de descarga. 4. Esta Cláusula sujeta a terminación como se estipula más arriba, no se extenderá más allá del comienzo del tránsito hacia otro destino, si después de ser descargadas del buque transportador, avión o camión en el puerto final de descarga, pero antes de la terminación de esta Proteccion, las mercancías deben despacharse hacia un destino distinto de aquel hasta el cual están protegidas por la presente. Exclusiones: - pérdida, daño o gasto atribuible a la falta de mantenimiento o al mal mantenimiento del equipo de refrigeración y de calefacción según las especificaciones del fabricante de tal equipo. - pérdida, daño o gasto atribuible a la falta de líquidos y/o gases que deben suministrarse al equipo de refrigeración y de   calefacción. - pérdida daño o gasto resultante de cualquier falta del Beneficiario o sus empleados en tomar todas las precauciones razonables para garantizar que el interés protegido sea mantenido en espacio refrigerado o, cuando fuera apropiado, propiamente aislado y enfriado. En caso de siniestro de un riesgo cubierto bajo este Cláusula, será indispensable que el Beneficiario presente las bitácoras de mantenimiento del equipo de refrigeración y de calefacción. Adicionalmente este tipo de siniestros deberán ser reportados inmediatamente que el Beneficiario tenga conocimiento de ellos.<BR/><BR/>
<b>CLÁUSULA 24 . -</b> CONTENEDOR El valor de la proteccion para contenedores es a valor real; el límite máximo de responsabilidad de la Compañía por contenedor sin importar la antigüedad y su tipo, será de hasta un máximo establecido y convenido de $ 100,000 M.N.<BR/><BR/>
<b>CUBRE DESDE LA TOMA DE VACÍO EN ORIGEN, HASTA LA ENTREGA DEL MISMO EN DESTINO.</b><BR/>
    </td>
</tr>
</table>
</div>
EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------
// -----------------      PAGINA 2      --------------------
// ---------------------------------------------------------


$p2 = <<<EOD
<div style="text-align:center;margin:0;padding:0;">
    <img src="/img/logo.jpg" with="200" alt="">
    <h4>RECORDATORIO DE LAS MEDIDAS DE SEGURIDAD QUE DEBEN CUMPLIRSE PARA LA CORRECTA COBERTURA DE ESTA PROTECCION.</h4>
</div>
<h6 style="text-align:justific;margin:0;padding:0;"> ATENCIÓN ESTIMADO CLIENTE:<BR/><BR/>

-	En ningún momento deberá la mercancía quedar sin vigilancia (chófer como mínimo) y/o seguridad durante los periodos de espera.<BR/><BR/>

-	Uso de caminos de cuota cuando estén disponibles.<BR/><BR/>

-	Para los embarques mayores a $2,000,000.00 MXN o 100,000.00 USD se requiere el uso de sistema de rastreo satelital / GPS.<BR/><BR/>

-	Uso de bitácora de viaje.<BR/><BR/>

- Les recordamos que las siguientes entidades son las que presentan mayor siniestralidad: Ciudad de México, Edo. de México, Veracruz, Tlaxcala, Puebla, Querétaro, Guanajuato, Michoacán, y Guadalajara por lo que se requiere el uso de sistema de rastreo satelital/GPS obligatorio.<BR/><BR/>

- En caso de ocurrir algún siniestro deben reportarlo en un tiempo no mayor a 48 hrs  de no ser así, la compañía, se eximirá de cualquier reclamación.<BR/><BR/>


En caso de Siniestro favor de comunicarse de inmediato con su Ejecutivo o bien a los telefonos 3141025292 | 3141350741
 </h6>
<p></p></br>
<!--<div style="text-align:justify; font-size:10px;margin:0;padding:0;">
<h5>COBERTURA BÁSICA</h5>
    <ol>
        <li>Daños ocasionados mientras no haya movilización del medio de transporte (que no se suscite accidente vial)</li>
        <li>Daños que sean imputables al dueño de los contenedores</li>
        <li>Fraude, Dolo, Mala Fe, ABUSO DE CONFIANZA, o Robo por parte de sus funcionarios, empleados, socios, dependientes o beneficiarios, que actúen solos ó en complicidad con otras personas.</li>
        <li>Traslados, dentro planta</li>
        <li>Daños Preexistentes</li>
        <li>Daños no reportados a la aseguradora dentro de los primeros 10 días a su ocurrencia.</li>
        <li>Daños o pérdidas, por abandono del medio de transporte del contenedor.</li>
    </ol>
</div>-->
<div style="font-size:10px;height:400px;text-align:center;">
<BR/><BR/><BR/><BR/><BR/><BR/><BR/><BR/><BR/><BR/><BR/><BR/><BR/>MANZANILLO, COLIMA<BR/>
CALLE COMUNICACIONES Y TRANSPORTES #104.<BR/>
COL. BARRIO I, VALLE DE LAS GARZAS. CP. 28219<BR/>
TEL.:314 336 5660 CEL.: 314 135 0741<BR/>
mercancias@containerallrisk.com.mx
</div>
EOD;


$pdf->AddPage();
$pdf->writeHTMLCell(0, 0, '', '', $p2, 0, 1, 0, true, '', true);

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('poliza.pdf', 'I');

}else{
    header("Location: mercancias.php");
}

//============================================================+
// END OF FILE
//============================================================+
?>