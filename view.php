<?php
/**
 * Created by PhpStorm.
 * User: xqq
 * Date: 16-6-7
 * Time: 上午9:37
 */
require_once('Kijiji.php');

$id = @$_GET['id'];
$c = new Ad();
$c->id = $id ? $id : 11652477;
$c->load();

print "<h1>$c->name</h1><p>publisher:<a href=user.php?id={$c->user->id}>{$c->user->load()->name}</a><p>";

foreach ($c->category->load()->toRoot() as $cc) {
    print "<a href=listing.php?id={$cc->id}>{$cc->name}</a>|";
}

print "<p>";

foreach ($c->area->load()->toRoot() as $cc) {
    print "<a href=area.php?id={$cc->id}>{$cc->name}</a>|";
}

print "<p>$c->content<p>";

foreach ($c->comments() as $cc) {
    print "<li><a href=user.php?id={$cc->userId}>{$cc->Nick}</a>:$cc->content<br>";
}