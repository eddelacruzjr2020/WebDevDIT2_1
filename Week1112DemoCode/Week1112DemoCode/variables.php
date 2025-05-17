<?php
    $name = "Ed";
    $age = 25;
    $grade = "5.0";
    $attendance = false;

    echo "Name: $name<br>";
    echo "Age: $age<br>";
    echo ($grade == "5.0") ? "Grade: $grade Bagsak ka!. See you next sem<br>" :"Grade: $grade Congrats sumakses ka!<br>";
    echo "Attendance: ". ($attendance ? "Present": "Absent");

?>