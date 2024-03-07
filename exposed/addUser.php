<?php

function addAccount($database,$user,$first_name,$last_name,$password) {
    $sel = "verif";
    $passwordHash = password_hash($sel.$password,PASSWORD_BCRYPT);
    $tab = [];
    $tab[] = ["user",$user,SQLITE3_TEXT];
    $tab[] = ["first_name",$first_name,SQLITE3_TEXT];
    $tab[] = ["last_name",$last_name,SQLITE3_TEXT];
    $tab[] = ["password",$passwordHash,SQLITE3_TEXT];
    $insert_query = "INSERT INTO user (user,first_name,last_name,password,blocked) VALUES (':user',':first_name',':last_name',':password',0);";
    sql_exec($database,$insert_query,$tab);
}

