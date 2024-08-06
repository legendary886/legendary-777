<?php
$action = $_GET['action'] ?? '';

if ($action == 'get_news') {
    // Call the AI model and get the latest news
    $output = shell_exec('python3 ai_models/model.py');
    echo json_encode(['news' => $output]);
}
?>
