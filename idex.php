<!DOCTYPE>
<html lang="en">
<head>
    <title>Networks</title>
</head>
<body>

<ul>
    <li><a class="active" href="idex.php">Home</a></li>
</ul>


<h2>Networks</h2>

<table>
    <tr>
        <th>Show Name</th>
        <th>First Year</th>
        <th>Network Name</th>
    </tr>
<?php
$servername= "mysql7.loosefoot.com";

$UserName = "comp1006";

$Password = "helpme20";

$database = new
PDO("mysql:host=$servername;databasename=w20",$UserName,$Password);

// creat connection

$conn = mysqli_connect($servername, $UserName, $Password, $database);

// Check connection

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM Networks";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row["Showname"]."</td>";
        echo "<td>".$row["Firstname"]."</td>";
        echo "<td>$ ".$row["Networkname"]."</td>";
        echo "</tr>";
    }
} else {
    echo "0 results";
}
//Close db connection
mysqli_close($conn);
?>
    <form method="post" action="">
        <label for="name">Category Name:</label>
        <input type="text" id="name" name="name">
        <br><br>
        <button type="submit" value="SAVE">SAVE</button>
    </form>

    <?php

    //Remove trailing white spaces and replace all special characters
    function validate_data($input)
    {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }

    //Prevent the code from executing unless the submit button is pressed
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = validate_data($_POST['name']);
        $nameError = "";
        //Validate input
        if ($name == null || $name == "") {
            $nameError = "* Name cannot be empty";
            echo '<span class="error">' . $nameError . '</span>';
        } else {
            $nameError = "";
            $sql = "INSERT INTO categories (name) VALUES ('$name')";

            if (mysqli_query($conn, $sql)) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    }
    ?>

    <h2>Shownames</h2>

    <!--//Override the general css to resize this table since it only has one row-->
    <table style="width: 30%">
        <tr>
            <th>Shameless</th>
            <th>Episodes</th>
            <th>Billions</th>
            <th>The Americans</th>
            <th>It\'s Always Sunny in Philadelphia</th>
            <th>Fargo</th>
            <th>Boardwalk Empire</th>
            <th>Silicon Valley</th>
            <th>The Newsroom</th>
            <th>The Walking Dead</th>
            <th>Better Call Saul</th>
            <th>Comic Book Men</th>

        </tr>a
        <?php
        $sql = "SELECT * FROM FirstYear";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["name"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "0 results";
        }

        //Close db connection
        mysqli_close($conn);
        ?>

</table>

</body>
</html>


