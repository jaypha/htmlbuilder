<?php
//----------------------------------------------------------------------------
// Very simple example demonstating the various parts of HTML Builder.
//----------------------------------------------------------------------------

namespace Jaypha\HtmlBuilder;

require "../vendor/autoload.php";

$doc = new Document();

$doc->body->add("<p>Hello</p>");

$doc->head->description = "Hello";
$doc->head->title = "Hi There";
$doc->head->cssText[] = ".p {}";
$doc->head->scriptFiles[] = ["async", "defer", "src"=>"x'x"];
$doc->head->scriptFiles[] = "yy";
$doc->head->cssFiles[] = "cc";
$doc->head->cssFiles[] = ["href"=>"bb", "async"];


$t = new Table();
$t->body[] =  ["a", "b", "c", "d"];
$t->body[] =  ["1", "2", "3", "4"];
$t->head[] =  ["w", "x", "y", "z"];

$doc->body->add($t);

$e = new Element("a");
$e->attributes["title"] = "B&S";
$e->attributes["href"] = "xyz";

$doc->body->add($e);

$doc->display();


//----------------------------------------------------------------------------
// Copyright (C) 2017 Jaypha.
// License: BSL-1.0
// Author: Jason den Dulk
//
