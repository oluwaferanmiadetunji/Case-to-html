<?php
    include_once("config.php");

    if (isset($_POST['submit'])) {
        $case_title = mysqli_real_escape_string($conn, $_POST['case_title']);
        $year = mysqli_real_escape_string($conn, $_POST['year']);
        $suit_number = mysqli_real_escape_string($conn, $_POST['suit_number']);
        $court = mysqli_real_escape_string($conn, $_POST['court']);
        $date = mysqli_real_escape_string($conn, $_POST['date']);
        $judges = mysqli_real_escape_string($conn, $_POST['judges']);
        $appellants = mysqli_real_escape_string($conn, $_POST['appellants']);
        $respondents = mysqli_real_escape_string($conn, $_POST['respondents']);
        $issue = mysqli_real_escape_string($conn, $_POST['issue']);

        if(empty($case_title) || empty($year) || empty($suit_number) || empty($court) || empty($date) || empty($judges) || empty($appellants) ||empty($respondents) || empty($issue)) {
            echo "<script type='text/javascript'>
            alert('One or more fields are missing!');
            window.location= 'index.php';
            </script>";
            exit();
        } else {
            $sql = "INSERT INTO `cases` (`id`, `case_title`, `year`, `suit_number`, `court`, `date`, `judges`, `appellants`, `respondents`, `issue`)
            VALUES (NULL, '$case_title', '$year', '$suit_number', '$court', '$date', '$judges', '$appellants', '$respondents', '$issue');";
            mysqli_query($conn, $sql);
            echo "<script type='text/javascript'>
            alert('Case Added!');
            window.location= 'cases.php';
            </script>";
            exit();
        }
    } else {
        header('Location: index.php');
        exit();
    }
