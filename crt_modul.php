<?php
include_once "db.php";
?>
<?php
$ime = $_POST['imemod'];
$opis = $_POST['opis'];


$query = "INSERT INTO moduli (Ime,opis) 
VALUES ('$ime','$opis')";
if (mysqli_query($db, $query)) {
    echo "New record created successfully";
    sleep(5);
    header("Location: ./moduli.php");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($db);
}


?>
<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image

if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
    header("Refresh: 1.85;  ./naloge.php");
} 
if ($_FILES["fileToUpload"]["size"] > 50000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
    header("Refresh: 1.85; naloge.php");
}
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        header("Refresh: 1.85;  naloge.php");
    } else {
        echo "Sorry, there was an error uploading your file.";
        header("Refresh: 1.85;  ./naloge.php");
    }
}
?>
