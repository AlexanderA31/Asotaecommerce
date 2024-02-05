<?php
$idiomaUsuario=$_GET['idiomaUsuario'];
setcookie("idiomaUsuario",$idiomaUsuario, time()+86400)

?>
<html>
    <body>
        <script laguage="javascript" type="text/javascript" >
            location.href=("usodecookies.php");
        </script>

    </body>
</html>