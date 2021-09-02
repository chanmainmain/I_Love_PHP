<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>File : Lab06_1.php</title>
</head>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    setcookie("tfUser",$_POST["tfUser"],time()+120);
    setcookie("tfColor",$_POST["tfColor"],time()+120);
    $username = $_POST["tfUser"];
    $bgcolor = $_POST["tfColor"];
    echo <<<EOF
    I have created a cookie to remember your submitted information<br>
    You are $username and preferred background color is $bgcolor<br>
    Reload this page or visit agin, you will see my welcome message.
    EOF;

}else if(isset($_COOKIE["tfUser"]) && isset($_COOKIE["tfColor"])){
    $username = $_COOKIE["tfUser"];
    $bgcolor = $_COOKIE["tfColor"];
    echo <<<EOF
    <body style="background:$bgcolor;">
        <h1>Welcome back $username</h1>
    </body>
    EOF;
}else{
    echo <<<EOF
    <body>
        <h2>I can tell who you are if you visit this page again within next 2 minutes.</h2>
        <form method="post" action="">
        <p>
            <label>Your name:
            <input type="text" name="tfUser" />
            </label>
        </p>
        <p>
            <label>Preferred color:
            <input type="text" name="tfColor" />
            </label>
        </p>
        <p>
            <input type="submit" value="Write Cookie" />
            <input type="reset" value="Reset" />
        </p>
        </form>
        <br>
    </body>
    EOF;
}

?>
</html>