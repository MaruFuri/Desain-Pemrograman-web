<?php 

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: login.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (username, email, password)
					VALUES ('$username', '$email', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Registration Completed. Go to Login Site!')</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Oops! Something Wrong.')</script>";
			}
		} else {
			echo "<script>alert('Oops! Email Already Exists.')</script>";
		}
		
	} else {
		echo "<script>alert('Confirm Password Not Matched.')</script>";
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
    <title>Register</title>
</head>
<body class="w-full min-h-screen flex justify-center items-center bg-slate-50">
    <div class="w-96 min-h-[400px] bg-white rounded px-7 py-10 shadow-2xl">
        <form action="" method="POST">
            <p class="text-black font-extrabold text-3xl mb-5 block capitalize text-center">Register</p>
            <div class="rounded-full shadow-lg w-full h-12 mb-6">
				<input class="w-full h-full px-5 py-4 text-base border-2 rounded-3xl bg-transparent outline-none duration-700 focus:border-slate-700 " type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
			</div>
            <div class="rounded-full shadow-lg w-full h-12 mb-6">
                <input class="w-full h-full px-5 py-4 text-base border-2 rounded-3xl bg-transparent outline-none duration-700 focus:border-slate-700 " type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="rounded-full shadow-lg w-full h-12 mb-6">
                <input class="w-full h-full px-5 py-4 text-base border-2 rounded-3xl bg-transparent outline-none duration-700 focus:border-slate-700 " type="password" placeholder="Password" name="password" value="<?php echo $_POST ['password']; ?>" required>
            </div>
            <div class="rounded-full shadow-lg w-full h-12 mb-9">
				<input class="w-full h-full px-5 py-4 text-base border-2 rounded-3xl bg-transparent outline-none duration-700 focus:border-slate-700 " type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			</div>
            <div class="rounded-full shadow-lg w-full h-12 mb-5">
				<button class="block w-full px-5 py-3 text-center border-none bg-slate-700 outline-none rounded-3xl text-xl text-white cursor-pointer hover:bg-slate-900" name="submit" >Register</button>
			</div>
            <p class="text-black font-semibold text-center">Have an account? <a class="no-underline text-blue-500 font-light hover:text-blue-600" href="login.php">Login Here</a>.</p>
        </form>
    </div>
</body>
</html>