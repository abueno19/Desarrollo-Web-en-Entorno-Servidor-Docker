<form method="POST">
    <?php
        for ($i=0; $i < count($tarifas); $i++) { 
            echo "<input type='radio' name='equipo' value='".$tarifas[$i]['equipo']."'>".$tarifas[$i]['equipo']."<br>";
        }
        echo("<input type='submit' name='comprar' value='comprar'>");
        // importar un video de youtube
        // https://www.youtube.com/watch?v=6X6QYQZ1zqA
        echo("<br>");
        echo("<br>");
        echo('<iframe width="1280" height="720" src="https://www.youtube.com/embed/Hu146YAYAgo" title="Top 100 NBA Plays of 2021 🔥" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');

    ?>
</form>