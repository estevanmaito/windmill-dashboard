<?php
namespace ressources\views\Items;
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
<div class="container px-6 mx-auto grid">
  <h4 class=" my-6 mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"> Modifier une propriété</h4>
  <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <form action="index1.php?action=updateItem" method="post">

            <input type="hidden" value="<?= $data->getId() ?>" name="id"><br>

            <label class="block text-sm" for="name"> 
                <span class="text-gray-700 dark:text-gray-400" >Nom :</span>
                 <input type="text" value="<?= $data->getItemName() ?>" name="name"
                 class="py-1 px-4 block w-full border border-gray-200 rounded-md text-sm border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="nom..." required >              
            </label>

            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400" >Type :</span>
                    <select name="typeId" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        <option value="<?= $data->getItemTypeId() ?>">type</option>
                        <?php
                    
                        foreach ($typeOption as $row):
                        ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['type_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
            </label>

            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400" >Emplacement :</span>
                <select name="locationId" 
                 class="py-1 px-4 block w-full border border-gray-200 rounded-md text-sm border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="nom..." required >              
                        <option value="<?= $data->getItemLocationId() ?>">emplacement</option>
                        
                        <?php
                        foreach ($locationOption as $row):
                        ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                        <?php endforeach; ?>
                </select>
            </label>            

            <label class="block text-sm" for="itemLocation">
                <span class="text-gray-700 dark:text-gray-400" >Emplacement de l'article :</span>
                <input type="text" name="itemLocation" value="<?= $data->getItemLocation() ?>"
                class="py-1 px-4 block w-full border border-gray-200 rounded-md text-sm border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Emplacement..." required >    
            </label>

            <label class="block text-sm" for="description">
                <span class="text-gray-700 dark:text-gray-400" >Description :</span>
                <textarea name="description" rows="4" 
                class="py-1 px-4 block w-full border border-gray-200 rounded-md text-sm border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Écrivez vos pensées ici..."><?php echo $data->getItemDescription() ?></textarea>
            </label>

            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400" >Propriétaire :</span>
                    <select name="ownerId" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        <option value="<?= $data->getOwnerId() ?>">propriétaire</option>
                        <?php
                            
                        foreach ($proprietaireOption as $row):
                        ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['username']; ?></option>
                        <?php endforeach; ?>
                    </select>
            </label>   

            <label class="block text-sm" for="price">
                <span class="text-gray-700 dark:text-gray-400" >Prix :</span>
                <input type="text" name="price" value="<?= $data->getPricePerUnit() ?>"
                class="py-1 px-4 block w-full border border-gray-200 rounded-md text-sm border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0000.00" required >
            </label>

            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400" >Unité :</span>
                <select name="unitId" 
                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"required>
                    <option value="<?= $data->getItemUnitId() ?>">unité</option>

                    <?php
                    foreach ($unitOption as $row):
                    ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['unit_name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
            <br>
            <button type="submit"
                class="px-6 py-2 text-sm font-medium l text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Modifier</button>
        </form>
    </div>
</div>

<?php

$content = ob_get_clean();
include_once 'ressources/views/layout.php';
?>
