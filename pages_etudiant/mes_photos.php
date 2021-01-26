<?php require_once('../includes/header.php'); ?>


<body>

<ul id="photo-list">
    <p class="element">
      <img src="../img/chat2.jpg" id="1" height="150" width="150">
    </p>
    <p class="element">
      <img src="../img/chat7.jpg" id="2" height="150" width="150">
    </p>
  </ul>



<form method="post" action="supprimer.php"> <!-- get c'est quand on passe par l'URL, or ce n'est pas ce qu'on veut donc on passe par post-->
    <button type="submit">Supprimer</button>
    <input type="hidden" id="jsonId" name="id" value=''/>
</form>

</body>

<script src="main.js"></script>
