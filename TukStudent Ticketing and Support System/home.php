



<?php include('db_connect.php') ?>
<!-- Info boxes -->
<?php if($_SESSION['login_type'] == 1): ?>
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Students</span>
                <span class="info-box-number">
                  <?php echo $conn->query("SELECT * FROM students")->num_rows; ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Staff</span>
                 <span class="info-box-number">
                  <?php echo $conn->query("SELECT * FROM staff")->num_rows; ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>

            
            
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-columns"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Departments</span>
                <span class="info-box-number"><?php echo $conn->query("SELECT * FROM departments")->num_rows; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-ticket-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Tickets</span>
                <span class="info-box-number"><?php echo $conn->query("SELECT * FROM tickets")->num_rows; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>




<?php 

$username = "root";
$password = "";
$database = "css_db";

try {
  $pdo = new PDO("mysql:host=localhost;database=$database", $username, $password);
  // Set the PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
  die("ERROR: Could not connect. " . $e->getMessage());
}

?>


<?php 

try{
  $sql = "SELECT * FROM css_db.tickets";   
  $result = $pdo->query($sql);
  if($result->rowCount() > 0) {

    $status = array();

    while($row = $result->fetch()) {
     $status[] = $row["status"];
    }

  unset($result);
  } else {
    echo "No records matching your query were found.";
  }
} catch(PDOException $e){
  die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
 
// Close connection
unset($pdo);

?>



<div class="width-700px"}>
  <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  

  const status = <?php echo json_encode($status); ?>

  
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Pending', 'Processing','Done',  'Closed'],
      datasets: [{
        label: 'Ticket Completion Status',
        backgroundColor: [
          'rgba(54, 162, 235, 1)',
          'rgba(133, 40, 17, 0.8)',
          'rgba(255, 40, 255, 0.8)',
          'rgba(255, 40, 0, 1)'
        ] ,

       

       

        data: status,
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>












<?php else: ?>
	 <div class="col-12">
          <div class="card">
          	<div class="card-body">
          		Welcome <?php echo $_SESSION['login_name'] ?>!
          	</div>
          </div>
      </div>

<?php endif; ?>
