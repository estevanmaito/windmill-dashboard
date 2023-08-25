<?php
namespace ressources\views\Users;
use \app\models\User;
use \app\controllers\UserController;

$title = "Ajouter utilisateur";
$locationOption = UserController::SelectOption('location','name');
$roleOption = UserController::SelectOption('role','type_role');
ob_start();
?>
<div class="container px-6 mx-auto grid">
  <h4 class=" my-6 mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"> Ajouter un nouveau client</h4>
  <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

    <form action="index1.php?action=store" method="post" >
        <label class="block text-sm" for="username">
          <span class="text-gray-700 dark:text-gray-400">Nom d'utilisateur :</span>
          <input type="text" name="username"  
          class="py-1 px-4 block w-full border border-gray-200 rounded-md text-sm border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="nom..."  required><br>
        </label>

        <label class="block text-sm" for="password">
          <span class="text-gray-700 dark:text-gray-400">Mot de passe :</span>
          <input type="password" name="password"
          class="py-1 px-4 block w-full border border-gray-200 rounded-md text-sm border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="*******" required><br>
        </label>

        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400">L'emplacement :</span>
          <select name="locationId" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"required>
          <option value="">Choisir un emplacement</option>

            <?php
              foreach ($locationOption as $row):
            ?>
            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
            <?php endforeach; ?>
          </select>
      </label>


        <label class="block text-sm" for="phone">
          <span class="text-gray-700 dark:text-gray-400">Téléphone :</span>
          <input type="text" name="phone"
          class="py-1 px-4 block w-full border border-gray-200 rounded-md text-sm border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="06 00 00 00 00" required><br>
        </label>

        <label class="block text-sm" for="mobile">
          <span class="text-gray-700 dark:text-gray-400">Mobile :</span>
          <input type="text" name="mobile"
          class="py-1 px-4 block w-full border border-gray-200 rounded-md text-sm border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="05 00 00 00 00" required><br>
        </label>
        
        <label class="block text-sm" for="email">
          <span class="text-gray-700 dark:text-gray-400">Email :</span>
          <input type="text" name="email"
          class="py-1 px-4 block w-full border border-gray-200 rounded-md text-sm border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="xxx@gmail.ma" required><br>
        </label>

        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400" >CIN : </span >
          <input class="block w-full mb-5 text-sm text-gray-900 border border-gray-300 rounded-md cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400"
           id="default_size" type="file" required>
        </label>

        <label class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400" >Rôle : </span >
          <select name="present" 
          class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" required >
          <option value="">Choisir un rôle</option>
              
              <?php
                foreach ($roleOption as $row):
              ?>
              <option value="<?php echo $row['id']; ?>"><?php echo $row['type_role']; ?></option>
              <?php endforeach; ?>
          </select>
      </label>
        
        <input type="hidden" name="registration_time" ><br>

        <button type="submit" class="px-6 py-2 text-sm font-medium l text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
        Ajouter</button> 
    </form> 
</div>
</div>

<?php

$content = ob_get_clean();
include_once 'ressources/views/layout.php';

?>

