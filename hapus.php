<?php
session_start();

if(!isset($_SESSION["login"])){//jika tidak ada session login maka arahkan ke form login
    header("Location: login.php");
    exit;
}

require 'function.php';

$id = $_GET["id"];

if(hapus($id)> 0){
echo "
            <script>
                alert('data berhasil dihapus!');
                document.location.href = 'index.php';
            </script>
        ";
}else{
    echo "
            <script>
                alert('data gagal didihapus!');
                document.location.href = 'index.php';
            </script>
        ";
}
?>
