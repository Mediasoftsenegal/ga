<?php
class personnel{
	// Connexion 
	private $connexion;
	private $table= "ga_personnel"; // table 
	
	// Propriétés
	
	public $id_personnel;
	public $etat;
	public $prenomnom;
	public $matricule;
	public $sexe;
	public $date_naiss;
	public $lieu_naiss;
	public $pays;
	public $nationalite;
	public $nom_pere;
	public $nom_mere;
	public $groupe_ethnique;
	public $religion;
	public $tel_fix;
	public $tel_portable;
	public $adresse;
	
	/**
	*Constrcteur  avec $db pour la  connexion à la base de données
	
	*/
	public function __construct($db)
		{
			$this->connexion=$db;
		}

	

/** Creer un personnel
*/
public function  creer(){

	$sql="INSERT INTO".$this->table. "SET etat=:etat,prenomnom=:prenomnom,matricule=:matricule,sexe=:sexe,date_naiss=:date_naiss,lieu_naiss=:lieu_naiss,
	pays=:pays,nationalite=:nationalite,nom_pere=:nom_pere,nom_mere=:nom_mere,groupe_ethnique=:groupe_ethnique,religion=:religion,tel_fix:=tel_fix,
	tel_portable=:tel_portable,adresse=:adresse"; 
	
	// Preparation de la requete
	$query = $this ->connexion->prepare($sql);
	
	// Protection  contre les injections
	$this ->etat=htmlspecialchars(strip_tags($this->etat));
	$this ->prenomnom=htmlspecialchars(strip_tags($this->prenomnom));
	$this ->matricule=htmlspecialchars(strip_tags($this->matricule));
	$this ->sexe=htmlspecialchars(strip_tags($this->sexe));
	$this ->date_naiss=htmlspecialchars(strip_tags($this->date_naiss));
	$this ->lieu_naiss=htmlspecialchars(strip_tags($this->lieu_naiss));
	$this ->nationalite=htmlspecialchars(strip_tags($this->nationalite));
	$this ->nom_pere=htmlspecialchars(strip_tags($this->nom_pere));
	$this ->nom_mere=htmlspecialchars(strip_tags($this->nom_mere));
	$this ->groupe_ethnique=htmlspecialchars(strip_tags($this->groupe_ethnique));
	$this ->tel_fix=htmlspecialchars(strip_tags($this->tel_fix));
	$this ->tel_portable=htmlspecialchars(strip_tags($this->tel_portable));
	$this ->adresse=htmlspecialchars(strip_tags($this->adresse));
	
	// Ajout des données protégées
	$query->bindParam(':etat',$etat);
    $query->bindParam(':prenomnom',$prenomnom);
    $query->bindParam(':matricule',$matricule);
    $query->bindParam(':sexe',$sexe);
    $query->bindParam(':date_naiss',$date_naiss);
    $query->bindParam(':lieu_naiss',$lieu_naiss);
    $query->bindParam(':pays',$pays);
    $query->bindParam(':nationalite',$nationalite);
    $query->bindParam(':nom_pere',$nom_pere);
    $query->bindParam(':nom_mere',$nom_mere);
    $query->bindParam(':groupe_ethnique',$groupe_ethnique);
    $query->bindParam(':religion',$religion);
    $query->bindParam(':tel_fix',$tel_fix);
    $query->bindParam(':tel_portable',$tel_portable);
    $query->bindParam(':adresse',$adresse);
	
	// Exécution de la requête
	if($query ->execute()){
		return true;
	}
	return false;
}	

/** Lecture des données
*/
public function lire(){
	
	//requete
	$sql="SELECT * From ".$this->table." ORDER BY prenomnom ASC";
	
	echo $sql;
	
	// preparat
	$query=$this->connexion->prepare($sql);
	//ID
	$query->bindParam(1,$this->id);
	// on execute
	$query->execute();
	
	$row =$query->fetch(PDO:: FETCH_ASSOC);
	
	$this->etat = $row['etat'];
	$this->prenomnom = $row['prenomnom'];
	$this->matricule = $row['matricule'];
	$this->sexe = $row['sexe'];
	$this->date_naiss = $row['date_naiss'];
	$this->lieu_naiss = $row['lieu_naiss'];
	$this->pays = $row['pays'];
	$this->nationalite = $row['nationalite'];
	$this->nom_pere = $row['nom_pere'];
	$this->nom_mere = $row['nom_mere'];
	$this->groupe_ethnique = $row['groupe_ethnique'];
	$this->religion = $row['religion'];
	$this->tel_fix = $row['tel_fix'];
	$this->tel_portable = $row['tel_portable'];
	$this->adresse = $row['adresse'];
	
	
	// On prépare la requête
    $query = $this->connexion->prepare($sql);

    // On exécute la requête
    $query->execute();

    // On retourne le résultat
    return $query;
}
/** mettre à jour  */
public function modifier(){
	
	$sql="UPDATE ". $this->table. "SET etat=:etat, prenomnom=:prenomnom,matricule=:matricule,sexe=:sexe,date_naiss=:date_naiss,lieu_naiss=:lieu_naiss
pays=:pays,nationalite=:nationalite,nom_pere=:nom_pere,nom_mere=:nom_mere,groupe_ethnique=:groupe_ethnique,religion=:religion,tel_fix=:tel_fix,tel_portable=:tel_portable,adresse=:adresse WHERE id_personnel=:id_personnel";																																											// on prepare la requete
	$query=$this -> connexion->prepare($sql); 
	
	// sécurisation 
	$this->etat =htmlspecialchars(strip_tags($this->etat));
	$this->prenomnom =htmlspecialchars(strip_tags($this->prenomnom));
	$this->matricule =htmlspecialchars(strip_tags($this->matricule));
	$this->sexe =htmlspecialchars(strip_tags($this->sexe));
	$this->date_naiss =htmlspecialchars(strip_tags($this->date_naiss));
	$this->lieu_naiss =htmlspecialchars(strip_tags($this->lieu_naiss));
	$this->pays =htmlspecialchars(strip_tags($this->pays));
	$this->nationalite =htmlspecialchars(strip_tags($this->nationalite));
	$this->nom_pere =htmlspecialchars(strip_tags($this->nom_pere));
	$this->nom_mere =htmlspecialchars(strip_tags($this->nom_mere));
	$this->groupe_ethnique =htmlspecialchars(strip_tags($this->groupe_ethnique));
	$this->religion =htmlspecialchars(strip_tags($this->religion));
	$this->tel_fix =htmlspecialchars(strip_tags($this->tel_fix));
	$this->tel_portable =htmlspecialchars(strip_tags($this->tel_portable));
	$this->adresse =htmlspecialchars(strip_tags($this->adresse));
	
	// attache les variables
	
	$query->bindParam(':etat', $this ->etat);
	$query->bindParam(':prenomnom', $this ->prenomnom);
	$query->bindParam(':matricule', $this ->matricule);
	$query->bindParam(':sexe', $this ->sexe);
	$query->bindParam(':date_naiss', $this ->date_naiss);
	$query->bindParam(':lieu_naiss', $this ->lieu_naiss);
	$query->bindParam(':pays', $this ->pays);
	$query->bindParam(':nationalite', $this ->nationalite);
	$query->bindParam(':nom_pere', $this ->nom_pere);
	$query->bindParam(':nom_mere', $this ->nom_mere);
	$query->bindParam(':groupe_ethnique', $this ->groupe_ethnique);
	$query->bindParam(':religion', $this ->religion);
	$query->bindParam(':tel_fix', $this ->tel_fix);
	$query->bindParam(':tel_portable', $this ->tel_portable);
	$query->bindParam(':adresse', $this ->adresse);
	
	//execution
	
	if($query ->execute()){
		return true;
		}
		return false;
	}	
						
/**
 * Supprimer un personnel
 *
 * @return void
 */
public function supprimer(){
    // On écrit la requête
    $sql = "DELETE FROM " . $this->table . " WHERE id_personnel = ?";

    // On prépare la requête
    $query = $this->connexion->prepare( $sql );

    // On sécurise les données
    $this->id=htmlspecialchars(strip_tags($this->id));

    // On attache l'id
    $query->bindParam(1, $this->id_personnel);

    // On exécute la requête
    if($query->execute()){
        return true;
    }
    
    return false;
}
}
?>