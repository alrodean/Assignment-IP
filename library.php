<?php
define("TEXTBOOK_PRICE", 5);
define("JOURNAL_PRICE", 3);
define("REFERENCE_PRICE", 10);

$users =[];

function Library(){
    global $users;
    while(true){
        menuHeading(3);
        $userChoice = readline("Enter choice : ");
        switch($userChoice){
            case 1:
                //Add user
                $idExists = false;
                $UID = readline("Enter your User ID : (U001) ");
                
                if(empty($UID) || $UID[0] != "U" || strlen($UID) != 4){
                        echo "Incorrect User ID format e.g., U001\n";
                        pause();
                        break;
                    }
                foreach($users as $user){
                    if($UID == $user['UID']){
                        $idExists = true;
                        break;
                    }
                }

                if($idExists){
                        echo "User ID already exists. Please try again...\n";
                        pause();
                        break;
                }

                $userName = readline("Enter your name : ");

                $user = [
                    'UID' => $UID,
                    "Name" => $userName,
                    'Books' => [],
                    "Fine" => 0
                ];

                $users[] = $user;

                echo "User added successfully\n";
                pause();
                break;
            case 2:
                //Borrow Book
                $UID = readline("Enter your User ID : ");
                if(handleEmptyInput($UID)){
                    break;
                }

                $idExists = false;
                foreach($users as $user){
                    if($user['UID'] == $UID){
                        $idExists = true;
                        break;
                    }
                }
                if(!$idExists){
                    echo "User ID does not exist...\n";
                    pause();
                    break;
                }

                echo "\n";
                echo "Login Successful..\n";
                echo "\n";

                $bookName = readline("Book Title : ");
                if(empty($bookName)){
                    echo "No input captured...\n";
                    pause();
                    break;
                }                
                
                echo "Category : \n1) TextBook (R5/day)\n2) Journal (R3/Day)\n3) References (R10/Day)\n";

                $category = readline("Choose a category : ");
                if(handleEmptyInput($category) || !is_numeric($category) || $category > 3){
                    echo "Invalid option chosen. Please try again...\n";
                    pause();
                    break;
                }
                $duration = readline("Borrow duration in days (1 - 30");
                if(handleEmptyInput($duration) || !is_numeric($duration) || $duration < 1 || $duration > 31){{
                    echo "Min. Days : 1 | Max. Days : 30. Choose any data intween 1 and 30\n";                                                                                                                    "
                }



                break;
            case 3:
                //Return
                break;
            case 4:
                //Pay Fines
                break;
            case 5:
                //User Summary
                break;
            case 6:
                echo "Module Complete! Press Enter to continue...\n";
                pause();
                return;
            default:
                echo "Invalid option!\n";
                pause();
                break;
        }
    }       
}


?>