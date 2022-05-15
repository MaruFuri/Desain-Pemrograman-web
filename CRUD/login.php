<?php 

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("Location: index.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <style type="text/tailwindcss">
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
    </style>
    <title>Login</title>
</head>
<body class="w-full min-h-screen flex justify-center items-center bg-slate-50">
    <div class="w-96 min-h-[400px] bg-white rounded px-7 py-10 shadow-2xl">
        <form action="" method="POST">
            <p class="text-black font-extrabold text-3xl mb-5 block capitalize text-center">Login</p>
            <div class="rounded-full shadow-lg w-full h-12 mb-6">
                <input class="w-full h-full px-5 py-4 text-base border-2 rounded-3xl bg-transparent outline-none duration-700 focus:border-black " type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="rounded-full shadow-lg w-full h-12 mb-9">
                <input class="w-full h-full px-5 py-4 text-base border-2 rounded-3xl bg-transparent outline-none duration-700 focus:border-black " type="password" placeholder="Password" name="password" value="<?php echo $_POST ['password']; ?>" required>
            </div>
            <div class="rounded-full shadow-lg w-full h-12 mb-5">
				<button class="block w-full px-5 py-3 text-center border-none bg-slate-700 outline-none rounded-3xl text-xl text-white cursor-pointer hover:bg-slate-900" name="submit" >Login</button>
			</div>
            <p class="text-black font-semibold text-center">Don't have an account? <a class="no-underline text-blue-500 font-light hover:text-blue-600" href="register.php">Register Here</a></p>
        </form>
    </div>
</body>
</html>