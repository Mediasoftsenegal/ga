<?php
	require 'connect.php';
	
	function inserer_user($nom,$login,$pwd,$profil)
	{
		$sql="INSERT into gs_users values('','$nom','$login','$pwd','$profil')";
		$conn=connexion();
		$exe=mysqli_query($conn,$sql);
		return $exe;
	}
	
	function supprimer_user($id)
	{
		$sql="DELETE from gs_users WHERE ID_UTILISATEURS='$id'";
		$conn=connexion();
		$exe=mysqli_query($conn,$sql);
		return $exe;
	}
	
	function liste_user()
	{
		$sql="SELECT * FROM gs_users";
		$conn=connexion();
		$exe=mysqli_query($conn,$sql);
		return $exe;		
	}
	
	function obtenir_user($id)
	{
		$sql="SELECT * FROM gs_users WHERE ID_UTILISATEURS='$id'";
		$conn=connexion();
		$exe=mysqli_query($conn,$sql);
		return $exe;		
	}
	
	function login_password($login,$pwd)
	{
		$sql="SELECT * FROM gs_users WHERE Login='$login' AND pssw='$pwd'";
	
		$conn=connexion();
		$exe=mysqli_query($conn,$sql);
		return $exe;	
	}
	
?>