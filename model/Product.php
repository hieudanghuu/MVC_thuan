<?php
namespace Model;

class Product 
{
    public $id;
    public $title;
    public $teaser;
    public $content;
    public $created;

    function __construct($title,$teaser,$content,$created)
    {
        $this->title = $title;
        $this->teaser = $teaser;
        $this->content = $content;
        $this->created = $created; 
    }

};
