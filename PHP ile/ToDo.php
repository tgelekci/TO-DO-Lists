<!DOCTYPE html>
<html>
<head>
<title></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="style.css" type="text/css" rel="stylesheet">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body class="p-3 mb-2 bg-info text-white">

    

<div>
    
    <div class="container-fluid">
        <div class="page-header">
            <h2>THINGS TO DO</h2>  
        </div>
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
                <input id="task" type="text" class="form-control" name="task" placeholder="Enter Task">
            </div>
            <br>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                <input id="date" type="date" class="form-control" name="date">
            </div>
            <br>
            <input type="submit" class="btn btn-success" value="Submit" name="submit" style="float: right">
            <br>
           
        </form>
    </div>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                
                    <?php
                        error_reporting(0);
                        $conn=mysqli_connect("localhost", "root", "", "todolist");
    
                        if(null!==($_POST['task'])&&null!==($_POST['date']))
                            {
                                $task=$_POST['task'];
                                $date=$_POST['date'];
        
                                if(isset($_POST["submit"]))
                                    {
                                        $sqlins="INSERT INTO things (task, date) VALUES ('".$task."', '".$date."')";
                                        $resins=mysqli_query($conn, $sqlins);
                                    }
                            }
                
                
                      
                
              
                if(isset($_POST["removetext"]))
                            {
                                $rt=$_POST["removetext"];
                    
                                if(isset($_POST["rmvb"]))
                                    {
                                        $sqlrem="DELETE FROM things WHERE taskno=".$rt;
                                        $resrem=mysqli_query($conn, $sqlrem);
                                    }
                            }
                
                
                
                                        

                        $sqlsel="SELECT * FROM things";
                        $ressel=mysqli_query($conn, $sqlsel);
                
                        
                        
                        echo "<table class=\"table table-bordered\">";
                        echo "<tr bgcolor=\"#FFFF00\">";
                        echo "<th>TASK NO</th>";
                        echo "<th>TASK</th>";
                        echo "<th>DATE</th>";
                        echo "</tr>";
                
                        while($row = mysqli_fetch_array($ressel))
                            {   
                                echo "<tr bgcolor=\"#FFFFFF\">";
                                echo "<td>".$row["TaskNo"]."</td>";
                                echo "<td>".$row["Task"]."</td>";
                                echo "<td>".$row["Date"]."</td>";
                                echo "</tr>";
                            }
                        echo "</table>";

                        mysqli_close($conn);

                      ?>    
    
            </div>
        </div>
        <div class="row">
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                <div class="col-lg-1"></div>
                <div class="col-lg-9">
                    <input id="rmvtext" type="text" class="form-control" name="removetext" placeholder="Enter the number of the task you want to remove ">
                </div>
                <div class="col-lg-1">
                    <input type="submit" class="btn btn-danger" value="Remove" name="rmvb">
                
                
                
                </div>
                </form>
        </div>
    </div>
    </div>

    
</body>
</html>
