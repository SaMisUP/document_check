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
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the values from the form
    $numero_bordereau = $_POST['numero_bordereau'];
    $region = $_POST['Region'];
    $ville = $_POST['ville'];
    $etablissement = $_POST['etablissement'];
    $date_entree_dossier_delegue = $_POST['date_entree_dossier_delegue'];
    $type_dossier = $_POST['type_dossier'];
    $num_depart_DFP = $_POST['num_depart_DFP'];
    $date_envoi_dossier_au_ministere = $_POST['date_envoi_dossier_au_ministere'];
    $num_depart_ministere = $_POST['num_depart_ministere'];
    $date_reponse_ministere = $_POST['date_reponse_ministere'];
    $reponse_ministere = $_POST['reponse_ministere'];
    $num_depart_au_delegue = $_POST['num_depart_au_delegue'];
    $date_sortie_reponse_au_delegue = $_POST['date_sortie_reponse_au_delegue'];


    

    // Attempt insert query execution
    $sql = "INSERT INTO region (numero_bordereau, region, ville, etablissement, date_entree_dossier_delegue,type_dossier,num_depart_DFP,date_envoi_dossier_au_ministere,num_depart_ministere,date_reponse_ministere ,reponse_ministere,num_depart_au_delegue,date_sortie_reponse_au_delegue)
      VALUES ('$numero_bordereau' ,'$region', '$ville', '$etablissement', '$date_entree_dossier_delegue', '$type_dossier','$num_depart_DFP','$date_envoi_dossier_au_ministere','$num_depart_ministere','$date_reponse_ministere' , '$reponse_ministere','$num_depart_au_delegue','$date_sortie_reponse_au_delegue')";
    if(mysqli_query($conn, $sql)){
        echo "Vous avez ajouté du nouveau vérifier cette liste en appuyant sur le bouton <button><a href='afficher_par_region.php'>Afficher</a></button>";
    } else{
        echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
    }
    
}

// Close connection
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Record Form</title>
</head>
<body>
<div>
<form class="form-signin" method="POST">
	<fieldset>	
	<h2>Formulaire d'insertion</h2>
    <p>
        <label for="numero_bordereau">numéro bordereau
        </label>
        <input type="text" name="numero_bordereau" id="numero_bordereau" >
    </p>
    <p>
        <label for="Region">Region</label>
        <input type="text" name="Region" id="Region" autocomplete='on'>
    </p>
    <p>
        <label for="ville">ville</label>
        <input type="text" name="ville" id="ville" autocomplete='on'>
    </p>
    <p>
        <label for="etablissement">etablissement</label>
        <input type="text" name="etablissement" id="etablissement">
    </p>
	<p>
        <label for="date_entree_dossier_delegue">date d'entrée du dossier du délégué</label>
        <input type="date" name="date_entree_dossier_delegue" id="date_entree_dossier_delegue">
    </p>
    <p>
        <label for="date_sortie">type de dossier</label>
        <select name="type_dossier" id="type_dossier">
            <option value="vide">____--_____</option>
            <option value="ouverture_etablissement">ouverture d'établissement</option>
            <option value="ajout_filiere">ajout de filière</option>
            <option value="fermeture_etablissement">fermeture d'établissement</option>
            <option value="validation_programme">validation de programme</option>
        </select>
    </p>
    <p>
        <label for="num_depart_DFP">numéro de départ DFP </label>
        <input type="text" name="num_depart_DFP" id="num_depart_DFP">
    </p>
    <p>
        <label for="date_envoi_dossier_au_ministere">date d'envoi du dossier au ministère</label>
        <input type="date" name="date_envoi_dossier_au_ministere" id="date_envoi_dossier_au_ministere">
    </p>
    <p>
        <label for="num_depart_ministere">numéro de départ du ministere</label>
        <input type="text" name="num_depart_ministere" id="num_depart_ministere">
    </p>
    <p>
        <label for="date_reponse_ministere">date de la réponse du ministère</label>
        <input type="date" name="date_reponse_ministere" id="date_reponse_ministere">
    </p>
    <p>
        <label for="reponse_ministere">réponse du ministère</label>
        <select name="reponse_ministere" id="reponse_ministere"><option value="vide">____--_____</option>
<option>favorable</option><option>non favorable</option></select>
    </p>
    <p>
        <label for="num_depart_au_delegue">numéro de départ au délégué</label>
        <input type="text" name="num_depart_au_delegue" id="num_depart_au_delegue">
    </p>
    <p>
        <label for="date_sortie_reponse_au_delegue">date de sortie de la réponse au délégué</label>
        <input type="date" name="date_sortie_reponse_au_delegue" id="date_sortie_reponse_au_delegue">
    </p>

    <input type="submit" value="Enregistrer">
</fieldset>
</form>
</div>
</body>
</html>
