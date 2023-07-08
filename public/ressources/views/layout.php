<?php
require "../../../vendor/autoload.php";

?>
    <!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Windmill Dashboard - Forms</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="/SAM/public/assets/css/tailwind.output.css" />
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
    <script src="/SAM/public/assets/js/init-alpine.js"></script>
  </head>

<body>
  <?php include 'header.php';
      include 'include/nav.php';
  ?>

    <h2><?= $title; ?></h2>
    <div>
        <?= $content; ?>
    </div>
</body>
</html>
