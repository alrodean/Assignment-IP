<?php
include "functions.php"; 
include "parking.php"; 
include "library.php"; 
include "performance.php"; 

menu_heading(1);

while (true) {
    $user_choice = readline("Please enter your choice: ");
    switch ($user_choice) {
        case 1:
            Parking();
            break;
        case 2:
            Library();
            break;
        case 3:
            Performance();
            break;
        case 4:
            echo "Thank you for using Campus Management System. GoodBye!";
            exit();
        default:
            echo "Invalid Entry. Try again!";
    }
}

?>