<?php
class UserModel extends Model
{
    public function register() {
        // Sanitize user
        $user = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Encrypt Password
        $password = md5($user['user_password']);

        if ($user['submit']) {

            // Insert into MySQL
            $this->query("INSERT INTO users (username, user_email, user_password) VALUES (:username, :user_email, :user_password) ");

            // Data Binding
            $this->bind(':username', $user['username']);
            $this->bind(':user_email', $user['user_email']);
            $this->bind(':user_password', $password);

            // Execute
            $this->execute();

            // Verify
            if ($this->lastInsertId()) {
                // Redirect
                header('Location: ' . ROOT_URL . 'users/login');
            }
        }

        return;
    }

}