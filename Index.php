<?php
session_start();

// Simulasi session login (hapus bagian ini jika sudah ada sistem login yang sebenarnya)
if (!isset($_SESSION["login"])) {
    $_SESSION["login"] = true;
    $_SESSION["username"] = "bradley"; // username untuk referensi foto
    $_SESSION["namaLengkap"] = "Bradley Aditya Pasewang";
    $_SESSION["nim"] = "235314034";
}

// Redirect ke login jika belum login
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'function.php';
$todolist = query("SELECT * FROM ToDoList");

// Tentukan path foto lengkap berdasarkan username
$username = $_SESSION["bradley"] ?? '';
$foto = "img/bradley.jpg"; // fallback foto default dengan folder img/

$foto_path = "img/" . strtolower($username) . ".jpg";
if (file_exists($foto_path)) {
    $foto = $foto_path;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>To Do List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0; padding: 0;
        }
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 30px;
            background-color: #3498db;
            color: white;
        }
        .profile {
            display: flex;
            align-items: center;
        }
        .profile img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 10px;
            object-fit: cover;
        }
        .profile-info {
            display: flex;
            flex-direction: column;
            line-height: 1.1;
        }
        .profile-info span {
            font-weight: bold;
            font-size: 0.9rem;
        }
        .logout-button {
            background-color: #e74c3c;
            padding: 8px 14px;
            border-radius: 5px;
            color: white;
            text-decoration: none;
            font-weight: bold;
        }
        .logout-button:hover {
            background-color: #c0392b;
        }
        .container {
            width: 80%;
            margin: 50px auto;
            background: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 10px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .button {
            display: inline-block;
            padding: 6px 12px;
            margin: 5px 0;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        .button:hover {
            background-color: #2980b9;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            text-align: center;
            padding: 10px;
        }
        th {
            background-color: #3498db;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .done {
            text-decoration: line-through;
            color: gray;
        }
    </style>
</head>
<body>
    <div class="top-bar">
        <div class="profile">
            <img src="<?= htmlspecialchars($foto) ?>" alt="Foto Profil" />
            <div class="profile-info">
                <span><?= htmlspecialchars($_SESSION["namaLengkap"] ?? 'User') ?></span>
                <span>235314034<?= htmlspecialchars($_SESSION["nim"] ?? '-') ?></span>
            </div>
        </div>
        <a href="logout.php" class="logout-button">Logout</a>
    </div>

    <div class="container">
        <h1>To Do List</h1>
        <a href="tambah.php" class="button">+ Tambah To Do</a>
        <table>
            <tr>
                <th>No.</th>
                <th>To Do List</th>
                <th>Update</th>
            </tr>
            <?php $i = 1; foreach ($todolist as $row): ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td class="<?= $row["status"] === "selesai" ? 'done' : '' ?>">
                        <?= htmlspecialchars($row["ToDoList"]); ?>
                    </td>
                    <td>
                        <?php if ($row["status"] !== "selesai"): ?>
                            <a href="selesai.php?id=<?= $row["id"]; ?>" class="button">Selesai</a>
                        <?php else: ?>
                            <span style="color: green;">✔ Selesai</span>
                        <?php endif; ?>
                        <a href="hapus.php?id=<?= $row["id"]; ?>" class="button" onclick="return confirm('Yakin dihapus ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
