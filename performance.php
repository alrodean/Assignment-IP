<?php
function Performance(){
    while(true){
        menuHeading(4);
        $userChoice = readline("Enter choice: ");
        switch($userChoice){
            case 1:
                echo "Do something here!\n";
                break;
          
            case 2:
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