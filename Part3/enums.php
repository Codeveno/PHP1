<?php

// Enum in PHP is a way to define a set of named constants, typically used for predefined sets of values.
// PHP 8.1 introduced Enums, which can be used as an object-oriented way to represent fixed sets of values.
// There are two types of Enums in PHP: Backed Enums and Pure Enums.

enum Status: string {
    case Pending = 'pending'; // A case 'Pending' with the value 'pending'
    case Approved = 'approved'; // A case 'Approved' with the value 'approved'
    case Rejected = 'rejected'; // A case 'Rejected' with the value 'rejected'

    // A method within the Enum to check if the status is final (not pending)
    public function isFinal(): bool {
        return $this === self::Approved || $this === self::Rejected;
    }
}

function getOrderStatus(Status $status): string {
    // Function that takes an Enum as an argument and returns a message based on the Enum case
    switch ($status) {
        case Status::Pending:
            return "The order is still pending.";
        case Status::Approved:
            return "The order has been approved.";
        case Status::Rejected:
            return "The order has been rejected.";
        default:
            return "Unknown status."; // Default case to handle unexpected values
    }
}

// Example of creating an Enum instance
$orderStatus = Status::Pending; // Assigning 'Pending' to $orderStatus

// Displaying information using the Enum
echo getOrderStatus($orderStatus); // Output: The order is still pending.

echo "<br>";

// Checking if the status is final (approved or rejected)
if ($orderStatus->isFinal()) {
    echo "The status is final.";
} else {
    echo "The status is not final.";
}

// Enum as a return type in a function
function approveOrder(): Status {
    return Status::Approved; // Returns the 'Approved' Enum case
}

$orderStatus = approveOrder();
echo "<br>";
echo getOrderStatus($orderStatus); // Output: The order has been approved.

// Using the Enum's value in other contexts
echo "<br>";
echo "Enum Value: " . $orderStatus->value; // Output: approved (the value associated with 'Approved')

?>
