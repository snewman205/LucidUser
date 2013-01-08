<?php

$Template->setTemplate("overall_header.html");

$Template->assign('SITE_NAME', getConfig("siteName"));

$Template->parse('main');
$Template->out('main');

?>