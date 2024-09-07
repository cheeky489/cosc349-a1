<!DOCTYPE HTML>
<html lang="en">

<main>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Manage Bookmarks - Backend</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <h1>Manage Your Bookmarks</h1>

        <form action="edit.php" method="post">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required="required" placeholder="Enter the bookmark title" /><br /><br />

            <label for="url">URL:</label>
            <input type="url" id="url" name="url" required="required" placeholder="Enter the bookmark URL" /><br /><br />

            <label for="description">Description:</label>
            <textarea id="description" name="description" required="required" placeholder="Enter a short description"></textarea><br /><br />

            <label for="tags">Tags (comma-separated):</label>
            <input type="text" id="tags" name="tags" placeholder="Enter tags separated by commas" /><br /><br />

            <input type="hidden" name="action" value="insert">
            <input type="submit" value="Add Bookmark" />
        </form>

        <h2>Current Bookmarks</h2>
        <?php
        $serverhost   = '192.168.56.12';
        $dbname   = 'bookmark_tool';
        $username   = 'webuser';
        $password = 'lolpassword';

        // create connection
        $conn = new mysqli($serverhost, $username, $password, $dbname);

        // check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query to fetch bookmarks with associated tags
        $sql = "
    SELECT b.bookmark_id, b.url, b.title, b.description, GROUP_CONCAT(t.tag_name SEPARATOR ', ') AS tags
    FROM bookmarks b
    LEFT JOIN bookmark_tags bt ON b.bookmark_id = bt.bookmark_id
    LEFT JOIN tags t ON bt.tag_id = t.tag_id
    GROUP BY b.bookmark_id
    ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Title</th><th>URL</th><th>Description</th><th>Tags</th><th>Actions</th></tr>";

            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row["title"]) . "</td>";
                echo "<td><a href='" . htmlspecialchars($row["url"]) . "' target='_blank'>" . htmlspecialchars($row["url"]) . "</a></td>";
                echo "<td>" . htmlspecialchars($row["description"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["tags"]) . "</td>";
                echo "<td>
                    <a href='edit.php?edit=" . $row['bookmark_id'] . "'>Edit</a> |
                    <a href='edit.php?delete=" . $row['bookmark_id'] . "' onclick='return confirm(\"Are you sure you want to delete this bookmark?\");'>Delete</a>
                  </td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<p>No bookmarks found.</p>";
        }

        // Close connection
        $conn->close();
        ?>

        <h2><a href="http://127.0.0.1:8080/">Go Back to Main Page</a></h2>
    </body>
</main>

</html>