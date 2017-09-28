<?php
session_start();
include("dbFunctions.php");

$description = $_GET['description'];
$status = $_GET['status'];
$actual_start_date = date("Y-m-d");
$actual_end_date = date("Y-m-d");
$id = $_GET['activity_id']; //from the hidden form field 'id'



if($status == "Looking For Buyer"){

$updateQuery = "UPDATE activity SET
		description='$description',
		status='Reserved',
		actual_start_date='$actual_start_date'
                WHERE activity_id= '" . $id . "' ";

$edit = mysqli_query($link, $updateQuery) or die(mysqli_error($link));

    if ($edit) {
        $response["success"] = "1";
    } else {
        $response["success"] = "0";
    }

}

if($status == "Reserved"){
    
    $updateQuery = "UPDATE activity SET
                description='$description',
                status='Payment'
                WHERE activity_id= '" . $id . "' ";

    $edit = mysqli_query($link, $updateQuery) or die(mysqli_error($link));

        if ($edit) {
        $response["success"] = "1";
    } else {
        $response["success"] = "0";
    }
    
    
}


if($status == "Payment"){
    
    $updateQuery = "UPDATE activity SET
                description='$description',
                actual_end_date='$actual_end_date',
                status='Sold'
                WHERE activity_id= '" . $id . "' ";

    $edit = mysqli_query($link, $updateQuery) or die(mysqli_error($link));

        if ($edit) {
        $response["success"] = "1";
    } else {
        $response["success"] = "0";
    }
    
}

    echo json_encode($response);
    
    
    ?>