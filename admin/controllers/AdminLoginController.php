<?php
class AdminLoginController extends Controller
{

    public function adminLogin()
    {
        if (isset($_POST["admin_login"])) {
            $username = mysqli_escape_string($this->connect(), $_POST["username"]);
            $password = md5(mysqli_escape_string($this->connect(), $_POST["password"]));

            $admin = $this->fetchWhereAnd("users", "username = $username", "password = $password");
            if (mysqli_num_rows($admin) > 0) {
                $result = mysqli_fetch_array($admin);
                $username = $result["username"];
                $firstname = $result['firstname'];
                $lastname = $result['lastname'];
                $_SESSION["admin_firstname"] = $firstname;
                $_SESSION["admin_lastname"] = $lastname;
                $_SESSION["admin_username"] = $username;
                $_SESSION["admin_passport"] =  $result["passport"];
                header("location:admin/views/index.php");
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
        header("location:../../admin.php");
    }
}
