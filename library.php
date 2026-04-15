<?php
define("TEXTBOOK_PRICE", 5);
define("JOURNAL_PRICE", 3);
define("REFERENCE_PRICE", 10);
$users =[];
$books = [];
function Library(){
  while(true){
    global $users;
    global $books;
        menuHeading(3);
        $userChoice = readline("Enter choice: ");
        switch($userChoice){
            case 1:
                //Checking validation till line 30
                $idExists = false;
                $UID = readline("Please enter User ID :");
                foreach($users as $_){
                    if($_['UID'] == $UID){
                        $idExists = true;
                        break;
                        }
                    }
                if($idExists){
                    echo ("User ID already already exists. Please try again...\n");
                    pause();
                    break;
                    }
                if($UID[0] != "U" || strlen($UID) != 3 || empty($UID)){
                    echo "Incorrect format! (e.g., U01) \n";
                    pause();
                    break;
                }
                $uName = readline("Please enter name: ");
                $user = ['UID' => $UID, 
                'Name' => $uName,
                'Books' => [],
                'Fine' => 0
                ];
                $users[] = $user;
                echo "User added!";
                pause();
                break;
            case 2:
                $_uID = readline("Borrow - User ID : ");
                $found = false;
                foreach($users as &$user){
                    if($user["UID"] == $_uID){
                        $found = true;
                        break;
                    }
                }
                if(!$found){
                    echo "User ID not found! Please try again...\n";
                    pause();
                    break;
                }

                $bookTitle = readline("Enter book name : ");
                echo "Choose Category :\n1) TextBook (R5/day)\n2) Journal (R3/day)\n3)Reference (R10/day)\n";
                $category = readline("Choose category : ");
                if(!is_numeric($category)){
                    echo "Please enter the selected numbers only (1 - 3)\n";
                    pause();
                    break;
                }
                if($category == 1){
                    $catType = "TextBook";
                    $price =  TEXTBOOK_PRICE;
                }
                elseif($category == 2){
                    $catType = "Journal";
                    $price = JOURNAL_PRICE;
                }
                elseif($category == 3){
                    $catType = "Reference";
                    $price =  REFERENCE_PRICE;
                }
                else{
                    echo "Please enter the selected numbers only (1 - 3)\n";
                    pause();
                    break;
                }
                $duration = readline("Borrow duration in days (1-30) : ");
                if(!isset($user["Books"] )){
                    $user["Books"] = [];
                }
                $book = [
                    "Book Title" => $bookTitle,
                    "Category" => $catType,
                    "User ID" => $_uID,
                    "Allowed days" => $duration." days"
                ];

                $user['Books'][] = $book;
                unset($user);
                pause();
                break;
            case 3:
                foreach($users['Books'] as $_i){
                    print_r($_i);
                }
                pause();
                break;
            case 4:
                echo "Do something here!\n";
                pause();
                return;

            case 5:
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