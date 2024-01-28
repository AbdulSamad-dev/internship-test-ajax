<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <style>
        /* Add your custom styles here */
        .list-group-item {
            cursor: pointer;
        }

       
    </style>    
</head>
<body>


<div class="container mt-5">
        <h1 class="mb-4">Task Manager</h1>
        <div class="row">
            <div class="col-sm-12">

            <!-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong id="form_err"></strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div> -->

                <form id="taskForm">
                <label for="title" class="form-label">Title:</label>
                <input type="text" id="title" name="title" class="form-control" required>

                <label for="description" class="form-label">Description:</label>
                <textarea id="description" name="description" class="form-control" required></textarea>


                <label for="priority" class="form-label">Priority:</label>
                <select id="priority" name="priority" class="form-select" required>
                    <option value="0" selected>Low</option>
                    <option value="1">High</option>
                </select>

                <label for="dueDate" class="form-label" class="form-label">Due Date:</label>
                <input type="date" id="dueDate" name="dueDate" class="form-control" required>

                <br>
                <button type="button" onclick="validateAndAddTask()" class="btn btn-primary">Add Task</button>
                </form>
            </div>
        </div>


        <br><br><br>
        <h1>To Do List</h1>
        <button class="btn btn-primary" onclick="SortByPriority()" type="button">Sort By Priority High</button>
        <input type="hidden" name="sort_by_priority" id="sort_by_priority" value="no">
        <div id="taskList" class="list-group"></div>

        
        <nav aria-label="Page navigation example">
            <ul id="pagination" class="pagination">
                <!-- Pagination links will be inserted here via JavaScript -->
            </ul>
        </nav>
    </div>
    

    <!-- Include jQuery and Bootstrap JavaScript (Uncomment if not included in the head) -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- Include your script.js file -->
    <script src="includes/script.js"></script>
    <!-- <script src="includes/pagination.js"></script> -->

    <script>
  // Use jQuery to handle accordion behavior
  $(document).ready(function(){

    $('.accordion-button').click(function(){
      // Collapse all other accordion items
      $('.accordion-collapse').not($(this).next('.accordion-collapse')).collapse('hide');
    });


    


  });



</script>
</body>
</html>
