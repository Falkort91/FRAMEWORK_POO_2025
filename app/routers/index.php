<?php

// ROUTE PAR DEFAULT
//PATERN: /
//CONTROLLER: pagesController
//ACTION: home
include_once '../app/controllers/pagesController.php';
\App\Controllers\PagesController\homeAction($conn);
