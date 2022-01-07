<?php
$user = "example_user";
$password = "password";
$database = "example_database";
$table = "todo_list";
$response=array();
try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
//  echo "<h2>TODO</h2><ol>";
header("Content-Type: JSON");
$i=1;
  foreach($db->query("SELECT content FROM $table") as $row) {
$response[$i]['item_id']= $row['item_id'];
$response[$i]['content']= $row['content'];
$i++;
// echo "<li>" . $row['content'] . "</li>";
  }
echo json_encode($response,JSON_PRETTY_PRINT);
 // echo "</ol>";
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>