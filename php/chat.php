<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Chat</title>
</head>
<body>
    <p id="menu">
    <?php include 'menu.php'; ?>
    </p>
    <h1>CHAT</h1>
    
  <div class="formChat">
    <div class="groupChat">
      <input type="checkbox" id="chatOn">
      <label for="chatOn">Chat ON/OFF</label>
    </div>
    <div class="formGroup">
      <textarea class="chatRoom" disabled></textarea>
    </div>
    <form class="formofChat">
      <div class="formGroup">
        <label for="username">Username:</label>
        <input id="username" name="username" type="text" disabled>
      </div>
      <div class="formGroup">
        <label for="message">Message:</label>
        <textarea id="message" name="message" class="chatMessage" disabled></textarea>
      </div>
      <div class="formGroup">
        <button role="submit" class="buttontoSend" disabled>Send</button>
      </div>
    </form>
  </div>

  <script src="./chat.js"></script>
</body>
</html>