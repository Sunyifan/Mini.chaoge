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
$c->id = $id?$id:21;
$c->load();

foreach($c->children() as $cc){
    print "<p><a href='listing.php?id={$cc->id}'>{$cc->name}</a>";
    foreach($cc->children() as $cs){
        print "<li><a href='listing.php?id={$cs->id}'>{$cs->name}</a>";
    }
}