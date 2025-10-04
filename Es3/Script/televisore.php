<!DOCTYPE html>
<html>
    <head>
        <meta charset = "UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Esercizio 3</title>
        <link rel="stylesheet" type="text/css" href="../../CommonStyle/ElaboratedBase.CSS">
        <link rel="stylesheet" type="text/css" href="../../CommonStyle/FormBase.CSS">
    </head>
    <body>
        <div>
            <h1>Esercizio 3 - Televisori</h1>
            <hr>
            <form method="post">
                <h2> Dati Televisore </h2>
                <!-- Marca -->
                <label for="marca">Marca</label><br>
                <input type="text" name="marca" required><br>

                <!-- Modello -->
                <label for="modello">Modello</label><br>
                <input type="text" name="modello" required><br>

                <!-- nHDMI -->
                <label for="nHDMI">Numero di porte HDMI</label><br>
                <select name="nHDMI">
                    <?php
                        for($i=1; $i<=5;$i++)
                            echo "<option value='$i'>$i</option>";
                    ?>
                </select></br>

                <!-- Hz -->
                <label for="hz">Freshrate(Hz)</label><br>
                <select name="hz">
                    <?php
                        $rates = [1,30,50,60,120];
                        foreach($rates as $r)
                            echo "<option value='$r'>$r Hz</option>";
                    ?>
                </select></br>

                <!-- risoluzione -->
                <label for="risoluzione">Risoluzione shcermo</label><br>
                <select name="risoluzione">
                    <?php
                        $risoluzioni = array(
                            "Hd Ready" => 720,
                            "Full HD" => 1080,
                            "Ultra HD" => 1440,
                            "4K" => 2100,
                        );

                        foreach($risoluzioni as $chiave => $valore)
                            echo "<option value='$valore'>$chiave</option>";
                    ?>
                </select></br>

                <input type="reset">
                <input type="submit">
                <hr>
            </form>
            <br><br>

            <div class="formLike">
                <h2>Consigli d'acquisto!</h2>
                <?php
                    $nHDMI = $_POST['nHDMI'];
                    $Hz = $_POST['hz'];
                    $risoluzione = $_POST['risoluzione'];

                    if($nHDMI < 2)
                        echo "<p><strong>Consiglio:</strong> Dovresti comprare un televisore con più porte HDMI!";

                    if($Hz < 50)
                        echo "<p><strong>Consiglio:</strong> Dovresti comprare un televisore con un refresh rate di almeno 50Hz";

                    if($risoluzione <= 1080)
                        echo "<p><strong>Consiglio:</strong> Dovresti comprare un televisore con una risoluzione più alta!";
                ?>
            </div>
        </div>
    </body>
</html>