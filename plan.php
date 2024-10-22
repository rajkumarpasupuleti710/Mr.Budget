<?php 
include("includes/common.php");
if (! isset($_SESSION['email'])) {
  header('location: index.php');
}

$user_id = $_SESSION['user_id'];
$query = "SELECT plan_id  FROM plan_details WHERE user_id='" . $user_id . "' ";
$result = mysqli_query($con, $query)or die($mysqli_error($con));
$num = mysqli_num_rows($result);
if ($num == 0)  {
    header('location: homepage.php');
    
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
  <title>Plans</title>
  <link rel="stylesheet" href="css/plan.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <h2>Your Plans</h2>   
    <div class="container cnt">
    <div class="row ">  
    <?php 
    $user_id=$_SESSION['user_id'];
    $query = "SELECT * FROM plan_details WHERE user_id='$user_id' ";
    $result = mysqli_query($con, $query)or die(mysqli_error($con));
    if(mysqli_num_rows($result)>=1){?>
                <?php while ($row = mysqli_fetch_array($result)) {?>
                <div class="col-sm-12 col-md-6 col-lg-4 visible-xs visible-sm visible-md visible-lg">
                <div class="panel panel-primary" style="border-color:darkcyan;">
                    <div class="panel-heading" style="background-color:darkcyan; ">
                            <p class="p1">
                                <?php echo $row["title"]; ?> 
                            </p>
                            <p class="p3">
                                <span class="glyphicon glyphicon-user"></span>&nbsp<?php echo  $row["people_number"]; ?>
                            </p>
                    </div>
                    <div class="panel-body">
                    <form action="plans_expenses.php" method="POST">
                        <div class="form-group">
                            <p class="p1">    
                               <label>Budget</label>  
                            </p>
                            <p class="p2">
                                <?php echo '₹' . $row["initial_budget"]; ?>
                            </p>
                        </div>
                        <div class="form-group">
                            <p class="p1">
                               <label>Date</label>  
                            </p>
                            <p class="p2">
                                <?php 
                                $from=date_create($row["from_date"]);
                                $to=date_create($row["to_date"]);
                                $char='-';
                                echo date_format($from,'d M')." ".$char." ".date_format($to,'d M Y'); ?>
                            </p>
                        </div>
                        <?php $p_id=$row["plan_id"];
                             
                        ?>
                        <div class="form-group">
                        <button type="submit" class="btn btn-outline-primary btn-block " name="view_plan" value="<?php echo $p_id; ?>"  style= "border-color: darkcyan;"> <b>View Plan</b> </button>
                         </div>
                    </form>
                    </div>
                </div>
                </div>
                <?php }
            }?>
        </div>
    </div>
    <a href="create_plan.php"><span class='glyphicon glyphicon-plus-sign pls'></span></a>
    <?php include("includes/footer.php");?>
</body>
</html>