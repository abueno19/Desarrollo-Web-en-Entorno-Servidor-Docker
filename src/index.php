<?php
//Cargar index.html
/**
 * @descripsion: Cargar index.html
 */
include './html/index.html';
define('JSON', 'config.json');
// Buscar archivos .php
#$files = glob('./und*/*.php');
$ejercicios_array=array(
    array("und1"=>array(
        "tarea1"=>array(
            array("act1"=>
            array("Titulo"=>"Actividad 1","Enlace"=>"./und1/tarea1/act1.php","Descripcion"=>"Mostrar por pantalla la suma de dos números","Archivo"=>"act1.php")),
            array("act2"=>
            array("Titulo"=>"Actividad 2","Enlace"=>"./und1/tarea1/act2.php","Descripcion"=>"Mostrar por pantalla la suma de dos números","Archivo"=>"act2.php")),
        )
    
    ),
    ),
    array("und2"=>array(
        "tarea1"=>array(
            array("act1"=>
            array("Titulo"=>"Actividad 1","Enlace"=>"./und2/tarea1/act1.php","Descripcion"=>"Mostrar por pantalla la suma de dos números","Archivo"=>"act1.php")),
            array("act2"=>
            array("Titulo"=>"Actividad 2","Enlace"=>"./und2/tarea1/act2.php","Descripcion"=>"Mostrar por pantalla la suma de dos números","Archivo"=>"act2.php")),
        )
    
    ),
    ),
    array("und3"=>array(
        "tarea1"=>array(
            array("act1"=>
            array("Titulo"=>"Actividad 1","Enlace"=>"./und3/tarea1/act1.php","Descripcion"=>"Mostrar por pantalla la suma de dos números","Archivo"=>"act1.php")),
            array("act2"=>
            array("Titulo"=>"Actividad 2","Enlace"=>"./und3/tarea1/act2.php","Descripcion"=>"Mostrar por pantalla la suma de dos números","Archivo"=>"act2.php")),
        ),
        "tarea2"=>array(
            array("act1"=>
            array("Titulo"=>"Actividad 1","Enlace"=>"./und3/tarea2/act1.php","Descripcion"=>"Mostrar por pantalla la suma de dos números","Archivo"=>"act1.php")),
            array("act2"=>
            array("Titulo"=>"Actividad 2","Enlace"=>"./und3/tarea2/act2.php","Descripcion"=>"Mostrar por pantalla la suma de dos números","Archivo"=>"act2.php")),
            array("act3"=>
            array("Titulo"=>"Actividad 3","Enlace"=>"./und3/tarea2/act3.php","Descripcion"=>"Mostrar por pantalla la suma de dos números","Archivo"=>"act3.php")),
            array("act4"=>
            array("Titulo"=>"Actividad 4","Enlace"=>"./und3/tarea2/act4.php","Descripcion"=>"Mostrar por pantalla la suma de dos números","Archivo"=>"act4.php")),
            array("act5"=>
            array("Titulo"=>"Actividad 5","Enlace"=>"./und3/tarea2/act5.php","Descripcion"=>"Mostrar por pantalla la suma de dos números","Archivo"=>"act5.php")),
            array("act6"=>
            array("Titulo"=>"Actividad 6","Enlace"=>"./und3/tarea2/act6.php","Descripcion"=>"Mostrar por pantalla la suma de dos números","Archivo"=>"act6.php")),
            
        ),
        "tarea3"=>array(
            array("act1"=>
            array("Titulo"=>"Actividad 1","Enlace"=>"./und3/tarea3/act1.php","Descripcion"=>"Mostrar por pantalla la suma de dos números","Archivo"=>"act1.php")),
            array("act2"=>
            array("Titulo"=>"Actividad 2","Enlace"=>"./und3/tarea3/act2.php","Descripcion"=>"Mostrar por pantalla la suma de dos números","Archivo"=>"act2.php")),
            array("act3"=>
            array("Titulo"=>"Actividad 3","Enlace"=>"./und3/tarea3/act3.php","Descripcion"=>"Mostrar por pantalla la suma de dos números","Archivo"=>"act3.php")),
            array("act4"=>
            array("Titulo"=>"Actividad 4","Enlace"=>"./und3/tarea3/act4.php","Descripcion"=>"Mostrar por pantalla la suma de dos números","Archivo"=>"act4.php")),
            array("act5"=>
            array("Titulo"=>"Actividad 5","Enlace"=>"./und3/tarea3/act5.php","Descripcion"=>"Mostrar por pantalla la suma de dos números","Archivo"=>"act5.php")),
            array("act6"=>
            array("Titulo"=>"Actividad 6","Enlace"=>"./und3/tarea3/act6.php","Descripcion"=>"Tabla de multiplicar retocado","Archivo"=>"act6.php")),

        )
    
    ),
    ),
);
// Crea el array de archivos como se muestra en el ejemplo de forma automatica
// $files = array();
// foreach (glob('./und*/*.php') as $file) {
//     $files[] = $file;
// }
// print_r($files);
// echo "<br>";
// recoger los archivos .php
// echo("<div class='head'>");
// $files = glob('./und*/*/*.php');

// foreach ( $files as $file){
//     $prueba = str_replace("./","",$file);
//     $prueba = str_replace(".php","",$prueba);
//     #añadir a la array
//     $prueba = explode("/",$prueba);
//     array_push($array_p,(array($prueba[0]=>array($prueba[1]=>$prueba[2]))));
    
//     echo "<br>";
// }
// /* ver tipo de variable*/

// print_r($array_p);
// echo "<br>";
// if (@file_get_contents(JSON)) {
//     $json = file_get_contents(JSON);
//     $json = json_decode($json, true);
//     print_r($json["squadName"]);
// } else {
//     echo "No se ha encontrado el archivo";
// }





    








        

#Recorre el array de ejercicios  

echo("<div class='container-sm ' >");
foreach ($ejercicios_array as $unidad) {
    echo("<div class='foco'>");
    
    foreach ($unidad as $key => $value) {
        echo("<h1>Unidad ".$key."</h1>");
        foreach ($value as $key => $value) {
            echo("<h2>Tarea ".$key."</h2>");
            foreach ($value as $key => $value) {
                foreach ($value as $key => $value) {
                    echo("<h3>".$value["Titulo"]."</h3>");
                    echo("<p>".$value["Descripcion"]."</p>");
                   

                    echo("<a class='boton' href='".$value["Enlace"]."'>Enlace</a>");
                }
            }
        }
    }
    echo("</div>");
}
echo("</div>");

echo("</div>");






?>







