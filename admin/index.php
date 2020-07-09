<?php
include_once('includes/connection.php');
include_once('includes/article.php');
$article = new article;
$articles =$article->fetch_all();

echo md5('password');
?>