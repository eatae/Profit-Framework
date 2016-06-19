<?php

namespace App;


class AdminDataTable
{
    public $view;

    public function __construct(array $models, array $functions)
    {
        $this->view = new View();
        $this->view->models = $models;
        $this->view->functions = $functions;
    }

    public function render()
    {
        $this->view->display(__DIR__ . '/../templates/view_fullname_author.php');
    }
}