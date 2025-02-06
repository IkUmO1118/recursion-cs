CREATE TABLE IF NOT EXISTS commentLikes (
  userID INT NOT NULL,
  commentID INT NOT NULL,
  PRIMARY KEY (userID, commentID),
  FOREIGN KEY (userID) REFERENCES users(id),
  FOREIGN KEY (commentID) REFERENCES comments(id)
)