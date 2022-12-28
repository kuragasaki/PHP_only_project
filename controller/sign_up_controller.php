<?php
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $mailAddress = $_POST["mailAddress"];
    $gender = $_POST["gender"];

    $password = $_POST["password"];
    $passwordConfirm = $_POST["passwordConfirm"];

    # パスワード判定
    if ($password != $passwordConfirm) {

    }


    # mail address 未登録状態のチェック



    # 画面遷移
    include "../confirm.html";
?>