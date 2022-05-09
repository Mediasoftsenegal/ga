<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
	<title>Clients</title>
	<link rel="shortcut icon" type="image/png" href="/media/images/favicon.png">
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
	<link rel="stylesheet" type="text/css" href="/media/css/site-examples.css?_=94461d89946ef749b7a43d14685c725d1">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
	<style type="text/css" class="init">
	
	</style>
	<script type="text/javascript" src="/media/js/site.js?_=4a997f568ed81e6a775847062b076fa6"></script>
	<script type="text/javascript" src="/media/js/dynamic.php?comments-page=examples%2Fadvanced_init%2Fenter_search.html" async></script>
	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="../resources/demo.js"></script>
	<script type="text/javascript" class="init">
	

$(document).ready(function() {
	$('#example').DataTable( {
		search: {
			return: true
		}
	} );
} );


	</script>
</head>
<body class="wide comments example">
	<a name="top" id="top"></a>
	<div class="fw-background">
		<div></div>
	</div>
	<div class="fw-container">
		<div class="fw-header">
			
			
		
		</div>
		
		<div class="fw-body">
			<div class="content">
				
				
				<div class="demo-html">
					<table id="example" class="display" style="width:100%">
						<thead>
							<tr>
								<th>N°Client</th>
                                <th>Contact</th>
                                <th>Société</th>
                                <th>Adresse</th>
                                <th>Ville</th>
                                <th>Téléphone</th>                        
                                                     
							</tr>
						</thead>
						<tbody>
						 <?php 
                              $i = 0;
                              $db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017');
                              $reponse = $db->query("SELECT * FROM clients");
                              while($donnees = $reponse->fetch()){
                                
							echo'<tr>';
								echo'<td>Tiger Nixon</td>';
								echo'<td>System Architect</td>';
								echo'<td>Edinburgh</td>';
								echo'<td>61</td>';
								echo'<td>2011/04/25</td>';
								echo'<td>$320,800</td>';
							echo'</tr>';
							}
						?>
						</tbody> 
						<tfoot>
							<tr>
							<th>N°Client</th>
                                <th>Contact</th>
                                <th>Société</th>
                                <th>Adresse</th>
                                <th>Ville</th>
                                <th>Téléphone</th>                        
                            
        
							</tr>
						</tfoot>
					</table>
				</div>
				
				
				
	<div class="fw-footer">
		<div class="skew"></div>
		<div class="skew-bg"></div>
		
	</div>

</body>
</html>