<?php
class NameController extends Controller
{
    public $nameerr;
    public $addresserr;
    public $phone_noerr;
   
    public function store() {
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
    public function check() {
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
                $select = $this->fetchWhereAnd('users', "name = $name", "address = $address");
                if (mysqli_num_rows($select) > 0){
                    new Redirect("name.php");
                }

                // Redirect to success page or show success message
            }
        }
    }
    public function index()
    {
        return $this->fetchAll('users');
    }
    public function showDesc()
    {
        return $this->fetchAllDesc('users');
    }
    public function showLike()
    {
        if (isset($_POST["find"])) {
            $search = $_POST["search"];
            return $this->fetchWhereLikeOr("users", "name = $search","address = $search","phone_no = $search");
        }
    }
    public function showAndDesc(){
        return $this->fetchWhereAndDesc();
    }
    public function delete()
    {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            return $this->trashWhere("users", "id = $id");
        }
    }
    public function edit()
    {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            return $this->fetchWhereAnd("users", "id = $id");
        }
    }

    public function update()
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
    public function sum(){
       return $this->fetchWhereLikeOperation('table_name', 'sum', 'column_name', 'column1=value1', 'column2=value2');

    }
    public function count(){
        return $this->fetchWhereLikeOperation('table_name', 'count', 'column_name', 'column1=value1', 'column2=value2');
 
    }
    
    
}
