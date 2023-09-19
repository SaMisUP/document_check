<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche par dossier</title>
    <style>
		table {
			margin: 0 auto;
			font-size: large;
			border: 1px solid black;
		}

		h1 {
			text-align: center;
			color: #006600;
			font-size: xx-large;
			font-family: 'Gill Sans', 'Gill Sans MT',
			' Calibri', 'Trebuchet MS', 'sans-serif';
		}

		td {
			background-color: #E4F5D4;
			border: 1px solid black;
		}

		th,
		td {
			font-weight: bold;
			border: 1px solid black;
			padding: 10px;
			text-align: center;
		}

		td {
			font-weight: lighter;
		}
	</style>
</head>
<body>
    <center>
        <fieldset>
<form action="" method="POST">
<h2>Formulaire de recherche par nom de dossier</h2>
    <p>
		<a href="recherche.php">Retour </a><br><a href="ajouter_dossier.php"> ajouter un nouveau dossier</a><br><br>
        <label for="numero_bordereau">numero bordereau :</label><br/><br/><br/>
        <input type="text" name="numero_bordereau" id="numero_bordereau" >
        <input type="submit" name="recherche" value="rechercher">
    </p>
</form>
<table>
            <tr>
            <th>Numéro du bordereau</th>
                <th>Region</th>
                <th>Ville</th>
                <th>Etablissement</th>
                <th>date entrée du dossier du délégué</th>
                <th>type dossier</th>
                <th>numéro départ DFP</th>
                <th>date d'envoi du dossier au ministère</th>
                <th>numéro départ du ministère</th>
                <th>date de la réponse du ministère </th>
				<th>réponse du ministère</th>
                <th>numéro départ au délégué</th>
                <th>date de sortie de la réponse au dossier du délégué</th>
                <th>Modifier</th>

			</tr><br>
            <?php

require('db.php');
if(isset($_POST['recherche'])){
    $numero_bordereau=$_POST['numero_bordereau'];
    $sql="SELECT * from region where numero_bordereau='$numero_bordereau'";
    $result = $conn->query($sql);

    while($rows=mysqli_fetch_array($result)){
        ?>
            <tr>
				<!-- FETCHING DATA FROM EACH
					ROW OF EVERY COLUMN -->
					<td><?php echo $rows['numero_bordereau'];?></td>	
                    <td><?php echo $rows['region'];?></td>
                    <td><?php echo $rows['ville'];?></td>
                    <td><?php echo $rows['etablissement'];?></td>
                    <td><?php echo $rows['date_entree_dossier_delegue'];?></td>
                    <td><?php echo $rows['type_dossier'];?></td>
                    <td><?php echo $rows['num_depart_DFP'];?></td>
                    <td><?php echo $rows['date_envoi_dossier_au_ministere'];?></td>
                    <td><?php echo $rows['num_depart_ministere'];?></td>
                    <td><?php echo $rows['date_reponse_ministere'];?></td>
                    <td><?php echo $rows['reponse_ministere'];?></td>
                    <td><?php echo $rows['num_depart_au_delegue'];?></td>
                    <td><?php echo $rows['date_sortie_reponse_au_delegue'];?></td>
                    <td>
                        <form action="modifier_reponse_ministere.php" method="POST">
                            <input type="hidden" name="numero_bordereau" value="<?php echo $rows['numero_bordereau'];?>">
                            <input type="submit" name="Modifier" value="Modifier">
                        </form>
                    </td>
			</tr>
        <?php
    }

    $conn->close();

}
?>
</table>
</fieldset>
</center>
</body>
</html>