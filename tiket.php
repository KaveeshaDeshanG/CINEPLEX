

<?php

include("dbconn.php");
session_start();
if(!isset($_SESSION['id']) && !isset($_SESSION['email'])) {
    // header("Location:mmmm.php");
}



// Fetch movies from the database
$query = "SELECT * FROM movies";
$result = mysqli_query($conn, $query);





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
    <title>My Movie Watch List</title>
    <style>
        .complete{
    text-decoration-line: line-through;
    opacity: 0.5;
}




    </style>
</head>
<body>
<form id="film-form" action="filmadd.php" method="post">
    
<h1 class="display-4 text-center">
           <i class="fas fa-film text-primary"></i> Cinaplex<span class="text-primary"></span>
        </h1>
        
        <div class="text-center mt-3">
        <a href="index.php" class="btn btn-primary">Go to Index</a>
    </div>
        
    <table class="table mt-5">
        <thead class="thead-dark">
            <tr>
               
                <th scope="col">Name</th>
                <th scope="col">Release Year</th>
                <th scope="col">Description</th>
                <th scope="col">Theater</th>
                <th scope="col">Image</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr >
                    
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['year'] ?></td>
                    <td><?php echo $row['discrip'] ?></td>
                    <td><?php echo $row['theater'] ?></td>
                    <td>
                <!-- Display Image with specific width and height -->
                <img src="uploads/<?php echo htmlspecialchars($row['img']); ?>" alt="Movie Image" style="width: 50px; height: 50px;">
            </td>
                    <td>

            </td>
                    
                </tr>
            <?php } ?>
        </tbody>
    </table>
          
          
    </div>


</body>
</html>