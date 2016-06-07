<?php
/**
 * Created by PhpStorm.
 * User: xqq
 * Date: 16-6-7
 * Time: 上午9:37
 */
require_once ("Kijiji.php");
$id = @$_GET['id'];
$c = new Category();
$c->id = $id?$id:2101;
$c->load();

print "<h1>{$c->name}</h1>";

foreach($c->toRoot() as $cc){
    print "<a href=listing.php?id={$cc->id}>{$cc->name}</a>|";
}

foreach($c->children() as $cc){
    print "<a href=listing.php?id={$cc->id}>{$cc->name}</a>|";
}

foreach($c->ads() as $ad){
    print "<li><a href=view.php?id={$ad->id}>{$ad->name}</a>";
}