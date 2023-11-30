<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'report-con.php';
    ?>
<div class="container">
   

    <form action="" method="post">
        <div class="seperate1">
    <div class="image-upload">
        <label for="file-upload" class="custom-file-upload">
            Upload Image
        </label>
        <input type="file" id="file-upload" name="image" accept="image/*">
    </div>
    </div>
    <div class="form-fields">
        <div class="stack">
            <div class="field">
                <label for="item-name">Item Name:</label>
                <input type="text" id="item-name" name="item_name" required>
            </div>
            <div class="field">
                <label for="date-time">Date and Time:</label>
                <input type="datetime-local" id="date-time" name="date_time" required>
            </div>
        </div>
        <div class="stack">
            <div class="field">
                <label for="item-description">Item Description:</label>
                <textarea id="item-description" name="item_description" required></textarea>
            </div>
            <div class="field">
                <label for="location">Location:</label>
                <input type="text" id="location" name="location" required>
            </div>
        </div>
        <div class="stack">
            <div class="field">
                <label for="category">Category:</label>
                <input type="text" id="category" name="category" required>
            </div>
            <div class="field">
                <label for="reported-by">Reported By:</label>
                <input type="text" id="reported-by" name="reported_by" required>
            </div>
        </div>


        <div class="buttons">
            <button type="button" class="clear-button" onclick="clearForm()">Clear</button>
            <button type="submit" class="report-button">Report</button>
        </div>
    </div>
</div>

<script>
   function clearForm() {
       document.getElementById("item-name").value = "";
       document.getElementById("item-description").value = "";
       document.getElementById("date-time").value = "";
       document.getElementById("location").value = "";
       document.getElementById("category").value = "";
       document.getElementById("reported-by").value = "";
       document.getElementById("file-upload").value = "";
   }
</script>
</body>
</html>
