<!-- <?php
define("STUDENT", 450);
define("STAFF", 700);
define("VISITOR", 100);

$parking_array = [];
function menu_heading($index_choice)
{
    switch ($index_choice) {
        case 1:
            echo "***********************************\n";
            echo "Welcome to Campus Management System\n";
            echo "***********************************\n";
            echo "Please select what you would like to do: ";
            echo "
1) Parking Permit
2) Library and Fines
3) Performance
4) Exit\n";
            break;
        case 2:
            echo ("=========================\n");
            echo ("Parking Permit Module\n");
            echo ("=========================\n");
            echo "
1) Add Permit
2) View Permit
3) Back\n";
                    break;
        case 3:
echo ("=========================\n");
echo ("Library Borrowing & Fines\n");
echo ("=========================\n");
echo "1) Borrow Book\n2) Return Book\n3) Pay Fines\n4) Back\n";
            break;

        case 4:
echo ("=========================\n");
echo ("Performance Module\n");
echo ("=========================\n");
echo "1) Add Student\n2) Back\n";
    }


}



// function parking(){
//     
// }

// function library(){

// }
function add_permit($x, $y, $z)
{
    global $parking_array;
    if ($y < 18)
        $parking_array[] = [
            [
                "Name" => $x,
                "Age" => $y,
                "permit" => $z
            ]
        ];

    print_r($parking_array);
}
?>