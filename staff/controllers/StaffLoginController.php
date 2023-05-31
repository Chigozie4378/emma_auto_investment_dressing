<?php
class StaffLoginController extends Controller
{

    public function staffLogin()
    {
        if (isset($_POST["staff_login"])) {
            $username = mysqli_escape_string($this->connect(), $_POST["username"]);
            $password = md5(mysqli_escape_string($this->connect(), $_POST["password"]));

            $staff = $this->fetchWhereAnd("users", "username = $username", "password = $password");
            if (mysqli_num_rows($staff) > 0) {
                $result = mysqli_fetch_array($staff);
                $username = $result["username"];
                $firstname = $result['firstname'];
                $lastname = $result['lastname'];
                $_SESSION["staff_firstname"] = $firstname;
                $_SESSION["staff_lastname"] = $lastname;
                $_SESSION["staff_username"] = $username;
                $_SESSION["staff_lastname"] = $result['lastname'];
                $_SESSION["staff_passport"] =  $result["passport"];
                header("location:staff/views/home.php");
            } else {
                echo "<div class='alert alert-danger text-center'>
            <strong>Danger!</strong> Invalid Login Details.
          </div>";
            }
        }
    }
    public function logout()
    {
        session_destroy();
        header("location:../../index.php");
    }
}
