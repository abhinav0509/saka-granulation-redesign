<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "helpmedi_medico_newdb"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize cURL session
$ch = curl_init();

// Set the URL and method (GET)
curl_setopt($ch, CURLOPT_URL, "https://www.medicohelpline.com/app/mmedicoTariffDetails?token=38a28db2b752a13a0341cc02c60a2299");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPGET, true);  // Explicitly using GET method

// Execute the request
$response = curl_exec($ch);

// Check for cURL errors
if(curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
    exit; // Stop execution if there's a cURL error
} else {
    // Decode the JSON response
    $decoded_response = json_decode($response, true);

    // Check if the response is valid JSON
    if ($decoded_response === null) {
        echo 'Failed to decode JSON response';
        exit; // Stop execution if JSON is invalid
    } else {
        // Process the decoded response
        echo "Decoded Response: <pre>" . print_r($decoded_response, true) . "</pre>";

        // Example assuming the decoded response contains an array of tariffs
        if (isset($decoded_response['tariffs']) && is_array($decoded_response['tariffs'])) {
            // Loop through the tariffs and insert each into the database
            foreach ($decoded_response['tariffs'] as $tariff) {
                // Ensure the necessary fields are set before inserting
                $tariff_ladgerid = isset($tariff['ladgerid']) ? $conn->real_escape_string($tariff['ladgerid']) : '';
                $tariff_status = isset($tariff['status']) ? $conn->real_escape_string($tariff['status']) : '';

                // Make sure both values are not empty
                if (!empty($tariff_ladgerid) && !empty($tariff_status)) {
                    // Prepare the INSERT query
                    $sql = "INSERT INTO medico_tariff_details (tariff_ladgerid, tariff_status) 
                            VALUES ('$tariff_ladgerid', '$tariff_status')";
                
                    if ($conn->query($sql) === TRUE) {
                        echo "New record created successfully for tariff: $tariff_ladgerid<br>";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                } else {
                    echo "Missing data for tariff: $tariff_ladgerid or $tariff_status.<br>";
                }
            }
        } else {
            echo 'No tariffs found in the JSON response';
        }
    }
}

// Close the cURL session
curl_close($ch);

// Close the database connection
$conn->close();
?>
