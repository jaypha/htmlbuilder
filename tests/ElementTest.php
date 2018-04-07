<?php
//----------------------------------------------------------------------------
// Unit test for Element
//----------------------------------------------------------------------------

use PHPUnit\Framework\TestCase;
use Jaypha\HtmlBuilder\Element;

class ElementTest extends TestCase
{
  function testConstruct()
  {
    $x = new Element();
    $this->assertEquals($x, "<div></div>");
    $x = new Element("form");
    $this->assertEquals($x, "<form></form>");
    $x = new Element("img");
    $this->assertEquals($x, "<img>");
    $x = new Element("form", __DIR__."/simple.tpl");
    $this->assertEquals($x, "<form>Simple Content\n</form>");
  }

  function testAttributes()
  {
    $x = new Element();
    $x->attributes["dig"] = "mill'bourne";
    $x->attributes["mix"] = true;
    $x->attributes["null"] = null;
    $x->attributes["absent"] = false;
    $x->tagName = "p";
    $x->id = "filly";
    $x->cssClasses[] = "some-class";
    $x->cssClasses[] = "another-class";
    $x->cssStyles["margin"] = "2px";
    $x->cssStyles["padding"] = "3px";
    $this->assertEquals($x, "<p class='some-class another-class' dig='mill&apos;bourne' mix null id='filly' style='margin:2px;padding:3px;'></p>");
    $this->assertEquals($x->id, "filly");
  }
}

//----------------------------------------------------------------------------
// Copyright (C) 2018 Jaypha.
// License: BSL-1.0
// Author: Jason den Dulk
//
