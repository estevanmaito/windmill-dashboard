// $(document).ready(function(){


//     $('.user-row').on('click', function () {
//         // Find the corresponding .detailsRow element for the clicked .user-row
//         var detailsRow = $(this).next('.detailsRow');
      
//         // Check if the display property is set to 'none'
//         if (detailsRow.css('display') === 'none') {
//           // Change the display property to 'table-row'
//           detailsRow.css('display', 'table-row');
//         } else {
//           // Hide the .detailsRow
//           detailsRow.css('display', 'none');
//         }
//       });
      
      
// })


// JavaScript click event handler for .user-row elements
var userRows = document.querySelectorAll('.table-row');
userRows.forEach(function(userRow) {
    userRow.addEventListener('click', function () {
        // Find the corresponding .detailsRow element for the clicked .user-row
        var detailsRow = this.nextElementSibling;

        // Check if the display property is set to 'none'
        if (detailsRow.style.display === 'none') {


          // Change the display property to 'table-row'
          detailsRow.style.display = 'table-row';
          
          var userId = userRow.dataset.id;
          
          $.ajax({
            url: 'index1.php',
            type: 'GET',
            data: {
              action: 'getUserDataAjax', // Sending the function name as an action parameter
              param1 : userId
            },
             success: function (response) {
              // Set the HTML content inside the detailsRow 
            // Assuming 'response' is an array with values you want to concatenate
            let detailsRowHTML = '<td> ';

            for (const key in response) {
              if (response.hasOwnProperty(key)) {
                detailsRowHTML += response[key] + '</td> <td>';
                console.log( response[key])
              }
            }
            const newDiv = document.createElement('div');
  //           detailsRow.innerHTML = `
  //   <div class="grid grid-cols-3 gap-4 p-5">
  //     <div class="shadow-lg bg-green-100 text-green-500 text-lg font-bold text-center p-10 rounded-lg row-span-2">1</div>
  //     <div class="shadow-lg bg-green-100 text-green-500 text-lg font-bold text-center p-10 rounded-lg">2</div>
  //     <div class="shadow-lg bg-green-100 text-green-500 text-lg font-bold text-center p-10 rounded-lg row-span-2">3</div>
  //     <div class="shadow-lg bg-green-100 text-green-500 text-lg font-bold text-center p-10 rounded-lg">4</div>
  //   </div>
  // `;
  // detailsRow.replaceWith(newDiv); 
            // detailsRow.innerHTML = response
             
            },
            error: function (xhr, status, error) {
              // Handle errors, if any
              detailsRow.innerHTML = 'hi';
              console.error('Error occurred:', error);
            }
          });
  
        } else {
          // Hide the .detailsRow
          detailsRow.style.display = 'none';
        }
    });
});
