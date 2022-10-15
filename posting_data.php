<?php

    $data = $_POST["dataxy"];
    $date = $_POST["date"];
    $facName = $_POST["fac_name"];
    $subName = $_POST["sub_name"];
    $percentage = $_POST["percentage"];

    $total = $_POST["total"];
    $abs = $_POST["abs"];
    $pre = $_POST["pre"];
    $lev = $_POST["lev"];

    $full_date = $date;
    $date = preg_split("/[-]/", $date);

    $command = shell_exec("mkdir attendance_data_pages\\$date[0]\\$date[1]\\$date[2]");

    $file = fopen("attendance_data_pages/$date[0]/$date[1]/$date[2]/index.html", "w");
    $info = "
    <head>
        <title>Date $full_date: CSE 5 Sem</title>
    </head>
    <div class='attendance'>
        <div class='total'>$date[0]/$date[1]/$date[2] : $percentage Attendance</div>
        <div class='pre'>$pre Present</div>
        <div class='aps'>$abs Absent</div>
        <div class='lev'>$lev Leave</div>
    </div>
    ";

    $info_temp = "
    <div class='attendance'>
        <div class='total'>$percentage Attendance</div>
        <div class='pre'>$pre Present</div>
        <div class='aps'>$abs Absent</div>
        <div class='lev'>$lev Leave</div>
    </div>
    ";

    fwrite($file, '<link rel="stylesheet" href="../../../../style.css">' . $info . $data);
    fclose($file);

    $showpages = fopen("attendance_data_pages/index.html", "a");
    fwrite($showpages, "<div class='data_of_card'>$info_temp<div class='date_card'>Date: $date[0]/$date[1]/$date[2]</div><div class='subject'>Subject: $subName</div><div class='faculty'>Faculty: $facName</div><a href='$date[0]/$date[1]/$date[2]'>View</a></div>\n");
    fclose($showpages);

    /*$conn = mysqli_connect("localhost", "root", null, "attendance_5th_year_cse");

    $create_table = "INSERT INTO `attendance_informations`(`date`, `page_path`, `faculty_name`, `subject_name`, `percentage_of_the_day`) VALUES ('$date','attendance_data/$date/', '$facName', '$subName', '$percentage')";

    $dk = mysqli_query($conn, $create_table);

    echo print_r($dk);

    echo '<div class="all_done"><div class="message">Data is Saved and Updated Successfully!!!</div></div>';*/
?>