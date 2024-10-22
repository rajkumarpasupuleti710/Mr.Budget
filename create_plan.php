<?php
  require("includes/common.php");
  if (! isset($_SESSION['email'])) {
    header('location: index.php');
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="create_plan.css">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Plan</title>
   <link rel="stylesheet" href="css/create_plan.css">
</head>
<body>
    <?php include("includes/header.php"); ?>
    <div class="container">
        <div class="row row_style">
        <div class="col">    
        <div class="panel panel-primary">
            <div class="panel-heading" style="background-color: darkcyan;">
                Create New Plan
            </div>
            <div class="panel-body">
                <form action="plan-details.php" method="POST">
                    <label>Initial Budget</label>
                    <div class="form-group">
                        <input type="number" class="form-control" name="initial_budget" min="50" placeholder="Initial Budget (EX:4000)" required>
                    </div>
                    <label>How many people you want to add in your group?</label>
                    <div class="form-group">
                        <input type="number" class="form-control" min="1" name="people_number" placeholder="No.Of People" required>
                    </div>
                    
                    <button type="submit" class="btn-outline-primary btn-block btn-lg b">Next</button>
                </form>
            </div>
            
        </div>
        </div>
        </div>
    </div>
    <?php include("includes/footer.php")?>
</body>
</html>