<?php
    require_once("inc/functions.php");
    $dateTime=date("Y-m-d H:i:s");
    if(isset($_COOKIE["idUsuario"])) {
        header("Location: viajes.php");
    }
    if (isset($_POST["usuario"])) {
        $result=query("SELECT * FROM clientes WHERE usuario='" . $_POST["usuario"] . "' AND (pass=md5('". $_POST["password"] . "') OR contra='". $_POST["password"] . "') AND lvl>0");
        $row = mysqli_fetch_array($result);
        $idCliente=$row['idCliente'];
        query("UPDATE `clientes` SET `login`=NOW() WHERE `idCliente`='$idCliente';");
        if (mysqli_num_rows($result)==1) {
            $cookie_name = "idUsuario";
            $cookie_value = $row['idCliente'];
            setcookie($cookie_name, $cookie_value, time() + (86400 * 1), "/"); // 86400 = 1 dia
            $cookie_user = "usuario";
            $cookie_user_value = $row['RazonSocial'];
            setcookie($cookie_user, $cookie_user_value, time() + (86400 * 1), "/");
            $cookie_lvl = "lvl";
            $cookie_lvl_value = $row['lvl'];
            setcookie($cookie_lvl, $cookie_lvl_value, time() + (86400 * 1), "/");
            header("Location: viajes.php");
        }else{
            $loginError="Usuario o contraseña incorrecta";
            echo $loginError;
        }
    }
?>
<!DOCTYPE html>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    <title>Login | Container All Risk</title>
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Numans');

        html,
        body {
            background-image: url('img/casco.gif');
            background-size: cover;
            background-repeat: no-repeat;
            height: 100%;
            font-family: 'Numans', sans-serif;
        }

        .container {
            height: 100%;
            align-content: center;
        }

        .card {
            height: 370px;
            margin-top: auto;
            margin-bottom: auto;
            width: 400px;
            background-color: rgba(0, 0, 0, 0.5) !important;
            border-radius: 10%;
        }

        .social_icon span {
            font-size: 60px;
            margin-left: 10px;
            color: #FFC312;
        }

        .social_icon span:hover {
            color: white;
            cursor: pointer;
        }

        .card-header h3 {
            color: white;
        }

        .social_icon {
            position: absolute;
            right: 20px;
            top: -45px;
        }

        .input-group-prepend span {
            width: 50px;
            background-color: #FFC312;
            color: black;
            border: 0 !important;
        }

        input:focus {
            outline: 0 0 0 0 !important;
            box-shadow: 0 0 0 0 !important;
        }

        .remember {
            color: white;
        }

        .remember input {
            width: 20px;
            height: 20px;
            margin-left: 15px;
            margin-right: 5px;
        }

        .login_btn {
            color: black;
            background-color: #FFC312;
            width: 100px;
        }

        .login_btn:hover {
            color: black;
            background-color: white;
        }

        .links {
            color: white;
        }

        .links a {
            margin-left: 4px;
        }

    </style>
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Login</h3>
                    <div class="d-flex justify-content-end social_icon">
                        <span><i class="fab fa-facebook-square"></i></span>
                        <!--<span><i class="fab fa-google-plus-square"></i></span>
                            <span><i class="fab fa-twitter-square"></i></span>-->
                    </div>
                </div>
                <div class="card-body">
                    <center><img src="img/car-w.png" alt="Container All Risk" width="150"></center>
                    <form class="m-t" role="form" action="" method="post">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="usuario" class="form-control" placeholder="Usuario" required="">
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control" placeholder="Contrase&#241;a" required="">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn float-right login_btn">Entrar</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        <!--<small>Olvidaste la contrase&#241;a?</small><a href="ResetPassword.php"><small>Click</small></a>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
