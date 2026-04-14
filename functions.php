<!-- <?php

function menuHeading($index_choice)
{
    switch ($index_choice) {
        case 1:
            echo "\n";
            echo "***********************************\n";
            echo "Welcome to Campus Management System\n";
            echo "***********************************\n";
            echo "\n";
            echo "Please select what you would like to do: ";
            echo "\n1) Parking Permit\n2) Library and Fines\n3) Performance\n4) Exit\n";
            echo "\n";
            break;
        case 2:
            echo "\n";
            echo ("=========================\n");
            echo ("Parking Permit Module\n");
            echo ("=========================\n");
            echo "\n";
            echo "1) Add Permit\n2) View Permit\n3) Summary\n4)Back\n";
            echo "\n";
            break;
        case 3:
            echo "\n";
            echo ("=========================\n");
            echo ("Library Borrowing & Fines\n");
            echo ("=========================\n");
            echo "\n";
            echo "1) Borrow Book\n2) Return Book\n3) Pay Fines\n4) Back\n";
            echo "\n";
            break;

        case 4:
            echo "\n";
            echo ("=========================\n");
            echo ("Performance Module\n");
            echo ("=========================\n");
            echo "\n";
            echo "1) Add Student\n2) Back\n";
            echo "\n";
            break;

        default:
            echo "Oops!! Someone accessed the code and changed the parameters..";
    }


}

function pause(){
  
    echo "\n";
    readline("Press Enter to continue...");
    echo "\n";
}

function subMenus($index){
    switch($index){
        case 1:
            echo "\n";
            echo "What would you like to do?: ";
            echo "\n1)Student\n2)Staff\n3)Visitor\n";
            echo "\n";
            break;

        default:
            echo "Invalid Option!";
            pause();
            break;
    }

}

?>