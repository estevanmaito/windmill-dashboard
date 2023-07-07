<?php
namespace public\ressources\views;
use public\app\models\User;

$title = "Ajouter utilisateur";
ob_start();
?>

<form action="index.php?action=store" method="post">
<div class="form-group">
<label>Modele</label><br/>
<input type="text" class="form-control" name="modele" placeholder="Modele"> </div>
<div class="form-group">
<label>Prix</label><br/>
<input type="text" class="form-control" name="prix" placeholder="Modele">
</div>
<button type="submit"  class="btn btn-primary my-3"><a href="index1.php?action=list">Ajouter</a></button> 
</form>



<?php
echo "ok!";
$content = ob_get_clean();
include_once 'layout.php';
?>
