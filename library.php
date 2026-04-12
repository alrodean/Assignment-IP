<?php
function Library(){
  while(true){
        menuHeading(3);
        $userChoice = readline("Enter choice: ");
        switch($userChoice){
            case 1:
                echo "Do something here!\n";
                break;
            case 2:
                echo "Do something here!\n";
                break;
            case 3:
                echo "Do something here!\n";
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