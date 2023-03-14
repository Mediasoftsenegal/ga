<?
 require_once("db_connect.php"); 
 if(!empty($_POST['IDOFFRES'])){
	 
	 $sql="SELECT  commandes.NUMCOMMANDE,commandes.IDOFFRES,MONTANTHONOTAIRE,NUMOFFRE,offres.IDOFFRES,offres.MONTANTHONORAIRE,offres.MISSIONS,NUMCLIENT,SOCIETE
		FROM commandes,offres,clients
		WHERE commandes.IDOFFRES=offres.IDOFFRES
		AND offres.IDCONTACTS=clients.IDCONTACTS
		AND commandes.IDOFFRES=".$_POST['IDOFFRES'];
		
		echo $sql;
	 
	 $rep=$db->prepare("SELECT  commandes.NUMCOMMANDE,commandes.IDOFFRES,MONTANTHONOTAIRE,NUMOFFRE,offres.IDOFFRES,offres.MONTANTHONORAIRE,offres.MISSIONS,NUMCLIENT,SOCIETE
		FROM commandes,offres,clients
		WHERE commandes.IDOFFRES=offres.IDOFFRES
		AND offres.IDCONTACTS=clients.IDCONTACTS
		AND commandes.IDOFFRES=?");
	 $rep->execute([$_POST["IDOFFRES"]]);
	 $donne =$rep->fetch();
 }
?>
<? 
echo $donne['NUMOFFRE'];
echo $donne['NUMCLIENT'];
echo $donne['MISSIONS'];
echo $donne['MONTANTHONORAIRE'];
?>
