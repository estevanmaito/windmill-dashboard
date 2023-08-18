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

<style>
    @media screen and (max-width: 980px) {
    .project-boxes.jsGridView .project-box-wrapper {
      width: 50%;
    }
    
    .status-number, .status-type {
      font-size: 14px;
    }
    
    .status-type:after {
      width: 4px;
      height: 4px;
    }
    
    .item-status {
      margin-right: 0;
    }
  }

  .messages-section {
    display: none;
  }
  /* @media screen and (max-width: 880px) { */
    .messages-section.show {
      /* transform: translateX(100%); */
      display: block;
      position: absolute;
      opacity: 1;
      top: 0;
      z-index: 100;
      height: 100%;
      width: auto;
      background-color: white;
    }
    
    /* .messages-close {
      display: block;
    }
    
    .messages-btn {
      display: flex;
    } */
  /* } */

  @media screen and (max-width: 720px) {
    .app-name, .profile-btn span {
      display: none;
    }
    
    .add-btn, .notification-btn, .mode-switch {
      width: 20px;
      height: 20px;
    }
    
    .add-btn svg, .notification-btn svg, .mode-switch svg {
      width: 16px;
      height: 16px;
    }
    
    .app-header-right button {
      margin-left: 4px;
    }
  }

  @media screen and (max-width: 520px) {
    .projects-section {
      overflow: auto;
    }
    
    .project-boxes {
      overflow-y: visible;
    }
    
    .app-sidebar, .app-icon {
      display: none;
    }
    
    .app-content {
      padding: 16px 12px 24px 12px;
    }
    
    .status-number, .status-type {
      font-size: 10px;
    }
    
    .view-btn {
      width: 24px;
      height: 24px;
    }
    
    .app-header {
      padding: 16px 10px;
    }
    
    .search-input {
      max-width: 120px;
    }
    
    .project-boxes.jsGridView .project-box-wrapper {
      width: 100%;
    }
    
    .projects-section {
      /* padding: 24px 16px 0 16px; */
    }
    
    .profile-btn img {
      width: 24px;
      height: 24px;
    }
    
    .app-header {
      padding: 10px;
    }
    
    .projects-section-header p,
    .projects-section-header .time {
      font-size: 18px;
    }
    
    .status-type {
      padding-right: 4px;
    }
    
    .status-type:after {
      display: none;
    }
    
    .search-input {
      font-size: 14px;
    }
    
    .messages-btn {
      top: 48px;
    }

    .box-content-header {
      font-size: 12px;
      line-height: 16px;
    }

    .box-content-subheader {
      font-size: 12px;
      line-height: 16px;
    }

    .project-boxes.jsListView .project-box-header > span {
      font-size: 10px;
    }

    .box-progress-header {
      font-size: 12px;
    }

    .box-progress-percentage {
      font-size: 10px;
    }

    .days-left {
      font-size: 8px;
      padding: 6px 6px;
      text-align: center;
    }

    .project-boxes.jsListView .project-box > * {
      margin-right: 10px;
    }

    .project-boxes.jsListView .more-wrapper {
      right: 2px;
      top: 10px;
    }
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
