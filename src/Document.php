<?php
//----------------------------------------------------------------------------
// Functions for building commonly used HTML elements.
//----------------------------------------------------------------------------

namespace Jaypha\HtmlBuilder;

class Document
{
  public $head; // Head
  public $body; // HtmlElement

  public $printXmlDecl = false;
  public $htmlType = "HTML5"; // Can be HTML4, HTML5, XHTML, Polyglot

  public $language = "en";
 
  public $currentForm;

  public $comment = null;

  //-----------------------------------

  function __construct(string $pageId = null, array $classes = null)
  {
    $this->head = new Head();
    $this->body = new Element("body");
    if ($pageId)
      $this->body->attributes["id"] = $pageId;
    if ($classes)
      $this->body->cssClasses = $classes;
  }

  //-----------------------------------

  function display()
  {
    $this->head->addMetaTag("Content-Type", "text/html; charset=utf8");

    $body = $this->body->__toString();
    $head = $this->head->__toString();

    switch ($this->htmlType)
    {
      case "HTML4":
        echo '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">';
        echo "<html lang='$this->language'>";
        break;
      case "HTML5":
        echo "<!DOCTYPE html>";
        echo "<html lang='$this->language'>";
        break;
      case "XHTML":
        if ($this->printXmlDecl)
          echo "<?xml version='1.0' encoding='utf8' ?>\n";
        echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';
        echo "<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='$this->language' lang='$this->language'>";
        break;
      case "Polyglot":
        echo '<!DOCTYPE html>\n';
        echo "<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='$this->language' lang='$this->language'>";
        break;
    }

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
        return $this->docHead->title;
    }
  }

  function __set($p, $v)
  {
    switch ($p)
    {
      case "title":
        $this->docHead->title = $v;
        break;
    }
  }
}

//----------------------------------------------------------------------------
// Copyright (C) 2017 Jaypha.
// License: BSL-1.0
// Author: Jason den Dulk
//
