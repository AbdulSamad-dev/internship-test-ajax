<?php
include 'includes/config.php';



$result = $conn->query("SELECT * FROM tasks ORDER BY priority DESC");


?><div class="accordion accordion-flush-" id="accordionFlushExample">
  <?php while ($row = $result->fetch_assoc()) {
 ?>
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-<?php echo $row['id']; ?>" aria-expanded="false" aria-controls="flush-collapse-<?php echo $row['id']; ?>">
          <?php echo $row['title']; ?>
          <?php if($row['priority'] == 1)
          {
            ?>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
            <?php if($row['priority'] == 1) echo "High priority"; ?>
            <span class="visually-hidden">High</span>
          </span>
          <?php }?>
        </button>
      </h2>

      <div id="flush-collapse-<?php echo $row['id']; ?>" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample"> 
        <div class="accordion-body"> 
          <?php echo $row['description']; ?> 
          <h6>Due Date <span class="badge bg-secondary"> <?php echo $row['due_date']; ?></span></h6>
          <h6 id='priority'  onclick="updatePriority(<?php echo $row['id'] ?>, <?php echo $row['priority'] ?>)" >Priority <span  class='badge <?php echo $row["priority"]==0?"text-bg-info":"text-bg-danger"; ?>'> <?php echo $row['priority']?"High":"Low"; ?></span></h6>
          <h6>completed <span class='badge <?php echo $row["completed"]?"text-bg-success":"text-bg-danger"; ?>'>  <?php echo $row['completed']?"Yes":"No"; ?></span></h6>
          <h6>Created at <span class='badge text-bg-primary'>  <?php echo $row['created_at']; ?></span></h6>
        </div>
      </div>
    </div>
  <?php } ?>
</div>
<script>

$(document).ready(function(){

  


  
  function loadTasks() {
        $.ajax({
            url: 'get_tasks.php',
            type: 'GET',
            success: function(response) {
                $('#taskList').html(response);
            }
        });
    }


  window.updatePriority = function(taskId, newPriority) {
        

    $.ajax({
                type: "POST",
                url: "update_priority.php",
                data: { taskId: taskId, priority: newPriority },
                success: function(response) {
                  loadTasks();
                   console.log(response);
                }
            });

       
    };
  
});




    // function updatePriority(taskId, newPriority) {
        
    //     $.ajax({
    //             type: "POST",
    //             url: "update_priority.php",
    //             data: { taskId: taskId, priority: newPriority },
    //             success: function(response) {
    
                  
    //                 console.log(response);
    //             }
    //         });
    //   }
  
</script>
<?php
$conn->close();
?>
