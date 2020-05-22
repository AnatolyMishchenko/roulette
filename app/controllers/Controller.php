<?php

class Controller
{

    public $view;
    public $model;

    public function __construct()
    {
        $this->model = new Model();
        $this->view = new View();
    }
}