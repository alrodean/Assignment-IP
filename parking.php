<?php
 define("STUDENT", 450);
 define("STAFF", 700);
 define("VISITOR", 100);
function Parking(){
    while(true){
        menuHeading(2);
        $userChoice = readline("Enter choice: ");
        switch($userChoice){
            case 1:
                echo "Do something here!\n";
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