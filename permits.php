<?php
    parking();
    while(true){
        $user_choice = readline("Choose an option : ");
        if($user_choice == 1){
            $user_name = readline("Enter your name : ");
            $user_age = readline("Please enter your age : ");
            add_permit($user_name, $user_age, $user_choice);
            parking();
        }

    }
?>