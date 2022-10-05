<?php
function CreaUNaTablaConELMesDeEneroYConLosDiasDeLaSemanaEnLaPrimeraFila()
{
    $meses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
    $dias = array('Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo');
    $fecha = getdate();
    $dia = $fecha['mday'];
    $mes = $fecha['mon'];
    $año = $fecha['year'];
    $diaSemana = $fecha['wday'];
    $diaSemana = $dias[$diaSemana - 1];
    $mes = $meses[$mes - 1];
    $Week = date("N", mktime(0, 0, 0, date("n"), 1, date("Y"))) - 1; //Devuelve el número del día de la semana del primer día del mes

    echo "<table border=1>";
    echo "<tr><th colspan=7>$mes $año</th></tr>";
    echo "<tr>";
    foreach ($dias as $dia) {
        echo "<th>$dia</th>";
    }
    $contador = 7;
    #QUe dias es hoy el primero del mes
    $diaSemana = $fecha['wday'];
    $diaSemana = $dias[$diaSemana - 2];
    $diaSemana = array_search($diaSemana, $dias);

    $diaHoy = date('D');
    $festivos = array("Enero" => array(1, 6), "Febrero" => array(28), "Marzo" => array(19), "Abril" => array(9), "Mayo" => array(1), "Junio" => array(24), "Julio" => array(25), "Agosto" => array(15), "Septiembre" => array(8), "Octubre" => array(12,24), "Noviembre" => array(1), "Diciembre" => array(6, 8, 25));

    for ($i = 1; $i <= date('t'); $i++) {
        if ($contador >= 7) {
            echo "</tr>";
            $contador = 0;
            echo "<tr>";
        }
        for ($j = 0; $j < $Week; $j++) {
            echo "<td></td>";
        }
        $contador = $contador + $Week;
        $Week = 0;
        if ($contador == 6) {
            echo "<td class='domingo'>$i";
        } else if ($i == date("j")) {

            echo "<td class='hoy'>$i";
        } else if (VerSiUnElementoEstaEnUnArray($i, $festivos[$mes])) {
            echo "<td class='festivo'>$i";
        } else if ($i != $dia) {

            echo "<td>$i";
        } else {

            echo "<td >$i";
        }
        $contador++;

        echo "</td>";
    }

    echo "</tr>";
    echo "</table>";
};
CreaUNaTablaConELMesDeEneroYConLosDiasDeLaSemanaEnLaPrimeraFila();

function VerSiUnElementoEstaEnUnArray($elemento, $array)
{
    $esta = false;
    foreach ($array as $elementoArray) {

        if ($elemento == $elementoArray) {
            $esta = true;
        }
    }
    return $esta;
};
echo("<a href='index.php'>Volver</a>");
echo("<a href='</a>");
?>
<style>
    .hoy {
        background-color: green;
    }

    .festivo {
        background-color: #800000;
    }

    .domingo {
        background-color: red;
    }
</style>