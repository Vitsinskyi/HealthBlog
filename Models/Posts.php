<?php

namespace Models;

class Posts
{
    public $id;
    public $title;
    public $text;
    public $short_text;
    public $date;
    public $author;
    public $visibility;
    public $topic;
    
    public function __construct($id, $title, $text, $short_text, $date, $author, $visibility, $topic)
    {
        $this->id = $id;
        $this->title = $title;
        $this->text = $text;
        $this->short_text = $short_text;
        $this->date = $date;
        $this->author = $author;
        $this->visibility = $visibility;
        $this->topic = $topic;
    }
}
