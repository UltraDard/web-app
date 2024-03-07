<meta charset="utf-8">
<link rel="stylesheet" href="mini-default.css">
<link rel="stylesheet" href="application.css">
<title>Inscription</title>
</head>
<form action="inscription.php" method="post" class="screen-centered">
    <fieldset>
        <legend>Inscription</legend>
        <div>
            <label for="user" class>User</label>
            <input type="text" id="user" name="user" required>
        </div>
        <div>
            <label for="first_name" class>First name</label>
            <input type="text" id="first_name" name="first_name" required>
        </div>
        <div>
            <label for="last_name" class>Last name</label>
            <input type="text" id="last_name" name="last_name" required>
        </div>
        <div>
            <label for="user">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <input type="submit" class="inverse" value="S'inscrire">
        </div>
        </div>
    </fieldset>
</form>

<?php
require_once('../framework.php');



$user = isset($_POST["user"]) ? $_POST["user"] : "";
$first_name = isset($_POST["first_name"]) ? $_POST["first_name"] : "";
$last_name  = isset($_POST["last_name"]) ? $_POST["last_name"] : "";
$password   = isset($_POST["password"]) ? $_POST["password"] : "";

if ($user && $first_name && $last_name && $password) {
    addAccount($database, $user, $first_name, $last_name, $password);
    header("location: ./login.php");
    exit(200);
}else{
}

//http://localhost/addUser.php?user=test&first_name=test&last_name=test&password=test

function addAccount($database, $user, $first_name, $last_name, $password)
{
    $sel = "verif";
    $passwordHash = password_hash($sel . $password, PASSWORD_BCRYPT);
    $tab = [];
    $tab[] = ["user", $user, SQLITE3_TEXT];
    $tab[] = ["first_name", $first_name, SQLITE3_TEXT];
    $tab[] = ["last_name", $last_name, SQLITE3_TEXT];
    $tab[] = ["password", $passwordHash, SQLITE3_TEXT];
    $insert_query = "INSERT INTO user (user,first_name,last_name,password,blocked) VALUES (:user,:first_name,:last_name,:password,0);";
    sql_exec($database, $insert_query, $tab);
}
