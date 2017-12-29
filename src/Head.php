<?php
//----------------------------------------------------------------------------
// HTML 'head' element
//----------------------------------------------------------------------------

namespace Jaypha\HtmlBuilder;


class Head extends \Jaypha\Component
{
  //---------------------------------------------

  public $metaTags = [];
  public $title;
  public $description = null;

  public $scriptFiles = []; // Scripts that are stored in external files.
  public $scriptText = [];
  public $cssFiles = [];    // Stylesheet files.
  public $cssText = [];    // Styles to be printed in the page

  //---------------------------------------------

  function addMetaTag($name, $content, $httpEquiv = null, $charset = null)
  {
    $x = new Element("meta");
    $x->attributes["name"] = $name;
    $x->attributes["content"] = $content;
    if ($httpEquiv)
      $x->attributes["httpEquiv"] = $httpEquiv;
    if ($charset)
      $x->attributes["charset"] = $charset;
    $this->metaTags[] = $x;
    return $x;
  }

  //---------------------------------------------

  function display()
  {
    echo "<head><title>$this->title</title>";

    if ($this->description)
      echo "<meta name='description' content='".htmlspecialchars($this->description),"'/>";

    foreach ($this->metaTags as $m)
      $m->display();

    foreach ($this->cssFiles as $f)
      echo "<link rel='stylesheet' type='text/css' href='$f'/>";

    if (count($this->cssText))
    {
      echo "<style type='text/css'>";
      foreach ($this->cssText as $t)
        echo $t;
      echo "</style>";
    }

    foreach ($this->scriptFiles as $f)
      echo "<script type='text/javascript' src='$f'></script>";

    if (count($this->scriptText))
    {
      echo "<script type='text/javascript'>";
      foreach ($this->scriptText as $t)
        echo $t;
      echo "</script>";
    }

    parent::display();
    echo "</head>";
  }
}

//----------------------------------------------------------------------------
// Copyright (C) 2017 Jaypha.
// License: BSL-1.0
// Author: Jason den Dulk
//
