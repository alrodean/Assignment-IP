<?php
 define("STUDENT_PERMIT", 450);
 define("STAFF_PERMIT", 750);
 define("VISITOR_PERMIT", 100);
 define("PARKING_LIMIT", 10);
 $permits = [];
function Parking(){
    global $permits;
    while(true){
        menuHeading(2);
        //display how many permits are left
        $remaining = PARKING_LIMIT - count($permits);
        if($remaining < 0){
            $remaining = 0;
        }
        echo "(There are ".$remaining." permits remaining)\n";
        echo "\n";
        $userChoice = readline("Enter choice: ");
        switch($userChoice){
            case 1:
                if($remaining >= PARKING_LIMIT){
                    echo "Parking capacity has been reached. No more permits allowed...";
                    pause();
                    break;
                    }
                subMenus(1);
                //capture permit type
                $userType = readline("Select an option: ");

                //assign values to price based on selection above
                //store associated string to be displayed in array.
                 if($userType == 1){
                        $permitType = "Student";
                        $price = STUDENT_PERMIT;
                    }
                    elseif($userType == 2){
                        $permitType = "Staff";
                        $price = STAFF_PERMIT;
                    }
                    elseif($userType == 3){
                        $permitType = "Visitor";
                        $price = VISITOR_PERMIT;
                    }
                    else{
                        echo "Invalid Permit Type!\n";
                        pause();
                        break;
                    }

                    //create variable to capture the age
                    $userAge = readline("Enter your age: ");

                //check if the input for $userAge is a number or string
                if(!is_numeric($userAge)){
                    echo "Invalid age! Please enter a number...\n";
                        pause();
                        break;
                    }
                    //create a condition that does not allow permits to be issued if they are below 18
                    if($userAge < 18){
                        echo "No permits are allowed for under 18's";
                        pause();
                        break;
                    }

                    //Add information to array
                    $permit = [
                        "Permit Type" => $permitType,
                        "Age" => $userAge,
                        "Price" => $price
                    ];

                    //Add array to another array
                    $permits[] = $permit;
                    echo "\n";
                    echo "Permit Issued! R".$price;
                    echo "\n";
                    pause();
                break;

            case 2:
                foreach($permits as $x){
                echo "\n";
                echo $x['Permit Type'].' | ';
                echo $x['Age'].' | ';
                echo 'R'.$x['Price']."\n";
                echo "====================\n";
                }
                pause();
                break;

            case 3:
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