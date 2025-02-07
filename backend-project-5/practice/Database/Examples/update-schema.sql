-- Userテーブルの変更
ALTER TABLE User
DROP COLUMN email_confirmed_at;

ALTER TABLE User
ADD COLUMN subscription VARCHAR(255),
ADD COLUMN subscription_status VARCHAR(255),
ADD COLUMN subscriptionCreatedAt DATE,
ADD COLUMN subscriptionEndsAt DATE;

-- UserSettingテーブルの追加
CREATE TABLE IF NOT EXISTS userSettings (
    id INT PRIMARY KEY AUTO_INCREMENT,
    userID INT,
    metaKey STRING,
    metaValue STRING,
    FOREIGN KEY (userID) REFERENCES users(userID)
);

-- Categoryテーブルの追加
CREATE TABLE IF NOT EXISTS categories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    categoryName VARCHAR(50)
)

-- Tagテーブルの追加
CREATE TABLE IF NOT EXISTS tags (
    id INT PRIMARY KEY AUTO_INCREMENT,
    tagName VARCHAR(50)
)

-- PostTag（中間テーブル）の追加
CREATE TABLE IF NOT EXISTS postTags (
    postID INT,
    tagID INT,
    FOREIGN KEY (postID) REFERENCES posts(id),
    FOREIGN KEY (tagID) REFERENCES tags(id)
)

-- Postテーブルの変更（CategoryIDを削除）
ALTER TABLE Post
ADD COLUMN categoryID INT,
ADD CONSTRAINT fk_posts_category FOREIGN KEY (categoryID) REFERENCES categories(id)
;

-- CommentLikeの変更（commentIDを削除し、postIDを追加）
ALTER TABLE CommentLike
DROP COLUMN commentID;

ALTER TABLE CommentLike
ADD COLUMN postID INT,
ADD FOREIGN KEY (postID) REFERENCES Post(postID);