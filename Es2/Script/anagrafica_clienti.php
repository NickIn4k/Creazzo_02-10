<!DOCTYPE html>
<html>
    <head>
        <meta charset = "UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Esercizio 2</title>
        <link rel="stylesheet" type="text/css" href="../../CommonStyle/ElaboratedBase.CSS">
    </head>
    <body>
        <div>
            <h1> Dati processati </h1>
            <hr>
            <?php
                // 1. Numero di utenti con più di 40 anni + salvataggio dati
                $nMagg = 0;
                $dati = array();
                for($i=1; $i<=3; $i++){
                    // Prendo solo l'anno
                    $anno = date("Y", strtotime($_POST["DataN$i"]));
                    $eta = date("Y") - $anno;

                    if($eta > 40){
                        $nMagg++;
                        // Idea di base => Array di Array Associativi (ogni array associativo è un utente)
                        $dati[] = array(
                            'Nome' => $_POST["Nome$i"],
                            'Cognome' => $_POST["Cognome$i"],
                            'Eta' => $eta,
                            'Citta' => $_POST["Citta$i"],
                        );
                    }
                }

                // 2. Presentazione tramite tabella HTML
                echo "<p>Numero di clienti con più di 40 anni: $nMagg";

                echo "<table><tr><th>Nome</th><th>Cognome</th><th>Eta</th><th>Citta</th></tr>";
                foreach($dati as $clienti){
                    echo "<tr>";
                    foreach($clienti as $chiave => $valore)
                        echo "<td> $valore </td>";
                    echo "</tr>";
                }
                echo "</table>";
            ?>
        </div>
    </body>
</html>