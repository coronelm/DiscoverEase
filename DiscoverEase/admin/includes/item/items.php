<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Items</title>
    <link rel="stylesheet" href="item_list.css">
</head>
<body>
    <?php include 'item-con.php'; ?>
    <div class="container">
        <?php
            // Fetch items from the database
            $items_query = "SELECT ItemID, Category, DateTime FROM tbitems";
            $result = $conn->query($items_query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="item">';
                    echo '<p><strong>ItemID:</strong> ' . $row['ItemID'] . '</p>';
                    echo '<p><strong>Category:</strong> ' . $row['Category'] . '</p>';
                    echo '<p><strong>Date and Time:</strong> ' . $row['DateTime'] . '</p>';
                    echo '</div>';
                }
            } else {
                echo '<p>No items found.</p>';
            }

            $conn->close();
        ?>
    </div>
</body>
</html>