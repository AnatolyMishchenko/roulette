<?php

class View
{
    public function generate($contentView, $data = null)
    {
        require_once "app/views/" . $contentView;
    }
}