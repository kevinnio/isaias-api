<!DOCTYPE html>
<html lang="es">

<head>
    <title>CONTAINER ALL RISK</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="favicon.ico" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <link href='css/bootstrap.css' rel='stylesheet' />
    <link href='css/rotating-card.css' rel='stylesheet' />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style>
        body {
            font: 400 15px Lato, sans-serif;
            line-height: 1.8;
            color: #ffffff;
            margin: 0;
            padding: 0;
        }

        h2 {
            font-size: 24px;
            text-transform: uppercase;
            color: #ffffff;
            font-weight: 600;
            margin-bottom: 30px;
        }

        h4 {
            font-size: 19px;
            line-height: 1.375em;
            color: #ffffff;
            font-weight: 400;
            margin-bottom: 30px;
        }

        h6 {
            font-size: 10px;
            line-height: 1.375em;
            color: #ffffff;
            font-weight: 400;
            margin-bottom: 30px;
        }

        /*p {
                background: linear-gradient(90deg, #000, #fff, #000);
                background-repeat: no-repeat;
                background-size: 80%;
                animation: animate 2s linear infinite;
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }
            @keyframes animate 
            {
                0% 
                {
                    background-position: -500%;
                }
                100% 
                {
                    background-position: 500%;
                }
            }*/
        .jumbotron {
            background: url('img/indice.jpg') no-repeat center center fixed;
            padding-top: 14%;
            padding-bottom: 20%;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            background-size: cover;
            -o-background-size: cover;
            background-color: #000;
            color: #fcc10f;
        }

        .container-fluid {
            padding: 60px 50px;
        }

        .bg-grey {
            background-color: #000;
        }

        .logo-small {
            color: #fcc10f;
            font-size: 50px;
        }

        .logo {
            color: #fcc10f;
            font-size: 200px;
        }

        .thumbnail {
            padding: 0 0 15px 0;
            border: none;
            border-radius: 0;
        }

        .thumbnail img {
            width: 100%;
            height: 100%;
            margin-bottom: 10px;
        }

        .carousel-control.right,
        .carousel-control.left {
            background-image: none;
            color: #fcc10f;
        }

        .carousel-indicators li {
            border-color: #fcc10f;
        }

        .carousel-indicators li.active {
            background-color: #fcc10f;
        }

        .item h4 {
            font-size: 19px;
            line-height: 1.375em;
            font-weight: 400;
            font-style: italic;
            margin: 70px 0;
        }

        .item span {
            font-style: normal;
        }

        .panel {
            border: 1px solid #fcc10f;
            border-radius: 0 !important;
            transition: box-shadow 0.5s;
        }

        .panel:hover {
            box-shadow: 5px 0px 40px rgba(0, 0, 0, .2);
        }

        .panel-footer .btn:hover {
            border: 1px solid #fcc10f;
            background-color: #fff !important;
            color: #fcc10f;
        }

        .panel-heading {
            color: #fff !important;
            background-color: #fcc10f !important;
            padding: 25px;
            border-bottom: 1px solid transparent;
            border-top-left-radius: 0px;
            border-top-right-radius: 0px;
            border-bottom-left-radius: 0px;
            border-bottom-right-radius: 0px;
        }

        .panel-footer {
            background-color: white !important;
        }

        .panel-footer h3 {
            font-size: 32px;
        }

        .panel-footer h4 {
            color: #aaa;
            font-size: 14px;
        }

        .panel-footer .btn {
            margin: 15px 0;
            background-color: #fcc10f;
            color: #fff;
        }

        .navbar {
            margin-bottom: 0;
            background-color: #0000;
            z-index: 9999;
            border: 0;
            font-size: 12px !important;
            line-height: 1.42857143 !important;
            letter-spacing: 4px;
            border-radius: 0;
            font-family: Montserrat, sans-serif;
        }

        .navbar li a,
        .navbar .navbar-brand {
            color: #fff !important;
        }

        .navbar-nav li a:hover,
        .navbar-nav li.active a {
            color: #fcc10f !important;
            /*background-color: #000 !important;*/
        }

        .navbar-default .navbar-toggle {
            border-color: transparent;
            color: #fff !important;
        }

        footer .glyphicon {
            font-size: 20px;
            margin-bottom: 20px;
            color: #fcc10f;
        }

        .slideanim {
            visibility: hidden;
        }

        .slide {
            animation-name: slide;
            -webkit-animation-name: slide;
            animation-duration: 1s;
            -webkit-animation-duration: 1s;
            visibility: visible;
        }

        @keyframes slide {
            0% {
                opacity: 0;
                transform: translateY(70%);
            }

            100% {
                opacity: 1;
                transform: translateY(0%);
            }
        }

        @-webkit-keyframes slide {
            0% {
                opacity: 0;
                -webkit-transform: translateY(70%);
            }

            100% {
                opacity: 1;
                -webkit-transform: translateY(0%);
            }
        }

        section {
            width: 100%;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        .card {
            position: relative;
            /*max-width: 300px;*/
            height: auto;
            background: linear-gradient(-45deg, #fbc00f, #000000);
            border-radius: 50px;
            margin: 0 auto;
            -webkit-box-shadow: 0 10px 15px rgba(0, 0, 0, .1);
            box-shadow: 0 10px 15px rgba(0, 0, 0, .1);
            -webkit-transition: .5s;
            transition: .5s;
        }

        .card:hover {
            -webkit-transform: scale(1.4);
            transform: scale(1.4);
        }

        .title .fa {
            color: #fff;
            font-size: 60px;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            text-align: center;
            line-height: 100px;
            -webkit-box-shadow: 0 10px 10px rgba(0, 0, 0, .1);
            box-shadow: 0 10px 10px rgba(0, 0, 0, .1);
        }

        .title h2 {
            position: relative;
            margin: 20px 0 0;
            padding: 0;
            color: #fff;
            font-size: 28px;
            z-index: 2;
        }

        .price,
        .option {
            position: relative;
            z-index: 2;
        }

        .price h4 {
            margin: 0;
            padding: 20px 0;
            color: #fff;
            font-size: 60px;
        }

        ul li a {
            display: block;
            position: relative;
            text-decoration: none;

            color: aqua;
            text-transform: uppercase;
            transition: 0.5;
        }

        ul:hover li a {
            transform: scale(1.1);
            opacity: .9;
            filter: blur(1px);
        }

        ul li a:hover {
            transform: scale(1.14);
            opacity: 1;
            filter: blur(0);
        }

    </style>
</head>

<body id="inicio" data-spy="scroll" data-target=".navbar" data-offset="60">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header"></div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#acerca">¿QUIENES SOMOS?</a></li>
                    <li><a href="#siniestros">SINIESTROS</a></li>
                    <li><a href="#valores">M/V</a></li>
                    <li><a href="#oferta">OFERTA DE VALORES</a></li>
                    <li><a href="#servicios">SERVICIOS</a></li>
                    <li><a href="#contacto">CONTACTO</a></li>
                    <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span>Login</a></li>
                    <li><a></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="jumbotron text-center">
        <a><img src="img/car-w.png" width="350"></a>
        <p>&#x1F512; Protección de Mercancías y Contenedores &#x1F512;</p>
        <?php
            function contador()
            {
                $archivo = "contador.txt";
                $f = fopen($archivo, "r");
                $contador = 0;
                if($f)
                {
                    $contador = fread($f, filesize($archivo));
                    $contador = $contador + 1;
                    fclose($f);
                }
                $f = fopen($archivo, "w+");
                if($f)
                {
                    fwrite($f, $contador);
                    fclose($f);
                }
                return $contador;
            }
            $visitante = contador();
            echo "Visitas: ", $visitante;
            ?>
    </div>
    <div id="acerca" class="container-fluid slideanim">
        <div class="row">
            <div class="col-sm-9">
                <h2>¿Quiénes somos?</h2>
            </div>
            <div class="col-sm-9" ALIGN="justify">
                <p>Somos una Empresa Mexicana, especializada en la protección de Contenedores y Carga, con Coberturas Únicas en el mercado.</p><br />

                <p>Con 30 años de experiencia para brindarles la Confianza, Seguridad y el Servicio que necesitan.</p><br />

                <p>Una empresa con experiencia en seguros de más de 25 años y en la protección de contenedores más de 10 años.</p><br />

                <p>Cubriendo la necesidad de nuestros clientes transportistas y Agentes aduanales, al contar con una empresa que les garantice el resarcimiento del daño que les genera un contenedor siniestrado.</p><br /><br />
            </div>
            <div class="col-sm-2">
                <span class="glyphicon glyphicon-user logo slideanim"></span>
            </div>
        </div>
    </div>
    <div id="siniestros" class="container-fluid slideanim">
        <div class="row">
            <div class="col-sm-9">
                <h2>PROCEDIMIENTO EN CASO DE SINIESTROS</h2>
            </div>
            <div class="col-sm-9" ALIGN="justify">
                <h4>MEDIDAS DE SALVAGUARDA Y/O PROTECCION</h4>
                <p>El asegurado está obligado a tomar todas las providencias necesarias para prevenir el siniestro o disminuir los daños, salvar o recuperar los bienes asegurados o conservar sus restos, entendiéndose que el cumplimiento de las antedichas obligaciones no lo privara del derecho de hacer abandono cuando corresponda. La intervención del asegurado o sus representantes en el cobro, salvamento preservación de los objetos asegurados, tampoco implica aceptación del abandono. La compañía además de cualquier otra suma con la que indemnice los danos o perdidas que sufran las mercancías aseguradas, reembolsara al asegurado el importa de tales gastos incurridos. En todo caso, el importe de tales gastos no puede exceder el valor del daño evitado.</p>
            </div>
            <div class="col-sm-2">
                <span class="glyphicon glyphicon-heart logo slideanim"></span>
            </div>
        </div>
    </div>
    <div id="siniestros" class="container-fluid slideanim">
        <div class="row">
            <div class="col-sm-9" ALIGN="justify">
                <h4>AVISOS</h4>
                <p>Informar inmediatamente por escrito, vía telefónica o en persona a la empresa de lo ocurrido, en un plazo no mayor a 48 horas de la fecha en que se haya tenido conocimiento de la existencia de algún daño o mismo.</p>
                <p>Brindamos atención personalizada las 24*7*365 a través de un WhatsApp, vía telefónica o correo electrónico, ya sea para proteger tus contenedores o reportar un siniestro.</p>
            </div>
            <div class="col-sm-2">
                <span class="glyphicon glyphicon-time logo slideanim"></span>
            </div>
        </div>
    </div>
    <div id="siniestros" class="container-fluid slideanim">
        <div class="row">
            <div class="col-sm-9" ALIGN="justify">
                <h4>CERTIFICACION DE DAÑOS</h4>
                <p>La certificación de daños se hará en función de lo que nos indique la naviera o la empresa autorizada y certificada por esta misma, que hará la reparación, indicando los daños; validados medio de fotos. En Caso de pérdida total por Daños Materiales, la empresa naviera nos indicará cuál es el resarcimiento de daños.
                </p>
            </div>
            <div class="col-sm-2">
                <span class="glyphicon glyphicon-certificate logo slideanim"></span>
            </div>
        </div>
    </div>
    <div id="valores" class="container-fluid bg-grey">
        <div class="row">
            <div class="col-sm-3">
                <br><br><br><br><span class="glyphicon glyphicon-education logo slideanim"></span>
            </div>
            <div class="col-sm-8 slideanim" ALIGN="justify">
                <h2>VALORES</h2><br>
                <h4><strong>MISION:<br></strong></h4>
                <p> Ayudar a nuestros clientes a alcanzar sus metas de negocio, proveyéndoles de la mejor cobertura en la protección de contenedores y mercancías, Innovando con base en sus necesidades, de la mano de un servicio de excelencia.</p><br>
                <h4><strong>VISION:</strong></h4>
                <p> Ser la empresa <strong>Líder</strong> en la protección de contenedores y mercancías en México.</p><br><br><br>
            </div>
        </div>
    </div>
    <div id="oferta" class="container-fluid bg-grey">
        <div class="row">
            <div class="col-sm-3">
                <br><br><br><br><br><br><br><br><span class="glyphicon glyphicon-star-empty logo slideanim"></span>
            </div>
            <div class="col-sm-9 slideanim" ALIGN="justify">
                <h2>OFERTA DE VALORES</h2><br>
                <p> <strong>CUMPLIMIENTO</strong><br> ¡Honramos nuestros acuerdos, Si o Si!</p>
                <p> <strong>DIAGNOSTICO Y ASESORIA ESTRATEGICA</strong><br> Somos especialistas, conocemos y desarrollamos nuestras relaciones de una manera profesional. ¡Mejoramos tu situación actual!</p>
                <p> <strong>CAPACIDAD DE RESPUESTA</strong><br> ¡Estamos cuando nos necesitas! Nuestra organización trabaja para ti, agilizamos y resolvemos tus necesidades en materia de seguros.</p>
                <p> <strong>COMPROMISO</strong><br> ¡Su bienestar no mueve! Resolvemos el que pasa sí..</p>
                <p> <strong>HONESTIDAD</strong><br> ¡El enfoque, de nuestras propuestas, es tu negocio! Velamos por tus intereses, somos claros en condiciones, coberturas y alcances.</p>
                <p> <strong>CORDIALIDAD</strong><br> Asegurar con calidez, tu tranquilidad</p>
                <p> <strong>CERTEZA</strong><br> Contamos con el equipo de trabajo y la infraestructura requerida para cumplir y exceder sus expectativas. ¡Hacemos que las cosas sucedan!</p>
                <p> <strong>PERMANENCIA</strong><br> Quince años de experiencia en el ramo de seguros. </p>
            </div>
        </div>
    </div>
    <div id="servicios" class="container-fluid text-center">
        <h2>SERVICIOS</h2>
        <h4>¿Que ofrecemos?</h4>
        <p> En Container all risk nos preocupamos por tu tranquilidad, por lo que hemos creado la mejor cobertura para ti, que se ajuste a tus necesidades.</p>
        <div class="row slideanim">
            <section>
                <div class="container-fluid">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <!--<div class="card text-center">
                                        <div class="title">
                                            <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                            <h2>Cobertura</h2>
                                            <h2>Basica</h2>
                                            <h6>*Consultar exclusiones</h6>
                                        </div>
                                        <div class="option">
                                            <ul>
                                                <li> <i></i> Daños Materiales $80,000.00 </li>
                                                <li> <i></i> Robo total $80,000.00</li>
                                                <li> <i></i> Para contenedores secos (20DC, 40DC, 40HC) </li>
                                                <li> <i></i> Únicamente en Riesgos Ordinarios de Transito (Volcadura o colisión) </li><br/>
                                                <li> <i></i> En base al volumen podemos negociar tarifa.</li>
                                            </ul>
                                        </div>
                                    </div>-->
                            </div>
                            <div class="col-sm-12">
                                <div>
                                    <div class="title">
                                        <i class="fa fa-plane" aria-hidden="true"></i>
                                        <h2>Cobertura</h2>
                                        <h2>¡A TODO RIESGO!</h2>
                                        <h6>Sin exclusiones</h6>
                                    </div>
                                    <div class="option">
                                        <ul class="fa fa-star">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Cobertura</th>
                                                        <th scope="col">Lim. Max. Resp. SECO</th>
                                                        <th scope="col">Deducible SECO</th>
                                                        <th scope="col">Lim. Max. Resp. REFFER</th>
                                                        <th scope="col">Deducible REFFER</th>
                                                        <th scope="col" class="text-center">Observaciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Daños materiales parciales</th>
                                                        <td>$100,000</td>
                                                        <td>5%</td>
                                                        <td>$300,000</td>
                                                        <td>10%</td>
                                                        <td>Sobre el valor del daño</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Daños materiales totales</th>
                                                        <td>$100,000</td>
                                                        <td>5%</td>
                                                        <td>$300,000</td>
                                                        <td>10%</td>
                                                        <td>Sobre el valor del daño</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Robo Total</th>
                                                        <td>$100,000</td>
                                                        <td>5%</td>
                                                        <td>$300,000</td>
                                                        <td>10%</td>
                                                        <td>Sobre el valor depreciado de Naviera</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Grúas</th>
                                                        <td>$30,000</td>
                                                        <td>No aplica</td>
                                                        <td>$30,000</td>
                                                        <td>No aplica</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"></th>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div id="contacto" class="container-fluid bg-grey">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="col-md-3 col-sm-6">
                    <div class="card-container slideanim">
                        <div class="card">
                            <div class="front">
                                <div class="cover">
                                    <img src="img/puertos2.jpg" />
                                </div>
                                <div class="user">
                                    <img class="img-circle" src="img/s.png" />
                                </div>
                                <div class="content">
                                    <div class="main">
                                        <h3 class="name">Sandra Figueroa</h3>
                                        <p class="profession">Mercancias</p>
                                        <p class="text-center">"Brindar seguridad <br> para tu tranquilidad" <br> <strong>¡Estamos contigo!</strong></p>
                                    </div>
                                </div>
                            </div>
                            <div class="back">
                                <div class="cover">
                                    <img src="img/rotating_card_thumb3.png" />
                                </div>
                                <div class="user">
                                    <img class="img-circle" src="img/s.png" />
                                </div>
                                <div class="content">
                                    <div class="main">
                                        <h3 class="name">Sandra Figueroa</h3><br>
                                        <p class="text-center"><img src="https://img.icons8.com/material-rounded/26/000000/phone.png"><a href="tel:3141350741">314 135 0741</a><br> <img src="https://img.icons8.com/material-rounded/26/000000/new-post.png"><a href="mailto:mercancias@containerallrisk.com.mx">mercancias@ containerallrisk.com.mx</a> Calle Comunicaciones y Trasportes #104 Col, Los Pinos, Barrio 1
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card-container slideanim">
                        <div class="card">
                            <div class="front">
                                <div class="cover">
                                    <img src="img/transporte.jpg" />
                                </div>
                                <div class="user">
                                    <img class="img-circle" src="img/Intermodal.jpg" />
                                </div>
                                <div class="content">
                                    <div class="main">
                                        <h3 class="name">Isaias Sanchez</h3>
                                        <p class="profession">Siniestros</p>
                                        <p class="text-center">"Siempre al pendiente <br> de solucionar tus problemas." <br> <strong>¡Estamos contigo!</strong></p>
                                    </div>
                                </div>
                            </div>
                            <div class="back">
                                <div class="cover">
                                    <img src="img/rotating_card_thumb3.png" />
                                </div>
                                <div class="user">
                                    <img class="img-circle" src="img/I.png" />
                                </div>
                                <div class="content">
                                    <div class="main">
                                        <h3 class="name">Isaias Sanchez</h3><br>
                                        <p class="text-center"><img src="https://img.icons8.com/material-rounded/26/000000/phone.png"><a href="tel:3365660">33 6 56 60</a><br> <img src="https://img.icons8.com/material-rounded/26/000000/new-post.png"><a href="mailto:siniestros@containerallrisk.com.mx">siniestros@ containerallrisk.com.mx</a> Calle Comunicaciones y Trasportes #104 Col, Los Pinos, Barrio 1
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card-container slideanim">
                        <div class="card">
                            <div class="front">
                                <div class="cover">
                                    <img src="img/manzanillop.png" />
                                </div>
                                <div class="user">
                                    <img class="img-circle" src="img/o.png" />
                                </div>
                                <div class="content">
                                    <div class="main">
                                        <h3 class="name">Ofelia Vargas</h3>
                                        <p class="profession">Contenedores</p>
                                        <p class="text-center">"Protegerte es <br> nuestro compromiso" <br> <strong>¡Estamos contigo!</strong></p>
                                    </div>
                                </div>
                            </div>
                            <div class="back">
                                <div class="cover">
                                    <img src="img/rotating_card_thumb3.png" />
                                </div>
                                <div class="user">
                                    <img class="img-circle" src="img/o.png" />
                                </div>
                                <div class="content">
                                    <div class="main">
                                        <h3 class="name">Ofelia Vargas</h3><br>
                                        <p class="text-center"><img src="https://img.icons8.com/material-rounded/26/000000/phone.png"><a href="tel:3365660">33 6 56 60</a><br> <img src="https://img.icons8.com/material-rounded/26/000000/new-post.png"><a href="mailto:emision@containerallrisk.com.mx">emision@ containerallrisk.com.mx</a> Calle Comunicaciones y Trasportes #104 Col, Los Pinos, Barrio 1
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card-container slideanim">
                        <div class="card">
                            <div class="front">
                                <div class="cover">
                                    <img src="img/puertoo.png" />
                                </div>
                                <div class="user">
                                    <img class="img-circle" src="img/l.png" />
                                </div>
                                <div class="content">
                                    <div class="main">
                                        <h3 class="name">Laura Muñiz</h3>
                                        <p class="profession">Ventas</p>
                                        <p class="text-center">"Somos tu <br> mejor opcion" <br> <strong>¡Estamos contigo!</strong></p>
                                    </div>
                                </div>
                            </div>
                            <div class="back">
                                <div class="cover">
                                    <img src="img/rotating_card_thumb3.png" />
                                </div>
                                <div class="user">
                                    <img class="img-circle" src="img/l.png" />
                                </div>
                                <div class="content">
                                    <div class="main">
                                        <h3 class="name">Laura Muñiz</h3><br>
                                        <p class="text-center"><img src="https://img.icons8.com/material-rounded/26/000000/phone.png"><a href="tel:3141025295">314 102 5295</a><br> <img src="https://img.icons8.com/material-rounded/26/000000/new-post.png"><a href="mailto:contacto@containerallrisk.com.mx">contacto@ containerallrisk.com.mx</a> Calle Comunicaciones y Trasportes #104 Col, Los Pinos, Barrio 1
                                    </div>
                                </div>
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

    <script type="text/javascript">
        $().ready(function() {
            $('[rel="tooltip"]').tooltip();
            $('a.scroll-down').click(function(e) {
                e.preventDefault();
                scroll_target = $(this).data('href');
                $('html, body').animate({
                    scrollTop: $(scroll_target).offset().top - 10
                }, 100);
            });
        });

        function rotateCard(btn) {
            var $card = $(btn).closest('.card-container');
            console.log($card);
            if ($card.hasClass('hover')) {
                $card.removeClass('hover');
            } else {
                $card.addClass('hover');
            }
        }

    </script>
</body>

</html>
