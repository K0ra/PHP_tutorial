<?php
$error = false;
$md5 = false;
$code = "";
if ( isset($_GET['code']) ) {
    $code = $_GET['code'];
    $len = strlen($code);
    if ( $len < 3 && $len > 7 ) {
        $error = "Input must be 3 to 7 characters";
    }
    for ( $i=0; $i<$len; $i++ ) {
        if ($code[$i] < "0" || $code[$i] > "9") {
            $error = "Input must be digit characters";
            break;
        }
    }
    if ( $error === false )
        $md5 = hash('md5', $code);
}
?>
<!DOCTYPE html>
<head><title>Korlan Argynova PIN Code</title></head>
<body>
<h1>MD5 PIN Maker</h1>
<?php
if ( $error !== false ) {
    print '<p style="color:red">';
    print htmlentities($error);
    print "</p>\n";
}

if ( $md5 !== false ) {
    print "<p>MD5 value: ".htmlentities($md5)."</p>";
}
?>
<p>Please enter a four-digit key for encoding.</p>
<form>
<input type="text" name="code" value="<?= htmlentities($code) ?>"/>
<input type="submit" value="Compute MD5 for CODE"/>
</form>
<p><a href="makecode.php">Reset</a></p>
<p><a href="index.php">Back to Cracking</a></p>
</body>
</html>
