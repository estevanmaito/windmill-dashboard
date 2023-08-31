<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Windmill Dashboard - </title>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
    rel="stylesheet"
  />
  <link rel="stylesheet" href="/SAM/public/assets/css/tailwind.output.css" />
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/SAM/public/assets/css/style.css" />

  <script
    src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
    defer
  ></script>
  <script src="/SAM/public/assets/js/init-alpine.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
/>

<!-- CSS for full calender -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" rel="stylesheet" />
<!-- JS for jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- JS for full calender -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>

<style>

  .messages-section {
    display: none;
  }
  .messages-section.show {
    box-shadow: 0 0 5px 5px lightgray;
    right: 0;
    display: block;
    position: absolute;
    opacity: 1;
    top: 0;
    z-index: 100;
    height: 100%;
    width: auto;
    background-color: white;
  }
    
  @media screen and (max-width: 1000px) { 
    .messages-section.show {
      transform: translateX(0);
      opacity: 1;
      position: fixed;
      
    }
  } 

    .option {
      display: block;
      padding: 8px 12px;
      text-align: left;
      color: #333;
      text-decoration: none;
      transition: background-color 0.2s ease;
    }

    .option:hover {
      background-color: #f5f5f5;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

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
