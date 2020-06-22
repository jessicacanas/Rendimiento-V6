<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" type="text/css" href="./css/dropzone.css"/>
    <link rel="stylesheet" type="text/css" href="./css/index.css"/>
    <title>RendiPic</title>
</head>
<body class="main">
<?php

require_once __DIR__ . '/vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use Elastica\Client as ElasticaClient;

//$mysqli=new mysqli("localhost","rendimiento","Adminadmin1.","imagenes");
$db= new PDO('mysql:dbname=imagenes;host=mysql;port:3306', 'user', 'password');
$redis = (new Redis())->connect('redis');
$redis = new Redis();
$redis->connect('redis');
$connection = new AMQPStreamConnection('rabbitmq', 5672, 'rabbitmq', 'rabbitmq');
$elastic = (new ElasticaClient(['host' => 'elasticsearch', 'port' => 9200]));
$elastic->getVersion();

?>

<br>
<a href= "index.php" ><img src="./img/logo.png" alt="logo" height="150px" width="250px"></a>
<form method=POST action="buscar.php" id="search">
        <input type=hidden name=ie value=UTF-8 />
        <input type=hidden name=oe value=UTF-8 />
        <input class="buscador" type=text id="palabra" name="palabra" value="" size="50" />
        <input type=submit  id="buscar" name="buscar" value="Buscar" />
</form>

<div class="container">
<h1 class="titulo">Cargar Imágenes</h1>
    <div class="form-container">
<form action="./upload.php" class="dropzone" id="dropzone" method="POST">
    <div class="dz-message">
    <div class="icon">
        <i class="fas fa-cloud-upload-alt"></i>
    </div>
    <h2>Cargar archivos aquí</h2>
    <span class="note">No hay archivos seleccionado</span>
    <div class="fallback">
        <input type="file" name="file" multiple id="archivos">
    </div>
    </div>
</form>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="./js/dropzone-5.7.0/dist/dropzone.js"></script>
<script src="./js/app.js"></script>
</body>
<br>
<footer>
<h5>Rendimiento de proyectos web [2019/20] @LaSalle Jessica Canas</h5>
</footer>
</html>





