<?php

include('database_connection.php');

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    $response = ['status' => 400, 'message' => 'bad request'];
    echo json_encode($response);
}

$request = $_POST;

if (!isset($request['action']) || !function_exists($request['action'])) {
    $response = ['status' => 500, 'message' => 'bad request'];
    echo json_encode($response);
} else {
    call_user_func_array($request['action'], array($request['params']));
}

function addCategory($params)
{
    $new_name = $params['new_category_name'];
    if (!$new_name) {
        $response = ['status' => 500, 'message' => 'bad request'];
    } else {
        global $pdo;

        $stmt = $pdo->prepare("INSERT INTO todo_category (category_name)
        VALUES (:category_name)");
        $stmt->bindParam(':category_name', $new_name);

        $stmt->execute();

        $response = ['status' => 200, 'message' => 'Category added!'];

        $pdo = null;
    }
    echo json_encode($response);
}

function getCategories($params)
{
    global $pdo;

    $stmt = $pdo->prepare("SELECT * FROM todo_category");
    $stmt->execute();
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($categories) {
        $response = ['status' => 200, 'categories' => $categories];
    } else {
        $response = ['status' => 200, 'message' => 'No data!'];
    }
    $pdo = null;
    echo json_encode($response);
}

function getToDos($params)
{
    global $pdo;

    $stmt = $pdo->prepare("SELECT td.id, tc.category_name as category_id, td.title, td.status, td.created_at, td.updated_at, td.deleted_at FROM todo td left join todo_category tc on tc.id = td.category_id");
    $stmt->execute();
    $todo = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($todo) {
        $response = ['status' => 200, 'todo' => $todo];
    } else {
        $response = ['status' => 404, 'message' => 'No data!'];
    }
    $pdo = null;
    echo json_encode($response);
}

function editToDo($params)
{
    $todoId = $params['id'];
    $edit_name = $params['edit_todo_name'];
    $edit_category = $params['edit_todo_category'];
    $edit_status = $params['edit_todo_status'];

    if (!$edit_name || !$edit_category || !$edit_status) {
        $response = ['status' => 500, 'message' => 'bad request?'];
    } else {
        global $pdo;

        $stmt = $pdo->prepare("UPDATE todo SET category_id = :category_id, title = :title, status = :status");
        $stmt->bindParam(':category_id', $edit_category);
        $stmt->bindParam(':title', $edit_name);
        $stmt->bindParam(':status', $edit_status);

        $stmt->execute();

        $response = ['status' => 200, 'message' => 'ToDo updated!'];

        $pdo = null;
    }
    echo json_encode($response);
}

function addTodo($params)
{
    $new_name = $params['new_todo_name'];
    $new_category = $params['new_todo_category'];
    $new_status = $params['new_todo_status'];

    if (!$new_name || !$new_category || !$new_status) {
        $response = ['status' => 500, 'message' => 'bad request'];
    } else {
        global $pdo;

        $stmt = $pdo->prepare("INSERT INTO todo (category_id, title, status)
        VALUES (:category_id, :title, :status)");
        $stmt->bindParam(':category_id', $new_category);
        $stmt->bindParam(':title', $new_name);
        $stmt->bindParam(':status', $new_status);

        $stmt->execute();

        $response = ['status' => 200, 'message' => 'Category added!'];

        $pdo = null;
    }
    echo json_encode($response);
}

function deleteToDo($params)
{
    $id = $params['id'];

    if (!$id) {
        $response = ['status' => 500, 'message' => 'bad request'];
    } else {
        global $pdo;

        $stmt = $pdo->prepare("DELETE FROM todo WHERE id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $response = ['status' => 200, 'message' => 'ToDo Deleted!'];

        $pdo = null;
    }
    echo json_encode($response);
}
