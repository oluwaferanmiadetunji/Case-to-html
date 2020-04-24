<?php
    include_once("config.php");

    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $case_title = mysqli_real_escape_string($conn, $_POST['case_title']);
        $year = mysqli_real_escape_string($conn, $_POST['year']);
        $suit_number = mysqli_real_escape_string($conn, $_POST['suit_number']);
        $date = mysqli_real_escape_string($conn, $_POST['date']);
        $court = mysqli_real_escape_string($conn, $_POST['court']);
        $judges = mysqli_real_escape_string($conn, $_POST['judges']);
        $appellants = mysqli_real_escape_string($conn, $_POST['appellants']);
        $respondents = mysqli_real_escape_string($conn, $_POST['respondents']);
        $issue = mysqli_real_escape_string($conn, $_POST['issue']);

        if(empty($case_title) || empty($year) || empty($suit_number) || empty($court) || empty($date) || empty($judges) || empty($appellants) ||empty($respondents) || empty($issue)) {
            echo "<script type='text/javascript'>
            alert('One or more fields are missing!');
            window.location= 'cases.php';
            </script>";
            exit();
        } else {
            $sql = "UPDATE cases SET case_title='$case_title', year='$year', suit_number='$suit_number', court='$court', date='$date', judges='$judges', appellants='$appellants', respondents='$respondents', issue='$issue' WHERE id='$id';";
            mysqli_query($conn, $sql);
            echo "<script type='text/javascript'>
            alert('Case Updated!');
            window.location= 'cases.php';
            </script>";
            exit();
        }
    } else {
        header('Location: cases.php');
        exit();
    }
?>
