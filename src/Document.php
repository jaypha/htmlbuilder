<?php
//----------------------------------------------------------------------------
// Functions for building commonly used HTML elements.
//----------------------------------------------------------------------------

namespace Jaypha\HtmlBuilder;

class Document
{
  public $head; // Head
  public $body; // HtmlElement

  public $attributes = [];
 
  public $currentForm;

  public $comment = null;

  //-----------------------------------

  function __construct(string $pageId = null, array $classes = null)
  {
    $this->head = new Head();
    $this->body = new Element("body");
    $this->attributes["lang"] = "en";
    if ($pageId)
      $this->body->attributes["id"] = $pageId;
    if ($classes)
      $this->body->cssClasses = $classes;
  }

  //-----------------------------------

  function display()
  {
    // TODO maybe set Content-Type header for "text/html; charset=utf8"
    $body = $this->body->__toString();
    $head = $this->head->__toString();

    echo "<!DOCTYPE html>";
    echo "<html ";
    if (count($this->attributes)) {
      foreach ($this->attributes as $k => $v) {
        echo " $k";
        if ($v !== null)
          echo "='",htmlspecialchars($v, ENT_QUOTES|ENT_HTML5),"'";
      }
    }
    echo ">";

    if ($this->comment)
      echo "<!-- $comment -->";

    echo $head, $body, "</html>";
  }

  //-----------------------------------

  function __toString() {
    ob_start();
    $this->display();
    $content = ob_get_contents();
    ob_end_clean();
    return $content;
  }

  //-----------------------------------

  function __get($p)
  {
    switch ($p)
    {
      case "title":
        return $this->head->title;
      case "language":
        return $this->lang;
        break;
      case "lang":
      case "manifest":
        if (array_key_exists($p, $this->attributes))
          return $this->attributes[$p];
        else
          return null;
    }
  }

  //-----------------------------------

  function __set($p, $v)
  {
    switch ($p)
    {
      case "title":
        $this->head->title = $v;
        break;
      case "language":
        $this->attributes["lang"] = $v;
        break;
      case "lang":
      case "manifest":
        $this->attributes[$p] = $v;
        break;
    }
  }
}

//----------------------------------------------------------------------------
// Copyright (C) 2017 Jaypha.
// License: BSL-1.0
// Author: Jason den Dulk
//
