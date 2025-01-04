<?php
require_once '../config/database.php';
header('Content-Type: application/json');

function validateInput($data) {
    return filter_var($data, FILTER_SANITIZE_STRING);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $data = json_decode(file_get_contents('php://input'), true);
        
        // Use validation function
        $name = validateInput($data['name']);
        $email = filter_var($data['email'], FILTER_SANITIZE_EMAIL);
        $message = validateInput($data['message']);
        
        // Insert into database
        $stmt = $pdo->prepare("INSERT INTO contact_submissions (name, email, message) VALUES (?, ?, ?)");
        $stmt->execute([$name, $email, $message]);
        
        echo json_encode(['success' => true]);
    } catch(Exception $e) {
        http_response_code(500);
        echo json_encode(['error' => $e->getMessage()]);
    }
} 