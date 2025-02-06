CREATE TABLE IF NOT EXISTS commnets (
  id INT PRIMARY KEY AUTO_INCREMENT,
  commentText VARCHAR(255),
  created_at DATE,
  updated_at DATE,
  userID INT,
  postID INT,
  FOREIGN KEY (userID) REFERENCES users(id),
  FOREIGN KEY (postID) REFERENCES posts(id)
)