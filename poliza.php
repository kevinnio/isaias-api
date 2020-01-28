<?php
require_once("inc/functions.php");
if(!isset($_COOKIE["idUsuario"])) {
        header("Location: login.php");
}

//Get the info
$idViaje=$_GET["id"];
$result=query("SELECT UCASE(C.RazonSocial) AS 'RazonSocial',UCASE(C.RFC) AS 'RFC', C.Calle,C.Colonia,UCASE(C.Municipio) AS 'Municipio',UCASE(C.Estado) AS 'Estado',C.CP,UCASE(V.Cliente) AS 'Cliente', UCASE(TC.TipoContenedor) AS 'TipoContenedor', UCASE(V.Contenedor1) AS 'Contenedor1', UCASE(V.Contenedor2) AS 'Contenedor2', UCASE(V.Contenedor3) AS 'Contenedor3', UCASE(V.Contenedor4) AS 'Contenedor4', UCASE(V.Contenedor5) AS 'Contenedor5', UCASE(V.Contenedor6) AS 'Contenedor6', UCASE(V.Contenedor7) AS 'Contenedor7', UCASE(V.Contenedor8) AS 'Contenedor8', UCASE(V.Contenedor9) AS 'Contenedor9', UCASE(V.Contenedor10) AS 'Contenedor10', UCASE(V.Referencia) AS 'Referencia', V.CartaPorte, V.Origen, V.Destino, V.Placas, V.Operador, UCASE(V.TipoOperacion) AS 'TipoOperacion', V.FechaAlta, S.Precio, S.LimitMaxRespons, S.DeducibleMaterial, S.DeducibleRobo FROM viajes V LEFT JOIN clientes C ON V.idCliente=C.idCliente LEFT JOIN Servicios S ON (V.idTipoContenedor=S.idTipoContenedor and V.idCliente=S.idCliente) LEFT JOIN TiposContenedores TC ON TC.idTipoContenedor=V.idTipoContenedor WHERE V.idViaje=".$idViaje);

$row = mysqli_fetch_array($result);

if(CantidadRegistros($result)>0){


// Include the main TCPDF library (search for installation path).
require_once('inc/TCPDF/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Container All Risk');
$pdf->SetTitle('Poliza Container All Risk');
$pdf->SetSubject('Poliza Container All Risk');
$pdf->SetKeywords('Poliza, Container, All, Risk');

// set default header data
//$pdf->SetHeaderData();
//$pdf->setFooterData();

// set header and footer fonts
//$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, 20, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
//$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

$cant=0;
$contenedores="";
// Obtengo la cantidad de contenedores con datos y 
//almaceno una variable con los datos de los contenedores, 
//que luego debe ser usada en la tabla.
for ($i=1; $i <=10 ; $i++) {
    $contenedor='Contenedor'.$i; 
    if($row[$contenedor] != ''){
        $cant++;
        $contenedores.=(empty($contenedores))? $row[$contenedor]: ' - '.$row[$contenedor];
    }
}
$calle="";
$razonSocial=htmlentities(strtoupper($row["RazonSocial"]));
$origen=htmlentities(strtoupper($row["Origen"]));
$destino=htmlentities(strtoupper($row["Destino"]));
$operador=htmlentities(strtoupper($row["Operador"]));
$calle=htmlentities(strtoupper($row["Calle"]));
$municipio=htmlentities(strtoupper($row["Municipio"]));
$estado=htmlentities(strtoupper($row["Estado"]));
$cliente=htmlentities(strtoupper($row["Cliente"]));
$refp=htmlentities(strtoupper($row["Referencia"]));

$precio=(int)$row["Precio"];
$subtotal=$precio*$cant;
$iva=$subtotal*0.16;
$total=$subtotal*1.16;

$html = <<<EOD
<div style="text-align:center;">
    <img src="img/logo.jpg" with="200" alt="">
    <h5>CERTIFICADO DE PROTECCION DE CONTENEDOR</h5>
    <h5>"A TODO RIESGO"</h5>
</div>
<table>
<tr>
    <td style="font-size:10px;text-align:left;"><b>POLIZA:</b> {$idViaje}</td>
    <td style="font-size:10px;text-align:left;"></td>
    <td style="font-size:10px;text-align:left;"></td>
    <td style="font-size:10px;text-align:left;"><b>REFERENCIA: </b>{$idViaje}-{$cant}</td><BR/><BR/><BR/>
    <td style="font-size:10px;text-align:left;"><b></b></td>
</tr>
<tr bgcolor="#fcc10f">
    <td style="font-size:10px;text-align:center;border: 1px solid black; height:18px;line-height:20px;" colspan="6"><b>DATOS DEL CLIENTE</b></td>
</tr>
<tr><BR/>
    <td style="font-size:10px;text-align:left;line-height:20px;" colspan="3"><b>BENEFICIARIO: </b> {$razonSocial}</td>
    <td colspan="2" style="font-size:10px;text-align:left;line-height:20px;"><b>POBLACI&Oacute;N:</b> {$municipio}</td>
</tr>
<tr>
    <td style="font-size:10px;text-align:left;line-height:20px;" colspan="3"><b>DOMICILIO: </b> {$calle}</td>
    <td style="font-size:10px;text-align:left;line-height:20px;"><b>ESTADO:</b> {$estado}</td>
    <td style="font-size:10px;text-align:left;line-height:20px;"><b>C.P.:</b> {$row["CP"]}<BR/></td>
    
</tr>
<tr bgcolor="#fcc10f">
    <td style="font-size:10px;text-align:center;border: 1px solid black;height:18px;line-height:20px;" colspan="6"><b>DATOS DEL CONTENEDOR</b></td>
</tr>
<tr><BR/>
    <td style="font-size:10px;text-align:left;line-height:20px;" colspan="3">COBERTURA A PARTIR DEL &nbsp;<b>{$row["FechaAlta"]}</b></td>
    <td style="font-size:10px;text-align:left;line-height:20px;" colspan="2"><b>TIPO: </b>{$row["TipoContenedor"]} {$row["TipoOperacion"]}</td>
</tr>
<tr>
    <td style="font-size:10px;text-align:left;line-height:20px;" colspan="5"><b>CLIENTE: </b>{$cliente}</td>
</tr>
<tr>
    <td style="font-size:10px;text-align:left;line-height:20px;" colspan="3"><b>CONTENEDOR: </b>{$contenedores}</td>

    <td style="font-size:10px;text-align:left;line-height:20px;" colspan="2"><b>REFERENCIA: </b>{$row["CartaPorte"]}</td>
</tr>
<tr>
    <td style="font-size:10px;text-align:left;line-height:20px;" colspan="1"><b>CARTA PORTE: </b>{$refp}</td>
    <td style="font-size:10px;text-align:left;line-height:20px;" colspan="3"><b>ORIGEN DESTINO: </b>{$origen} - {$destino}</td>

</tr>
<tr>
    <td style="font-size:10px;text-align:left;line-height:20px;"><b>PLACA: </b>{$row["Placas"]}</td>
    <td style="font-size:10px;text-align:left;line-height:20px;" colspan="3"><b>OPERADOR: </b>{$operador}</td>
</tr>
</table>
<table>
<tr><BR/>
<td style="border: 1px solid black;">
<table>
<tr bgcolor="#fcc10f">
    <td style="font-size:10px;text-align:center;border: 1px solid black;height:18px;line-height:20px;"><b>COBERTURA</b></td>
    <td style="font-size:10px;text-align:center;border: 1px solid black;height:18px;line-height:20px;"><b>LIMITE MAX RESPONSABILIDAD</b></td>
    <td style="font-size:10px;text-align:center;border: 1px solid black;height:18px;line-height:20px;"><b>DEDUCIBLE MATERIAL</b></td>
    <td style="font-size:10px;text-align:center;border: 1px solid black;height:18px;line-height:20px;"><b>DEDUCIBLE ROBO</b><BR/></td>
</tr>
</table>
</td></tr></table>
<table>
<tr>
    <td style="font-size:10px;text-align:center;height:18px;line-height:20px;"><b>{$row["TipoContenedor"]}</b></td>
    <td style="font-size:10px;text-align:center;height:18px;line-height:20px;"><b>$ {$row["LimitMaxRespons"]}</b></td>
    <td style="font-size:10px;text-align:center;height:18px;line-height:20px;"><b>{$row["DeducibleMaterial"]}%</b></td>
    <td style="font-size:10px;text-align:center;height:18px;line-height:20px;"><b>{$row["DeducibleRobo"]}%</b></td>
</tr>
</table>
<table>
<tr>
    <td style="font-size:10px;text-align:center;">
    CONTAINER ALL RISK SC SE OBLIGA A REEMBOLSAR LOS DAÑOS<BR/>
    MATERIALES PARCIALES O PÉRDIDA TOTAL POR DAÑOS O ROBO DE LOS CONTENEDORES REPORTADOS<BR/>
    Y MANIOBRAS DE SALVAMENTO DE LOS MISMOS DE ACUERDO EN LO ESPECIFICADO EN LA CARÁTULA<BR/>
    DE LA DECLARACIÓN DE EMBARQUE; Y <b>{$razonSocial}</b> SE OBLIGA A REPORTAR<BR/>
    EN EL PORTAL DE CONTAINER ALL RISK SC DICHOS CONTENEDORES<BR/>
    ANTES DE QUE SALGAN DEL PUERTO INTERIOR O DE LOS PATIOS AUTORIZADOS,<BR/>
    EN CASO DE OCURRIR ALGÚN SINIESTRO DEBEN REPORTARLO EN UN TIEMPO NO MAYOR A 48 HRS<BR/>
    DE NO SER ASÍ, LA COMPAÑÍA, SE EXIMIRÁ DE CUALQUIER RECLAMACIÓN.<BR/>
    QUEDA EXCLUIDO EL ROBO PARCIAL, DEL EQUIPO DE ENFRIAMIENTO.<BR/>
    <b> EN CASO DE REPORTE DE ROBO, SI NO SE ENTREGA LA DOCUMENTACION CORRESPONDIENTE EN UN PLAZO MAXIMO DE 1 MES, SE DARA POR DECLINADO EL SINIESTRO.</b> 
    <b> UNA VEZ DADA DE ALTA LA PROTECCION DEL CONTENEDOR TENEMOS 12 HORAS PARA SU CANCELACION</b>
    </td>
</tr>
</table>
<table>
<tr bgcolor="#fcc10f">
    <td style="font-size:10px;text-align:center;border: 1px solid black;height:18px;line-height:20px;" colspan="5"><b>PRIMAS CONTENEDORES</b></td>
</tr>
<tr>
    <td style="font-size:10px;text-align:center;line-height:20px;"><b>PRECIO UNITARIO:</b></td>
    <td style="font-size:10px;text-align:center;line-height:20px;"><b>CANTIDAD</b></td>
    <td style="font-size:10px;text-align:center;line-height:20px;"><b>SUBTOTAL</b></td>
    <td style="font-size:10px;text-align:center;line-height:20px;"><b>I.V.A.</b></td>
    <td style="font-size:10px;text-align:center;line-height:20px;"><b>PRIMA TOTAL</b></td>
</tr>
<tr>
    <td style="font-size:10px;text-align:center;line-height:20px;"><b>$ {$precio}</b></td>
    <td style="font-size:10px;text-align:center;line-height:20px;"><b>{$cant}</b></td>
    <td style="font-size:10px;text-align:center;line-height:20px;"><b>$ {$subtotal}</b></td>
    <td style="font-size:10px;text-align:center;line-height:20px;"><b>$ {$iva}</b></td>
    <td style="font-size:10px;text-align:center;line-height:20px;"><b>$ {$total}</b></td>
</tr>
</table><BR/>

<div style="font-size:10px;text-align:center;">
MANZANILLO, COLIMA<BR/>
CALLE COMUNICACIONES Y TRANSPORTES #104.<BR/>
COL. BARRIO I, VALLE DE LAS GARZAS. CP. 28219<BR/>
TEL.:314 336 5660 CEL.: 314 135 0741<BR/>
emision@containerallrisk.com.mx
</div>
EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------
// -----------------      PAGINA 2      --------------------
// ---------------------------------------------------------

/*
$p2 = <<<EOD
<div style="text-align:center;margin:0;padding:0;">
    <img src="img/logo.jpg" with="200" alt="">
    <h2>***COBERTURA ADICIONAL***</h2>
</div>
<h5 style="text-align:center;margin:0;padding:0;"> °Lavado de contenedores $20.00 MX </h5><p>
<h5 style="text-align:center;margin:0;padding:0;"> Limite Maximo de Responsabilidad (LMR) $3,000.00 MX </h5><p>
<h5 style="text-align:center;margin:0;padding:0;"> Unicamente por derrame de algun quimico peligroso, aceite o grasas a consecuencia de un accidente o mala maniobra </h5><p></p>
<h5 style="text-align:center;margin:0;padding:0;"> °Gastos Adicionales del Contenedor NO INCLUIDOS </h5><p></p>
<h5 style="text-align:center;margin:0;padding:0;"> °No amparamos demoras, almacenajes ni lavados generales </h5><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>


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
MANZANILLO, COLIMA<BR/>
CALLE COMUNICACIONES Y TRANSPORTES #104.<BR/>
COL. BARRIO I, VALLE DE LAS GARZAS. CP. 28219<BR/>
TEL.:314 336 5660 CEL.: 314 135 0741<BR/>
mercancias@containerallrisk.com.mx
</div>
EOD;
    


$pdf->AddPage();
$pdf->writeHTMLCell(0, 0, '', '', $p2, 0, 1, 0, true, '', true);*/

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('poliza-se.pdf', 'I');

}else{
    header("Location: viajes.php");
}

//============================================================+
// END OF FILE
//============================================================+
?>