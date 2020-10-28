<?php

function deleteSiswa($delete) {
    include 'connection.php';

    $sql = 'DELETE FROM tb_gambar WHERE id_gambar = ?';

    try {
        $result = $db->prepare($sql);
        $result->bindValue(1, $delete['id_gambar'], PDO::PARAM_INT);
        $result->execute();
    } catch (Exception $e) {
        echo "Error!: " . $e->getMessage() . "<br />";
        return false;
    }
    return true;
}


function comand($query)
{

    include 'connection.php';

    global $db;
    $result = $db->query($query);
    $rows=[];
    while($row=$result->fetch(PDO::FETCH_ASSOC)){
        $rows[]=$row;
    }
    return $rows;
}
function searching($keyword){

    $query="SELECT * FROM  tb_gambar WHERE nama LIKE '%$keyword%' OR jenis_produk LIKE '%$keyword%' OR harga LIKE '%$keyword%' OR deskripsi LIKE '%$keyword%' ";

    //  var_dump(comand($query));
    //     exit;
    return comand($query);
    
}


?>