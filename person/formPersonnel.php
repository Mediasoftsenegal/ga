<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>

		<fieldset>
			<div>
				<form method="POST" action="ajoutPersonnel.php">				</div>
			
			<div class="menu1">
			
				<table border="1">
		  			
			    			<caption>Enregitrement d'un membre du personnel</caption>			
							
							<tr>
								<Th> Etat</Th> 
								<td><input type="text" name="etat" size="30" required="required" >
								</td>
							</tr>
							<tr>
								<Th>  Prénom et Nom</Th> 
								<td><input type="text" name="prenomnom" size="30" required="required">
								</td>
							</tr>
							<tr>
								<th>   Matricule</th> 
								<td><input type="text" name="matricule" size="30" required="required">
								</td>
							</tr>
							<tr>
								<th>   Date de naissance </th> 
								<td><input type="date" name="date_naiss" size="30" required="required">
								</td>
							</tr>
							
							<tr>
								<th> Lieu de naissance </th> 
								<td><input type="text" name="lieu_naiss" size="30" required="required">
								</td>
							</tr>
							<tr>
								<th> Pays </th> 
								<td><input type="text" name="pays" size="30" required="required">
								</td>
							</tr>
						
							<tr>
								<th> Nationalite </th> 
								<td><input type="text" name="nationalite" size="30" required="required">
								</td>
							</tr>
							<tr>
								<th> Nom du père </th> 
								<td><input type="text" name="nom_pere" size="30" required="required">
								</td>
							</tr>
							<tr>
								<th> Nom de la mère </th> 
								<td><input type="text" name="nom_mere" size="30" required="required">
								</td>
							</tr>
							<tr>
								<th> Groupe Ethnique </th> 
								<td><input type="text" name="groupe_ethnique" size="30" required="required">
								</td>
							</tr>
							<tr>
								<th> Religion </th> 
								<td><input type="text" name="religion" size="30" required="required">
								</td>
							</tr>
							<tr>
								<th> Tel Fixe  </th> 
								<td><input type="text" name="tel_fix" size="30" required="required">
								</td>
							</tr>
							<tr>
								<th> Tel Portable </th> 
								<td><input type="text" name="tel_portable" size="30" required="required">
								</td>
							</tr>
							<tr>
								<th> Adresse </th> 
								<td><input type="text" name="adresse" size="30" required="required">
								</td>
							</tr>

	    		</table>
	    		<input type="submit" value="Enregistrer">
		
			</div>
	</fieldset>
</body>
</html>