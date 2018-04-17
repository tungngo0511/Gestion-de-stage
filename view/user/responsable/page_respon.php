<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="/~u21607562/projet/public/css/style_commun.css">
<link rel="stylesheet" type="text/css" href="/~u21607562/projet/public/css/style_table.css">

<?php
/*$string = '5-Minh-Le';

$pass = 'vananh';
$method = 'aes128';

$a = openssl_encrypt($string, $method, $pass);
var_dump($a);

$b = openssl_decrypt($a, $method, $pass);
var_dump($b);

var_dump(explode("-", $b));

exit(); */
session_start();
if($_SESSION['role'] != "admin"){
	exit();
}
?>
<?php  
include (__DIR__."/../../header/header_respon.php");

?>
<body>
	<section>
		<a href="#pédagogique"><button type="button" class="btn btn-info" style="float: left;" >Tuteur pédagogique</button></a>
		<a href="#principal"><button type="button" class="btn btn-info" style="margin-left: 400px">Tuteur principal</button></a>	
		<a href="#secondaire"><button type="button" class="btn btn-info" style="float: right;">Tuteur secondaire</button></a>		

		<div id = "pédagogique">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Le nombre des étudiants par chaque
					tuteur pédagogique actif</h1>
				</div>
			</div>
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">Tuteur ID</th>
						<th scope="col">Tuteur pédagogique</th>
						<th scope="col"> Nombres des étudiants</th>
					</tr>
				</thead>
				<tbody>
					<?php
					include (__DIR__."/../../../model/user/responsable_model.php");
					$mem = tuteur_pedago();
					foreach ($mem as $row) {
						echo '<tr>';
						echo '<th scope="row">' .$row['uid'] .'</th>';
						echo '<td>' .$row['nom'].' '.$row['prenom'].'</td>';
						echo '<td>' .$row['nb_etu'] .'</td>';
						echo '</tr>';
					}
					$mem = null;
					?>
				</tbody>
			</table>
		</div>
		<br><br><br>

		<div id = "principal">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Le nombre d’étudiants dont il est le tuteur
					principal</h1>
				</div>
			</div>
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">Tuteur ID</th>
						<th scope="col">Tuteur principal</th>
						<th scope="col"> Nombres des étudiants</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$mem = tuteur_princip();
					foreach ($mem as $row) {
						echo '<tr>';
						echo '<th scope="row">' .$row['uid'] .'</th>';
						echo '<td>' .$row['nom'].' '.$row['prenom'].'</td>';
						echo '<td>' .$row['nb_etu'] .'</td>';
						echo '</tr>';
					}
					$mem = null;
					?>
				</tbody>
			</table>
		</div>
		<br><br><br>

		<div id = "secondaire">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Le nombre d’étudiants dont il est le tuteur
					secondaire</h1>
				</div>
			</div>
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">Tuteur ID</th>
						<th scope="col">Tuteur secondaire</th>
						<th scope="col"> Nombres des étudiants</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$mem = tuteur_second();
					foreach ($mem as $row) {
						echo '<tr>';
						echo '<th scope="row">' .$row['uid'] .'</th>';
						echo '<td>' .$row['nom'].' '.$row['prenom'].'</td>';
						echo '<td>' .$row['nb_etu'] .'</td>';
						echo '</tr>';
					}
					$mem = null;
					?>
				</tbody>
			</table>
		</div>		
	</section>
</body>
<?php
include (__DIR__."/../../footer.php");
?>

