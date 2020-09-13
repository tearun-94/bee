<?php
namespace models;

class Tasks extends \App\Model
{
    public $name;
    public $email;
    public $text;
    public $status = 0;
    public $edit = 0;
}