<?php
    $bdd = new PDO("mysql:host=127.0.0.1;dbname=projet_cnb3_tpisa;charset=utf8","root","");
    if(isset($_GET['id_photo'])){
        $id = $_GET['id_photo'];
        $stat = $bdd->prepare("SELECT * FROM photo WHERE id_photo=?");
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
