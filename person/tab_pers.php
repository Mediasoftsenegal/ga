<?php
require'connexion.php';

  $host = 'localhost';
  $dbname = 'groupe10_alp';
  $username = 'groupe10_groupeal';
  $password = 'Alpages@2017';
    
  $dsn = "mysql:host=$host;dbname=$dbname"; 
  // récupérer tous les utilisateurs
  $sql = "SELECT * FROM ga_personnel";
   
  try{
   $pdo = new PDO($dsn, $username, $password);
   $stmt = $pdo->query($sql);
   
   if($stmt === false){
    die("Erreur");
   }
   
  }catch (PDOException $e){
    echo $e->getMessage();
  }
?>	 
<!DOCTYPE html>
<html lang="fr">
<head>
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
</head>
<body>
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title"> Liste du personnel</h3>
            </div>
            <div class="row">
              <div class="col-6 grid-margin ">
                <div class="card">
                  <div class="card-body">
					<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal-4" data-whatever="@mdo">Nouveau membre</button>
				  </div>
				 </div> 
				</div>
				<div class="col-6 grid-margin "></div>				
					<div class="col-lg-12 grid-margin ">
						<div class="card">
						  <div class="card-body">
							<table class="table table-bordered">
							  <thead>
								<tr>
								  <th> # </th>
								  <th> Prénomm et Nom </th>
								  <th> Matricule </th>
								  <th> Sexe </th>
								  <th> Date de naissance </th>
								  <th> lieu de naissance </th>
								  <th> Pays</th>
								  <th> Nationalité</th>
								  <th> Nom du père</th>
								  <th> Nom de la Mère </th>
								  <th> Groupe éthnique</th>
								  <th> Religion </th>
								  <th> Tel .Port </th>
								  <th> Tel .Fixe </th>
								  <th> Adresse </th>
								</tr>
							  </thead>
								<tbody>
							  <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
								<tr>
								  <td><?php echo htmlspecialchars($row['id_personnel']); ?></td>
								  <td><?php echo htmlspecialchars($row['prenomnom']); ?></td>
								  <td><?php echo htmlspecialchars($row['matricule']); ?></td>
								  <td><?php echo htmlspecialchars($row['sexe']); ?></td>
								  <td><?php echo htmlspecialchars($row['date_naiss']); ?></td>
								  <td><?php echo htmlspecialchars($row['lieu_naiss']); ?></td>
								  <td><?php echo htmlspecialchars($row['pays']); ?></td>
								  <td><?php echo htmlspecialchars($row['nationalite']); ?></td>
								  <td><?php echo htmlspecialchars($row['nom_pere']); ?></td>
								  <td><?php echo htmlspecialchars($row['nom_mere']); ?></td>
								  <td><?php echo htmlspecialchars($row['groupe_ethnique']); ?></td>
								  <td><?php echo htmlspecialchars($row['religion']); ?></td>
								  <td><?php echo htmlspecialchars($row['tel_fix']); ?></td>
								  <td><?php echo htmlspecialchars($row['tel_portable']); ?></td>
								  <td><?php echo htmlspecialchars($row['adresse']); ?></td>
								</tr>
								 <?php endwhile; ?>
							  </tbody>				
							</table>
						</div>
					  </div>
                  </div>
				  <div class="row">
					<div class="modal fade" id="exampleModal-4" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
					 <div class="col-sm-6">
						<div class="modal-dialog  modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="ModalLabel">Formulaire membre du personnel </h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
								</div>
								<div class="modal-body">
									<form>
										<div class="form-group">
											<label for="recipient-name" class="col-form-label">Prénom et Nom:</label>
											<input type="text" class="form-control" id="recipient-name">
										</div>
										<div class="form-group">
											<label for="message-text" class="col-form-label">Matricule:</label>
											<input type="text" class="form-control" name="matricule" id="recipient-name">
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">Sexe</label>
												<div class="col-sm-9">
													<select class="form-control" name="sexe">
													<option>Homme</option>
													<option>Femme</option>
													</select>
												</div>
										</div>
										<div class="form-group">
											<label for="message-text" class="col-form-label">Date de naissance:</label>
											<input type="date" class="form-control" name="date_naiss" id="recipient-name">
										</div>
										<div class="form-group">
											<label for="message-text" class="col-form-label">Lieu de naissance:</label>
											<input type="text" class="form-control" name="lieu_naiss" id="recipient-name">
										</div>
										<div class="form-group">
											<label for="message-text" class="col-form-label">Pays:</label>
											<input type="text" class="form-control" name="pays" id="recipient-name">
										</div>
										<div class="form-group">
											<label for="message-text" class="col-form-label">Nationalité:</label>
											<input type="text" class="form-control" name="nationalite" id="recipient-name">
										</div>
										<div class="form-group">
											<label for="message-text" class="col-form-label">Prénom du père:</label>
											<input type="text" class="form-control" name="nom_pere" id="recipient-name">
										</div>
										<div class="form-group">
											<label for="message-text" class="col-form-label">Prénom nom de la mère:</label>
											<input type="text" class="form-control" name="nom_mere" id="recipient-name">
										</div>
										<div class="form-group">
											<label for="message-text" class="col-form-label">Groupe ethnique:</label>
											<input type="text" class="form-control" name="groupe_ethnique" id="recipient-name">
										</div>
										<div class="form-group">
											<label for="message-text" class="col-form-label">Religion:</label>
											<input type="text" class="form-control" name="religion" id="recipient-name">
										</div>
										<div class="form-group">
											<label for="message-text" class="col-form-label">Tél.mobile:</label>
											<input type="text" class="form-control" name="tel_portable" id="recipient-name">
										</div>
										<div class="form-group">
											<label for="message-text" class="col-form-label">Tel. fixe:</label>
											<input type="text" class="form-control" name="tel_fix" id="recipient-name">
										</div>
										<div class="form-group">
											<label for="exampleTextarea1">Adresse</label>
											<textarea class="form-control" id="exampleTextarea1" name="adresse" rows="4"></textarea>
										</div>
									</form>
								</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-success">Valider</button>
								<button type="button" class="btn btn-light" data-dismiss="modal">Fermer</button>
						</div>
					</div>
				</div>
			</div>
			</div>
		</div>	
    </div>
</div>
</body>
</html>