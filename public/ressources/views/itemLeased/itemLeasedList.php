<?php
namespace ressources\views\ItemLeased;
use \app\models\ItemLeased;
use \app\controllers\ItemLeasedController;

require "vendor/autoload.php";

$title = "Liste des utilisateurs";
ob_start();
$totalItems = ItemLeasedController::lengthActionItemLeased();
$newLeasedItems = ItemLeasedController::CountNewItemLeased();

// Define the number of items to display per page
$itemsPerPage = 3;

// Calculate the total number of pages
$totalPages = ceil($totalItems / $itemsPerPage);

// Get the current page number from the query parameter
$current_page = isset($_GET['page']) && is_numeric($_GET['page']) ? intval($_GET['page']) : 1;

// Ensure the current page number is within the valid range
$current_page = max(1, min($current_page, $totalPages));

// Calculate the offset to fetch the items for the current page
$offset = ($current_page - 1) * $itemsPerPage;

// Display the pagination information
$startItem = ($current_page - 1) * $itemsPerPage + 1;
$endItem = min($startItem + $itemsPerPage - 1, $totalItems);

?>
    <div class="container grid px-6 mx-auto">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">propriétés réservées</h2>

    <div class="grid gap-6 mb-8  md:grid-cols-2 xl:grid-cols-4">
        <!-- Card -->
        <div
          class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
        >
          <div
            class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500"
          >
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
              <path
                d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
              ></path>
            </svg>
          </div>
          <div>
            <p
              class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"  >
              Total reservations
            </p>
            
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200" >
              <?php echo $totalItems;
              ?>
            </p>
          </div>
        </div>
        <!-- Card -->
        <div
          class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
        >
          <div
            class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500"
          >
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
              <path
                fill-rule="evenodd"
                d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                clip-rule="evenodd"
              ></path>
            </svg>
          </div>
          <div>
            <p
              class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
            >
              Account balance
            </p>
            <p
              class="text-lg font-semibold text-gray-700 dark:text-gray-200"
            >
              $ 46,760.89
            </p>
          </div>
        </div>
        <!-- Card -->
        <div
          class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
        >
          <div
            class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500"
          >
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
              <path
                d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"
              ></path>
            </svg>
          </div>
          <div>
            <p
              class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
            >
             Nouvelles Réservations
            </p>
            <p
              class="text-lg font-semibold text-gray-700 dark:text-gray-200"
            >
              <?php echo $newLeasedItems ;?>
            </p>
          </div>
        </div>
        <!-- Card -->
        <div
          class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
          <div
            class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500"
          >
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
              <path
                fill-rule="evenodd"
                d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                clip-rule="evenodd"
              ></path>
            </svg>
          </div>
          <div>
            <p
              class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
            >
              Pending contacts
            </p>
            <p
              class="text-lg font-semibold text-gray-700 dark:text-gray-200"
            >
              35
            </p>
          </div>
        </div>
      </div>
       
      <!-- With actions -->
  <div class="flex flex-col justify-between flex-wrap mb-4 space-y-4 md:flex-row md:items-end md:space-x-4">
       <!-- With actions -->
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
      Liste des propriétés réservées
    </h4>
    <a href="index1.php?action=createItem" ><button class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
      Ajouter </button>
    </a>
  </div>  
  <div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800" >
      <span class="flex items-center col-span-3">
        <?php echo "AFFICHAGE $startItem-$endItem SUR $totalItems"; ?>
      </span>
      <span class="col-span-2"></span>
      <!-- Pagination-->
      <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
        <nav aria-label="Table navigation">
          <ul class="inline-flex items-center">
            <li>
              <button class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple" aria-label="Previous" >
                <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20" >
                  <path
                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                    clip-rule="evenodd"
                    fill-rule="evenodd" >
                  </path>
                </svg>
              </button>
            </li>
            <?php
                  for($i=1; $i<=$totalPages; $i++) {
            ?>
            <li>
              <a class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple" 
              href="?action=itemLeasedList&page=<?= $i ?>" >
                <?=  $i  ?>
              </a>
            </li>
            <?php } ?>

            <li>
              <button
                class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                aria-label="Next" >
                <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20" >
                  <path
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd"
                    fill-rule="evenodd" >
                  </path>
                </svg>
              </button>
            </li>
          </ul>
        </nav>
      </span>               
    </div>

    <div class="w-full overflow-x-auto">
      <!-- Table container -->
      <div class="w-full whitespace-no-wrap container mx-auto ">
        <!-- Table header -->
        <div class="table-header-group">
          <!-- row -->
          <div class="table-row flex text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                
            <!-- columns -->
            <div class="table-cell px-4 py-3 p-2 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b border-gray-500 dark:border-gray-700" style="width: 16.6667%;">NOM </div>
            <div class="table-cell px-4 py-3 p-2 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b border-gray-500 dark:border-gray-700" style="width: 16.6667%;">LOCATAIRE</div>
            <div class="table-cell px-4 py-3 p-2 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b border-gray-500 dark:border-gray-700" style="width: 16.6667%;">à partir de </div>
            <div class="table-cell px-4 py-3 p-2 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b border-gray-500 dark:border-gray-700" style="width: 16.6667%;">jusqu'à</div>
            <div class="table-cell px-4 py-3 p-2 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b border-gray-500 dark:border-gray-700" style="width: 16.6667%;">Prix total</div>
            <div class="table-cell px-4 py-3 p-2 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b border-gray-500 dark:border-gray-700" style="width: 16.6667%;">Action</div>                  
          </div>
        </div>
            <!-- Table rows -->
        <div class="table-row-group ">
          <?php 
            /** @var \app\models\ItemLeased[] $data */
            if (is_array($data) || is_object($data)) {
              foreach ($data as $item): ?>
            <div id="itemLeased-row"  class=" table-row flex bg-gray-50 dark:bg-gray-900 text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800 dark:text-gray-400 h-12" data-id="<?php echo $item->getItemLeasedId()?>">
                <div class="table-cell px-4 py-3 p-2 text-sm" style="width: 16.6667%;"><?= $item->item_name?></div>
                <div class="table-cell px-4 py-3 p-2 text-sm" style="width: 16.6667%;"><?= $item->username ?></div>
                <div class="table-cell px-4 py-3 p-2 text-sm" style="width: 16.6667%;"><?= $item->getTimeFrom()?></div>
                <div class="table-cell px-4 py-3 p-2 text-sm" style="width: 16.6667%;"><?= $item->getTimeTo() ?></div>
                <div class="table-cell px-4 py-3 p-2 text-sm" style="width: 16.6667%;"><?= $item->getPriceTotal()?></div>
                <div class="table-cell px-4 py-3 p-2 text-sm" style="width: 16.6667%;">
                  <div class="flex items-center space-x-4 text-sm">
                    <button>
                      <a class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                        aria-label="Edit"
                        href="index1.php?action=editItem&id=<?php echo $item->getItemLeasedId()?>">
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                          <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                        </svg>
                      </a>
                    </button>
                    <button>
                      <a
                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                        aria-label="Delete" onclick="return confirm('voulez vous vraiment supprimer ce utilisateur')" 
                        href="index1.php?action=destroyItem&id=<?php echo $item->getItemLeasedId()?>" >
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" >
                          <path
                            fill-rule="evenodd"
                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                            clip-rule="evenodd" >
                          </path>
                        </svg>
                      </a>
                    </button> 
                      
                  </div>
            

                </div>
            </div>
                      
          <?php endforeach;}
          else {
            echo "No data available";
          } ?>
                   
        </div>
        
    

    
      </div>  
    
    </div>   

<?php
$content = ob_get_clean();
include_once 'ressources/views/layout.php';
?>
