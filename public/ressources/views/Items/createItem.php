<?php
namespace ressources\views;
use \app\models\Item;

$title = "Ajouter propriétés";
ob_start();
?>

<form action="index1.php?action=storeItem" method="post" style="color: black; background-color:blue;">
    <label for="name">name:</label><br>
    <input type="text" name="name" required><br>

    <label for="typeId">type Id:</label><br>
    <input type="number" name="typeId" required><br>

    <label for="locationId">Location Id:</label><br>
    <input type="number" name="location_id" required><br>

    <label for="itemLocation">item Location:</label><br>
    <input type="text" name="itemLocation" required><br>

    <label for="description">description:</label><br>
    <input type="text" name="description" required><br>

    <label for="ownerId">owner Id:</label><br>
    <input type="number" name="ownerId" required><br>

    <label for="price">price:</label><br>
    <input type="text" name="price" required><br>

    <label for="unitId">unit Id:</label><br>
    <input type="number" name="unitId" ><br><br>

<button type="submit" style="color: blue; background-color:black;"  class="btn btn-primary my-3">Ajouter</button> 
</form>



<?php

$content = ob_get_clean();
include_once 'public/ressources/views/layout.php';
?>
