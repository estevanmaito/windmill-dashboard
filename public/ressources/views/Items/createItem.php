<?php
namespace ressources\views;
use \app\models\Item;
use \app\controllers\ItemController;

$title = "Ajouter propriétés";
$typeOption = ItemController::SelectOptionItem('item_type','type_name');
$locationOption = ItemController::SelectOptionItem('location','name');
$proprietaireOption = ItemController::SelectOptionItem('user_account','username','role_id = 2');
$unitOption = ItemController::SelectOptionItem('unit','unit_name');



ob_start();
?>
<div class="w-full md:w-96 md:max-w-full mx-auto">
    <div class="p-6 sm:rounded-md font-semibold text-gray-600 dark:text-gray-300">
        <form action="index1.php?action=storeItem" method="post" >
            <label for="name">Nom :</label>
            <input type="text" name="name" 
            class="py-1 px-4 block w-full border border-gray-200 rounded-md text-sm border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="nom..." required >
          
            <label class="block mb-6">
                <span class="text-gray-700">Type :</span>
                    <select name="typeId" class="py-1 px-4 block w-full mt-1 border border-gray-500 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">Choisir un type</option>
                        <?php
                    
                        foreach ($typeOption as $row):
                        ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['type_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
            </label>
 
            <label class="block mb-6">
                <span class="text-gray-700">Emplacement :</span>
                    <select name="locationId" class="py-1 px-4 block w-full mt-1 border border-gray-500 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">Choisir un emplacement</option>
                        <?php
                    
                        foreach ($locationOption as $row):
                        ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
            </label>    

            <label for="itemLocation">Emplacement de l'article :</label>
            <input type="text" name="itemLocation" 
            class="py-1 px-4 block w-full border border-gray-200 rounded-md text-sm border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Emplacement..." required >
       
            <label for="description">Description :</label>
            <textarea name="description" rows="4" 
            class="py-1 px-4 block w-full border border-gray-200 rounded-md text-sm border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Écrivez vos pensées ici..."></textarea>

            <label class="block mb-6">
                <span class="text-gray-700">Propriétaire :</span>
                    <select name="ownerId" class="py-1 px-4 block w-full mt-1 border border-gray-500 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">Choisir un propriétaire</option>
                        <?php
                    
                        foreach ($proprietaireOption as $row):
                        ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['username']; ?></option>
                        <?php endforeach; ?>
                    </select>
            </label>   

            <label for="price">Prix :</label>
            <input type="text" name="price" 
            class="py-1 px-4 block w-full border border-gray-200 rounded-md text-sm border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0000.00" required >

            <label class="block mb-6">
                <span class="text-gray-700">Unité :</span>
                <select name="unitId" class="py-1 px-4 block w-full mt-1 border border-gray-500 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                <option value="">Choisir une unité</option>

                    <?php
                    foreach ($unitOption as $row):
                    ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['unit_name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </label>

            <button type="submit" class="px-6 py-2 text-sm font-medium l text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Ajouter</button> 
        </form>
    </div>
</div>

<?php

$content = ob_get_clean();
include_once 'public/ressources/views/layout.php';
?>
