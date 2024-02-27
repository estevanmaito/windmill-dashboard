
//--- This function handles the toggling of user details display and API data retrieval for individual user rows in the interface ---
var userRows = document.querySelectorAll('.item-row');

userRows.forEach(function (userRow) {
  userRow.addEventListener('click', function () {
    // Prevent default link behavior if a link or button was clicked
    if (event.target.tagName === 'A' || event.target.closest('button')) {
      return;
    }
    
    // Check if the next sibling is the details container we want to toggle
    var nextElement = this.nextElementSibling;
    var detailsRow;
    
    if (nextElement && nextElement.classList.contains('detailsRow')) {
      // The next element is the details container we want to toggle
      detailsRow = nextElement;
    } else {
      // Create a new details container because it doesn't exist
      detailsRow = document.createElement('div');
      detailsRow.id = 'new';
      detailsRow.style.display = 'none'; // Start with the details container hidden
      this.parentNode.insertBefore(detailsRow, this.nextSibling); // Insert the details container into the DOM
    }
    
    // Toggle visibility of the details container
    if (detailsRow.style.display === 'none' || detailsRow.style.display === '') {
      detailsRow.style.display = 'block';
      var userId = userRow.dataset.id;
        //  make an API call to get more details about the user.
        var apiEndpoint = 'https://www.sakane.ma/oc-content/plugins/rest/api.php?key=DOoebZRUU1ozFAelnC5u7x8hMvcqBV&type=read&object=item&action=byId&itemId=' + userId;
        var apiPictures = 'https://www.sakane.ma/oc-content/plugins/rest/api.php?key=DOoebZRUU1ozFAelnC5u7x8hMvcqBV&type=read&object=item&action=resourcesById&itemId=' + userId

        Promise.all([fetch(apiEndpoint), fetch(apiPictures)])
          .then(responses => {
            // Check for errors in the responses
            if (!responses[0].ok || !responses[1].ok) {
              throw new Error('One or both API responses were not ok');
            }

            // Parse the responses as JSON
            return Promise.all([responses[0].json(), responses[1].json()]);
          })
          .then(data => {
            var userData = data[0];
            var picturesData = data[1];

            // Process the user data and pictures data received from the APIs
            displayItemData(userData);
            displayItemPictures(picturesData)
          })
          .catch(error => {
            console.error('Error fetching user data or pictures:', error);
          });
      } else {
        // If the details row is visible, hide it by setting the display property to 'none'
        detailsRow.style.display = 'none';
      }
    });
  });

//---------------- Function to display the fetched user data ----------------
function displayItemData(userData) {
  // Create an HTML element using the fetched data
  var newtext = '<div class="grid grid-cols-3 gap-4 p-5">';
  newtext += '<div class="shadow-lg bg-gray-100 px-4 py-3 text-sm  p-10 rounded-lg row-span-2" id="swiper-img"></div>';
  newtext += '<div class="shadow-lg bg-gray-100 px-4 py-3 text-sm  p-10 rounded-lg">';
  newtext += '<span class="font-semibold">Titre : </span> ' + userData.response.s_title + '<br><span class="font-semibold"> adresse : </span>' + userData.response.s_address;
  newtext += '</div> <div class="shadow-lg bg-gray-100 px-4 py-3 text-sm  p-10 rounded-lg row-span-2">';
  newtext += '<span class="font-semibold">Prix : </span> ' + userData.response.i_price + '<br> <span class="font-semibold"> Statut : </span>' + '....' + '<br> <span class="font-bold"> contact : </span> <br> <span class="font-semibold"> Nom de proprietaire : </span>' + userData.response.s_contact_name + '<br> <span class="font-semibold"> Numero de telephone : </span>' + userData.response.s_contact_phone + '<br><span class="font-semibold"> date d\'expiration : </span>' + userData.response.dt_expiration + '<br><span class="font-semibold"> Last occup : </span>de ' + '...' + 'à ' + '...';
  newtext += '</div> <div class="shadow-lg bg-gray-100 px-4 py-3 text-sm   p-10 rounded-lg"><span class="font-semibold"> Details : </span>' + userData.response.s_description + '</div> </div>';
  
  var newElement = ensureElementExists();
  newElement.innerHTML = newtext;
  console.log(userData);
}


//---------------- Display images in a Swiper gallery using data from the API response ----------------
//---------------- API response containing image data ----------------
function displayItemPictures(picturesData) {
  // Create the initial HTML structure for the Swiper slides
  var text = '<div class="swiper gallery-top">';
  text += '<div class="swiper-pagination" ></div><div class="swiper-wrapper">';

  // Loop through the items in the API response
  picturesData.response.forEach(function (item) {
    // Assuming each item has a "s_name" property containing the image name
    var itemId = item.pk_i_id;
    var extension = item.s_extension;
    var path = item.s_path;

    // Create the HTML structure for each slide using the extracted properties
    text += '<div class="swiper-slide">';
    text += `<div class="swiper-slide-container">
              <img src="https://sakane.ma/${path}${itemId}.${extension}"
              data-src="https://sakane.ma/${path}${itemId}.${extension}"
              loading="lazy" alt="Item Picture">
            </div>`;
    text += '</div>';
  });

  // Close the HTML structure
  text += '</div>';

  text += ` <div id="js-prev1" class="swiper-button-prev"></div>
  <div id="js-next1" class="swiper-button-next"></div>`;

  // Add thumbnails section
  text += '<div class="swiper-container gallery-thumbs">';
  text += '<div class="swiper-wrapper">'

  // Loop through the items again to create thumbnails
  picturesData.response.forEach(function (item) {
    var itemId = item.pk_i_id;
    var extension = item.s_extension;
    var path = item.s_path;

    // Create the HTML structure for each thumbnail using the extracted properties
    text += '<div class="swiper-slide">'
    text += `<div class="swiper-slide-container">
            <img class="lazy" src="https://sakane.ma/${path}${itemId}.${extension}"
            data-src="https://www.sakane.ma/oc-content/uploads/84/24159_thumbnail.jpg" 
            alt="Dar bouazza, Bel appartement a louer, semi meublé 3CH - 2" loading="lazy"></img>
            </div>`

    // <img src="https://sakane.ma/${path}${itemId}.${extension}" alt="Item Thumbnail">`;
    text += '</div>';
  });

  // Close the thumbnails section
  text += '</div>';
  text += '</div>'; // Closing the gallery-thumbs div

  //console.log(text);

  document.getElementById('swiper-img').innerHTML = text;

  // Create a Swiper instance for the main slider
  const swiper = new Swiper('.swiper', {
    speed: 400,
    spaceBetween: 100,

    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      nextButton: '#js-prev1',
      prevButton: '#js-next1',
    },
  });

  // Create a Swiper instance for the thumbnails
  const galleryThumbs = new Swiper('.gallery-thumbs', {
    spaceBetween: 10,
    slidesPerView: 3,
    freeMode: true,
    watchSlidesVisibility: true,
    watchSlidesProgress: true,
    // navigation arrows
    nextButton: '#js-prev1',
    prevButton: '#js-next1',
  });

  // Synchronize the main slider with the thumbnails
  swiper.controller.control = galleryThumbs;
  galleryThumbs.controller.control = swiper;

  // Add click event listeners to the thumbnails
  const thumbnailImages = document.querySelectorAll('.gallery-thumbs img');
  thumbnailImages.forEach(function (thumbnailImage) {
    thumbnailImage.addEventListener('click', function () {
      const slideIndex = parseInt(this.getAttribute('data-slide-index'));
      swiper.slideTo(slideIndex);
    });
  });
}

/* <img class="lazy" src="https://www.sakane.ma/oc-content/uploads/84/24159_thumbnail.jpg" 
data-src="https://www.sakane.ma/oc-content/uploads/84/24159_thumbnail.jpg" 
alt="Dar bouazza, Bel appartement a louer, semi meublé 3CH - 2" loading="lazy"></img> */

//---------------- Show or hide the messages list ----------------
document.querySelector('.messages-btn').addEventListener('click', function () {
  document.querySelector('.messages-section').classList.toggle('show');
});

//---------------- Close the messages list ----------------
document.querySelector('.messages-close').addEventListener('click', function () {
  document.querySelector('.messages-section').classList.remove('show');
});

//---------------- Dropdown function: modify, reserve, and delete ----------------

// Function to toggle a dropdown and close others
function toggleDropdown(button) {
  var dropdown = button.nextElementSibling;
  closeDropdown(dropdown)
  dropdown.classList.toggle("hidden");
}
// Function to close all dropdowns except a specific one
function closeDropdown(dropdown) {
  var dropdowns = document.querySelectorAll('.drop');
  dropdowns.forEach(function (drop) {
    if (dropdown.id != drop.id)
      drop.classList.add('hidden');
  });
}

// Event listener for clicks on the body
document.body.addEventListener('click', function (event) {
  var clickedElement = event.target;

  if (!clickedElement.classList.contains('dropdownbtton')) {
    var dropdowns = document.querySelectorAll('.drop');
    dropdowns.forEach(function (drop) {
      drop.classList.add('hidden');
    });
  }
});


function ensureElementExists() {
  // Check if the element with id="new" exists
  var element = document.getElementById('new');
  if (!element) {
    // If it does not exist, create it
    element = document.createElement('div');
    element.id = 'new'; // Make sure the ID matches what you're looking for
    // Optionally set other attributes or innerHTML
    element.innerHTML = ''; // Initialize with empty or default content
    document.body.appendChild(element); // Append it to the body or another specific element
  }
  return element;
}