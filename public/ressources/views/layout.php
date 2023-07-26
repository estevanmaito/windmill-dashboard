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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body>
  <div
  class="flex h-screen bg-gray-50 dark:bg-gray-900"
  :class="{ 'overflow-hidden': isSideMenuOpen}"
  >
      <?php include 'header.php';
      ?>
      <main class="h-full pb-16 overflow-y-auto">
        <?= $content; ?>
      </main>
    </div>
  </div>
</body>
</html>
