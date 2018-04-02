<?php
//----------------------------------------------------------------------------
//
//----------------------------------------------------------------------------

require "../vendor/autoload.php";
require "../src/helpers.php";

use \Jaypha\HtmlBuilder;

echo HtmlBuilder\element("script", [ "src" => "xx", "async", "defer" ]);

//----------------------------------------------------------------------------
// Copyright (C) 2018 Jaypha.
// License: BSL-1.0
// Author: Jason den Dulk
//
