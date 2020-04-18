<?php

function checkmail($mail) {
    return executeRequest('SELECT * FROM users WHERE mail = ?', $mail);
}

function checkpassword($password) {
    return executeRequest('SELECT * FROM users WHERE password = ?', $password);
}

function registerUser($) {
    return executeRequest('INSERT INTO users);
}

?>
