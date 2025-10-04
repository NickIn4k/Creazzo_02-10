<!DOCTYPE html>
<html>
    <head>
        <meta charset = "UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Esercizio 1</title>
        <link type="stylesheet" rel="../../../CommonStyle/Basics.CSS">
    </head>
    <body>
        <h1> Dati processati </h1>
        <div>
            <?php
                // Punteggi: vittoria = +3, pareggio = +1, perse = 0
                $squadre = array();
                for($i = 1; $i<4; $i++){
                    // Prendi i dati
                    $vittorie = $_POST["nVittorie$i"];
                    $pareggiate = $_POST["nPareggiate$i"];
                    $perse = $_POST["nPerse$i"];

                    $squadre[] = array(
                        "nome" => $_POST["Squadra$i"], 
                        "categoria" => $_POST["tipo$i"],
                        "punti" => 3*$vittorie + $pareggiate, 
                        "partiteGiocate" => $vittorie+$pareggiate+$perse);
                }

                // Ordinamento di $squadre con usort
                // usort(array, funzione di comparazione)
                usort($squadre, function($a,$b){
                    return($b["punti"] - $a["punti"]);  //false se $b<$a | true se $a<$b
                });

                // Stampa elenco nome - categoria
                echo "<p>Classifica squadre (ordinata per punti):</p> <ol>";
                foreach($squadre as $sq)
                    echo "<li>". $sq["nome"]. " - ". $sq["categoria"]. "</li>";
                echo "</ol>";
                
                // Stampa numero di partite
                $totPartite = max(array_column($squadre, "partiteGiocate"));
                foreach($squadre as $sq){
                    if($sq["partiteGiocate"] < $totPartite) 
                        echo "<p><strong>". $sq["nome"]. " ha giocato solo ". $sq["partiteGiocate"]. " partite su $totPartite </strong></p>";
                }
            ?>
        </div>
    </body>

    <!--
        Squadre{
            Sq1{
                nome,
                tipo,
                punti,
                contPartite
            },
            Sq2{
                nome,
                tipo,
                punti,
                contPartite
            },
        }
    -->
</html>