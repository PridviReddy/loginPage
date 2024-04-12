 <?php
// $username = $_POST['username']
// $email = $_POST['email']
// $password = $_POST['password']
// $c_password = $_POST['password']


// database connection
// $conn = new mysqli('localhost','root','test');
// if($conn->connect_error){
//     die('connection failed': '.$conn->connect_error')
// }
// else{
//     $stmt = $conn->prepare("insert into registeration(username,email,password,c_password)values(?, ?, ?, ?)");
//     $stmt->bind_param("ssss",$username,$email,$password,$c_password);
//     $execval = $stmt->execute();
//     echo "registeration succesfull";
//     $stmt->close();
//     $conn->close();
// }


$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$c_password = $_POST['password'];

// database connection
$conn = new mysqli('localhost', 'root', 'test');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO registration (username, email, password, c_password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $email, $password, $c_password);
    $execval = $stmt->execute();
    
    if ($execval === TRUE) {
        echo "Registration successful";
    } else {
        echo "Error during registration: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

