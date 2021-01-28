<?php
  $bdd = new PDO("mysql:host=127.0.0.1;dbname=projet_cnb3_tpisa;charset=utf8","root","root");
  $categories=['Larves','Vers annélides','Mollusques','Arachnides','Crustacés','Myriapodes','Chenilles','Collemboles','Orthoptères','Diptères','Lépidoptères','Nevroptères','Hymenoptères','Homoptères','Hémiptères','Coléoptères'];
  $stat = 0;
  $statut = $bdd->query('SELECT * FROM compte WHERE statut = 0');
  /*$statut->bindValue(':statut', $stat, PDO::PARAM_INT);
  $req = $statut->execute();
  if($req){
    echo 'ok';
  }
  else{
    echo 'nop';
  }*/
  $promo = $statut->fetch();
  $max =  $promo[4];
?>
<main>

  <section id="accordeon">
    <?php for($i = 55; $i<=$max; $i++){?>
      <article>
        <h2><a class="toggleDetail" href="#">Promo <?= $i ?></a></h2>
        <div class="panel">
          <?php
          $photos = $bdd->prepare('SELECT source, promo, id_categorie FROM photo WHERE promo =:act ORDER BY id_photo DESC');
          $photos->bindValue(':act', $i, PDO::PARAM_INT);
          $photos->execute();
          $data = $photos->fetchAll();
          foreach($data as $key):
          ?>
          <img src=<?=$key['source']?> alt="" style="width:10%">
          <p>Catégorie : <?= $categories[$key['id_categorie']-1]?></p>
          <?php endforeach; ?>
        </div>
      </article>
    <?php } ?>
  </section>

</main>
