-- Userテーブルの変更
ALTER TABLE User
DROP COLUMN email_confirmed_at;

ALTER TABLE User
ADD COLUMN subscription STRING,
ADD COLUMN subscription_status STRING,
ADD COLUMN subscriptionCreatedAt DATETIME,
ADD COLUMN subscriptionEndsAt DATETIME;

-- UserSettingテーブルの追加
CREATE TABLE UserSetting (
    entryid INT PRIMARY KEY,
    userID INT,
    metaKey STRING,
    metaValue STRING,
    FOREIGN KEY (userID) REFERENCES User(userID)
);

-- Categoryテーブルの削除
DROP TABLE IF EXISTS Category;

-- Tagテーブルの削除
DROP TABLE IF EXISTS Tag;

-- PostTag（中間テーブル）の削除
DROP TABLE IF EXISTS PostTag;

-- Postテーブルの変更（CategoryIDを削除）
ALTER TABLE Post
DROP COLUMN CategoryID;

-- CommentLikeの変更（commentIDを削除し、postIDを追加）
ALTER TABLE CommentLike
DROP COLUMN commentID;

ALTER TABLE CommentLike
ADD COLUMN postID INT,
ADD FOREIGN KEY (postID) REFERENCES Post(postID);