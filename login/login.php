<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<?php
// Script PHP untuk memeriksa login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === "khanafi" && $password === "12345") {
        echo '<script>alert("Log In Berhasil");</script>';
        header("location:../produktivitas/kapasitas_blade.php");
    } else {
        echo '<script>alert("Username atau password salah");</script>';
    }
}
phpinfo();

?>

<div class="login-container">
  <div class="login-form">
    <div class="card">
      <img src="logo.png" alt="Logo">
      <h2>Create an account</h2>
      <h4>Let's get started!</h4>
      <form action="#" method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" value="Login">Log In </button>
      </form>
    </div>
  </div>
</div>

</body>
</html>
