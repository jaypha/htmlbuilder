<?php
//----------------------------------------------------------------------------
// Component for HTML Elements
//----------------------------------------------------------------------------
// An example of a custom compoent that handles boiler plate internally.
//----------------------------------------------------------------------------

namespace Jaypha\HtmlBuilder;

require_once "helpers.php";

class Element extends \Jaypha\Component
{
  const VOID_ELEMENTS = [
    "input",
    "img",
    "br",
    "base",
    "area",
    "command",
    "col",
    "hr",
    "link",
    "keygen",
    "meta"
  ];

  public $tagName = "div";
  public $cssStyles = [];
  public $attributes = [];
  public $cssClasses = [];

  function __construct(string $tagName = 'div', string $template = null)
  {
    parent::__construct($template);
    $this->tagName = $tagName;
  }

  //-----------------------------------

  function display()
  {
    assert(!array_key_exists("style", $this->attributes));
    assert(!array_key_exists("class", $this->attributes));
    echo "<$this->tagName";
    if (count($this->cssClasses))
      echo " class='",implode(" ",$this->cssClasses),"'";
    if (count($this->attributes)) {
      foreach ($this->attributes as $k => $v) {
        echo " $k";
        if ($v !== null)
          echo "='",htmlspecialchars($v, ENT_QUOTES|ENT_HTML5),"'";
      }
    }
    if (count($this->cssStyles)) {
      echo " style='";
      foreach ($this->cssStyles as $k => $v)
        echo "$k:$v;";
      echo "'";
    }
    echo ">";
    if (!in_array($this->tagName, self::VOID_ELEMENTS)) {
      parent::display();
      echo "</$this->tagName>";
    }
  }

  //-----------------------------------

  function __get($p)
  {
    switch ($p) {
      case "id":
        if (array_key_exists($p, $this->attributes))
          return $this->attributes[$p];
        else
          return null;
      default:
        return parent::__get($p);
    }
  }

  //-----------------------------------

  function __set($p, $v)
  {
    switch ($p) {
      case "id":
        $this->attributes[$p] = $v;
        break;
      default:
        parent::__set($p, $v);
    }
  }
}

//----------------------------------------------------------------------------
// Copyright (C) 2017 Jaypha.
// License: BSL-1.0
// Author: Jason den Dulk
//
