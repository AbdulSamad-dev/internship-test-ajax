// $(document).ready(function() {
//     var totalPages = 1; // Initialize with a default value
//     var currentPage = 1;

//     // Function to load tasks
//     function loadTasks() {
//         $.ajax({
//             url: 'get_tasks.php',
//             method: 'GET',
//             data: { page: currentPage },
//             success: function(response) {
               
//                 $('#taskList').html(response);
//             }
//         });
//     }

   
//     // Function to generate pagination links
//     function generatePagination() {
//         $('#pagination').empty();
//         for (var i = 1; i <= totalPages; i++) {
//             var activeClass = (i === currentPage) ? 'active' : '';
//             $('#pagination').append('<li class="page-item ' + activeClass + '"><a class="page-link" href="#" onclick="changePage(' + i + ')">' + i + '</a></li>');
//         }
//     }

//     // Function to change the current page
//     window.changePage = function(newPage) {
//         currentPage = newPage;
//         loadTasks();
//         generatePagination();
//     };

//     // Initial load of tasks and pagination
//     loadTasks();
//     generatePagination();
// });
