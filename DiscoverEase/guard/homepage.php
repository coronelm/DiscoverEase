
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylesheet/admin-design.css">
    <link rel="stylesheet" href="stylesheet/layout.css">
    <link rel="stylesheet" href="stylesheet/admin-interface.css">
</head>
<body>
<div class="wrapper">
    <header>
        <img src="header.png" alt="Header Image">
    </header>

<div class="second-container">
<button type="submit" id="signout" class="signout">SIGN OUT</button>
 </div>
 
 <nav id="nav">
    <button id="button1" class="button1" onclick="showIframe(1)">HOME</button>
    <button id="button2" class="button2" onclick="showIframe(2)">REPORT</button>
    <button id="button3" class="button3" onclick="showIframe(3)">ITEMS</button>
</nav>

<div class="main-content">
    <iframe src="includes/home/home.php" title="home" frameborder="0" scrolling="no" id="iframe1"></iframe>
    <iframe src="includes/report/report.php" title="report" frameborder="0" scrolling="no" id="iframe2"></iframe>
    <iframe src="includes/item/items.php" title="items" frameborder="0" scrolling="no" id="iframe3"></iframe>
</div>

<br>
</div>
<script src="javascript/section.js"></script>
<script src="javascript/button1.js"></script>
</body>
</html>