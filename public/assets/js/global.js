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
var userRows = document.querySelectorAll('.user-row');
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
            url: '/SAM/public/app/controllers/Function.php',
            type: 'POST',
            data: {
              action: 'getUserDataAjax', // Sending the function name as an action parameter
              param1 : userId
            },
             success: function (response) {
              // Set the HTML content inside the detailsRow 
              detailsRow.innerHTML = '<td> hello </td>';

              // Handle the response from the PHP function             
              console.log('Result from PHP function:',response)
             
            },
            error: function (xhr, status, error) {
              // Handle errors, if any
              console.error('Error occurred:', error);
            }
          });
  
        } else {
          // Hide the .detailsRow
          detailsRow.style.display = 'none';
        }
    });
});
