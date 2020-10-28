<?php

try{
    $db =  new PDO("mysql:host=localhost;dbname=db_gambar","root","",[PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION]);
} catch (Exception $error){
    // echo $error->getMessage();
}

$siswa=$db->query("select * from tb_gambar"); // prepare statmen

$data_siswa=$siswa->fetchAll(); // Execute and get as array

$barang=$db->query("select * from tb_gambar limit 4");

$data_barang=$barang->fetchAll();

// var_dump($data_siswa);

?>

