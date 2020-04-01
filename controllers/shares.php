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
        $viewModel = new ShareModel();
        $this->returnView($viewModel->add(), true);
    }
}