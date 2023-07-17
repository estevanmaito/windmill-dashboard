<?php
namespace ressources\views;
use \app\models\User;


$title = "Ajouter utilisateur";
ob_start();
?>
<div class="w-full md:w-96 md:max-w-full mx-auto">
  <div class="p-6 sm:rounded-md">
<form action="index1.php?action=store" method="post" >
    <label for="username">Username:</label><br>
    <input type="text" name="username"  
    class="py-1 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 border focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400" placeholder="xxx"  required><br>

    <label for="password">Password:</label><br>
    <input type="password" name="password"
    class="py-1 px-4 block w-full mt-1 border border-gray-500 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 " placeholder="*******" required><br>

    <label for="locationId">LocationId:</label><br>
    <input type="text" name="locationId"
    class="py-1 px-4 block w-full mt-1 border border-gray-500 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 " placeholder="0" required><br>

    <label for="locationdetails">Location details:</label><br>
    <input type="text" name="locationdetails"
    class="py-1 px-4 block w-full mt-1 border border-gray-500 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 " placeholder="Location details" required><br>

    <label for="phone">Phone:</label><br>
    <input type="text" name="phone"
    class="py-1 px-4 block w-full mt-1 border border-gray-500 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 " placeholder="06 00 00 00 00" required><br>

    <label for="mobile">Mobile:</label><br>
    <input type="text" name="mobile"
    class="py-1 px-4 px-4 block w-full mt-1 border border-gray-500 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 " placeholder="05 00 00 00 00" required><br>

    <label for="email">Email:</label><br>
    <input type="text" name="email"
    class="py-1 px-4 block w-full mt-1 border border-gray-500 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 " placeholder="xxx@xx.ma" required><br>

    <label class="block mb-6">
        <span class="text-gray-700">Role : </span >
            <select name="present"
             class="py-1 px-4 block w-full mt-1 border border-gray-500 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 " >
                <option value="1">Administrateur</option>
                <option value="2">Propriétaire</option>
                <option value="3">Locataire</option>
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

