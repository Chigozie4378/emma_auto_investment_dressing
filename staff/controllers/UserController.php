<?php
class UserController extends Controller
{
    public $nameerr;
    public $addresserr;
    public $phone_noerr;
    public function addUsers() {
        if (isset($_POST["add"])) {
            $name = $_POST["name"] ?? "";
            $address = $_POST["address"] ?? "";
            $phone_no = $_POST["phone_no"] ?? "";
            $has_error = false;
            
            if (empty($name)){
                $this->nameerr = "you must enter a name";
                $has_error = true;
            }
            if (empty($address)){
                $this->addresserr = "you must enter an address";
                $has_error = true;
            }
            if (empty($phone_no)){
                $this->phone_noerr = "you must enter a phone number";
                $has_error = true;
            }
            
            if (!$has_error) {
                // No errors, proceed with insert
                $this->insert('users', $name, $address, $phone_no);
                // Redirect to success page or show success message
            }
        }
    }
    public function showUsers()
    {
        return $this->fetchAll('users');
    }
    public function showUsersDesc()
    {
        return $this->fetchAllDesc('users');
    }
    public function showUsersLike()
    {
        if (isset($_POST["find"])) {
            $search = $_POST["search"];
            return $this->fetchWhereLikeOr("users", "name = $search","address = $search","phone_no = $search");
        }
    }
    public function deleteUsers()
    {
        if (isset($_GET["product_id"])) {
            $product_id = $_GET["product_id"];
            return $this->trashWhere("users", "product_id = $product_id");
        }
    }
    public function editUsers()
    {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            return $this->fetchWhereAnd("users", "id = $id");
        }
    }

    public function updateUsers()
    {
        if (isset($_POST["update"])) {
            $id = $_POST["id"];
            $name = $_POST["name"];
            $address = $_POST["address"];
            $phone_no = $_POST["phone_no"];
            $this->updates(
                "users",
                U::col("name = $name", "address= $address","phone_no= $phone_no"),
                U::where("id = $id")
            );
    
            header("location:test.php");
        }
    }
    
    
}