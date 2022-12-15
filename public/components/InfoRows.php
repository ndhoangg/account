<?php


echo ("<div class='title'>" . $user_detail['last_name'] . ' ' . $user_detail['first_name'] . "</div>");
echo ("<div class='subtitle'>" . $user_detail['job_title'] . "</div>");
$infosets = ["email" => "Địa chỉ email", "phone_number" => "Số điện thoại", "managers" => "Quản lý"];
foreach (array_keys($infosets) as $key) {
    echo ("<div class='info'><b>$infosets[$key]</b> $user_detail[$key]");
    if ($key == "managers") {
        // echo ("<div class='managers-list'>");
        foreach ($managers as $manager) {
            echo "<span>".$manager['name']."</span>";
        }
        // echo "</div>";
    }
    echo "</div>";
}
