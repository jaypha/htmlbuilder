<?php
//----------------------------------------------------------------------------
// Functions for building commonly used HTML elements.
//----------------------------------------------------------------------------

namespace Jaypha\HtmlBuilder;

//-----------------------------------------------------------------------------

function hidden(string $name, $value)
{
  return "<input type='hidden' name='$name' value='".htmlspecialchars($value)."'/>";
}

//-----------------------------------------------------------------------------

function truncated_text(string $text, int $length)
{
  assert($length > 0);
  if (strlen($text) <= $length) return $text;
  else
  {
    return "<span title='$text'>".substr($text,0,$length-2)."..</span>";
  }
}

//-----------------------------------------------------------------------------

function nl2br(string $text)
{
  return str_replace($text, "\n", "<br/>");
}

//-----------------------------------------------------------------------------

function link(string $link, string $label = null, bool $newPage = false)
{
  return "<a href='$link'".($newPage?" target='_blank'":"").">".($label ?? $link)."</a>";
}

//-----------------------------------------------------------------------------

function javascript(string $script)
{
  return "<script type='text/javascript'>$script</script>";
}

//-----------------------------------------------------------------------------

function img(string $src, string $alt, string $cssClass = null, string $id = null)
{
  return "<img src='$src' alt='$alt'".
         ($cssClass ? " class='$cssClass'":"").
         ($id?" id='$id'":"")."/>";
}

//----------------------------------------------------------------------------
// Copyright (C) 2017 Jaypha.
// License: BSL-1.0
// Author: Jason den Dulk
//
