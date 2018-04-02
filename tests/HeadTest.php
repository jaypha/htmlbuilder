<?php
//----------------------------------------------------------------------------
//
//----------------------------------------------------------------------------

use PHPUnit\Framework\TestCase;
use Jaypha\HtmlBuilder\Head;
use Jaypha\HtmlBuilder\Element;

class HeadTest extends TestCase
{
  //---------------------------------------------

  function testEmpty()
  {
    $x = new Head();
    $this->assertEquals($x, "<head><title></title></head>");
  }

  //---------------------------------------------

  function testTitle()
  {
    $x = new Head();
    $x->title = "A Title";
    $this->assertEquals($x, "<head><title>A Title</title></head>");
  }

  //---------------------------------------------

  function testCss()
  {
    $x = new Head();
    $x->cssFiles[] = "style.css";
    $x->cssFiles[] = [ "href" => "stiff.css", "min" => "max" ];
    $x->cssText[] = ".s { margin: 2px; }";
    $x->cssText[] = ".g { margin: 3px; }";
    $this->assertEquals($x, "<head><title></title><link rel='stylesheet' type='text/css' href='style.css'><link rel='stylesheet' type='text/css' href='stiff.css' min='max'><style type='text/css'>.s { margin: 2px; }.g { margin: 3px; }</style></head>");
  }

  function testScript()
  {
  }

  function testMetaTag()
  {
  }
}

//----------------------------------------------------------------------------
// Copyright (C) 2018 Jaypha.
// License: BSL-1.0
// Author: Jason den Dulk
//
