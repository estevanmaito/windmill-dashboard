<?php
namespace public\ressources\views;
use public\app\models\User;
var_dump($data);
$title = "modifier utilisateur";
ob_start();
?>

<form action="index1.php?action=update" method="post" style="color: black; background-color:blue;">
    <label for="id">Id:</label><br>
    <input type="hidden" value="<?= $data->getId()?>" name="id" ><br>

    <label for="username">Username:</label><br>
    <input type="text" value="<?= $data->getUsername()?>" name="username" required><br>

    <label for="password">Password:</label><br>
    <input type="password" value="<?= $data->getPassword()?>" name="password" required><br>

    <label for="locationId">LocationId:</label><br>
    <input type="text" value="<?= $data->getUserLocationId()?>" name="locationId" required><br>

    <label for="locationdetails">Location details:</label><br>
    <input type="text" value="<?= $data->getLocationDetails()?>" name="locationdetails" required><br>

    <label for="phone">Phone:</label><br>
    <input type="text" value="<?= $data->getPhone()?>" name="phone" required><br>

    <label for="mobile">Mobile:</label><br>
    <input type="text" value="<?= $data->getMobile()?>" name="mobile" required><br>

    <label for="email">Email:</label><br>
    <input type="text" value="<?= $data->getUserEmail()?>" name="email" required><br>

    <label for="registration_time">Registration Time:</label><br>
    <input type="text" value="<?= $data->getRegistrationTime()?>" name="registration_time" ><br><br>

<button type="submit" style="color: blue; background-color:black;"  class="btn btn-primary my-3">Modifier</button> 
</form>



<?php
echo "ok!";
$content = ob_get_clean();
include_once 'layout.php';
?>
