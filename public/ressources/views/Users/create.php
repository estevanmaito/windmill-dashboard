<?php
namespace ressources\views;
use \app\models\User;
use \app\controllers\UserController;

$title = "Ajouter utilisateur";
$locationOption = UserController::SelectOption('location','name');
$roleOption = UserController::SelectOption('role','type_role');
ob_start();
?>
<div class="w-full md:w-96 md:max-w-full mx-auto">
  <div class="p-6 sm:rounded-md font-semibold text-gray-600 dark:text-gray-300">
    <form action="index1.php?action=store" method="post" >
        <label for="username">Nom d'utilisateur :</label><br>
        <input type="text" name="username"  
        class="py-1 px-4 block w-full border border-gray-200 rounded-md text-sm border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="xxx"  required><br>

        <label for="password">Mot de passe :</label><br>
        <input type="password" name="password"
        class="py-1 px-4 block w-full border border-gray-200 rounded-md text-sm border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="*******" required><br>

        <label class="block mb-6">
        <span class="text-gray-700">L'emplacement :</span>
          <select name="locationId" class="py-1 px-4 block w-full mt-1 border border-gray-500 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
          <option value="">Choisir un emplacement</option>

            <?php
              foreach ($locationOption as $row):
            ?>
            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
            <?php endforeach; ?>
          </select>
      </label>


        <label for="phone">Téléphone :</label><br>
        <input type="text" name="phone"
        class="py-1 px-4 block w-full border border-gray-200 rounded-md text-sm border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="06 00 00 00 00" required><br>

        <label for="mobile">Mobile :</label><br>
        <input type="text" name="mobile"
        class="py-1 px-4 block w-full border border-gray-200 rounded-md text-sm border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="05 00 00 00 00" required><br>

        <label for="email">Email :</label><br>
        <input type="text" name="email"
        class="py-1 px-4 block w-full border border-gray-200 rounded-md text-sm border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="xxx@xx.ma" required><br>

        <label class="block mb-6">
        <span class="text-gray-700">Rôle : </span >
          <select name="present" 
          class="py-1 px-4 block w-full mt-1 border border-gray-500 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 " required >
          <option value="">Choisir un rôle</option>
              
              <?php
                foreach ($roleOption as $row):
              ?>
              <option value="<?php echo $row['id']; ?>"><?php echo $row['type_role']; ?></option>
              <?php endforeach; ?>
          </select>
      </label>
        
        <input type="hidden" name="registration_time" >

        <button type="submit" class="px-6 py-2 text-sm font-medium l text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
        Ajouter</button> 
    </form> 
</div>
</div>

<?php

$content = ob_get_clean();
include_once 'public/ressources/views/layout.php';

?>

