<?php
namespace public\ressources\views;
use public\app\models\User;

$title = "Ajouter utilisateur";
ob_start();
?>

<form action="index1.php?action=store" method="post" style="color: black; background-color:blue;">
    <label for="username">Username:</label><br>
    <input type="text" name="username" required><br>

    <label for="password">Password:</label><br>
    <input type="password" name="password" required><br>

    <label for="locationId">LocationId:</label><br>
    <input type="text" name="location_id" required><br>

    <label for="locationdetails">Location details:</label><br>
    <input type="text" name="location_details" required><br>

    <label for="phone">Phone:</label><br>
    <input type="text" name="phone" required><br>

    <label for="mobile">Mobile:</label><br>
    <input type="text" name="mobile" required><br>

    <label for="email">Email:</label><br>
    <input type="text" name="email" required><br>

    <label for="registration_time">Registration Time:</label><br>
    <input type="text" name="registration_time" ><br><br>

<button type="submit" style="color: blue; background-color:black;"  class="btn btn-primary my-3">Ajouter</button> 
</form>



<?php

$content = ob_get_clean();
include_once 'layout.php';
?>
