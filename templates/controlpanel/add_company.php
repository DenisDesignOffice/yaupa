
<?php
require_once "../../util/connection.php";
?>



<!DOCTYPE html>
<htm>
    <head>
        <title>Add Company</title>
        <link rel="stylesheet" type="text/css" href="../../static/css/add_company.css"/>
    </head>
    <body>
        <div class="header">

            <h1><a href="controlpanel.php">Yaupa Control Panel</a></h1>
            <nav>
                <a>Hi! User</a>
                <a>Logout</a>
            </nav>

        </div>


        <div id="container">
            <form name="add_company" method="post" action="add_company.php">
                <label>Company Name
                    <input class="input" type="text" name="name" /required>
                </label><br>
                <label>Tag
                    <input class="input" placeholder="e.g. GAM for G. Agofure Motors" type="text" name="tag" /required>
                </label><br>
                <label>Email
                    <input class="input" placeholder="e.g. abc123@yourmail.com" type="email" name="email" /required>
                </label><br>
                <label>Phone
                    <input class="input" placeholder="e.g. 08011122233" type="text" name="phone" /required>
                </label><br>
                <label>Logo
                    <input class="input" type="file" name="logo" >
                </label><br>

                <input class="submit" type="submit" value="Submit">
            </form>

<?php
$error = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $tag = $_POST['tag'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $logo = $_POST['logo'];

    $check = mysql_query("SELECT name FROM transport_companies WHERE name='{$name}';");

    if (mysql_num_rows($check) == 0) {
        $action = "INSERT INTO transport_companies(name,tag,email,phone,logo) VALUE('$name','$tag','$email', '$phone', '$logo')";
        $query = mysql_query($action);

        if (!$query) {
            die("connection failed" . mysql_error());
        }
        $error = "Name has been added Successfully";
    } else {
        $error = "Name Already Exist";
    }
}

echo "<br/>" . $error;
?>
        </div>

    </body>
</html>