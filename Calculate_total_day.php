$pastTime = '2024-08-16 09:49:33';

// Create DateTime objects
$now = new DateTime();
$past = new DateTime($pastTime);

// Calculate the difference
$diff = $now->diff($past);

// Get the difference in days
$totalDays = $diff->days; // Total full days difference
if ($diff->invert) {
    $totalDays *= -1; // If the past date is in the future, invert the sign
}

echo "Difference in days: $totalDays";
