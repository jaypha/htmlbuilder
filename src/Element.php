<?php
//----------------------------------------------------------------------------
// Component for HTML Elements
//----------------------------------------------------------------------------
// An example of a custom compoent that handles boiler plate internally.
//----------------------------------------------------------------------------

namespace Jaypha\HtmlBuilder;

require "helpers.php";

class Element extends \Jaypha\Component
{
  public $tagName = "div";
  public $cssStyles = [];
  public $attributes = [];
  public $cssClasses = [];

  function __construct(string $tagName = 'div', string $template = null)
  {
    parent::__construct($template);
    $this->tagName = $tagName;
  }

  function display()
  {
    echo "<$this->tagName";
    if (count($this->cssClasses))
      echo " class='",implode(" ",$this->cssClasses),"'";
    if (count($this->attributes))
      foreach ($this->attributes as $k => $v)
        echo " $k='$v'";
    if (count($this->cssStyles))
    {
      echo " style='";
      foreach ($this->cssStyles as $k => $v)
        echo "$k:$v;";
      echo "'";
    }
    if (count($this->__vars) == 0/* && isEmpty($this->tagName) */)
      echo "/>";
    else
    {
      echo ">";
      parent::display();
      echo "</$this->tagName>";
    }
  }
}

//----------------------------------------------------------------------------
// Copyright (C) 2017 Jaypha.
// License: BSL-1.0
// Author: Jason den Dulk
//
