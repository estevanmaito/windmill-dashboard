<?php
namespace ressources\views;
use \app\models\User;
use \app\controllers\UserController;


$title = "Modifier utilisateur";
$locationOption = UserController::SelectOption('location','name');
$roleOption = UserController::SelectOption('role','type_role');

ob_start();
?>

<form action="index1.php?action=update" method="post" >

    <input type="hidden" value="<?= $data->getId()?>" name="id" ><br>

    <label for="username">Nom d'utilisateur :</label><br>
    <input type="text" value="<?= $data->getUsername()?>" name="username"
    class="py-1 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 border focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400" required><br>

    <label for="password">Mot de passe :</label><br>
    <input type="password" value="<?= $data->getPassword()?>" name="password" 
    class="py-1 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 border focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400" required><br>
    
    <label class="block mb-6">
        <span class="text-gray-700">L'emplacement :</span>
            <select name="locationId" class="py-1 px-4 block w-full mt-1 border border-gray-500 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="<?= $data->getUserLocationId() ?>">emplacement</option>
                <?php
            
                foreach ($locationOption as $row):
                ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                <?php endforeach; ?>
            </select>
    </label>

    <label for="phone">Téléphone :</label><br>
    <input type="text" value="<?= $data->getPhone()?>" name="phone" 
    class="py-1 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 border focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400" required><br>
    
    <label for="mobile">Mobile :</label><br>
    <input type="text" value="<?= $data->getMobile()?>" name="mobile" 
    class="py-1 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 border focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400" required><br>
    
    <label for="email">Email :</label><br>
    <input type="text" value="<?= $data->getUserEmail()?>" name="email" 
    class="py-1 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 border focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400" required><br>
    
    <label class="block mb-6">
        <span class="text-gray-700">Rôle : </span >
            <select name="present"
             class="py-1 px-4 block w-full mt-1 border border-gray-500 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 " >
                <option value="<?= $data->getRoleId() ?>">Rôle</option>
                <?php
                    foreach ($roleOption as $row):
                ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['type_role']; ?></option>
                <?php endforeach; ?>
            </select>
      </label>

    <label for="registration_time">Heure d'inscription :</label><br>
    <input type="datetime-local" value="<?= $data->getRegistrationTime()?>" name="registration_time"
    class="py-1 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 border focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400" required><br>
    
    <button type="submit" class="px-6 py-2 text-sm font-medium l text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
    Modifier</button> 
</form>

<?php

$content = ob_get_clean();
include_once 'ressources/views/layout.php';
?>
