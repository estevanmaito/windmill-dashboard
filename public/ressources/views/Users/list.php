<?php
namespace ressources\views;
use \app\models\User;
use \app\controllers\UserController;

require "vendor/autoload.php";

$title = "Liste des utilisateurs";
ob_start();
include "listHeader.php" ;

// Define the total number of items
$totalItems = UserController::lengthAction(2);

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

  <div class="flex flex-col justify-between flex-wrap mb-4 space-y-4 md:flex-row md:items-end md:space-x-4">
      <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Listes des propriétaires : 
      </h4>
      <a href="index1.php?action=create" > <button class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
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
          href="?action=list&page=<?= $i ?>" >
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
        <div class="table-cell px-4 py-3 p-2 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b border-gray-500 dark:border-gray-700" style="width: 16.6667%;">NOM D'UTILISATEUR</div>
        <div class="table-cell px-4 py-3 p-2 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b border-gray-500 dark:border-gray-700" style="width: 16.6667%;">Mot de passe</div>
        <div class="table-cell px-4 py-3 p-2 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b border-gray-500 dark:border-gray-700" style="width: 16.6667%;">EMPLACEMENT</div>
        <div class="table-cell px-4 py-3 p-2 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b border-gray-500 dark:border-gray-700" style="width: 16.6667%;">TÉLÉPHONE</div>
        <div class="table-cell px-4 py-3 p-2 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b border-gray-500 dark:border-gray-700" style="width: 16.6667%;">PORTABLE</div>
        <div class="table-cell px-4 py-3 p-2 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b border-gray-500 dark:border-gray-700" style="width: 16.6667%;">EMAIL</div>
        <div class="table-cell px-4 py-3 p-2 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b border-gray-500 dark:border-gray-700" style="width: 16.6667%;">HEURE D'INSCRIPTION</div>
        <div class="table-cell px-4 py-3 p-2 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b border-gray-500 dark:border-gray-700" style="width: 16.6667%;">Action</div>                  
      </div>
    </div>
    <!-- Table rows -->
    <div class="table-row-group ">
        <?php 
          /** @var \app\models\User[] $data */

          if (is_array($data) || is_object($data)) {
            foreach ($data as $user): 
        ?>
        <div id="user-row"  class=" table-row flex bg-gray-50 dark:bg-gray-900 text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800 dark:text-gray-400 h-12">

          <div class="table-cell px-4 py-3 p-2 text-sm" style="width: 16.6667%;"><?= $user->getUsername()?></div>

          <div class="table-cell px-4 py-3 p-2 text-sm" style="width: 16.6667%;"><?= $user->getPassword() ?></div>
          <div class="table-cell px-4 py-3 p-2 text-sm" style="width: 16.6667%;"><?= $user->getUserLocationId()?></div>
          <div class="table-cell px-4 py-3 p-2 text-sm" style="width: 16.6667%;"><?= $user->getPhone()?></div>
          <div class="table-cell px-4 py-3 p-2 text-sm" style="width: 16.6667%;"><?= $user->getMobile() ?></div>
          <div class="table-cell px-4 py-3 p-2 text-sm" style="width: 16.6667%;"><?= $user->getUserEmail() ?></div>
          <div class="table-cell px-4 py-3 p-2 text-sm" style="width: 16.6667%;"><?= $user->getRegistrationTime() ?></div>
          <div class="table-cell px-4 py-3 p-2 text-sm" style="width: 16.6667%;">
            <div class="flex items-center space-x-4 text-sm">
              <a
                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                aria-label="Edit" href="index1.php?action=edit&id=<?php echo $user->getId()?>" >
                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" >
                  <path
                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" >
                  </path>
                </svg>
              </a>
              <a
                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                aria-label="Delete" onclick="return confirm('voulez vous vraiment supprimer ce utilisateur')"  
                href="index1.php?action=destroy&id=<?php echo $user->getId()?>" >
                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" >
                  <path
                    fill-rule="evenodd"
                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                    clip-rule="evenodd" >
                  </path>
                </svg>
              </a>
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
</div>

</div>


</main>
</div>
</div>

<?php
$content = ob_get_clean();
include_once 'ressources/views/layout.php';
?>

