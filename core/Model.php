<?php

namespace Core;


abstract class Model
{
    public $id, $created_at;

    //Liaison 1-N

    public function __get(string $prop): mixed
    {
        //1. Si la méthode exitse je la lance
        $this->setField($prop);
        //2. Je retourne l'objet
        return $this->$prop;
    }

    public function setField(string $fieldName)
    {
        $fieldWithY = (str_ends_with($fieldName, 'y')) ? substr($fieldName, 0, -1) . 'ie' : $fieldName;

        $repository = '\App\Models\\' . ucfirst($fieldWithY) . 'sRepository';

        $fk = $fieldName . '_id';

        if ($this->$fieldName == NULL):
            $this->$fieldName = $repository::findOneById($this->$fk);
        endif;
    }
}

