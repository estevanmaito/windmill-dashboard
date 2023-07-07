<?php
namespace public\ressources\views;
use public\app\models\User;
require "../../../vendor/autoload.php";


$title = "Liste des utilisateurs";
ob_start();
?>
<h4
              class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
              Table with actions
            </h4>
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
              <form method="POST" action="../controller/userController.php?action=create">
              
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                    <th>Username</th>
                      <th class="px-4 py-3">Password</th>
                      <th class="px-4 py-3">Location ID</th>
                      <th class="px-4 py-3">Location Details</th>
                      <th class="px-4 py-3">Phone</th>
                      <th class="px-4 py-3">Mobile</th>
                      <th class="px-4 py-3">Email</th>
                      <th class="px-4 py-3">Registration Time</th>
                      
                    </tr>
                  </thead>
                  <tbody>
  <?php 

    /** @var \public\app\models\User[] $data */

    if (is_array($data) || is_object($data)) {
      foreach ($data as $user): ?>

        <tr>
          <td><?= $user->getUsername() ?></td>
          <td><?= $user->getPassword() ?></td>
          <td><?= $user->getUserLocationId() ?></td>
          <td><?= $user->getLocationDetails() ?></td>
          <td><?= $user->getPhone() ?></td>
          <td><?= $user->getMobile() ?></td>
          <td><?= $user->getUserEmail() ?></td>
          <td><?= $user->getRegistrationTime() ?></td>
          <td>
          <a href="index1.php?action=edit&id=<?php echo $user->getId()?>" class="btn "> modifier </a>
          <a href="index1.php?action=destroy&id=<?php echo $user->getId()?>" class="btn "> modifier </a>
          </td>

        </tr>
    
    



<?php endforeach;}
else {
  echo "No data available";
} ?>

</tbody>





<?php
echo "ok!";
$content = ob_get_clean();
include_once 'layout.php';
?>
