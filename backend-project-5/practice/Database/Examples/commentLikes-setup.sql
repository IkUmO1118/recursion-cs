CREATE TABLE IF NOT EXISTS commentLikes (
  userID IS NOT NULL,
  commentID IS NOT NULL,
  PRIMARY KEY (userID, commentID),
  FOREIGN KEY (userID) REFERENCES users(id),
  FOREIGN KEY (commentID) REFERENCES commnets(id)
)