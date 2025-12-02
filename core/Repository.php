<?php

namespace Core;

use \PDO;


abstract class Repository
{
    protected static $_table;
    protected static $_model;


    public static function findAll(int $limit = 9): array
    {
        static::init();
        $sql = "  SELECT *
            FROM " . static::$_table . "
            ORDER BY created_at DESC
            LIMIT :limit;";
        $rs = DB::getConnection()->prepare($sql);
        $rs->bindValue(':limit', $limit, PDO::PARAM_INT);
        $rs->execute();
        return $rs->fetchAll(PDO::FETCH_CLASS, static::$_model);
    }

    public static function findOneById(int $id): Object
    {
        static::init();
        $sql = "  SELECT *
            FROM " . static::$_table . "
            WHERE id=:id";
        $rs = DB::getConnection()->prepare($sql);
        $rs->bindValue(':id', $id, PDO::PARAM_INT);
        $rs->execute();
        return $rs->fetchObject(static::$_model);
    }

    static function init(){
            // Récupère la partie finale du namespace. (ex: BookRepositry) mais on enlève 'Repository il reste donc Book
            $root_name = basename(str_replace('\\', '/', static::class),'Repository');
            //On met en minuscule pour coller au nom de la table de la DB qui est en minuscule aussi.
            static::$_table = strtolower($root_name);
            //On prend la partie final du $root_name et on rajoute un s
            static::$_model = '\App\Models\\' . basename($root_name, 's');
        }
}
