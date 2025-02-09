<?php
require_once "dbconnect.php";
$search = $_GET['search'] ?? null;
$sort = $_GET['sort'] ?? 'id|desc';
if(!empty($sort)){
    $_SESSION['sort'] = $sort ;
}