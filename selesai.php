<?php
require 'function.php';

$id = $_GET["id"];

if(selesai($id) > 0){
    header("Location: index.php");
    exit;
} else {
    echo "Gagal menandai sebagai selesai.";
}
?>
