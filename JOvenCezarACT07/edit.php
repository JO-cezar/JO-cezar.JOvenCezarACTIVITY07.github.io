<?php
    include_once("config.php");

    if( isset($_POST['update']))
    {
        $id = mysqli_real_escape_string($mysqli, $_POST['id']);
        $author = mysqli_real_escape_string($mysqli, $_POST['author']);
        $quote = mysqli_real_escape_string($mysqli, $_POST['quote']);

        if( empty($author) || empty($quote)) 
        {
            if(empty($author))
            {
                echo "<font color='red'> Author field is empty. </font> <br>";
            }

            if(empty($quote))
            {   
                echo "<font color='red'> Quote field is empty. </font> <br>";
            } 


            echo "<br><a href ='javascript:self.history.back();'>Go Back </a>";
        }
        else
        {
            $result = mysqli_query($mysqli, "UPDATE fam_quotes set author='$author',quote='$quote' WHERE id=$id");
            header("Location: index.php");
        
        }
    }
?>


<?php

    $id = $_GET['id'];

    $result = mysqli_query($mysqli, "SELECT * FROM fam_quotes where id=$id");

    while( $res = mysqli_fetch_array($result))
    {
    $author = $res['author'];
    $quote = $res['quote'];
    
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href='css/styles.css' type='text/css' rel='stylesheet'/>
    <title>EDIT DATA</title>
</head>
<body>
    <div class="container-fluid d-flex justify-content-center mt-5">
        <form class="Border" name="form1" method="post" action="edit.php">
        
            <table class="text-center" id="Border">
            <h1 class="text-center">EDIT QOUTES</h1>
				<tr>
					<td >Author</td>
					<td><input  class="mt-2 ml-2 form-control-lg"  type="text" name="author" value="<?php echo $author;?>"/></td>
				</tr>
				<tr>
					<td class="">Quote</td>
					<td><input  class="mt-2 ml-2 form-control-lg" type="text" name="quote" value="<?php echo $quote;?>"/></td>
				</tr>
				<tr>
					<td>
                        <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                    </td>
					<td><input class="btn btn-lg btn-primary mt-2" type="submit" name="update" value="Update" /></td>
				</tr>
			</table>
        </form>
    </div>
    

</body>
</html>
