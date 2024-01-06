<?php 
session_start(); 
require_once "../db/Connection.php";

$err = "";
$username = "";

if(isset($_POST['login'])){
	$username = $_POST['username'];
	$password = $_POST['password'];

	if($username == '' or $password == ''){
		$err .= "Silahkan masukan username dan juga password";
	} else {
		$sql1 = "SELECT * FROM login WHERE username = '$username'";
		$q1 = mysqli_query($koneksi, $sql1);
		$r1 = mysqli_fetch_array($q1);

		if($r1['username'] == ''){
			$err .= "Username <b>$username</b> tidak tersedia";
		} else if($r1['password'] != md5($password)){
			$err .= "Password yang dimasukkan tidak sesuai";
		}

		if(empty($err)){
			$_SESSION['session_username'] = $username;
			$_SESSION['session_password'] = md5($password);
			header("location:../index.php");
		}
	}
}

?>
<?php if(!isset($_SESSION['session_username'])) { ?>
<?php require_once '../config/header.php' ?>
<link rel="stylesheet" href="../css/style.css">
<link rel="shortcut icon" href="../images/washing-machine.ico" type="image/x-icon">
<title>Sign In</title>
<style>
	.bd-placeholder-img {
		font-size: 1.125rem;
		text-anchor: middle;
		-webkit-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;
	}

	@media (min-width: 768px) {
		.bd-placeholder-img-lg {
			font-size: 3.5rem;
		}
	}
</style>
</head>

<body class="text-center d-flex justify-content-center align-items-center" style="min-height: 100vh">

	<div>
		<form method="POST" class="form-signin" role="form">
			<img class="mb-4" src="../images/washing-machine.png" alt="" width="72" height="72">
			<h1 class="h3 mb-3 font-weight-normal">Sign In Admin</h1>
			<label for="inputUsername" class="sr-only">Username</label>
			<input type="text" id="inputUsername" name="username" class="form-control py-4" placeholder="Username"
				required autofocus>
			<label for="inputPassword" class="sr-only">Password</label>
			<input type="password" id="inputPassword" name="password" class="form-control py-4 mt-3"
				placeholder="Password" required>
			<input name="login" class="btn btn-lg btn-primary btn-block mt-4" type="submit" value="Sign In" />
			<?php if($err){
				echo "<div id='err' class='w-100 bg-danger text-white mt-2 p-2' style='transition: 300ms ease-in-out;'>$err</div>";
			} ?>
			<p class="mt-5 mb-3 text-muted">&copy; 2024 Home Laundry</p>
		</form>
	</div>

	<script src="../js/jquery.min.js"></script>
	<script src="../js/popper.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/main.js"></script>
	<script>
		setTimeout(() => {
			const err = document . getElementById('err');
			err.style.display = 'none';
		}, 2000);
	</script>
	<?php require_once '../config/footer.php' ?>
	<?php } else {
		header("location:../index.php");
	} ?>