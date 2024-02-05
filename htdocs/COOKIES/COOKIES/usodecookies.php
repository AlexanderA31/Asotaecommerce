<?php
// Se comprueba si existe la cookie.
if (!$_COOKIE ["idiomaUsuario"]) {
// Si no existe, se determina como página la destinadaa elegir el idioma.
$pagina="pedirelidioma.html";
} elseif ($_COOKIE ["idiomaUsuario"]=="sp") {
// Si existe la cookie y el valor de la variable es"sp" se irá a la página en español.
$pagina="español.html";
} else {
// Si el valor no es "sp' se irá a la página en inglés.
$pagina="ingles.html";
}
?>
<html>
    <head>
        <script language="javascript" type="text/javascript">
            console.log("hola")
            location.href="<?php echo ($pagina); ?>";
        </script>
    </head>
</html>