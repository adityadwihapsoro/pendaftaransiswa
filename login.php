<?php
session_start();
include 'koneksi.php';

$error = "";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username'");
    $user = mysqli_fetch_assoc($query);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['login'] = true;
        $_SESSION['username'] = $user['username'];

        header("Location: index.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Pendaftaran Siswa</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            background: #f2f4f7;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .login-box {
            width: 380px;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .login-box h2 {
            text-align: center;
            margin-bottom: 10px;
        }

        .login-box p {
            text-align: center;
            color: #777;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 7px;
            font-size: 15px;
        }

        input:focus {
            outline: none;
            border-color: #007bff;
        }

        button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 7px;
            background: #007bff;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #0056b3;
        }

        .error {
            background: #ffe5e5;
            color: #d00000;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
            text-align: center;
        }
    </style>
</head>

<body>

<div class="login-box">

    <h2>Login</h2>
    <p>Silakan masuk ke sistem pendaftaran siswa</p>

    <?php if ($error != ""): ?>
        <div class="error">
            <?= htmlspecialchars($error); ?>
        </div>
    <?php endif; ?>

    <form method="POST">

        <div class="form-group">
            <label>Username</label>
            <input
                type="text"
                name="username"
                placeholder="Masukkan username"
                required
            >
        </div>

        <div class="form-group">
            <label>Password</label>
            <input
                type="password"
                name="password"
                placeholder="Masukkan password"
                required
            >
        </div>

        <button type="submit" name="login">
            Login
        </button>

    </form>

</div>

</body>
</html>