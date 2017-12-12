<?php
$fname = 'showproduct';
if($lang_product_pagetype==2)$fname='fashion/fashion';
require_once template("modular/showproduct/{$fname}");
?>