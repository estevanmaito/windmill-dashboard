<?php
namespace ressources\views;
ob_start();
?>

<!-- <main class="h-full pb-16 overflow-y-auto"> -->
  <div class="mainDash " >
    <div class="flex justify-between items-center p-2 " >
      <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Tableau de bord</h2>
      <div class="dark:text-gray-200 dark:bg-gray-200">
        <button class="messages-btn pb-1 mr-1">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle">
            <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
          </svg>
        </button>
      </div>
    </div>

    <div class="flex p-2 ">

      <div class="container grid px-6 mx-auto">
        <div class="flex justify-between items-center pb-2">
          <div class="flex">
            <div class="flex flex-col mr-16 ">
              <span class="text-24 font-bold leading-32 text-main-color md:text-xl lg:text-2xl text-gray-700 dark:text-gray-200 " >45</span>
              <span class="text-14 md:text-sm md:pr-1 sm:pr-1 sm:text-xs text-gray-700 dark:text-gray-200">In Progress</span>
            </div>
            <div class="flex flex-col mr-16">
              <span class="text-24 font-bold leading-32 text-main-color md:text-xl lg:text-2xl text-gray-700 dark:text-gray-200">24</span>
              <span class="text-14 md:text-sm md:pr-1 sm:pr-1 sm:text-xs text-gray-700 dark:text-gray-200">Upcoming</span>
            </div>
            <div class="flex flex-col">
              <span class="text-24 font-bold leading-32 text-main-color md:text-xl lg:text-2xl text-gray-700 dark:text-gray-200 ">62</span>
              <span class="text-14 md:text-sm md:pr-1 sm:pr-1 sm:text-xs text-gray-700 dark:text-gray-200">Total Projects</span>
            </div>
          </div>
          <div class="flex">
            <button class="flex items-center rounded-md bg-transparent m-3 border-none text-main-color transition duration-200 hover:bg-main-color dark:text-gray-200">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <line x1="8" y1="6" x2="21" y2="6"></line>
                      <line x1="8" y1="12" x2="21" y2="12"></line>
                      <line x1="8" y1="18" x2="21" y2="18"></line>
                      <line x1="3" y1="6" x2="3.01" y2="6"></line>
                      <line x1="3" y1="12" x2="3.01" y2="12"></line>
                      <line x1="3" y1="18" x2="3.01" y2="18"></line>
              </svg>
            </button>
            <button class="flex items-center rounded-md bg-black m-3 text-white transition duration-200 hover:bg-opacity-80 dark:text-gray-200">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="3" width="7" height="7"></rect>
                <rect x="14" y="3" width="7" height="7"></rect>
                <rect x="14" y="14" width="7" height="7"></rect>
                <rect x="3" y="14" width="7" height="7"></rect>
              </svg>
            </button>
          </div>
        </div>



        <div class="grid gap-6 mb-8  md:grid-cols-2 xl:grid-cols-4">

          <!-- <div class="flex justify-between items-center mb-6 text-main-colortext-2xl">
            <p>Projects</p>
            <p class="text-2xl">December, 12</p>

          </div>
          <div class="flex justify-between items-center pb-8">
            <div class="flex">
            <div class="flex flex-col md:flex-row items-start md:items-center">
            <div class="flex flex-col md:flex-row md:items-center mb-4 md:mb-0">
              <span class="text-2xl md:text-xl mr-2">45</span>
              <span class="relative text-secondary-color md:pr-6">In Progress</span>
            </div>

          </div> -->

          <div class=" items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800" style="background-color: #fee4cb;">
            
            <div class="project-box bg-main-color-card p-4 " >
              <div class="project-box-header flex items-center justify-between mb-4 text-main-color">
                <span class="opacity-70 text-sm">December 10, 2020</span>
                <div class="more-wrapper">
                  <button class="project-btn-more">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical">
                      <circle cx="12" cy="12" r="1"></circle>
                      <circle cx="12" cy="5" r="1"></circle>
                      <circle cx="12" cy="19" r="1"></circle>
                    </svg>
                  </button>
                </div>
              </div>
              <div class="project-box-content-header mb-4">
                <p class="box-content-header text-xl font-semibold opacity-70">Web Designing</p>
                <p class="box-content-subheader opacity-70">Prototyping</p>
              </div>
              <div class="box-progress-wrapper">
                <p class="box-progress-header text-sm font-semibold mb-1">Progress</p>
                <div class="w-full bg-gray-200 rounded-full h-1  dark:bg-gray-700">
                  <div class="bg-blue-600 h-1 rounded-full dark:bg-blue-500" style="width: 60%; background-color: #ff942e ;"></div>
                </div>

                <p class="box-progress-percentage text-right text-sm font-semibold">60%</p>
              </div>
              <div class=" flex justify-between relative pt-4">
                <div class="participants flex items-center ">
                  <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=2550&amp;q=80" 
                  alt="participant" class="w-5 h-5 -ml-1 rounded-full overflow-hidden object-cover">
                  <img src="https://images.unsplash.com/photo-1503023345310-bd7c1de61c7d?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MTB8fG1hbnxlbnwwfHwwfA%3D%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=900&amp;q=60"
                  alt="participant" class="w-5 -ml-1 h-5 rounded-full overflow-hidden object-cover ml-2">
                  <button style="color: #ff942e"  class="add-participant w-5 h-5 rounded-full border border-none bg-white bg-opacity-60 ml-2 flex items-center justify-center p-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                      <path d="M12 5v14M5 12h14"></path>
                    </svg>
                  </button>
                </div>

                <div style=" color: #ff942e " class="days-left bg-white ml-2 bg-opacity-60 text-white text-opacity-80 text-xs rounded-full flex-shrink-0 px-4 py-1 font-semibold">
                  2 Days Left
                </div>

              </div>
            </div>
          </div>

          <div class=" items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800" style="background-color: #fee4cb;">
            
            <div class="project-box bg-main-color-card p-4 " >
              <div class="project-box-header flex items-center justify-between mb-4 text-main-color">
                <span class="opacity-70 text-sm">December 10, 2020</span>
                <div class="more-wrapper">
                  <button class="project-btn-more">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical">
                      <circle cx="12" cy="12" r="1"></circle>
                      <circle cx="12" cy="5" r="1"></circle>
                      <circle cx="12" cy="19" r="1"></circle>
                    </svg>
                  </button>
                </div>
              </div>
              <div class="project-box-content-header mb-4">
                <p class="box-content-header text-xl font-semibold opacity-70">Web Designing</p>
                <p class="box-content-subheader opacity-70">Prototyping</p>
              </div>
              <div class="box-progress-wrapper">
                <p class="box-progress-header text-sm font-semibold mb-1">Progress</p>
                <div class="w-full bg-gray-200 rounded-full h-1  dark:bg-gray-700">
                  <div class="bg-blue-600 h-1 rounded-full dark:bg-blue-500" style="width: 60%; background-color: #ff942e ;"></div>
                </div>

                <p class="box-progress-percentage text-right text-sm font-semibold">60%</p>
              </div>
              <div class=" flex justify-between relative pt-4">
                <div class="participants flex items-center ">
                  <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=2550&amp;q=80" 
                  alt="participant" class="w-5 h-5 -ml-1 rounded-full overflow-hidden object-cover">
                  <img src="https://images.unsplash.com/photo-1503023345310-bd7c1de61c7d?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MTB8fG1hbnxlbnwwfHwwfA%3D%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=900&amp;q=60"
                  alt="participant" class="w-5 -ml-1 h-5 rounded-full overflow-hidden object-cover ml-2">
                  <button style="color: #ff942e"  class="add-participant w-5 h-5 rounded-full border border-none bg-white bg-opacity-60 ml-2 flex items-center justify-center p-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                      <path d="M12 5v14M5 12h14"></path>
                    </svg>
                  </button>
                </div>

                <div style=" color: #ff942e " class="days-left bg-white ml-2 bg-opacity-60 text-white text-opacity-80 text-xs rounded-full flex-shrink-0 px-4 py-1 font-semibold">
                  2 Days Left
                </div>

              </div>
            </div>
          </div>

          <div class=" items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800" style="background-color: #fee4cb;">
            
            <div class="project-box bg-main-color-card p-4 " >
              <div class="project-box-header flex items-center justify-between mb-4 text-main-color">
                <span class="opacity-70 text-sm">December 10, 2020</span>
                <div class="more-wrapper">
                  <button class="project-btn-more">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical">
                      <circle cx="12" cy="12" r="1"></circle>
                      <circle cx="12" cy="5" r="1"></circle>
                      <circle cx="12" cy="19" r="1"></circle>
                    </svg>
                  </button>
                </div>
              </div>
              <div class="project-box-content-header mb-4">
                <p class="box-content-header text-xl font-semibold opacity-70">Web Designing</p>
                <p class="box-content-subheader opacity-70">Prototyping</p>
              </div>
              <div class="box-progress-wrapper">
                <p class="box-progress-header text-sm font-semibold mb-1">Progress</p>
                <div class="w-full bg-gray-200 rounded-full h-1  dark:bg-gray-700">
                  <div class="bg-blue-600 h-1 rounded-full dark:bg-blue-500" style="width: 60%; background-color: #ff942e ;"></div>
                </div>

                <p class="box-progress-percentage text-right text-sm font-semibold">60%</p>
              </div>
              <div class=" flex justify-between relative pt-4">
                <div class="participants flex items-center ">
                  <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=2550&amp;q=80" 
                  alt="participant" class="w-5 h-5 -ml-1 rounded-full overflow-hidden object-cover">
                  <img src="https://images.unsplash.com/photo-1503023345310-bd7c1de61c7d?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MTB8fG1hbnxlbnwwfHwwfA%3D%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=900&amp;q=60"
                  alt="participant" class="w-5 -ml-1 h-5 rounded-full overflow-hidden object-cover ml-2">
                  <button style="color: #ff942e"  class="add-participant w-5 h-5 rounded-full border border-none bg-white bg-opacity-60 ml-2 flex items-center justify-center p-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                      <path d="M12 5v14M5 12h14"></path>
                    </svg>
                  </button>
                </div>

                <div style=" color: #ff942e " class="days-left bg-white ml-2 bg-opacity-60 text-white text-opacity-80 text-xs rounded-full flex-shrink-0 px-4 py-1 font-semibold">
                  2 Days Left
                </div>

              </div>
            </div>
          </div>

          <div class=" items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800" style="background-color: #fee4cb;">
            
            <div class="project-box bg-main-color-card p-4 " >
              <div class="project-box-header flex items-center justify-between mb-4 text-main-color">
                <span class="opacity-70 text-sm">December 10, 2020</span>
                <div class="more-wrapper">
                  <button class="project-btn-more">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical">
                      <circle cx="12" cy="12" r="1"></circle>
                      <circle cx="12" cy="5" r="1"></circle>
                      <circle cx="12" cy="19" r="1"></circle>
                    </svg>
                  </button>
                </div>
              </div>
              <div class="project-box-content-header mb-4">
                <p class="box-content-header text-xl font-semibold opacity-70">Web Designing</p>
                <p class="box-content-subheader opacity-70">Prototyping</p>
              </div>
              <div class="box-progress-wrapper">
                <p class="box-progress-header text-sm font-semibold mb-1">Progress</p>
                <div class="w-full bg-gray-200 rounded-full h-1  dark:bg-gray-700">
                  <div class="bg-blue-600 h-1 rounded-full dark:bg-blue-500" style="width: 60%; background-color: #ff942e ;"></div>
                </div>

                <p class="box-progress-percentage text-right text-sm font-semibold">60%</p>
              </div>
              <div class=" flex justify-between relative pt-4">
                <div class="participants flex items-center ">
                  <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=2550&amp;q=80" 
                  alt="participant" class="w-5 h-5 -ml-1 rounded-full overflow-hidden object-cover">
                  <img src="https://images.unsplash.com/photo-1503023345310-bd7c1de61c7d?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MTB8fG1hbnxlbnwwfHwwfA%3D%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=900&amp;q=60"
                  alt="participant" class="w-5 -ml-1 h-5 rounded-full overflow-hidden object-cover ml-2">
                  <button style="color: #ff942e"  class="add-participant w-5 h-5 rounded-full border border-none bg-white bg-opacity-60 ml-2 flex items-center justify-center p-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                      <path d="M12 5v14M5 12h14"></path>
                    </svg>
                  </button>
                </div>

                <div style=" color: #ff942e " class="days-left bg-white ml-2 bg-opacity-60 text-white text-opacity-80 text-xs rounded-full flex-shrink-0 px-4 py-1 font-semibold">
                  2 Days Left
                </div>

              </div>
            </div>
          </div>

          <!-- <div class="flex justify-between items-center mb-6 text-main-colortext-2xl">
            <p>Projects</p>
            <p class="text-2xl">December, 12</p>

            </div>
            <div class="flex justify-between items-center pb-8">
              <div class="flex">
              <div class="flex flex-col md:flex-row items-start md:items-center">
              <div class="flex flex-col md:flex-row md:items-center mb-4 md:mb-0">
                <span class="text-2xl md:text-xl mr-2">45</span>
                <span class="relative text-secondary-color md:pr-6">In Progress</span>
              </div>

          </div> -->
    
        </div>
        

      </div>
    </div>  
  </div>
  
  <div class="messages-section w-full relative  transition-all duration-300 " >
      <div class="projects-section-header flex justify-between p-6 font-bold text-lg ">
        <p> Messages des clients</p>
        <button class="messages-close">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle">
            <circle cx="12" cy="12" r="10"></circle>
            <line x1="15" y1="9" x2="9" y2="15"></line>
            <line x1="9" y1="9" x2="15" y2="15"></line>
          </svg>
        </button>
      </div>
      <div class="messages p-3">
        <div class="message-box flex items-start border-t border-gray-300 pt-4">
          <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=2550&amp;q=80" alt="profile image" class="rounded-full object-cover w-10 h-10">
          <div class="message-content pl-4 w-full">
            <div class="message-header flex justify-between items-center w-full">
              <div class="name text-lg font-bold text-blue-500">Stephanie</div>
              <div class="star-checkbox">
                <input type="checkbox" id="star-1" class="opacity-0 w-0 h-0 absolute">
                <label for="star-1" class="w-6 h-6 flex justify-center items-center cursor-pointer">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">
                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                  </svg>
                </label>
              </div>
            </div>
            <p class="message-line">
              I got your first assignment. It was quite good. 🥳 We can continue with the next assignment.
            </p>
            <p class="message-line time">
              Dec, 12
            </p>
          </div>
        </div>
      </div>
  </div>

  <?php
$content = ob_get_clean();
include_once 'layout.php';

?>
<script>
  <?php
  include_once 'assets/js/global.js';
  ?>
</script>