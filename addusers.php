<?php
    include_once('connection.php');
    array_map("htmlspecialchars", $_POST);
    switch($_POST["role"]){
        case "Pupil":
            $role=0;
            break;
            case "Teacher":
            $role=1;
            break;
        case "Admin":
            $role=2;
            break;
    }

    $stmt = $conn->prepare("INSERT INTO tblusers (UserID,Gender,Surname,Forename,Password,House,Year,Role)VALUES (NULL,:gender,:surname,:forename,:password,:house,:year,:role)");
    $stmt->bindParam(':forename', $_POST["forename"]);
    $stmt->bindParam(':surname', $_POST["surname"]);
    $stmt->bindParam(':house', $_POST["house"]);
    $stmt->bindParam(':year', $_POST["year"]);
    $stmt->bindParam(':password', $_POST["passwd"]);
    $stmt->bindParam(':gender', $_POST["gender"]);
    $stmt->bindParam(':role', $role);
    $stmt->execute();
    $conn=null;

?>