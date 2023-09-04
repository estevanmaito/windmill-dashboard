<?php
namespace ressources\views\ItemLeased;

use \app\controllers\ItemLeasedController;

require "vendor/autoload.php";

$title = "Event Calendar";
ob_start();

?>
<div class="flex pb-2 md:overflow-auto">
    <div class=" px-4 py-2 mx-auto md:py-24">
        <ul class=" text-center border dark:border-gray-600 px-2 lg:w-48 w-32 rounded-lg shadow-xs inline-block shadow-r overflow-hidden">
        <?php 
            /** @var \app\models\ItemLeased[] $data */
            // Loop through the data to generate project boxes
            if (is_array($data) || is_object($data)) {
            foreach ($data as $item): 
        ?>
            <div id="itemLeased-row" class="bg-gray-50 dark:bg-gray-900 text-gray-700" data-id="<?php echo $item->getItemLeasedId() ?>">
            <li id='itemCalendar' class="py-4 border-b dark:border-gray-700 text-sm hover:bg-gray-100 dark:hover:bg-gray-800 dark:text-gray-400 h-12"><?= $item->item_name ?></li>
            </div>
        <?php 
            endforeach;
            } else {
            echo "<br>No data available";
            }
        ?>
        </ul>
    </div>
    <div class="flex">

    </div>
</div>
<?php
$content = ob_get_clean();
include_once 'ressources/views/layout.php';

?>