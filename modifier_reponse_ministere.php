<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier la réponse du ministère</title>
</head>

<body>
    <?php
    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ministere_sante";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST['modifier_reponse_ministere'])) {
        $numero_bordereau = $_POST['numero_bordereau'];
        $num_depart_DFP=$_POST['num_depart_DFP'];
        $date_envoi_dossier_au_ministere = $_POST['date_envoi_dossier_au_ministere'];
        $num_depart_ministere=$_POST['num_depart_ministere'];
        $date_reponse_ministere = $_POST['date_reponse_ministere'];
        $reponse_ministere = $_POST['reponse_ministere'];
        $num_depart_au_delegue=$_POST['num_depart_au_delegue'];
        $date_sortie_reponse_au_delegue = $_POST['date_sortie_reponse_au_delegue'];

        // Mettre à jour la décision d'audit dans la base de données
        $sql = "UPDATE region SET num_depart_DFP='$num_depart_DFP',date_envoi_dossier_au_ministere='$date_envoi_dossier_au_ministere',num_depart_ministere='$num_depart_ministere',
        date_reponse_ministere='$date_reponse_ministere',reponse_ministere='$reponse_ministere',num_depart_au_delegue='$num_depart_au_delegue',
        date_sortie_reponse_au_delegue='$date_sortie_reponse_au_delegue' WHERE numero_bordereau='$numero_bordereau'";

        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("réponse du ministère modifiée");</script>';
            echo '<a href="afficher_par_region.php">Retour</a>"';
        } else {
            echo '<script>alert("Erreur lors de la modification de la décision");</script>';
        }
    }

    // Récupérer les informations du dossier à partir de la base de données
    $numero_bordereau = $_POST['numero_bordereau'];
    $sql2 = "SELECT * FROM region WHERE numero_bordereau='$numero_bordereau'";
    $result = $conn->query($sql2);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <div class="container">
            <h2>Modifier les champs suivants</h2>
            <form action="" method="POST">
                <fieldset>
                    <input type="hidden" name="numero_bordereau" value="<?php echo $row['numero_bordereau']; ?>">
                    <h2>Formulaire d'insertion</h2>
                    <p>
                        <label for="num_depart_DFP">numéro de départ DFP</label>
                        <input type="text" name="num_depart_DFP" id="num_depart_DFP"
                            value="<?php echo $row['num_depart_DFP']; ?>">
                    </p>
                    <p>
                        <label for="date_envoi_dossier_au_ministere">date d'envoi du dossier au ministère</label>
                        <input type="date" name="date_envoi_dossier_au_ministere"
                            id="date_envoi_dossier_au_ministere"
                            value="<?php echo $row['date_envoi_dossier_au_ministere']; ?>">
                    </p>
                    <p>
                        <label for="num_depart_ministere">numéro de départ du ministère</label>
                        <input type="text" name="num_depart_ministere" id="num_depart_ministere"
                            value="<?php echo $row['num_depart_ministere']; ?>">
                    </p>
                    <p>
                        <label for="date_reponse_ministere">date de la réponse du ministère</label>
                        <input type="date" name="date_reponse_ministere" id="date_reponse_ministere"
                            value="<?php echo $row['date_reponse_ministere']; ?>">
                    </p>
                    <p>
                        <label for="reponse_ministere">réponse du ministère</label>
                        <select name="reponse_ministere" id="reponse_ministere"
                            value="<?php echo $row['reponse_ministere']; ?>">
                            <option value="vide">____--_____</option>
                            <option>favorable</option>
                            <option>non favorable</option>
                        </select>
                    </p>
                    <p>
                        <label for="num_depart_au_delegue">numéro de départ au délégué</label>
                        <input type="text" name="num_depart_au_delegue" id="num_depart_au_delegue"
                            value="<?php echo $row['num_depart_au_delegue']; ?>">
                    </p>
                    <p>
                        <label for="date_sortie_reponse_au_delegue">date de sortie de la réponse au délégué</label>
                        <input type="date" name="date_sortie_reponse_au_delegue"
                            id="date_sortie_reponse_au_delegue"
                            value="<?php echo $row['date_sortie_reponse_au_delegue']; ?>">
                    </p>
                    <button type="submit" name="modifier_reponse_ministere">Modifier</button>
                    <a href="afficher_par_region.php">Annuler</a>


                </fieldset>
            </form>
        </div>
        <?php
    } else {
        echo "Aucun dossier trouvé.";
    }

    // Fermer la connexion à la base de données
    $conn->close();
    ?>
</body>

</html>