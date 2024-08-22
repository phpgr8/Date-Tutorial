1. Creating a DateTime Object


Current Date and Time
$date = new DateTime(); // Creates a DateTime object with the current date and time
echo $date->format('Y-m-d H:i:s'); // Outputs: 2024-08-21 14:23:34 (for example)


Specific Date and Time
$date = new DateTime('2024-08-15 14:30:00'); // Creates a DateTime object with a specific date and time
echo $date->format('Y-m-d H:i:s'); // Outputs: 2024-08-15 14:30:00


From a Timestamp
$timestamp = 1672531199; // A Unix timestamp
$date = (new DateTime())->setTimestamp($timestamp); // Creates a DateTime object from a timestamp
echo $date->format('Y-m-d H:i:s'); // Outputs: 2023-12-31 23:59:59


Using Timezones
$date = new DateTime('now', new DateTimeZone('Asia/Kolkata')); // Creates a DateTime object with the current date and time in a specific timezone
echo $date->format('Y-m-d H:i:s'); // Outputs the current date and time in the 'Asia/Kolkata' timezone


2. Modifying a DateTime Object
Adding and Subtracting Time
$date = new DateTime('2024-08-15 14:30:00');
$date->modify('+1 day'); // Adds 1 day
$date->modify('-2 hours'); // Subtracts 2 hours
echo $date->format('Y-m-d H:i:s'); // Outputs: 2024-08-16 12:30:00


Setting Specific Date or Time
$date = new DateTime('2024-08-15 14:30:00');
$date->setDate(2025, 12, 25); // Changes the date to 2025-12-25
$date->setTime(18:00:00); // Changes the time to 18:00:00
echo $date->format('Y-m-d H:i:s'); // Outputs: 2025-12-25 18:00:00


Setting a Timestamp
$date = new DateTime();
$date->setTimestamp(1672531199); // Sets the DateTime object to a specific timestamp
echo $date->format('Y-m-d H:i:s'); // Outputs: 2023-12-31 23:59:59


3. Comparing Dates
Comparing Two Dates
$date1 = new DateTime('2024-08-15');
$date2 = new DateTime('2024-08-20');

if ($date1 < $date2) {
    echo 'Date1 is earlier than Date2';
} else {
    echo 'Date1 is not earlier than Date2';
}



Difference Between Dates
$date1 = new DateTime('2024-08-15');
$date2 = new DateTime('2024-08-20');
$interval = $date1->diff($date2);

echo $interval->days; // Outputs: 5 (difference in days)
echo $interval->format('%R%a days'); // Outputs: +5 days (difference in days with a sign)



4. Formatting Dates

Basic Formatting
$date = new DateTime('2024-08-15 14:30:00');
echo $date->format('Y-m-d H:i:s'); // Outputs: 2024-08-15 14:30:00
echo $date->format('l, F j, Y'); // Outputs: Thursday, August 15, 2024


Custom Formatting
$date = new DateTime('2024-08-15 14:30:00');
echo $date->format('d/m/Y H:i A'); // Outputs: 15/08/2024 14:30 PM


5. Time Zones

Getting Timezone Information
$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
echo $date->format('Y-m-d H:i:s T'); // Outputs: 2024-08-21 14:30:00 IST


Changing Timezones
$date = new DateTime('2024-08-15 14:30:00', new DateTimeZone('UTC'));
$date->setTimezone(new DateTimeZone('America/New_York'));
echo $date->format('Y-m-d H:i:s T'); // Outputs: 2024-08-15 10:30:00 EDT



6. Working with DateInterval

Adding and Subtracting Intervals
$date = new DateTime('2024-08-15 14:30:00');
$interval = new DateInterval('P2D'); // Interval of 2 days
$date->add($interval); // Adds 2 days
$date->sub($interval); // Subtracts 2 days
echo $date->format('Y-m-d H:i:s'); // Outputs the modified date


Creating Custom Intervals
$date = new DateTime('2024-08-15 14:30:00');
$interval = new DateInterval('P1Y2M3DT4H5M6S'); // 1 year, 2 months, 3 days, 4 hours, 5 minutes, 6 seconds
$date->add($interval);
echo $date->format('Y-m-d H:i:s'); // Outputs the modified date


7. Working with DatePeriod

Creating a Date Range
$start = new DateTime('2024-08-01');
$end = new DateTime('2024-08-15');
$interval = new DateInterval('P1D'); // 1 day interval

$period = new DatePeriod($start, $interval, $end);

foreach ($period as $date) {
    echo $date->format('Y-m-d') . "\n"; // Outputs each date from 2024-08-01 to 2024-08-14
}



Iterating Over a Specific Number of Occurrences
$start = new DateTime('2024-08-01');
$interval = new DateInterval('P1W'); // 1 week interval
$occurrences = 5;

$period = new DatePeriod($start, $interval, $occurrences);

foreach ($period as $date) {
    echo $date->format('Y-m-d') . "\n"; // Outputs dates with a weekly interval for 5 occurrences
}



8. Common Use Cases

Calculating Age
$birthdate = new DateTime('1990-08-15');
$today = new DateTime('today');

$age = $today->diff($birthdate)->y;

echo "Age: $age years"; // Outputs the age in years



Getting the First and Last Day of the Month
$date = new DateTime('2024-08-15');

$firstDay = $date->modify('first day of this month')->format('Y-m-d');
$lastDay = $date->modify('last day of this month')->format('Y-m-d');

echo "First Day: $firstDay, Last Day: $lastDay"; // Outputs: First Day: 2024-08-01, Last Day: 2024-08-31




9. Handling Edge Cases

Dealing with Leap Years
$date = new DateTime('2024-02-29');
$date->modify('+1 year');
echo $date->format('Y-m-d'); // Outputs: 2025-02-28 (adjusts for non-leap year)



Adjusting for Daylight Saving Time
$date = new DateTime('2024-03-10 02:00:00', new DateTimeZone('America/New_York'));
$date->modify('+1 hour');
echo $date->format('Y-m-d H:i:s T'); // Outputs: 2024-03-10 03:00:00 EDT (skips 2 AM due to DST)

