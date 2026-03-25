<?php
    parking();
    while(true){
        $user_choice = readline("Choose an option : ");
        if($user_choice == 1){
            $user_name = readline("Enter your name : \n");
            $user_age = readline("Please enter your age : \n");
            $parking_array[] = ["Name"=> $user_name, "Age"=> $user_age, "Type" => $permit_type, "Price" => $permit_price];
            print_r($parking_array);
            break;
        }

    }
?>