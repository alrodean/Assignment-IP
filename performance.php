<?php
$students = [];

function Performance(){
    global $students;
    while (true) {
        menuHeading(4);
        $userChoice = readline("Enter choice: ");
        switch ($userChoice) {
            case 1:
                $studentID = readline("Enter Student ID: ");
                $isExist = false;
                foreach($students as $student){
                    if($student['Student ID'] == $studentID){
                        $isExist = true;
                        break;
                    }
                }
                if($isExist){
                    echo "Student ID already exists...\n";
                    pause();
                    break;
                }
                
                if (empty($studentID) || $studentID[0] != "S" || strlen($studentID) != 4) {
                    echo "Invalid Student ID\n";
                    pause();
                    break;
                }
                $marks = [];
                $total = 0;
                for ($i = 0; $i < 6; $i++) {
                    $examMark = readline("Enter mark : ");
                    if (!is_numeric($examMark) || $examMark < 0 || $examMark > 100) {
                        echo "Marks has to be between 0 - 100..\n";
                        pause();
                        $i--;
                        continue;
                    }
                
                    $examMark = (int) $examMark;
                    $marks[] = $examMark;
                    $total += $examMark;
                }
                    $average = round($total / 6, 2);

                if($average >= 50 && $average < 75){
                    $result = "Pass";
                }
                elseif($average >= 75){
                    $result = "Distinction";
                }
                else{
                    $result = "Fail";
                }
                $student = [
                    "Student ID" => $studentID,
                    "Marks" => $marks,
                    "Average" => $average,
                    "Result" => $result

                ];

                $students[] = $student;
                echo "\n";
                echo "Student ID : $studentID\n";
                echo "Average Score : $average\n";
                echo "Result : $result\n";
                echo "\n";
                pause();
                break;

            case 2:
                if(count($students) < 4){
                    echo "Must be 4 or more students stored first...\n";
                    pause();
                    break;
                }
                $highAve = $students[0]["Average"];
                $lowAve = $students[0]["Average"];
                $topPerformer = $students[0]["Student ID"];
                $totalAverage = 0;
              
                foreach($students as $student){
                    $avg = $student["Average"];
                    $totalAverage += $avg;

                    if($avg > $highAve){
                    $highAve = $avg;
                    $topPerformer = $student['Student ID'];
                    }

                    if($avg < $lowAve){
                    $lowAve = $avg;
                    }
                }
                $classAverage = round($totalAverage / count($students), 2);

                echo "Top Performer : $topPerformer\n";
                echo "Highest Average : $highAve%\n";
                echo "Lowest Average : $lowAve%\n";
                echo "Class Average : $classAverage%\n";

                pause();
                break;
                


            case 3:
                echo "Module complete!\n";
                pause();
                return;

            default:
                echo "Invalid option\n";
                pause();
                }
    }

}
?>