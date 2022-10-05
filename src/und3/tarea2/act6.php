<?php
/**
 * Creación y recorrido de un array.
 * @author Antonio Julian Bueno Fuentes
 */
$contactos = array(
    array("id"=>1,"nombre"=>"Mafalda","telefono"=>"666123123"),
    array("id"=>2,"nombre"=>"Manolito","telefono"=>"667422100"),
    array("id"=>3,"nombre"=>"Felipe","telefono"=>"668234233"),
);

// Created style for this HTML code used ReactPHP
// The table in the center of the page
// Aumenta el tamaño de la fuente
echo "<style>";
echo "table, th, td {";
echo "font-size: 20px;";
echo "margin-left: auto;";
echo "margin-right: auto;";

echo "}";
// Por el texto mas bonito
echo "th, td {";
echo "padding: 15px;";
echo "text-align: left;";
echo "}";
// Borde de la tabla
echo "table {";
echo "border-collapse: collapse;";
echo "width: 100%;";
echo "}";
// Borde de las celdas
echo "th, td {";
echo "border-bottom: 1px solid #ddd;";
echo "}";
// Color de fondo de las filas impares
echo "tr:nth-child(even) {";
echo "background-color: #f2f2f2;";
echo "}";
// Color de fondo de las filas pares
echo "tr:nth-child(odd) {";
echo "background-color: #ffffff;";
echo "}";

echo "</style>";

// Crea la tabla
echo "<table border=1>";
echo "<tr>";
echo "<th>Id</th>";
echo "<th>Nombre</th>";
echo "<th>Teléfono</th>";
echo "</tr>";

// Recorre el array
foreach($contactos as $contacto){
    echo "<tr>";
    echo "<td>".$contacto['id']."</td>";
    echo "<td>".$contacto['nombre']."</td>";
    echo "<td>".$contacto['telefono']."</td>";
    echo "</tr>";
}


?>






