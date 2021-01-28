<?php
    require_once('configdb.php');
    if(isset($_GET['id_photo'])){
        $id = $_GET['id_photo'];
        $stat = $conn->prepare("SELECT * FROM photo WHERE id_photo=?");
        $stat-> BindParam(1, $id);
        $stat->execute();
        $data = $stat->fetch();

        $file = $data['source'];

        if(file_exists($file)){
            header('Content-Disposition: '.$data['disposition'].';filename="'.basename($file).'"');
            header('Content_length: '.filesize($file));
            readfile($file);
            exit;
        }
    }

?>