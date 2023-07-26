<?php
namespace ressources\views;
use \app\models\User;
use \app\controllers\UserController;


$title = "Modifier utilisateur";
$locationOption = UserController::SelectOption('location','name');
$roleOption = UserController::SelectOption('role','type_role');

ob_start();
?>
<div class="container px-6 mx-auto grid">
    <h4 class=" my-6 mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">  Modifier</h4>
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <form action="index1.php?action=update" method="post" >

            <input type="hidden" value="<?= $data->getId()?>" name="id" ><br>

            <label class="block text-sm" for="username">
                <span class="text-gray-700 dark:text-gray-400" >Nom d'utilisateur :</span >
                <input type="text" value="<?= $data->getUsername()?>" name="username"
                class="py-1 px-4 block w-full border border-gray-200 rounded-md text-sm border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required><br>
            </label>

            <label class="block text-sm" for="password">
                <span class="text-gray-700 dark:text-gray-400" >Mot de passe : </span >
                <input type="password" value="<?= $data->getPassword()?>" name="password" 
                class="py-1 px-4 block w-full border border-gray-200 rounded-md text-sm border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required><br>
            </label>
            
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400" >L'emplacement :</span>
                    <select name="locationId"
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        <option value="<?= $data->getUserLocationId() ?>">emplacement</option>
                        <?php
                    
                        foreach ($locationOption as $row):
                        ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
            </label>

            <label class="block text-sm" for="phone">
                <span class="text-gray-700 dark:text-gray-400" >Téléphone :</span>
                <input type="text" value="<?= $data->getPhone()?>" name="phone" 
                class="py-1 px-4 block w-full border border-gray-200 rounded-md text-sm border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required><br>
            </label>

            <label class="block text-sm" for="mobile"> 
                <span class="text-gray-700 dark:text-gray-400" >Mobile :</span>
                <input type="text" value="<?= $data->getMobile()?>" name="mobile" 
                class="py-1 px-4 block w-full border border-gray-200 rounded-md text-sm border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required><br>
            </label>

            <label class="block text-sm" for="email">
                <span class="text-gray-700 dark:text-gray-400" >Email :</span>
                <input type="text" value="<?= $data->getUserEmail()?>" name="email" 
                class="py-1 px-4 block w-full border border-gray-200 rounded-md text-sm border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required><br>
            </label>

            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400" >Rôle : </span >
                    <select name="present"
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        <option value="<?= $data->getRoleId() ?>">Rôle</option>
                        <?php
                            foreach ($roleOption as $row):
                        ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['type_role']; ?></option>
                        <?php endforeach; ?>
                    </select>
            </label>

            <label class="block text-sm" for="registration_time">
                <span class="text-gray-700 dark:text-gray-400" >Heure d'inscription : </span >       
                <input type="datetime-local" value="<?= $data->getRegistrationTime()?>" name="registration_time"
                class="py-1 px-4 block w-full border border-gray-200 rounded-md text-sm border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required><br>
            </label>

            <button type="submit" class="px-6 py-2 text-sm font-medium l text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Modifier</button> 
        </form>
    </div>
</div>
<?php

$content = ob_get_clean();
include_once 'ressources/views/layout.php';
?>
