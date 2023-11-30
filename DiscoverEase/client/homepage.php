
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylesheet/design.css">
    <link rel="stylesheet" href="stylesheet/layout.css">
    <link rel="stylesheet" href="stylesheet/interface.css">
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
    <button id="button2" class="button2" onclick="showIframe(2)">ITEMS</button>
    <button id="button3" class="button3" onclick="showIframe(3)">F.A.Q</button>
</nav>

<div class="main-content">
    <iframe src="includes/home/home.php" title="home" frameborder="0" scrolling="no" id="iframe1"></iframe>
    <iframe src="includes/faq/faqs.php" title="FAQ" frameborder="0" scrolling="no" id="iframe3"></iframe>
    <iframe src="includes/item/items.php" title="items" frameborder="0" scrolling="no" id="iframe2"></iframe>
</div>

<br>
</div>
<script src="javascript/section.js"></script>
<script src="javascript/buttons.js"></script>
</body>
</html>