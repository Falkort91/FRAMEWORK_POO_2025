<?php

    if(isset($_GET['books'])){
include_once '../app/routers/books.php';
    }
    else{
// ROUTE PAR DEFAULT
//PATERN: /
//CONTROLLER: pagesController
//ACTION: home
\App\Controllers\PagesController::homeAction();
    };