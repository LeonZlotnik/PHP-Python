<?php
  if(isset($_POST['insert'])){
      $name = $_POST['nombre'];
      $email = $_POST['email'];

      $conn = mysqli_connect("localhost","root","root","DBtest") or die("error en conexion ".mysqli_connect_error());
  mysqli_set_charset($conn, "utf8");

  $sql = "INSERT INTO registros (nombre, email) VALUES ('$name','$email');";
  $result = mysqli_query($conn, $sql) or die ("error en query $sql".mysqli_error());

  if($result){
    echo "Success!";
  }else{
    echo "<script type='text/javascript'>alert('Se ha generado un error');</script>";
  };

  mysqli_free_result($result);
  mysqli_close($conn);
  
  header('Location:index.php');

  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Form</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<br>
<h2 class="text-center">Prueba Python</h2>
<br>
<section class="container">
    <form method="POST" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Nombre:</label>
                <input type="text" name="nombre" class="form-control" id="inputEmail4" placeholder="Inrtoduce nombre">
            </div>   
            <br>
            <div class="form-group col-md-6">
                <label for="inputAddress2">Email:</label>
                <input type="email" name="email"  class="form-control" id="inputAddress2" placeholder="Inrtoduce email">
            </div>
            <br>
            <div class="form-group col-md-6">
                <input type="submit" name="insert" class="btn btn-primary" value="Crear">
            </div>
        </div> 
    </form>
</section>
<br>
</body>
</html>

<?php 
    function get_data()
    {
        $connect = mysqli_connect("localhost","root","root","DBtest");
        $query = "SELECT * FROM registros";
        $result = mysqli_query($connect, $query);
        $registro_data = array();
        while($row = mysqli_fetch_array($result))
        {
            $registro_data[] = array(
                'nombre' => $row['nombre'],
                'email' => $row['email']
            );
        }
        return json_encode( $registro_data);
    }
    $file_name = date('d-m-Y') . '.json';
    if(file_put_contents($file_name,get_data()))
    {
        $file_name . 'file created';
    }else{
        echo 'error';
    }

    $json_data = file_get_contents("registro_python.json");
    $json = json_decode($json_data,true);

    $output = '<ul class="container list-group">';
    
    foreach($json as $data){
    $output .= "<li class='list-group-item'>".$data."</li>";
    }
    $output .= '<ul>';

    echo $output;

    
?>