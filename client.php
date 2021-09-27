<?php
require_once "./lib/nusoap.php";
//@header('Content-Type:text/html;charset=gb2312');
//$cliente = new nusoap_client("http://localhost/~deduar/Projects/SOAP-WS/producto.php");
//$cliente = new nusoap_client("libros.wsdl", true);
$cliente = new nusoap_client('https://intranet.cadena88.com/integracion/ws_cadena88.php?wsdl',true);
$cliente->setCredentials("28636","ZSMW6H","basic");
$cliente->soap_defencoding = 'UTF-8';
$cliente->decode_utf8 = FALSE;
//$cliente->setCredentials('https://intranet.cadena88.com/integracion/', 'AuthHeader',"28636","ZSMW6H", "basic");

$error = $cliente->getError();
if ($error) {
    echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
}

//$result = $cliente->call("getProd", array("categoria" => $_GET["categoria"]));
$result = $cliente->call('familias_AECOC',array("cliente" => "28636"),'https://intranet.cadena88.com/','localhost','rpc','encoded');
if ($cliente->fault) {
    echo "<h2>Fault</h2><pre>";
    print_r($result);
    echo "</pre>";
} else {
    $error = $cliente->getError();
    if ($error) {
        echo "<h2>Error</h2><pre>" . $error . "</pre>";
    } else {
        echo "<h2>Libros</h2><pre>";
        echo $result;
        echo "</pre>";
    }
}
