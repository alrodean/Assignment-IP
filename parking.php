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
                if(count($permits) >= PARKING_LIMIT){
                    echo "Parking capacity has been reached. No more permits allowed...\n";
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
                    $userAge = (int)$userAge;
                    //create a condition that does not allow permits to be issued if they are below 18
                    if($userAge < 18){
                        echo "No permits are allowed for under 18's\n";
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
                    echo "Permit Issued! R".$price."\n";
                    pause();
                break;

            case 2:
                if(empty($permits)){
                    echo "There are currently no permits sold!\n";
                    pause();
                }
                else{
                    foreach($permits as $x){
                    echo "\n";
                    echo $x['Permit Type'].' | ';
                    echo $x['Age'].' | ';
                    echo 'R'.$x['Price']."\n";
                    echo "====================\n";
                    }
                    pause();
                    
                }
                break;

            case 3:
                if(empty($permits)){
                    echo "There are currently no permits sold!\n";
                    pause();
                    break;
                }

                $numOfStudent = 0;
                $numOfStaff = 0;
                $numOfVisitors = 0;
                $revenue = 0;

                foreach($permits as $permit){
                    if($permit['Permit Type'] == "Student"){
                        $numOfStudent++;
                    }
                    elseif($permit['Permit Type'] == "Staff"){
                        $numOfStaff++;
                    }
                    elseif($permit['Permit Type'] == "Visitor"){
                        $numOfVisitors++;
                    }
                    $revenue += $permit['Price'];
                }

                echo "Student Permits : ".$numOfStudent."\n";
                echo "Staff Permits : ".$numOfStaff."\n";
                echo "Visitor Permits : ".$numOfVisitors."\n";
                
                echo "\n";

                echo "Revenue so far with ".count($permits)." permits : R".$revenue;
                echo "\n";
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