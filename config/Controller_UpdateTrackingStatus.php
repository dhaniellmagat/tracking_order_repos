<?php
session_start();
include 'dbcon.php';

if (isset($_POST['btn_updateStatus'])) {
    $hiddenID = $_POST['hiddenID'];
    $UpdatedStatus = $_POST['UpdatedStatus'];
    $FromPost = $_POST['FromPost'];
    $ToPost = $_POST['ToPost'];
    // , PostLocationID = $FromPost, DestinationPostID =  $ToPost
    $sql_UpdateStatus = "UPDATE tbl_trackinginformation SET TrackingStatusID = $UpdatedStatus, PostLocationID = $FromPost, DestinationPostID =  $ToPost WHERE TrackingID = '$hiddenID'";
    $result = $conn->query($sql_UpdateStatus);
    if ($result === true) {
        $_SESSION['ActivateAlert'] = true;
        $_SESSION['AlertColor'] = "alert-success";
        $_SESSION['AlertMsg'] = "Status updated successfully!";
    } else {
        $_SESSION['ActivateAlert'] = true;
        $_SESSION['AlertColor'] = "alert-danger";
        $_SESSION['AlertMsg'] = "Status update failed";
    }
    header('location: ../track-details.php?id=' . $hiddenID);
    exit();
}

if(isset($_POST['btn_deliver'])){
    $KeyID = $_POST['KeyID'];
    $deliverUpdatedStatus = $_POST['deliverUpdatedStatus'];

    $sql_DeliverUpdateStatus = "UPDATE tbl_trackinginformation SET TrackingStatusID = $deliverUpdatedStatus WHERE TrackingID = '$KeyID'";
    $result = $conn->query($sql_DeliverUpdateStatus);
    if ($result === true) {
        $_SESSION['ActivateAlert'] = true;
        $_SESSION['AlertColor'] = "alert-success";
        $_SESSION['AlertMsg'] = "Status updated successfully!";
    } else {
        $_SESSION['ActivateAlert'] = true;
        $_SESSION['AlertColor'] = "alert-danger";
        $_SESSION['AlertMsg'] = "Status update failed";
    }
    header('location: ../deliver.php');
    exit();
}
