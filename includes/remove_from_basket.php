<?php
include_once('db.php');
$category = $_GET['cat_id'];
$id = $_GET['id'];
if (isset($id))
{
    $date = time();
    remove_from_base_product();
    header("location:index.php?view=product&id=$id");
}