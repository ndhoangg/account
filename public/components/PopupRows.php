<?php

use starter\entities\UserData;
use starter\services\AccountService;

$infosets = [
    "first_name" => "Tên của bạn",
    "last_name" => "Họ của bạn",
    "email" => "Email",
    "username" => "Username",
    "job_title" => "Vị trí công việc",
    "profile_image" => "Ảnh đại diện",
    "birthdate" => "Ngày tháng năm sinh",
    "phone_number" => "Số điện thoại",
    "address" => "Chỗ ở hiện nay"
];
$readonly = ["email", "username", "birthdate", "phone_number"];
echo ("<input type='hidden' id='user_id' name='user_id' value='".$user_detail['id']."'>");
foreach (array_keys($infosets) as $key) {
    if ($key == "profile_image") {
        echo ("<div class='form-row'>" .
            "<div class='label'>" .
            $infosets[$key] .

            "<div class='sublabel'>" .
            $infosets[$key] .
            "</div>" .
            "</div>" .
            "<div class='input data'>" .
            "<input type='file' placeholder='" . $user_detail[$key] . "' name=" . $key
            . " enctype'multipart/form-data'" .
            ">" . "</input>" .
            "</div>" .
            "</div>");
    }
    else if ($key == "birthdate") {
        $years_ops = "";
        for ($i = 1900; $i <= 2022; $i++) {
            $years_ops = $years_ops."<option value='$i'>$i</option>";
        }
        $months_ops = "";
        for ($i = 1; $i <= 12; $i++) {
            $months_ops = $months_ops."<option value='$i'>$i</option>";
        }
        $days_ops = "";
        for ($i = 1; $i <= 31; $i++) {
            $days_ops = $days_ops."<option value='$i'>$i</option>";
        }
        echo ("<div class='form-row'>" .
            "<div class='label'>" .
            $infosets[$key] .

            "<div class='sublabel'>" .
            $infosets[$key] .
            "</div>" .
            "</div>" .
            "<div class='input data'>" .
            // "<input type='file' placeholder='" . $user_detail[$key] . "' name=" . $key
            // . " enctype'multipart/form-data'" .
            // ">" . "</input>" .
            
            
            "<select name='days'>".$days_ops."</select>".
            "<select name='months'>".$months_ops."</select>".
            "<select name='years' class='right'>".$years_ops."</select>".
            "</div>" .
            "</div>");
    }
    else if (in_array($key, $readonly, true)) {
        $at = ($key=="username") ? "@" : "";
        $bold = ($key=="username") ? "bold" : "";
        echo
        "<div class='form-row'>" .
            "<div class='label'>" .
            $infosets[$key] .

            "<div class='sublabel'>" .
            $infosets[$key] .
            "</div>" .
            "</div>" .
            "<div class='input data'>" .
            "<input class='unchangeable ".$bold."' type='text' placeholder='" . $at.$user_detail[$key] . "' name=" . $key .
            " readonly='readonly'>" . "</input>" .
            "</div>" .
            "</div>";
    } else echo ("<div class='form-row'>" .
        "<div class='label'>" .
        $infosets[$key] .

        "<div class='sublabel'>" .
        $infosets[$key] .
        "</div>" .
        "</div>" .
        "<div class='input data'>" .
        "<input type='text' placeholder='" . $infosets[$key] . "' value = '" . $user_detail[$key] . "' name=" . $key .
        ">" . "</input>" .
        "</div>" .
        "</div>"
    );
}
echo ("<div class='form-buttons -two'>
    <div class='button ok -success -rounded bold' onclick='loadingComponentOnClick()'><input name='submit-update' type='submit' value='Cập nhật'></input></div>
    <div class='button cancel -passive-2 -rounded'>Bỏ qua</div>
    </div>");


