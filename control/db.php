<?php
class db{
function OpenCon(){
$servername = "localhost";
$username = "root";
$password = "";
$dbName= "wtk";
$conn = mysqli_connect($servername, $username, $password,$dbName) or die("Connect failed: %s\n". $conn -> error);
return $conn;}


// function insertUser($conn,$fname,$lname,$gender,$DOB,$religion, $email, $username, $password ){
//     $result=$conn->query("insert into users(fname,lname, gender, DOB, religion, email, username, password ) values('$fname','$lname','$gender','$DOB','$religion','$email','$username','$password')") or die(mysqli_error($conn));
//         return $result;
//         echo "<h3>Registration Successful!</h3>";
//     }
//     function CloseCon($conn)
//      {
//      $conn -> close();
//      }
//     }
    


function insertUser($conn,$fname,$lname, $gender, $DOB,$religion, $email, $username, $password){
    $stmt=$conn->prepare("insert into users(fname,lname, gender, DOB, religion, email, username, password ) values(?,?,?,?,?,?,?,?)") or die(mysqli_error($conn));
    $stmt->bind_param("ssssssss",$fname,$lname, $gender, $DOB,$religion, $email, $username, $password) or die(mysqli_error($conn));
    $stmt->execute();
    //echo "<h3>Created Successful!</h3>";
    $stmt->close();}

function showall($conn,$table) {
    $result = $conn->query("SELECT * FROM  $table ");
    return $result;
    echo "<h3>Registration information showed.</h3>";} 

     
// function GetUserByUname($conn,$table, $user)
//  {
// $result = $conn->query("SELECT * FROM  $table WHERE id='$user'");
//  return $result;
//  }


 function InputCheckUser($conn,$table,$fname)
 {
$result = $conn->query("SELECT * FROM ". $table." WHERE username='". $fname."'");
if ($conn->query($sql) === TRUE) {
            $result= "Record Updated Successfully!";
        } else {
            $result= "Error Updating Record!" ;
        }
        return $result;
//  return $result;
 }

 function FetchCheckUser($conn,$table)
 {
 $result = $conn->query("SELECT * FROM ". $table);
 return $result;
 }

//  function UpdateUser($conn,$table,$id, $username,$email,$DOB,$password,$address,$gender,$usertype)
//  {
//      $sql = "update registration SET  username='$username',email='$email',DOB='$DOB',password='$password',address='$address',gender='$gender',usertype='$usertype' WHERE id='$id'";

//     if ($conn->query($sql) === TRUE) {
//         $result= "Record Updated Successfully!";
//     } else {
//         $result= "Error Updating Record!" ;
//     }
//     return $result;
//  }


 
function CloseCon($conn)
 {
 $conn -> close();
 }
}
?>