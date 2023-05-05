<?php
include_once "../../autoload/loader.php";
$ctr = new UserController();
$ctr->addUsers();
$ctr->deleteUsers();

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

    <form method="post" action="">
        Name: <input type="text" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>"><br>
        <span class="error"><?php echo $ctr->nameerr ?></span><br>
        Address: <input type="text" name="address" value="<?php echo isset($_POST['address']) ? $_POST['address'] : '' ?>"><br>
        <span class="error"><?php echo $ctr->addresserr ?></span><br>
        Phone No: <input type="text" name="phone_no" value="<?php echo isset($_POST['phone_no']) ? $_POST['phone_no'] : '' ?>"><br>
        <span class="error"><?php echo $ctr->phone_noerr ?></span><br>
        <input type="submit" name="add" value="Add User">
    </form>
    <form action="" method="post">
        search any column<input type="search" name="search" id="">
        <input type="submit" name="find" value="Search">
    </form>
    <table>
        <thead>
            <tr>
                <th>S/N</th>
                <th>Name</th>
                <th>Address</th>
                <th>Phone No</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $select1 = $ctr->showUsersLike();
            while ($row = mysqli_fetch_array($select1)) { ?>
                <tr>
                    <td><?php echo ++$idkkiii ?></td>
                    <td><?php echo $row["name"] ?></td>
                    <td><?php echo $row["address"] ?></td>
                    <td><?php echo $row["phone_no"] ?></td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>
    <table>
        <thead>
            <tr>
                <th>S/N</th>
                <th>Name</th>
                <th>Address</th>
                <th>Phone No</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $select = $ctr->showUsers();
            while ($row = mysqli_fetch_array($select)) { ?>
                <tr>
                    <td><?php echo ++$idkkiii ?></td>
                    <td><?php echo $row["name"] ?></td>
                    <td><?php echo $row["address"] ?></td>
                    <td><?php echo $row["phone_no"] ?></td>
                    <td><a href="test1.php?id=<?php echo $row["id"] ?>">update</a></td>
                    <td><a href="test.php?id=<?php echo $row["id"] ?>">delete</a></td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>
</body>

</html>