<?php
spl_autoload_extensions(".php");
spl_autoload_register();
require __DIR__ . '/vendor/autoload.php';

use Database\MySQLWrapper;

$mysqli = new MySQLWrapper();

$studentsData = [
  ['Alice', 20, 'Computer Science'],
  ['Bob', 22, 'Mathematics'],
  ['Charlie', 21, 'Physics'],
  ['David', 23, 'Chemistry'],
  ['Eve', 20, 'Biology'],
  ['Frank', 22, 'History'],
  ['Grace', 21, 'English Literature'],
  ['Hannah', 23, 'Art History'],
  ['Isaac', 20, 'Economics'],
  ['Jack', 24, 'Philosophy']
];
$updates = [
  ['Alice', 'Physics'],
  ['Bob', 'Art History'],
  ['Charlie', 'Philosophy'],
  ['David', 'Economics']
];
$studentsToDelete = ['Alice', 'Bob', 'Charlie'];

// データの挿入
foreach ($studentsData as $student) {
  $insertQuery = "INSERT INTO students (name, age, major) VALUES ('$student[0]', $student[1], '$student[2]')";
  $mysqli->query($insertQuery);
}

// データの更新
foreach ($updates as $update) {
  $updateQuery = "UPDATE students SET major='$update[1]' WHERE name='$update[0]'";
  $mysqli->query($updateQuery);
}

// データの削除
foreach ($studentsToDelete as $studentName) {
  $deleteQuery = "DELETE FROM students WHERE name='$studentName'";
  $mysqli->query($deleteQuery);
}

// データの取得
$selectQuery = "SELECT * FROM students";
$result = $mysqli->query($selectQuery);
while ($row = $result->fetch_assoc()) {
  echo "ID: " . $row['id'] . ", Name: " . $row['name'] . ", Age: " . $row['age'] . ", Major: " . $row['major'] . "\n";
}
