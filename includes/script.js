$(document).ready(function() {
    // Load tasks on page load
    loadTasks();

    // Function to load tasks
    function loadTasks() {

        let sort_by_priority = $("#sort_by_priority").val();

        //console.log(priority_val)



        $.ajax({
            url: 'get_tasks.php',
            type: 'GET',
            data: sort_by_priority,
            success: function(response) {
                $('#taskList').html(response);
            }
        });
    }


    window.SortByPriority = function(){

        $("#sort_by_priority").val("yes");
       
        loadByPriority();
    }


    function loadByPriority(){
       
        $.ajax({
                url: 'get_tasks_by_priority.php',
                type: 'GET',
                success: function(response) {
                    $('#taskList').html(response);
                }
            });
    
      }
   

    window.validateAndAddTask = function() {
        // Client-side validation
        var title = $('#title').val();
        var description = $('#description').val();
        var priority = $('#priority').val();
        var dueDate = $('#dueDate').val();

        if (!title || !description || !priority || !dueDate) {
            alert("All fields are required");
            return;
        }

        // Validate due date not in the past
        var currentDate = new Date();
        var selectedDate = new Date(dueDate);

        if (selectedDate < currentDate) {
            alert("Due date must be in the future");
            return;
        }


        // Continue with the AJAX request
        addTask();
    }


    // Function to add a new task
    window.addTask = function() {
        var formData = $('#taskForm').serialize();

        $.ajax({
            url: 'add_task.php',
            type: 'POST',
            data: formData,
            success: function(response) {
                loadTasks();
                $('#title').val('');
                $('#description').val('');
                $('#dueDate').val('');
                //$("#form_err").html(response);
                alert(response);
                //  $('#taskForm')[0].reset();
            }
        });
    };
});
