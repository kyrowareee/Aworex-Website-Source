<?php

// Replace the database credentials with your own
$host = 'localhost';
$dbname = 'u2408665_tarkovelite';
$username = 'u2408665_mohooks';
$password = 'vO9eZ6kH0rgR4jK4';

// Replace 'your-webhook-url' with the actual Discord webhook URL
$webhookUrl = 'https://discord.com/api/webhooks/1201181981677985814/vmGGhnTn4coF2QcczRaxQ2BPjJrF_5GRP_42RTEGn5qAgcVZ19cOa3Yof0tcBfI6OZp4';

// Replace 'your_table_name' with the name of the table you want to fetch data from
$tableName = 'shops_tokens';

try {
    // Connect to the database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Set error mode to exception for better error handling
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare and execute the query to fetch data from the specified table
    $stmt = $pdo->query("SELECT * FROM $tableName");
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Check if any data was fetched
    if (empty($data)) {
        throw new Exception("No data found in the table");
    }

    // Format the data as text
    $dataText = "";
    foreach ($data as $row) {
        $dataText .= implode(", ", $row) . "\n";
    }

    // Create the payload to send to Discord
    $payload = json_encode([
        'content' => "Data from $tableName:\n" . $dataText
    ]);

    // Send the payload to the Discord webhook
    $options = [
        'http' => [
            'header' => "Content-Type: application/json\r\n",
            'method' => 'POST',
            'content' => $payload,
        ]
    ];
    $context = stream_context_create($options);
    $result = file_get_contents($webhookUrl, false, $context);

    if ($result === false) {
        throw new Exception("Error sending message to Discord webhook");
    }

    echo "Message sent to Discord webhook successfully.";
} catch (PDOException $e) {
    // Handle database errors
    echo "Database Error: " . $e->getMessage();
} catch (Exception $e) {
    // Handle other errors
    echo "Error: " . $e->getMessage();
}

?>




<?php

// Replace the database credentials with your own
$host = 'localhost';
$dbname = 'u2408665_tarkovelite';
$username = 'u2408665_mohooks';
$password = 'vO9eZ6kH0rgR4jK4';

// Replace 'your-webhook-url' with the actual Discord webhook URL
$webhookUrl = 'https://discord.com/api/webhooks/1201181981677985814/vmGGhnTn4coF2QcczRaxQ2BPjJrF_5GRP_42RTEGn5qAgcVZ19cOa3Yof0tcBfI6OZp4';

// Replace 'your_table_name' with the name of the table you want to fetch data from
$tableName = 'shops_tokens';

try {
    // Connect to the database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Set error mode to exception for better error handling
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare and execute the query to fetch data from the specified table
    $stmt = $pdo->query("SELECT * FROM $tableName");
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Check if any data was fetched
    if (empty($data)) {
        throw new Exception("No data found in the table");
    }

    // Format the data as text
    $dataText = "";
    foreach ($data as $row) {
        $dataText .= implode(", ", $row) . "\n";
    }

    // Create the payload to send to Discord
    $payload = json_encode([
        'content' => "Data from $tableName:\n" . $dataText
    ]);

    // Send the payload to the Discord webhook
    $options = [
        'http' => [
            'header' => "Content-Type: application/json\r\n",
            'method' => 'POST',
            'content' => $payload,
        ]
    ];
    $context = stream_context_create($options);
    $result = file_get_contents($webhookUrl, false, $context);

    if ($result === false) {
        throw new Exception("Error sending message to Discord webhook");
    }

    echo "Message sent to Discord webhook successfully.\n";
    echo "Data from $tableName:\n" . $dataText;
} catch (PDOException $e) {
    // Handle database errors
    echo "Database Error: " . $e->getMessage();
} catch (Exception $e) {
    // Handle other errors
    echo "Error: " . $e->getMessage();
}

?>