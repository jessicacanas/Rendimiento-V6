<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>RendiPic</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style type="text/css">
        *{ font-family:Segoe, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, sans-serif}
        .main
        {
            margin:auto;
            text-align:left;
            padding:30px;
            background-image: linear-gradient(blueviolet, deepskyblue);
        }
        .titulo
        {
            color: white;
        }
        .error {font-weight: bold; color:red;}
        .mensaje {color:#030;}
        .listadoImagenes img {float:left;border:1px solid #ccc; padding:2px;margin:2px;}
        footer
        {
            color: white;
            font-weight: bold;
            text-align:right;
        }
        button
        {
            margin-left: 600px;
        }
        .buscador
        {
            height:25px;
            margin-left: 600px;
            margin-bottom: 50px;
            font-size:16px;
        }
        .etiqueta
        {
            color: white;
        }
    </style>
</head>
<body class="main">
<br>
<a href= "index.php" ><img src="/img/logo.png" alt="logo" height="150px" width="250px"></a>
<br>
<br>
<br>
<br>
<?php
# Conectamos con MySQL
//$mysqli=new mysqli("localhost","rendimiento","Adminadmin1.","imagenes");
$db= new PDO('mysql:dbname=imagenes;host=mysql;port:3306', 'user', 'password');
if (mysqli_connect_errno()) {
    die("Error al conectar: ".mysqli_connect_error());
}

if($_POST['buscar'])
{
    $buscar = $_POST["palabra"];
    $result=$db->query("SELECT * FROM imagephp WHERE tags like '%$buscar%'");

        if($result)
        {
            while($row=$result->fetch_array(MYSQLI_ASSOC))
            {
                $img = "<img src='imagen_mostrar.php?id=".$row["id"]."' width='".$row["anchura"]."' height='".$row["altura"]."'>";
                echo $img;
//                echo "<img src='imagen_mostrar.php?id=".$row["id"]."' width='".$row["anchura"]."' height='".$row["altura"]."'>";
            }
        }
}
?>
</body>
<!--<br>-->
<!--<footer>-->
<!--    <h5>Rendimiento de proyectos web [2019/20] @LaSalle Jessica Canas</h5>-->
<!--</footer>-->
</html>

