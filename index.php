<?php
    include "functions.php";
    main_menu();
    $user_choice = readline("Enter your choice : \n");

    while(true){
        if( $user_choice == 1){
            include 'permits.php';
            break;
        }
    }


?>