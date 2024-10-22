<?php
  require("includes/common.php");
  if (! isset($_SESSION['email'])) {
    header('location: index.php');
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plan Details</title>
    <link rel="stylesheet" href="css/plan-details.css">
</head>
<body>
    <?php include("includes/header.php"); ?>
    <div class="container pan">
        <div class="row row_style">
        <div class="col">    
        <div class="panel panel-default">
            <div class="panel-body">
                <form action="create_plan_script.php" method="POST">
                    <label>Title</label>
                    <div class="form-group">
                        <input type="text" class="form-control" required name="title" placeholder="Enter Title(Ex: Trip To GOA)"required>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label>From</label>
                            <div class="form-group">
                                <input type="date" class="form-control" min="2024-04-01" max="2025-12-20" required name="from_date" placeholder="dd/mm/yyyy">
                            </div>
                        </div>
                        <div class="col-sm-6">
                        <label>To</label>
                            <div class="form-group">
                                <input type="date" class="form-control" min="2024-04-01" max="2025-12-20" required name="to_date" placeholder="dd/mm/yyyy">
                            </div>                       
                        </div>
                    </div>
                    <?php
                    if (isset($_POST['initial_budget']) && isset($_POST['people_number'])) {
                        $initial_budget = $_POST['initial_budget'];
                        $people_number = $_POST['people_number'];}
                    ?>
                    <div class="row">
                        <div class="col-sm-8">
                            <label>Initial Budget</label>
                            <div class="form-group">
                                <input type="text" class="form-control" required name="in_bd" <?php echo "value=$initial_budget"?> readonly>
                            </div>
                        </div>
                        <div class="col-sm-4">
                        <label>No.of People</label>
                            <div class="form-group">
                            <input type="text" class="form-control" required name="people" <?php echo "value=$people_number"?> readonly>
                            </div>                       
                        </div>
                    </div>
                    <?php 
                    $r=1;
                    while($r<=$people_number){?>
                        <label>Person <?php echo $r ?></label>
                        <div class='form-group'>
                            
                            <input type='text' class='form-control'  required name='name[<?php $r ?>]' placeholder='Person <?php echo $r ?> Name'>
                        </div>
                        <?php $r=$r+1;
                    }
                    ?>
                    <button type="submit" class="btn-outline-primary btn-block btn-lg b">Submit</button>
                </form>
            </div>
        </div>
        </div>
        </div>
    </div>
    <?php include 'includes/footer.php' ?>
</body>
</html>