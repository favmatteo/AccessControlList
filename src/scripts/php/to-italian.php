<?php

$language = "it_IT.utf8";
putenv("LANG=" . $language); 
setlocale(LC_ALL, $language);

$domain = "messages";
bindtextdomain($domain, "locale"); 
bind_textdomain_codeset($domain, 'UTF-8');
textdomain($domain);