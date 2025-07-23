<?php
session_start(); // Required to use $_SESSION['user_id']
include 'db.php'; // Make sure this connects to your MySQL database

$prompt = $_POST['prompt'];
$apiKey = "xxxxxxxx";  // Replace with your real key

$url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=" . $apiKey;

$data = [
    "contents" => [
        [
            "parts" => [
                ["text" => $prompt]
            ]
        ]
    ]
];

$options = [
    "http" => [
        "header" => "Content-Type: application/json",
        "method" => "POST",
        "content" => json_encode($data),
    ]
];

$context = stream_context_create($options);
$response = file_get_contents($url, false, $context);

if ($response === FALSE) {
    die("Error calling Gemini API");
}

$json = json_decode($response, true);
$output = $json['candidates'][0]['content']['parts'][0]['text'];

// ✅ Insert prompt and response into database
$user_id = $_SESSION['user_id'] ?? 0; // Use session user ID, or 0 if not logged in

// Update table name to 'user_conversations'
$sql = "INSERT INTO user_conversations (user_id, prompt, response) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iss", $user_id, $prompt, $output); // Binding user_id, prompt, and output (response) to the query
$stmt->execute();

// Redirect back to the chat page with the generated response
header("Location: chat.php?response=" . urlencode($output));
exit;
?>
