<?php
    define("Student", 450);
    define("Staff", 700);
    define("visitor", 100);
    $parking_array = [];    function main_menu(){
        echo("========================================\n");
        echo("Welcome to the Campus Management System\n");
        echo("========================================\n");
        echo "1) Parking Permit\n2) Library Borrowing & Fines Module\n3) Performance Module\n4) Exit\n";
     }

    function parking(){
        echo("=========================\n");
        echo("Parking Permit Module\n");
        echo("=========================\n");
        echo "1) Add Permit\n2) View Permit\n3) Back\n";
    }

    function library(){
        echo("=========================\n");
        echo("Library Borrowing & Fines\n");
        echo("=========================\n");
        echo "1) Borrow Book\n2) Return Book\n3) Pay Fines\n4) Back\n";
    }
    function add_permit($x, $y, $z){
            global $parking_array;
            if($y <18)
           $parking_array[] = [
                ["Name"=> $x, 
                "Age"=> $y, 
                "permit" => $z]
            ];

            print_r($parking_array);
    }
?>