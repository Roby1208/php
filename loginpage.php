<!DOCTYPE html>
<html lang="en">

<head>
    <title> </title>
</head>

<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "roby";

    $connection = mysqli_connect($servername, $username, $password, $database);

    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if ((isset($_POST["Username"])) && (isset($_POST["Password"]))) {

        $sql = "insert INTO people VALUES('username',password,phone) = '" . $_POST["username"] . "'" . "'" . $_POST["password"] . "'". "'" . $_POST["phone"] . "'";
        $result = $connection->query($sql);
        if ($result->num_rows>0)
        {
            print "You exist in our DATABASE. now we will check the password...<br>";
            $row = mysqli_fetch_assoc($result);
            if($row['Pass'] ==$_POST["Password"])
            {
                print "your login is correct";
            }
            else
            {
                print "Nice try, you hacker ... ";
            }
        }
        else
        {
            print "You don't exist in out data base";
        }
        

    }
    $connection->close();

    ?>
    <table>
        <form action="loginpage.php" method="post">
            <tr>
                <td> username: <input type="text" name="username"></td>
            </tr>
            <tr>
                <td> password: <input type="text" name="password"></td>
            </tr>
            <tr>
            <td> phone number: <input type="text" name="phone"></td>
            </tr>
            <tr>
                <td><input type="submit" value="login" name="login"></td>
            </tr>
        </form>

    </table>
</body>

</html>