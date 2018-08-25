<?php
include_once 'db.php';

function messages_all() {
    $query = db_query("SELECT * FROM messages ORDER BY dt DESC");
    db_check_error($query);
    return $query->fetchAll();
}

function messages_one($id)
{
    $query = db_query("SELECT * FROM messages WHERE id_message=:id", ['id' => $id]);
    db_check_error($query);
    return $query->fetch();
}

function message_insert($user, $message)
{
    $query = db_query("INSERT INTO messages (user, message) VALUES (:user, :message)",
        [
            'user' => $user,
            'message' => $message
        ]);

    $info = db_check_error($query);
    if ($info[0] === PDO::ERR_NONE) {
        return db_connect()->lastInsertId();
    }
}