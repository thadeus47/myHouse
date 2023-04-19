<?php
session_start();
$_SESSION['user'] = (isset($_GET['myusers']) === true ) ? (int)$_GET['user'] : 0;
require 'core/classes/Core.php';
require 'core/classes/Chat.php';
$chat = new chat();
print_r($chat->fetchMessages()); 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Chat</title>
	<link rel="stylesheet" type="text/css" href="css/chat_box.css">
</head>
<body>

<div class = "chat">
	<div class ="messages">
	

	</div>
	<textarea class = "entry"  placeholder="Type here and hit Return.Use Shift + Return for a new line"></textarea>
</div>









<script src=" https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="js/chat.js"></script>
</body>
</html>