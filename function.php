<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

// Fungsi menampilkan data dari database
function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

// Fungsi menambah to do
function tambah($data){
    global $conn;
    $todolist = htmlspecialchars($data["ToDoList"]);

    $query = "INSERT INTO ToDoList (ToDoList) VALUES ('$todolist')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

// Fungsi menghapus to do
function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM ToDoList WHERE id = $id");
    return mysqli_affected_rows($conn);
}

// Fungsi menandai selesai
function selesai($id){
    global $conn;
    $query = "UPDATE ToDoList SET status = 'selesai' WHERE id = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

// Fungsi registrasi user
function registrasi($data){
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // Cek username sudah terdaftar
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)){
        echo "<script>alert('Username sudah terdaftar!');</script>";
        return false;
    }

    // Cek konfirmasi password
    if($password !== $password2){
        echo "<script>alert('Konfirmasi password tidak sesuai!');</script>";
        return false;
    }

    // Enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Tambahkan user
    $query = "INSERT INTO user (username, password) VALUES ('$username', '$password')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
?>
