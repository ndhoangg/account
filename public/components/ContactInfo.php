<?php
$infosets = ["address" => "Địa chỉ"];
foreach (array_keys($infosets) as $key) {
    echo ("<div class='info'><b>$infosets[$key]</b> $user_detail[$key]</div>");
}
