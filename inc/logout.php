<?php
    require_once("functions.php");
    unset($_COOKIE["idUsuario"]);
    setcookie("idUsuario", "", time()-60*60*24*30, "/");
    unset($_COOKIE["usuario"]);
    setcookie("usuario", "", time()-60*60*24*30, "/");
    unset($_COOKIE["profile-pic"]);
    setcookie("profile-pic", "", time()-60*60*24*30, "/");
    header("Location: ../index.php");
?>