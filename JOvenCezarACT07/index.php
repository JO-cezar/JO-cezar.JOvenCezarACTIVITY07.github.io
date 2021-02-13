<?php
    include_once("config.php");

    $result = mysqli_query($mysqli, "SELECT * FROM fam_quotes");

    //initialize session
    session_start();

    if( !isset($_SESSION['email']) || empty($_SESSION['email']))
    {
        header('location: login.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link href='css/styles.css' type='text/css' rel='stylesheet'/>
    <title>CRUD WEBSITE</title>
</head>
<body>

    
    
    <div class="container-fluid mt-3">
    <div class="col-10 mx-auto">
   

    <table class="table  table-striped table-dark"> 
    <thead>
    <tr class="table-hover">
    <th> <a href="add.html" class="btn btn-lg btn-primary d-lg-block"><i class='fas fa-plus fa-xs'> ADD QOUTES</i></a> <a href="logout.php" class="btn btn-lg btn-primary d-lg-block mt-4">LOG OUT</a></th>
    <th><h1 class="text-center display-1"> FAMOUS QOUTES </h1></th>
    
    
    </tr>
    </thead>
    <tbody class="table table-bordered table-dark">
   
        
            <tr>
                <td> AUTHORS </td>
                <td> QOUTES</td>
                <td> UPDATE </td> 
             </tr>
        
            <?php
                while( $res = mysqli_fetch_array($result))
                {
                    echo "<tr>";
                    echo "<td>".$res['author']."</td>";
                    echo "<td>".$res['quote']."</td>";
                    echo "<td><a href=\"edit.php?id=$res[id]\">EDIT</a> <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete this record?')\">DELETE</a></td>";
                    echo "</tr>";
                }
            ?>

        </tbody>
        </table>
    </div>
</body>
</html>