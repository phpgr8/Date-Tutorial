<?php

// Specify the starting date
$startDate = new DateTime('2024-08-15'); 

// Get the last day of the month for the starting date
$endDate = new DateTime($startDate->format('Y-m-t'));

// Define an array of allowed days (1 = Monday, 2 = Tuesday, ..., 6 = Saturday)
$allowedDays = [1, 2, 3, 4, 5, 6];

// Initialize an array to hold the dates
$dates = [];

// Loop through each day from the start date to the end of the month
while ($startDate <= $endDate) {
    // Check if the day of the week is in the allowedDays array
    if (in_array($startDate->format('w'), $allowedDays)) {
        $dates[] = $startDate->format('Y-m-d');
    }
    
    // Move to the next day
    $startDate->modify('+1 day');
}

// Output the dates
print_r($dates);
?>
