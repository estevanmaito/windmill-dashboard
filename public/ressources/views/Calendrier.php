<?php
namespace ressources\views;

use \app\controllers\CalendarController;

require "vendor/autoload.php";

$title = "Event Calendar";
ob_start();

?>
<div class="flex pb-2 md:overflow-auto">
  <div class=" px-4 py-2 mx-auto md:py-24">
    <ul class=" text-center border dark:border-gray-600 px-2 lg:w-48 w-32 rounded-lg shadow-xs inline-block shadow-r overflow-hidden">
      <?php 
        /** @var \app\models\Item[] $data */
        // Loop through the data to generate project boxes
        if (is_array($data) || is_object($data)) {
          foreach ($data as $item): 
      ?>
        <div id="itemLeased-row" class="bg-gray-50 dark:bg-gray-900 text-gray-700" data-id="<?php echo $item->getItemId() ?>">
          <li class="py-4 border-b dark:border-gray-700 text-sm hover:bg-gray-100 dark:hover:bg-gray-800 dark:text-gray-400 h-12"><?= $item->getItemName() ?></li>
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
    <div class="container  mx-auto px-4 py-2 md:py-24">
      <div class=" rounded-lg shadow overflow-hidden">
        <div class="flex items-center justify-between py-2 px-6">
          <div>
            <span id="month-name" class="text-lg font-bold text-gray-800"></span>
            <span id="year" class="ml-1 text-lg text-gray-600 font-normal"></span>
          </div>
          <div class="border rounded-lg px-1" style="padding-top: 2px;">
            <button id="prev-month" class="leading-none rounded-lg transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 items-center">
              <svg class="h-6 w-6 text-gray-500 inline-flex leading-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
              </svg>  
            </button>
            <div class="border-r inline-flex h-6"></div>		
            <button id="next-month" class="leading-none rounded-lg transition ease-in-out duration-100 inline-flex items-center cursor-pointer hover:bg-gray-200 p-1">
              <svg class="h-6 w-6 text-gray-500 inline-flex leading-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
              </svg>									  
            </button>
          </div>
        </div>
        <div class="-mx-1 -mb-1">
          <div class="flex flex-wrap" >
            <div style="width: 14.26%" class="px-2 py-2">
              <div class="text-gray-600 sm:text-sm text-xs uppercase tracking-wide font-bold text-center">Dim</div>
            </div>
            <div style="width: 14.26%" class="px-2 py-2">
              <div class="text-gray-600 sm:text-sm text-xs uppercase tracking-wide font-bold text-center">Lun</div>
            </div>
            <div style="width: 14.26%" class="px-2 py-2">
              <div class="text-gray-600 sm:text-sm text-xs uppercase tracking-wide font-bold text-center">Mar</div>
            </div>
            <div style="width: 14.26%" class="px-2 py-2">
              <div class="text-gray-600 sm:text-sm lg:text-base text-xs uppercase tracking-wide font-bold text-center">Merc</div>
            </div>
            <div style="width: 14.26%" class="px-2 py-2">
              <div class="text-gray-600 sm:text-sm text-xs uppercase tracking-wide font-bold text-center">Jeu</div>
            </div>
            <div style="width: 14.26%" class="px-2 py-2">
              <div class="text-gray-600 sm:text-sm text-xs uppercase tracking-wide font-bold text-center">Vend</div>
            </div>
            <div style="width: 14.26%" class="px-2 py-2">
              <div class="text-gray-600 sm:text-sm text-xs uppercase tracking-wide font-bold text-center">Sam</div>
            </div>
          </div>
          <div id="calendar-grid" class="flex flex-wrap border-t border-l"></div>
        </div>
      </div>
    </div>
    <div id="event-modal" class="hidden fixed z-40 top-0 right-0 left-0 bottom-0 h-full w-full bg-black bg-opacity-50 ">
      <div class="p-4 max-w-xl mx-auto relative absolute left-0 right-0 overflow-hidden mt-24 ">
        <div class="shadow absolute right-0 top-0 w-10 h-10 rounded-full bg-white text-gray-500 hover:text-gray-800 inline-flex items-center justify-center cursor-pointer" onclick="toggleEventModal()">
          <svg class="fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M16.192 6.344L11.949 10.586 7.707 6.344 6.293 7.758 10.535 12 6.293 16.242 7.707 17.656 11.949 13.414 16.192 17.656 17.606 16.242 13.364 12 17.606 7.758z" />
          </svg>
        </div>
        <div class="shadow w-full rounded-lg bg-white overflow-hidden w-full block p-8">
          <h2 class="font-bold text-2xl mb-6 text-gray-800 border-b pb-2">Ajouter les détails de l'événement</h2>
          <div class="mb-4">
            <label class="text-gray-800 block mb-1 font-bold text-sm tracking-wide" for="event-title">Titre </label>
            <input id="event-title" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" type="text">
          </div>
          <div class="mb-4">
            <label class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Date </label>
            <input id="event-date" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" type="text" readonly>
          </div>
          <div class="inline-block w-64 mb-4">
            <label class="text-gray-800 block mb-1 font-bold text-sm tracking-wide" for="event-theme">Sélectionner un thème</label>
            <select id="event-theme" class="block appearance-none w-full bg-gray-200 border-2 border-gray-200 hover:border-gray-500 px-4 py-2 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-blue-500 text-gray-700">
              <option value="#dbf6fd">Thème Bleu</option>
              <option value="#F08080">Thème Rouge</option>
              <option value="#fee4cb">Thème orange</option>
              <option value="#c8f7dc">Thème Vert</option>
              <option value="#e9e7fd">Thème Violet</option>
            </select>
          </div>
          <div class="mt-8 text-right">
            <button id="cancel-button" class="bg-white hover:bg-gray-100 text-gray-700 font-semibold py-2 px-4 border border-gray-300 rounded-lg shadow-sm mr-2" onclick="toggleEventModal()">
              Annuler
            </button>
            <button id="save-button" class="bg-gray-800 hover:bg-gray-700 text-white font-semibold py-2 px-4 border border-gray-700 rounded-lg shadow-sm">
              Enregistrer l'événement
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <?php
$content = ob_get_clean();
include_once 'layout.php';

?>
  <script>
    const MONTH_NAMES = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
    const DAYS = ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'];

    const today = new Date();
    let currentMonth = today.getMonth();
    let currentYear = today.getFullYear();
    let selectedDate = today;

    const calendarGrid = document.getElementById('calendar-grid');
    const monthName = document.getElementById('month-name');
    const yearElement = document.getElementById('year');
    const prevMonthButton = document.getElementById('prev-month');
    const nextMonthButton = document.getElementById('next-month');
    const eventModal = document.getElementById('event-modal');
    const eventTitleInput = document.getElementById('event-title');
    const eventDateInput = document.getElementById('event-date');
    const eventThemeSelect = document.getElementById('event-theme');
    const cancelButton = document.getElementById('cancel-button');
    const saveButton = document.getElementById('save-button');

    function generateCalendar() {
  calendarGrid.innerHTML = '';
  const firstDay = new Date(currentYear, currentMonth, 1).getDay();
  const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();

  for (let i = 0; i < firstDay; i++) {
    const emptyCell = document.createElement('div');
    emptyCell.style.width = '14.28%';
    emptyCell.style.height = '120px';
    emptyCell.className = 'text-center border-r border-b dark:border-gray-600 px-4 pt-2 ';
    calendarGrid.appendChild(emptyCell);
  }

  for (let i = 1; i <= daysInMonth; i++) {
    const dayCell = document.createElement('div');
    dayCell.style.width = '14.28%';
    dayCell.style.height = '120px';
    dayCell.className = 'px-4 pt-2 border-r border-b dark:border-gray-600 relative dark:text-gray-400 cursor-pointer';
    dayCell.textContent = i;

    dayCell.addEventListener('click', () => showEventModal(new Date(currentYear, currentMonth, i)));
    calendarGrid.appendChild(dayCell);

    const eventDateStr = new Date(currentYear, currentMonth, i).toDateString();
    if (events[eventDateStr]) {
      const eventsContainer = document.createElement('div');
      eventsContainer.className = 'event-container';
      events[eventDateStr].forEach(event => {
        const eventElement = document.createElement('div');
        eventElement.className = 'event rounded-lg px-2 py-1 rounded-lg mt-1 overflow-hidden border ';
        eventElement.textContent = event.title;
        eventElement.style.backgroundColor = event.theme; 
        eventsContainer.appendChild(eventElement);
      });
      dayCell.appendChild(eventsContainer);
    }
  }

  monthName.textContent = MONTH_NAMES[currentMonth];
  yearElement.textContent = currentYear;
}

function showEventModal(date) {
  selectedDate = date;
  eventDateInput.value = formatDate(date); // Use the formatDate function to display the date in French
  eventModal.classList.remove('hidden');
}

function toggleEventModal() {
  eventModal.classList.toggle('hidden');
  eventTitleInput.value = '';
  eventDateInput.value = '';
  eventThemeSelect.value = 'blue';
}

function formatDate(date) {
  const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
  return date.toLocaleDateString('fr-FR', options);
}


    prevMonthButton.addEventListener('click', () => {
      currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
      currentYear = (currentMonth === 11) ? currentYear - 1 : currentYear;
      generateCalendar();
    });

    nextMonthButton.addEventListener('click', () => {
      currentMonth = (currentMonth + 1) % 12;
      currentYear = (currentMonth === 0) ? currentYear + 1 : currentYear;
      generateCalendar();
    });

    cancelButton.addEventListener('click', toggleEventModal);

    // Handle event saving here (not implemented in this example)
    
    const events = {}; // Initialize an empty events object
    saveButton.addEventListener('click', () => {
  const eventTitle = eventTitleInput.value;
  const eventTheme = eventThemeSelect.value;

  const event = {
    title: eventTitle,
    theme: eventTheme,
  };

  const eventDateStr = selectedDate.toDateString();

  if (!events[eventDateStr]) {
    events[eventDateStr] = [];
  }

  events[eventDateStr].push(event);

  toggleEventModal();
  generateCalendar();
});


    // Initialize the calendar
    generateCalendar();
  </script>