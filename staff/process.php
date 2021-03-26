<?php


// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "slotify";

$servername = "us-cdbr-east-03.cleardb.com";
$username = "b86ee8b785f9c5";
$password = "bc878095";
$dbname = "heroku_053062795ec22b7";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//select songs
$sql_1 = "SELECT songs.id,songs.artist,songs.title,songs.duration,artists.id,artists.name FROM songs INNER JOIN artists ON songs.artist = artists.id;";
$result1 = $conn->query($sql_1);

//select users
$sql_2 = "SELECT * FROM users;";
$result2 = $conn->query($sql_2);

//select music count
$sql_3 = "SELECT COUNT(id) AS id FROM songs;";
$result3 = $conn->query($sql_3);

//select artists
$sql_4 = "SELECT COUNT(id) AS id FROM artists;";
$result4 = $conn->query($sql_4);

//select albums
$sql_5 = "SELECT COUNT(id) AS id FROM albums;";
$result5 = $conn->query($sql_5);

//select playlists
$sql_6 = "SELECT COUNT(id) AS id FROM playlists;";
$result6 = $conn->query($sql_6);

//-------------------------------------------------------------------------------------//

// UPLOAD //

// LOOP Affiliate artist
$sql_7 = "SELECT * FROM artists;";
$result7 = $conn->query($sql_7);

$sql_8 = "SELECT * FROM artists;";
$result8 = $conn->query($sql_8);

if(isset($_POST['artist_upload'])) {
  $artist_name = $_POST['artist_name'];
  $affiliate = $_POST['affiliate'];

  $sql = "INSERT INTO artists VALUES ('','$artist_name','$affiliate') ; " ;
  if ($conn->query($sql) === TRUE) {
    header("Location: upload/uploadArtist.php");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

if(isset($_GET['artist_id'])) {
  $artist_id = $_GET['artist_id'];

  $sql = "DELETE FROM artists WHERE id = '$artist_id' ;" ;
  if($conn->query($sql) === TRUE) {
    header("Location: upload/uploadArtist.php");
  }
}

// LOOP album
$sql_9 = "SELECT albums.id,
albums.title,
albums.artist,
albums.genre,
albums.artworkPath,
artists.id AS artistid,
artists.name,
genres.id AS genreid,
genres.name AS genrename
FROM `albums` 
INNER JOIN artists ON albums.artist = artists.id
INNER JOIN genres ON albums.genre = genres.id;";
$result9 = $conn->query($sql_9);

$sql_10 = "SELECT * FROM artists ; ";
$result10 = $conn->query($sql_10);

$sql_11 = "SELECT * FROM genres ; ";
$result11 = $conn->query($sql_11);

// DELETE album
if(isset($_GET['album_id'])) {
  $album_id = $_GET['album_id'];

  $sql = "DELETE FROM albums WHERE id = '$album_id' ;" ;
  if($conn->query($sql) === TRUE) {
    header("Location: upload/uploadAlbum.php");
  }
}

// INSERT album
if(isset($_POST['album_upload'])) {

  $album_name = $_POST['album_name'];
  $artist = $_POST['artist'];
  $genre = $_POST['genre'];
  $album_artwork = "assets/images/artwork/" . basename($_FILES["fileToUpload"]["name"]);

  $sql = "INSERT INTO albums VALUES ('', '$album_name','$artist','$genre','$album_artwork');";


    if ($conn->query($sql) === TRUE) {


      // UPDATE IMAGES
      $target_dir = "../assets/images/artwork/";
      $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      // Check if image file is a actual image or fake image
      if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
      } else {
      echo "File is not an image.";
      $uploadOk = 0;
      }
      }

      // Check if file already exists
      if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
      }

      // Check file size
      if ($_FILES["fileToUpload"]["size"] > 5000000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
      }

      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
      }

      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
      } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
      } else {
      echo "Sorry, there was an error uploading your file.";
      }
      }

    echo '<script>alert("New record created successfully")</script>';
    header("Location: upload/uploadAlbum.php");
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// UPLOAD songs

// LOOP
$sql_12 = "SELECT * FROM artists;";
$result12 = $conn->query($sql_12);

$sql_13 = "SELECT * FROM albums;";
$result13 = $conn->query($sql_13);

// DELETE album
if(isset($_GET['song_id'])) {
  $song_id = $_GET['song_id'];

  $sql = "DELETE FROM songs WHERE id = '$song_id' ;" ;
  if($conn->query($sql) === TRUE) {
    header("Location: upload/uploadSong.php");
  }
}

// INSERT song
if(isset($_POST['song_upload'])) {

  $song_name = $_POST['song_name'];
  $artist = $_POST['artist'];
  $album = $_POST['album'];
  $duration = $_POST['duration'];
  $pathsong = "assets/music/" . basename($_FILES["fileToUpload"]["name"]);

  $sql = "INSERT INTO songs VALUES ('','$song_name','$artist','$album','none','$duration','$pathsong','','0');";

    if ($conn->query($sql) === TRUE) {

      $sql = "SELECT MAX(albumOrder) AS albumOrder FROM songs WHERE album = '$album' ";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      $sum = $row['albumOrder'] + 1;
      $sql1 = "UPDATE songs SET albumOrder = '$sum' WHERE album = '$album' ;";
      if ($conn->query($sql1) === TRUE) {
          // UPDATE IMAGES
          $target_dir = "../assets/music/";
          $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
          $uploadOk = 1;
          $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

          // Check if image file is a actual image or fake image
          if(isset($_POST["submit"])) {
          $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
          if($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
          } else {
          echo "File is not an image.";
          $uploadOk = 0;
          }
          }

          // Check if file already exists
          if (file_exists($target_file)) {
          echo "Sorry, file already exists.";
          $uploadOk = 0;
          }

          // Check file size
          if ($_FILES["fileToUpload"]["size"] > 500000000) {
          echo "Sorry, your file is too large.";
          $uploadOk = 0;
          }

          // Allow certain file formats
          if($imageFileType != "mp3") {
          echo "Sorry, only mp3 files are allowed.";
          $uploadOk = 0;
          }

          // Check if $uploadOk is set to 0 by an error
          if ($uploadOk == 0) {
          echo "Sorry, your file was not uploaded.";
          // if everything is ok, try to upload file
          } else {
          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
          header("Location: upload/uploadSong.php");
          } else {
          echo "Sorry, there was an error uploading your file.";
          }
          }

        // header("Location: upload/uploadSong.php");
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }

      }
}

//select songs
$sql_14 = "SELECT songs.id,
songs.artist,
songs.title,
songs.duration,
songs.albumOrder,
artists.id AS artist_id,
artists.name,
albums.id AS album_id,
albums.title AS album_name
FROM songs 
INNER JOIN artists ON songs.artist = artists.id
INNER JOIN albums ON songs.album = albums.id;";
$result14 = $conn->query($sql_14);


?>
