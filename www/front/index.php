<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>

<head>
    <title>Le Bookmarks</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>My Bookmarks</h1>

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
        echo "<tr><th>Title</th><th>URL</th><th>Description</th><th>Tags</th></tr>";

        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["title"]) . "</td>";
            echo "<td><a href='" . htmlspecialchars($row["url"]) . "' target='_blank'>" . htmlspecialchars($row["url"]) . "</a></td>";
            echo "<td>" . htmlspecialchars($row["description"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["tags"]) . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No bookmarks found.</p>";
    }

    // Close connection
    $conn->close();
    ?>

    <h2><a href="http://127.0.0.1:8081/">Click here to add new information</a></h2>
</body>