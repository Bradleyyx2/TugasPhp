<?php
session_start();

if(!isset($_SESSION["login"])){ // jika belum login
    header("Location: login.php");
    exit;
}

require 'function.php';
$conn = mysqli_connect("localhost", "root","","phpdasar");

if(isset($_POST["submit"])){
    if(tambah($_POST) > 0){
        echo "
            <script>
                alert('Data berhasil ditambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal ditambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
    }
}
?>
<html>
<head>
    <title>Tambah To Do List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
        }
        .form-container {
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
        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            margin-top: 10px;
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
    <div class="form-container">
        <h1>Tambah To Do List</h1>
        <form action="" method="post">
            <ul>
                <li>
                    <label for="ToDoList">To Do List:</label>
                </li>
                <li>
                    <input type="text" name="ToDoList" id="ToDoList" required>
                    <button type="submit" name="submit">Tambah</button>
                </li>
            </ul>
        </form>
    </div>
</body>
</html>
