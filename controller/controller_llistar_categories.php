<?php

include_once __DIR__.'/../model/connectaDB.php';
include_once __DIR__.'/../model/model_categories.php';

$connexio = connectaDB();
$categories = getCategories($connexio); 

include __DIR__.'/../view/llistar_categories.php';
?>