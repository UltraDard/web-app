<?php
require_once('../framework.php');
session_destroy_all();

$title = "Reset";

$salt1 = generateSalt();
$salt2 = generateSalt();
$salt3 = generateSalt();
$salt4 = generateSalt();
$salt5 = generateSalt();

sql_exec($database,'DELETE FROM user',[],[]);
$insert_query = "
INSERT INTO user (id,user,first_name,last_name,password,blocked,salt)
VALUES
(1,'kqui','Kevin','QUI','".password_hash($salt1.'manGe',PASSWORD_BCRYPT)."',0,'$salt1'),
(2,'jbon','Jean','BON','".password_hash($salt2.'cUit',PASSWORD_BCRYPT)."',0,'$salt2'),
(3,'echirac','Evelyne','CHIRAC','".password_hash($salt3.'President',PASSWORD_BCRYPT)."',0,'$salt3'),
(4,'mpage','Marc','PAGE','".password_hash($salt4.'livRE',PASSWORD_BCRYPT)."',1,'$salt4'),
(5,'max','Max','Doualle','".password_hash($salt5.'max',PASSWORD_BCRYPT)."',0,'$salt5')
";
sql_exec($database,$insert_query,[],[]);

html_send_page($title,"",FALSE); 


/* require_once('../framework.php');
session_destroy_all();

$title = "Reset";

sql_exec($database,'DELETE FROM user',[]);
$insert_query = "
INSERT INTO user (id,user,first_name,last_name,password,blocked)
VALUES
(1,'max','Max','Doualle','".password_hash('verifmdp1',PASSWORD_BCRYPT)."',0),
(2,'jbon','Jean','BON','".password_hash('verifmdp2',PASSWORD_BCRYPT)."',0),
(3,'echirac','Evelyne','EVE','".password_hash('verifmdp3',PASSWORD_BCRYPT)."',0),
(4,'mpage','Marc','PAGE','".password_hash('verifmdp4',PASSWORD_BCRYPT)."',1)
";

sql_exec($database,$insert_query,[]);

html_send_page($title,"",FALSE); */