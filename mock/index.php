<?php
header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        handleGetRequest();
        break;
    case 'POST':
        handlePostRequest();
        break;
    default:
        echo json_encode(['message' => 'Method not supported']);
        break;
}

function handleGetRequest() {
    $data = [
        'id' => 1,
        'title' => 'Sample Blog Post',
        'content' => 'mockから取得したコンテンツです。'
    ];
    echo json_encode($data);
}

function handlePostRequest() {
    $input = json_decode(file_get_contents('php://input'), true);
    if (isset($input['title']) && isset($input['content'])) {
        $data = [
            'id' => rand(2, 1000),
            'title' => $input['title'],
            'content' => $input['content']
        ];
        echo json_encode($data);
    } else {
        echo json_encode(['message' => 'Invalid input']);
    }
}
?>
