<?php
 define("STUDENT_PERMIT", 450);
 define("STAFF_PERMIT", 750);
 define("VISITOR_PERMIT", 100);
 $permits = [];
function Parking(){
    while(true){
        menuHeading(2);
        $userChoice = readline("Enter choice: ");
        switch($userChoice){
            case 1:
                subMenus(1);
                $userType = readline("Select an option: ");
                $userAge = readline("Enter your age: ");

                    if($userAge < 18){
                        echo "No permits are allowed for under 18's";
                        pause();
                        break;
                    }
                    else if($userAge > 17){
                        $permits = [
                            "Permit Type" => $userType,
                            "Age" => $userAge,
                            "Price" => 

                        ]

                        pause();
                        break;
                    }
                    else{
                        echo "Invalid option!";
                        pause();
                        break;
                    }

                break;
            case 2:
                echo "Do something here!\n";
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