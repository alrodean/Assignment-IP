<?php

$users =[];
$books = [];
function Library(){
  while(true){
        menuHeading(3);
        $userChoice = readline("Enter choice: ");
        switch($userChoice){
            case 1:
                $userId = readline("Enter ID: ");
                if(in_array($userId['User ID'])){
                    echo "This user ID has already been taken. Try Again...\n";
                    pause();
                }
                $userName = readline("Enter name: ");
                $user = [$userId, $userName];
                $users = $user;
                echo "User added!";
                pause();
                break;
            case 2:
foreach($users as $u){
    echo $u;
}                pause();
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