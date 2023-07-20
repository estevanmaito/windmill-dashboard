<?php
namespace ressources\views;
use \app\models\Item;
use \app\controllers\ItemController;
//variables
$title = "Modifier propriété";
$typeOption = ItemController::SelectOptionItem('item_type','type_name');
$locationOption = ItemController::SelectOptionItem('location','name');
$proprietaireOption = ItemController::SelectOptionItem('user_account','username','role_id = 2');
$unitOption = ItemController::SelectOptionItem('unit','unit_name');
ob_start();
?>

<form action="index1.php?action=updateItem" method="post">

    <input type="hidden" value="<?= $data->getId() ?>" name="id"><br>

    <label for="name">Nom :</label><br>
    <input type="text" value="<?= $data->getItemName() ?>" name="name"
        class="py-1 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 border focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400" required><br>

    <label for="typeId">Identifiant de type :</label><br>
    <input type="text" value="<?= $data->getItemTypeId() ?>" name="typeId"
        class="py-1 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 border focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400" required><br>

    <label class="block mb-6">
        <span class="text-gray-700">Type :</span>
            <select name="typeId" class="py-1 px-4 block w-full mt-1 border border-gray-500 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="<?= $data->getItemTypeId() ?>">type</option>
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
                <option value="<?= $data->getItemLocationId() ?>">emplacement</option>
                <?php
            
                foreach ($locationOption as $row):
                ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                <?php endforeach; ?>
            </select>
    </label>            

    <label for="itemLocation">Emplacement de l'article :</label>
            <input type="text" name="itemLocation" value="<?= $data->getItemLocation() ?>"
            class="py-1 px-4 block w-full border border-gray-200 rounded-md text-sm border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Emplacement..." required >
       
            <label for="description">Description :</label>
            <textarea name="description" rows="4" value="<?= $data->getItemDescription() ?>"
            class="py-1 px-4 block w-full border border-gray-200 rounded-md text-sm border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Écrivez vos pensées ici..."></textarea>

            <label class="block mb-6">
                <span class="text-gray-700">Propriétaire :</span>
                    <select name="ownerId" class="py-1 px-4 block w-full mt-1 border border-gray-500 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="<?= $data->getOwnerId() ?>">propriétaire</option>
                        <?php
                    
                        foreach ($proprietaireOption as $row):
                        ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['username']; ?></option>
                        <?php endforeach; ?>
                    </select>
            </label>   

            <label for="price">Prix :</label>
            <input type="text" name="price" value="<?= $data->getPricePerUnit() ?>"
            class="py-1 px-4 block w-full border border-gray-200 rounded-md text-sm border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0000.00" required >

            <label class="block mb-6">
                <span class="text-gray-700">Unité :</span>
                <select name="unitId" class="py-1 px-4 block w-full mt-1 border border-gray-500 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                <option value="<?= $data->getItemUnitId() ?>">unité</option>

                    <?php
                    foreach ($unitOption as $row):
                    ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['unit_name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
    <button type="submit"
        class="px-6 py-2 text-sm font-medium l text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
        Modifier</button>
</form>

<?php

$content = ob_get_clean();
include_once 'public/ressources/views/layout.php';
?>
