<?php
error_reporting(0);
function responseFunction($status = 500, $content = array('message' => 'Action parameter is missing')) {
    echo json_encode(array(
      'status' => $status,
      'content' => $content
    ));
    exit();
  }

 $conn=mysqli_connect("localhost", "root", "", "todolist");

  $apiSchemes = array(
    'insert' => array(
      'task',
      'date'
    ),
    'delete' => array(
        'taskno'
    ),
    'select' => array(
        'taskno',
        'task',
        'date'

    ),
  );
  if(!isset($_REQUEST['action'])) {
    responseFunction();
  }

  $action = $_REQUEST['action'];

  $scheme = $apiSchemes[$action];

    // Parameter check
  foreach($scheme as $paramter) {
    if(!isset($_REQUEST[$paramter])) {
      responseFunction(500, array('message' => "$paramter parameter is missing"));
    }
  }


  switch($_REQUEST['action']) {
    case 'insert':
        $task=$_REQUEST['task'];
        $date=$_REQUEST['date'];
        $sqlins="INSERT INTO things (task, date) VALUES ('".$task."', '".$date."')";
        $resins=mysqli_query($conn, $sqlins);
          
        if(!$resins) {
            responseFunction(500, array('message' => 'DB INSERT ERROR'));
        }
          
        $taskno = mysqli_insert_id($conn);
          
        responseFunction(200, array('message' => array(
            'taskno' => $taskno,
            'task' => $task,
            'date' => $date
        )));
    break;
    case 'delete':
          $taskno=$_REQUEST["taskno"];
          $sqlrem="DELETE FROM things WHERE taskno=".$taskno;
          $resrem=mysqli_query($conn, $sqlrem);
          
          
          if(!$resrem){
              responseFunction(500, array('message' => 'DB REMOVE ERROR'));
          }
          
          responseFunction(200, array('message' => array(
            'taskno' => $taskno,
            'task' => $task,
            'date' => $date
        )));
          
          
          
    break;
    case 'select':
          $taskno=$_REQUEST['taskno'];
          $task=$_REQUEST['task'];
          $date=$_REQUEST['date'];
          $sqlsel="SELECT * FROM things";
          $ressel=mysqli_query($conn, $sqlsel);
          
          if(!$ressel){
              responseFunction(500, array('message' => 'DB SELECT ERROR'));
          }
          $dizi=array();
          while($row = mysqli_fetch_array($ressel))
                            {   
                                
                                array_push($dizi, array(
                                    'taskno'=>$row['TaskNo'],
                                    'task'=>$row['Task'],
                                    'date'=>$row['Date']
                                ));
                                //print_r($dizi);
                               
                            }
                        
          
           responseFunction(200, array('message' => $dizi));
          
          
    break;
    default:
      responseFunction();
    break;
  }

// mysli_close($conn);

?>
    
           
