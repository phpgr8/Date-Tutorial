$pastTime = '2024-08-16 09:49:33';

// Create DateTime objects
$now = new DateTime();
$past = new DateTime($pastTime);

// Calculate the difference
$diff = $now->diff($past);

// Get the difference in hours (total hours)
$hoursDiff = ($diff->days * 24) + $diff->h;

//echo "Difference in hours: $hoursDiff";
