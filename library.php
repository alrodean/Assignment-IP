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
                if(handleEmptyInput($category) || !is_numeric($category) || $category <1 || $category > 3){
                    echo "Invalid option chosen. Please try again...\n";
                    pause();
                    break;
                }
                $duration = readline("Borrow duration in days (1 - 30) : ");

                if(handleEmptyInput($duration) || !is_numeric($duration) || $duration < 1 || $duration > 30){
                    echo "Min. Days : 1 | Max. Days : 30. Choose any data between 1 and 30 : \n";
                    pause();
                    break;
                }
                foreach($users as &$user){
                    if($user['UID'] == $UID){
                        if($category == 1){
                            $catType = "Textbook";
                            $price = TEXTBOOK_PRICE;
                        }
                        elseif($category == 2){
                            $catType = "Journal";
                            $price = JOURNAL_PRICE;
                        }
                        else{
                            $catType = "Reference";
                            $price = REFERENCE_PRICE;
                        }

                        $duration = (int)$duration;

                        $book = [
                            'Borrow ID' => count($user['Books']) + 1,
                            'Book Title' => $bookName,
                            'Category' => $catType,
                            "Allowed Days" => $duration,
                            "Daily Fine" => $price
                        ];

                        $user['Books'][] = $book;
                        break;
                    }
                }

                unset($user);
                echo "Book borrowed successfully!\n";
                pause();
                break;


            case 3:
                //Return
                $UID = readline("Enter your User ID : ");
                if(handleEmptyInput($UID)){
                    break;
                }

                $foundUser = false;
                foreach($users as &$user){
                    if($user['UID'] == $UID){
                        $foundUser = true;
                        break;
                    }
                }

                if(!$foundUser){
                    unset($user);
                    echo "User ID not found...\n";
                    pause();
                    break;
                }

                if(empty($user['Books'])){
                    unset($user);
                    echo "No borrowed books found for this user...\n";
                    pause();
                    break;
                }

                echo "Borrowed Books: \n";
                foreach($user['Books'] as $book){
                    echo "ID: ".$book['Borrow ID']." | ";
                    echo $book['Book Title']." | ";
                    echo $book['Category']." | ";
                    echo $book['Allowed Days']." days\n ";
                }

                $borrowID = readline("Enter Borrow ID to return : ");

                if(handleEmptyInput($borrowID) || !is_numeric($borrowID)){
                    unset($user);
                    echo "Invalid Borrow ID...\n";
                    pause();
                    break;
                }

                $foundBook = false;

                foreach($user['Books'] as $index => $book){
                    if($book['Borrow ID'] == $borrowID){
                        $foundBook = true;
                        break;
                    }
                }

                if(!$foundBook){
                    unset($user);
                    echo "Borrow ID not found...\n";
                    pause();
                    break;
                }

                $actualDays = readline("Enter days kept : ");
                if(handleEmptyInput($actualDays) || !is_numeric($actualDays) || $actualDays < 1){
                    unset($user);
                    echo "Invalid number of days...\n";
                    pause();
                    break;
                }

                $actualDays = (int)$actualDays;
                $allowedDays = $book['Allowed Days'];
                $dailyFine = $book['Daily Fine'];

                if($actualDays > $allowedDays){
                    $lateDays = $actualDays - $allowedDays;
                    $fine = $lateDays * $dailyFine;
                    $user['Fine'] += $fine;

                    echo "Book returned late...\n";
                    echo "Late days ".$lateDays."\n";
                    echo "Fine Charged : R".$fine."\n";
                }
                else{
                    echo " Book returned on time. No fine charged..\n";
                }

                unset($user['Books'][$index]);
                $user['Books'] =  array_values($user['Books']);

                unset($user);

                pause();
                break;
            case 4:
                //Pay Fines
                $UID = readline("Enter your User ID : ");
                if(handleEmptyInput($UID)){
                    break;
                }

                $foundUser = false;

                foreach($users as &$user){
                    if($user['UID'] == $UID){
                        $foundUser = true;
                        break;
                    }
                }

                if(!$foundUser){
                    unset($user);
                    echo "User ID not found...\n";
                    pause();
                    break;
                }

                if($user['Fine'] <= 0){
                    unset($user);
                    echo "This user has no outstanding fine!\n";
                    pause();
                    break;
                }

                echo "Current Fine : R".$user['Fine']."\n";
                $payment = readline("Enter payment amount : ");

                if(handleEmptyInput($payment) || !is_numeric($payment) || $payment <= 0){
                    unset($user);
                    echo "Invalid payment amount...\n";
                    pause();
                    break;
                }

                $payment = (int)$payment;

                if($payment >= $user['Fine']){
                    $change = $payment - $user['Fine'];
                    $user["Fine"] = 0;

                    echo "Fine Fully paid!\n";
                    if ($change > 0){
                        echo "Change : R".$change."\n";
                    }
                }
                else{
                    $user['Fine'] -= $payment;
                    echo "Payment successful!\n";
                    echo "Remaining Fine : R".$user['Fine']."\n";
                }

                unset($user);
                pause();
                break;

            case 5:
                //User Summary
                if(empty($users)){
                    echo "No users found!...\n";
                    pause();
                    break;
                }

                foreach($users as $user){
                    echo "\n=======================\n";
                    echo "User ID : ".$user['UID']."\n";
                    echo "Name : ".$user['Name']."\n";
                    echo "Fine : R".$user['Fine']."\n";

                    if(empty($user['Books'])){
                        echo "No books borrowed...\n";
                    }
                    else{
                        echo "Books : \n";
                        foreach($user['Books'] as $book){
                            echo "ID : ".$book["Borrow ID"]." | ";
                            echo $book["Book Title"]." | ";
                            echo $book["Category"]." | ";
                            echo $book["Allowed Days"]." days | ";
                            echo "Fine : R".$book["Daily Fine"]."/day \n";
                        }
                    }
                }
                 echo "\n=======================\n";
                 pause();
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