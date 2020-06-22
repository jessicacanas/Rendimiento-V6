<?php

$route = "./files/";
$route = $route . basename($_FILES['file']['name']);
var_dump($_FILES['file']);

if (is_uploaded_file($_FILES["userfile"]["tmp_name"]))
{
    # verificamos el formato de la imagen
    if ($_FILES["userfile"]["type"]=="image/jpeg" || $_FILES["userfile"]["type"]=="image/pjpeg" || $_FILES["userfile"]["type"]=="image/gif" || $_FILES["userfile"]["type"]=="image/bmp" || $_FILES["userfile"]["type"]=="image/png")
    {
        # Cogemos la anchura y altura de la imagen
        $info=getimagesize($_FILES["userfile"]["tmp_name"]);

        #movemos el archivo
        move_uploaded_file($_FILES['file']['tmp_name'], $route );

        #tags de la imagen
        #$tags = $_POST['tags'];
        #$descripcion = $_POST['descripcion'];

        # Agregamos la imagen a la base de datos
        $sql="INSERT INTO `imagephp` (anchura,altura,tipo,imagen,descripcion,tags) VALUES (".$info[0].",".$info[1].",'".$_FILES["userfile"]["type"]."','".$imagenEscapes."','.$descripcion','".$tags."')";
        $db->query($sql);

        # Cogemos el identificador con que se ha guardado
        $id=$db->insert_id;

        # Mostramos la imagen agregada
        #"<div class='mensaje'>Imagen agregada con el id ".$id."</div>";
    }else{
        echo "<div class='error'>Error: El formato de archivo tiene que ser JPG, GIF, BMP o PNG.</div>";
    }
}

//    $archivo = $_FILES['file'];
  //  $templocation = $archivo["tmp_name"];
   // $name = $archivo["name"];

    //if (!$templocation)
    //{
      //  die('No ha seleccionado ningun archivo');
    //}

    //if (move_uploaded_file($templocation, "/files/$name"))
    //{
      //  echo "Archivo guardado correctamente";
    //}else{
      //  echo "Error al guardar el archivo";
    //}