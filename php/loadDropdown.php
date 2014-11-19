<?php 
include_once 'util.php';
dropdown("collections","SELECT count, tag FROM tags ORDER BY count DESC","collections");
?>