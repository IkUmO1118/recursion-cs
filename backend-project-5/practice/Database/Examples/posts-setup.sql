CREATE TABLE IF NOT EXISTS posts (
  id INT PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR(50),
  content TEXT,
  created_at DATE,
  updated_at DATE,
  userID INT REFERENCES users(id)
)