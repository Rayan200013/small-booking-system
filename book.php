<?php
// Database configuration
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'hoteldb';

// Create database connection
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare SQL statement with parameterized placeholders
$stmt = $conn->prepare("INSERT INTO booking (first_name, last_name, city, country, email, dob, passport, arrival_date, departure_date, room, adults, children, price, card_number, expirydate, csv_number) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");


// Perform database operations here...
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $passport = $_POST['passport'];
    $arrivalDate = $_POST['arrival'];
    $departureDate = $_POST['departure'];
    $room = $_POST['room'];
    $adults = $_POST['adults-select'];
    $children = $_POST['children-select'];
    $price = (float) $_POST['price'];
    $cardNumber = $_POST['card_number'];
    $expiryDate = $_POST['expirydate'];
    $csvNumber = $_POST['csv_number'];
}

// Bind parameters to the placeholders
$stmt->bind_param("ssssssssssiiissi", $firstName, $lastName, $city, $country, $email, $dob, $passport, $arrivalDate, $departureDate, $room, $adults, $children, $price, $cardNumber, $expiryDate, $csvNumber);

// Insert data into the database
if ($stmt->execute()) {
    echo "Data inserted successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Print out the values of the variables to check if they contain the expected values
// echo "First Name: $firstName<br>";
// echo "Last Name: $lastName<br>";
// echo "City: $city<br>";
// echo "Country: $country<br>";
// echo "email: $email<br>";
// echo "Date of Birth: $dob<br>";
// echo "Passport Details: $passport<br>";
// echo "Arrival Date: $arrivalDate<br>";
// echo "Departure Date: $departureDate<br>";
// echo "Room Selected: $room<br>";
// echo "Number of Adults: $adults<br>";
// echo "Number of Children: $children<br>";
// echo "Price: $price<br>";



// Send email to client with guest details
$to = $email;
$subject = 'Your Guest Details';
$message = "Dear $firstName,\n\nThank you for providing your guest details. Here is a summary of your details:\n\nFirst Name: $firstName\nLast Name: $lastName\nCity: $city\nCountry: $country\nEmail: $email\nDate of Birth: $dob\nPassport Details: $passport\nRoom Selected: Room $room\nAdults: $adults\nChildren: $children\nArrival Date: $arrivalDate\nDeparture Date: $departureDate\n\nWe look forward to welcoming you at our hotel.\n\nBest regards,\nThe Hotel Team";
$headers = "From: rayanbouez@gmail.com\r\n" .
         "Reply-To: rayanbouez@gmail.com\r\n" .
         "X-Mailer: PHP/" . phpversion();

if (mail($to, $subject, $message, $headers)) {
    echo 'Email sent successfully.';
} else {
    echo 'Failed to send email.';
}

if (empty($_POST['first_name']) || empty($_POST['last_name'])) {
    echo "Failed to send email. Please enter your first and last name";
} else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    echo "Failed to send email. Please enter a valid email address";
}


// Redirect to new page
header("Location: booked.php?id=$userID");

exit();


// Close connection
$conn->close();
?>
