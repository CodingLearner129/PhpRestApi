<?php
    header('Content-Type: application/json');
    
    header('Access-Control-Allow-Origin: *');
    
    // header("Access-Control-Allow-Methods: GET");
    
    // header("Allow: GET, POST, OPTIONS, PUT, DELETE");
    
    // header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Access-Control-Allow-Origin");

    // $data = json_decode(file_get_contents("php://input"), true);

    // $search_value = $data["key"];
    $search_value = isset($_GET["key"]) ? $_GET["key"] : die("");

    include "conn.php";
    
    $sql = "SELECT * FROM `student` WHERE `student_name` LIKE '%{$search_value}%'";
    $result = mysqli_query($conn, $sql) or die("SQL Query Failed!");
 
    if (mysqli_num_rows($result) > 0) {
        $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo json_encode($output);
    } else {
        echo json_encode(array("message"=>"No Record Found!", "status"=>false));
    }
    
?>