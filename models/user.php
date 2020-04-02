<?php
class UserModel extends Model
{
    // User Registration Model
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

    // User Login Model
    public function login()
    {
        // Sanitize user
        $user = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Encrypt Password
        $password = md5($user['user_password']);

        if ($user['submit']) {

            // Compare login
            $this->query("SELECT * FROM users WHERE user_email = :user_email AND user_password = :user_password");

            // Data Binding
            $this->bind(':user_email', $user['user_email']);
            $this->bind(':user_password', $password);

            $row = $this->singleRecord();

            if ($row) {
                $_SESSION['is_logged_in'] = true;
                $_SESSION['user_data'] = array(
                    'id' => $row['id'],
                    'username' => $row['username'],
                    'user_email' => $row['user_email']
                );
                header('Location: ' . ROOT_URL . 'shares');
            } else {
                echo 'Incorrect Login';
            }
        }

        return;
    }

}