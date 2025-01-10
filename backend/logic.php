<?php
$conn = new mysqli('localhost', 'root', '', 'dictionary');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $word = $_POST['word'];
    $sql = "SELECT meaning FROM words WHERE word = '$word'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "Meaning: " . $row['meaning'];
    } else {
        echo "Word not found.";
    }
}
?>
<form method="post">
    <input type="text" name="word" placeholder="Enter a word">
    <button type="submit">Search</button>
</form>