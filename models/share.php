<?php
class ShareModel extends Model
{
    public function Index()
    {
        $this->query("SELECT * FROM shares ORDER BY create_date DESC");
        $rows = $this->resultSet();
        return $rows;
    }

    public function add()
    {
        // Sanitize Post
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if ($post['submit']) {

            if ($post['share_title'] == '' || $post['share_body'] == '' || $post['share_link'] == '') {
                Messages::setMessage('Pleae fill in all fields', 'error');
                return;
            }             

            // Insert into MySQL
            $this->query("INSERT INTO shares (title, body, link, user_id) VALUES (:title, :body, :link, :user_id) ");

            // Data Binding
            $this->bind(':title', $post['share_title']);
            $this->bind(':body', $post['share_body']);
            $this->bind(':link', $post['share_link']);
            $this->bind(':user_id', 1);

            // Execute
            $this->execute();

            // Verify
            if ($this->lastInsertId()) {
                // Redirect
                header('Location: ' . ROOT_URL . 'shares');
            }
        }

        return;
    }
}