<?php

namespace App\Models;

class Book
{
    //id, isbn, cover, title, resume, author_id, category_id, created_at.
    public $id, $isbn, $cover, $title, $resume, $author_id, $category_id, $created_at;

    //Liaisons
    private $author, $category;
    //PERMET DE NE LANCER LE SETAUTHOR QUE LORSQU'ON ESSAYE D'ACCEDER A $AUTHOR (qui doit être en private, n'existe pas ou protected) pour ne lancer la fonction que lors de cette condition et pas tout le temps.
    public function __get(string $prop): mixed
    {
        $setterName = "set" . ucfirst($prop);
        //1. Si la méthode exitse je la lance
        if (method_exists($this, $setterName)):
            $this->$setterName();
            //2. Je retourne l'objet
            return $this->$prop;
        endif;
        return true;
    }

    public function setAuthor()
    {
        if ($this->author == NULL):
            $this->author = AuthorsRepository::findOneById($this->author_id);
        endif;
    }
    public function setCategory()
    {
        if ($this->category == NULL):
            $this->category = CategoriesRepository::findOneById($this->category_id);
        endif;
    }
}
