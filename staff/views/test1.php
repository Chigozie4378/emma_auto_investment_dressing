<?php
include_once "../../autoload/loader.php";
$ctr = new UserController();
$select = $ctr->editUsers();
$ctr->updateUsers();
$result = mysqli_fetch_array($select)

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $result["id"] ?>">
        <input type="text" name="name" value="<?php echo $result["name"] ?>">
        <input type="text" name="address" value="<?php echo $result["address"] ?>">
        <input type="text" name="phone_no" value="<?php echo $result["phone_no"] ?>">
        <input type="submit" name="update" value="update">
    </form>
</body>

</html>


<!-- Include Bootstrap CSS and JS files -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<!-- Retrieve data from the database -->
<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT image_path, name, description FROM cards";
$result = mysqli_query($conn, $sql);

mysqli_close($conn);
?>

<!-- Create the slider -->
<div id="card-slider" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">

        <!-- Loop through the data and create a container for each set of four cards -->
        <?php
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            if ($i % 4 == 0) {
                echo '<div class="carousel-item';
                if ($i == 0) {
                    echo ' active';
                }
                echo '"><div class="row">';
            }
            echo '<div class="col-md-6"><div class="card" style="width:100%">';
            echo '<img class="card-img-top" src="' . $row["image_path"] . '" alt="Card image" height="180">';
            echo '<div class="card-body">';
            echo '<h4 class="card-title">' . $row["name"] . '</h4>';
            echo '<p class="card-text">' . $row["description"] . '</p>';
            echo '<a href="#" class="btn btn-primary">See Profile</a>';
            echo '</div></div></div>';
            if ($i % 4 == 3) {
                echo '</div></div>';
            }
            $i++;
        }
        if ($i % 4 != 0) {
            echo '</div></div>';
        }
        ?>

    </div>

    <!-- Add the arrow controls -->
    <a class="carousel-control-prev" href="#card-slider" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#card-slider" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>

</div>
<!-- Add JavaScript to make the slider slide every 10 seconds -->
<script>
    $(document).ready(function() {
        $('#card-slider').carousel({
            interval: 10000
        });
    });
</script>