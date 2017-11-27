<?php
//----------------------------------------------------------------------------
// Very simple example demonstating the various parts of HTML Builder.
//----------------------------------------------------------------------------

require "../vendor/autoload.php";

use \Jaypha\HtmlBuilder;

$doc = new HtmlBuilder\Document();

$doc->body->p = "<p>Hello</p>";

$doc->head->description = "Hello";
$doc->head->title = "Hi There";
$doc->head->cssText[] = ".p {}";

$t = new HtmlBuilder\Table();
$t->body[] =  ["a", "b", "c", "d"];
$t->body[] =  ["1", "2", "3", "4"];
$t->head[] =  ["w", "x", "y", "z"];


$doc->body->t = $t;

$doc->display();


//----------------------------------------------------------------------------
// Copyright (C) 2017 Jaypha.
// License: BSL-1.0
// Author: Jason den Dulk
//
