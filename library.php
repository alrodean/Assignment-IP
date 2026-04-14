<?php

$users =[];
$books = [];
function Library(){
  while(true){
    global $users;
        menuHeading(3);
        $userChoice = readline("Enter choice: ");
        switch($userChoice){
            case 1:
                $idExists = false;
                $UID = readline("Please enter User ID :");
                foreach($users as $_){
                    $idExists = true;
                    break;
                    }
                    if($idExists){
                    echo ("User ID already already exists. Please try again...");
                    pause();
                    break;
                    }
                
                $uName = readline("Please enter name: ");
                $user = ['UID' => $UID, 'Name' => $uName];
                $users[] = $user;
                echo "User added!";
                pause();
                break;
            case 2:

                pause();
                break;
            case 3:
                echo "Do something here!\n";
                pause();
                break;
            case 4:
                echo "Module complete!\n";
                pause();
                return;
            
            default :
                echo "Invalid option\n";
                pause();
    }
    }

}
?>