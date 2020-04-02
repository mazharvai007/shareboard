<?php
class Shares extends Controller
{
    // Make Index Method
    protected function Index()
    {
        $viewModel = new ShareModel();
        $this->returnView($viewModel->Index(), true);
    }

    // Add Method
    protected function add()
    {
        if (!isset($_SESSION['is_logged_in'])) {
            header('Location: ' . ROOT_URL . 'shares');
        }
        $viewModel = new ShareModel();
        $this->returnView($viewModel->add(), true);
    }
}