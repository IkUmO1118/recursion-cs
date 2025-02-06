CREATE TABLE IF NOT EXISTS commnets (
  id INT PRIMARY KEY AUTO_INCREMENT,
  commentText VARCHAR(255),
  created_at DATE,
  updated_at DATE,
  userID INT REFERENCES users(id),
  postID INT REFERENCES posts(id)
)