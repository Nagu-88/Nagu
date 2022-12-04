<?php
$servername = "165.22.14.77";
$username = "Nagu";
$password = "passwordNagu";
$dbname = "dbNagu";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);
// Check connection


if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "connected";

$type = 0;
if(isset($_POST['type'])){
   $type = $_POST['type'];
}

// Search result
if($type == 1){
    $searchText = mysqli_real_escape_string($con,$_POST['search']);

    $sql = "SELECT ItemId FROM Item where ItemId like '%".$searchText."%' order by ItemId asc limit 5";


    $result = mysqli_query($con,$sql);

    $search_arr = array();

    while($fetch = mysqli_fetch_assoc($result)){
        $id = $fetch['ItemId'];

        $search_arr[] = array("id" => $id);
    }

    echo json_encode($search_arr);
}

// get User data
// if($type == 2){
//     $userid = mysqli_real_escape_string($con,$_POST['userid']);

//     $sql = "SELECT username,email FROM user where id=".$userid;

//     $result = mysqli_query($con,$sql);

//     $return_arr = array();
//     while($fetch = mysqli_fetch_assoc($result)){
//         $username = $fetch['username'];
//         $email = $fetch['email'];

//         $return_arr[] = array("username"=>$username, "email"=> $email);
//     }

//     echo json_encode($return_arr);
// }
?>