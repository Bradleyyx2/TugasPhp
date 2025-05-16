<?php
require 'function.php';

if(isset($_POST["register"])){
    if(registrasi($_POST) > 0){
        echo "<script>alert('User baru ditambahkan!');</script>";
    } else {
        echo mysqli_error($conn);
    }
}
?>
<html>
<head>
    <title>Halaman Registrasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
        }
        .register-container {
            width: 400px;
            margin: 100px auto;
            background: white;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 10px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form ul {
            list-style: none;
            padding: 0;
        }
        form li {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h1>Halaman Registrasi</h1>
        <form action="" method="post">
            <ul>
                <li>
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username">
                </li>
                <li>
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password">
                </li>
                <li>
                    <label for="password2">Konfirmasi Password:</label>
                    <input type="password" name="password2" id="password2">
                </li>
                <li>
                    <button type="submit" name="register">Register!</button>
                </li>
            </ul>
        </form>
    </div>
</body>
</html>
