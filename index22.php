<?php
$h = '$2y$10$tK1NGcNsfyQ1c4HYOTS4f.zI1TeYyecmMuFJ2.hAXWEpkalMJGb7.';
if(password_verify("12345",$h)){ echo "match";}
else{ echo " no match";}