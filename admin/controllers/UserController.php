<?php
class UserController extends Controller
{
    public $nameerr;
    public $addresserr;
    public $phone_noerr;
    public $passwordErr;
    public $userErr;
    public $user;
  
    public function addUser()
    {
        if (isset($_POST["add"])) {

            $password1 = mysqli_escape_string($this->connect(), $_POST["password"]);
            $cpassword = mysqli_escape_string($this->connect(), $_POST["cpassword"]);
            $role = mysqli_escape_string($this->connect(), $_POST["role"]);
            if ($password1 == $cpassword) {
                $firstname = mysqli_escape_string($this->connect(), $_POST["firstname"]);
                $lastname = mysqli_escape_string($this->connect(), $_POST["lastname"]);
                $username = mysqli_escape_string($this->connect(), $_POST["username"]);
                $password = md5(mysqli_escape_string($this->connect(), $_POST["password"]));
                $user = $this->checkUsers($username);
                $count = mysqli_num_rows($user);
                $passport_tmp_name = $_FILES["passport"]["tmp_name"];
                $passport_name = $_FILES["passport"]["name"];
                $file_path = "../../assets/passport/" . $passport_name;
                move_uploaded_file($passport_tmp_name, $file_path);
                if ($count > 0) {
                    $this->userErr = "<strong>Danger!</strong> Invalid User Registeration.";
                } else {
                    $this->insert('users', $firstname, $lastname, $username, $password, $role, $file_path,"active");
                    $this->user = "<div class='alert alert-success text-center'><strong>Success!</strong> admin Added Successfully.</div>";
                    echo "<script>
                     setTimeout(function(){
                        window.location.href = window.location.href
                     }, 1000);
                </script>";
                }
            } else {
                $this->userErr = "<div class='alert alert-danger text-center'><strong>Danger!</strong> Invalid admin Registeration.</div>";
                echo "<script>
            setTimeout(function(){
               window.location.href = window.location.href
            }, 1000);
            </script>";
            }
        }
    }
    public function showUsers()
    {
        return $this->fetchAll('users');
    }
    public function userEdit($table)
    {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $user = $this->fetchWhereAnd("users", "id = $id");
            $user_result = mysqli_fetch_array($user);
            echo $user_result["$table"];

        }
    }
    public function checkUsers($username)
    {
        return $this->fetchWhereAnd("users", "username = $username");
        
    }

   
    public function userUpdate()
        {
            if (isset($_POST["edit"])) {
                $id = mysqli_escape_string($this->connect(), $_POST["id"]);
                $firstname = mysqli_escape_string($this->connect(), $_POST["firstname"]);
                $lastname = mysqli_escape_string($this->connect(), $_POST["lastname"]);
                $username = mysqli_escape_string($this->connect(), $_POST["username"]);
                $password = md5(mysqli_escape_string($this->connect(), $_POST["password"]));
                $role = mysqli_escape_string($this->connect(), $_POST["role"]);
                $status = mysqli_escape_string($this->connect(), $_POST["status"]);

                if (!empty($_POST["password"]) and !empty($_FILES["passport"])) {
                    $password = md5(mysqli_escape_string($this->connect(), $_POST["password"]));
                    $passport_tmp_name = $_FILES["passport"]["tmp_name"];
                    $passport_name = $_FILES["passport"]["name"];
                    $file_path = "../assets/passport/" . $passport_name;
                    move_uploaded_file($passport_tmp_name, $file_path);
                    $this->updates(
                        "users",
                        U::col("firstname = $firstname", "lastname= $lastname","username= $username","password = $password","passport = $file_path","role = $role","status = $status"),
                        U::where("id = $id")
                    );
                    echo "<script>
                document.getElementById('update').style.display='block';
                setTimeout(function(){
                    window.location = 'manage_user.php'
                 }, 300);
                </script>";
                } elseif (!empty($_POST["password"])) {
                    $password = md5(mysqli_escape_string($this->connect(), $_POST["password"]));
                    $this->updates(
                        "users",
                        U::col("firstname = $firstname", "lastname= $lastname","username= $username","password = $password","role = $role","status = $status"),
                        U::where("id = $id")
                    );
                    echo "<script>
                document.getElementById('update').style.display='block';
                setTimeout(function(){
                    window.location = 'manage_user.php'
                 }, 300);
                </script>";
                } elseif (!empty($_FILES["passport"])) {
                    $passport_tmp_name = $_FILES["passport"]["tmp_name"];
                    $passport_name = $_FILES["passport"]["name"];
                    $file_path = "../assets/passport/" . $passport_name;
                    move_uploaded_file($passport_tmp_name, $file_path);
                    $this->updates(
                        "users",
                        U::col("firstname = $firstname", "lastname= $lastname","username= $username","passport = $file_path","role = $role","status = $status"),
                        U::where("id = $id")
                    );
                    echo "<script>
                document.getElementById('update').style.display='block';
                setTimeout(function(){
                    window.location = 'manage_user.php'
                 }, 300);
                </script>";
                } else {
                    $this->updates(
                        "users",
                        U::col("firstname = $firstname", "lastname= $lastname","username= $username","role = $role","status = $status"),
                        U::where("id = $id")
                    );
                    echo "<script>
                document.getElementById('update').style.display='block';
                setTimeout(function(){
                    window.location = 'manage_user.php'
                 }, 300);
                </script>";
                }
            }
        }
        
    
    
}
