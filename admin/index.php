 <?php
session_start();

$user='Douno30';
$password='1234';
if (isset($_POST['submit'])) {
	$username=$_POST['username'];
	$password_definit=$_POST['password'];

if($username&&$password){
	if ($username==$user&&$password_definit) {
		$_SESSION['username']=$username;
		$_SESSION['$password_definit']=$password_definit;

		header('Location:admin.php');
	
	}else{
		echo "mot de passe errone";


}

}else{
	echo "veuillez remplir tous les champs";
}


}


?>

<link rel="stylesheet" type="text/css" href="../styles/bootstrap.css" rel="stylesheet"/>
<h1>Administration-connexion</h1>
<form action="" method="POST">
	<h3>Votre nom:</h3><input type="text" name="username"><br/><br/>
	<h3>Mot-de-passe:</h3><input type="password" name="password"><br/><br/>
	<input type="submit" name="submit"><br/><br/>
	
</form>