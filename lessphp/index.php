<?php

require "lessc.inc.php";
$less = new lessc;
$less->checkedCompile("../frame/stylo.less", "../frame/output.css");

?>