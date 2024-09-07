-- create a table to store bookmarks
CREATE TABLE bookmarks (
    bookmark_id INT AUTO_INCREMENT PRIMARY KEY,
    url VARCHAR(255) NOT NULL,
    title VARCHAR(255),
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- create a table to store tags
CREATE TABLE tags (
    tag_id INT AUTO_INCREMENT PRIMARY KEY,
    tag_name VARCHAR(50) UNIQUE NOT NULL
);

-- create a table to associate bookmarks with tags (many-to-many relationship)
CREATE TABLE bookmark_tags (
    bookmark_id INT,
    tag_id INT,
    PRIMARY KEY (bookmark_id, tag_id),
    FOREIGN KEY (bookmark_id) REFERENCES bookmarks(bookmark_id) ON DELETE CASCADE,
    FOREIGN KEY (tag_id) REFERENCES tags(tag_id) ON DELETE CASCADE
);

-- insert some sample bookmarks
INSERT INTO bookmarks (url, title, description)
VALUES
    ('https://www.example.com', 'Example Website', 'An example website for testing purposes.'),
    ('https://www.github.com', 'GitHub', 'A platform for hosting and collaborating on code.');

-- insert some sample tags
INSERT INTO tags (tag_name)
VALUES
    ('testing'),
    ('development'),
    ('code');

-- associate bookmarks with tags
INSERT INTO bookmark_tags (bookmark_id, tag_id)
VALUES
    (1, 1), -- Example Website -> testing
    (2, 2), -- GitHub -> development
    (2, 3); -- GitHub -> code
