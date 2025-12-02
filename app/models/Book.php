<?php

namespace App\Models;

class Book extends \Core\Model
{
    //id, isbn, cover, title, resume, author_id, category_id, created_at.
    public $isbn, $cover, $title, $resume, $author_id, $category_id;
    
    //Liaison 1-N
    protected $author, $category;
    
    
}
