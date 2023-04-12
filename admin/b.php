<html>
<head>
</head>
<body>
<?php
    echo $_POST['value'];
?>
<form method="post" action="">
<input type="text" name="value">
<input type="submit">
</form>
<?php
echo "What do you want to input? ";
$input = rtrim(fgets(STDIN));
echo "I got it:\n" . $input;
?>
</body>
</html>