<?php
session_start();

@include 'config.php';

// Generate and store CSRF token in the session
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
    $_SESSION['user_email'] = $row['email'];
} else {
    header("Location: login.php");
}

function sanitizeInput($input)
{
    return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Validate the CSRF token
    if (!empty($_POST['csrf_token']) && hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        // Retrieve the user input and sanitize it
        $email = $_SESSION['user_email'];
        $comment = sanitizeInput($_POST["comment"]);

        $query = "INSERT INTO comments VALUES ('', '$email', '$comment')";
        mysqli_query($conn, $query);
        header("Location: comments.php");
    } else {
        // Invalid CSRF token
        echo "Invalid CSRF token";
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
        
    <link rel="stylesheet" href="css/home.css">
    <script src="js/home.js"></script>
    <link rel="stylesheet" href="css/flickity.css">
    <script src="js/flickity.pkgd.js"></script>
</head>

<body>
    <div class="header">
        <img src="image/limaBL_Logo.png" alt="Home Page" width="400" height="152"/>
    </div>
        
        
    <ul>
        <li><a  href="home.php">Home</a></li>
        <li><a href="menu.php">Menu</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="donate.php">Donate</a></li>
        <li><a class="active" href="comments.php">Comment</a></li>
        <li><a href="cart.php">Cart</a></li>
        <li2><a href="logout.php">Logout</a></li2>
    </ul>

    <div class="row"> 
    <div class="gallery js-flickity"
        data-flickity-options='{ "wrapAround": true }'>
        <a2 href="menu.php">
            <img class="gallery-cell" src="image/b1.png" alt=""></a2>
        <a2 href="menu.php">
            <img class="gallery-cell" src="image/b2.png" alt=""></a2>
        <a2 href="https://asnafcare.com.my/list-campaign.html?itemid=PAR202107001">
            <img class="gallery-cell" src="image/d1.png" alt=""></a2>
         <a2 href="about.php">
            <img class="gallery-cell" src="image/a1.png" alt=""></a2>
        <a2 href="https://www.globalgoals.org/take-action/?id=12">
            <img class="gallery-cell" src="image/s1.png" alt=""></a2>  
        <a2 href="https://www.globalgoals.org/take-action/?id=2">
            <img class="gallery-cell" src="image/s2.png" alt=""></a2>  
    </div>   
    </div>
    
    <br><br>
    <div class="row" style="background-color: #2f8a7e; ">
        <div class="column left"></div>
        <div class="column middle">
            <br>
            <p style="color: #fbff00;">Comments Section</p>
            <p style="font-family: 'Broadway'; font-size: 50px; text-indent: 90px; color: #00ff7b;">5 Budak Lapar</p><br>
            <p> Read all our <strong style="color: #fbff00;">CUSTOMERS REVIEW</strong> about our products </p>
            <p> after they have <strong style="color: #fbff00;">SATISFIED</strong> with our products.</p>       
        </div>
    </div>
    
    <br><br>
    <div class="row">
        <div class="column left"></div>
        <div class="column middle" style="background-color: #2f8a7e;">
            <br>
            <p style="font-family: 'Broadway'; font-size: 50px; text-indent: 90px ; text-align: center; color: #00ff7b;">Subscribe to 5 Budak Gemok!</p><br>
            <p style="text-align: center;"> Write a review about our <strong style="color: #fbff00;">PRODUCTS</strong> and let others its <strong style="color: #fbff00;">DELICIOUSNESS</strong>!</p>          
        
            <br><br>
            <div class="column left"></div>
            <div class="column middle" style="background-color: #19d9bf;">
            <form id="sub" method="post">

                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

                <label for="email">Email</label><br>
                <input type="email" id="email" name="email" placeholder="<?php echo $_SESSION['user_email'] ?>" readonly><br>

                <label for="comment">Comments</label><br>
                <input type="text" id="comment" name="comment" placeholder="Comments" required><br><br>
                <br><br>
          
                <button type="submit" name="submit">Submit</button>
            </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="column left"></div>
        <div class="column middle" style="background-color: #2f8a7e;">
            <br>
        
            <br><br>
            <div class="column left"></div>
            <div class="column middle" style="background-color: #19d9bf;">
            <?php
            // Fetch the comments from the database
                $query = "SELECT * FROM comments";
                $result = mysqli_query($conn, $query);

                // Display the comments
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $email = $row['email'];
                        $comment = $row['comment'];

                        echo "<p>Email: $email</p>";
                        echo "<p>Comment: $comment</p>";
                        echo "<hr>";
                    }
                } else {
                    echo "<p>No comments found.</p>";
                }

                // Close the database connection
                mysqli_close($conn);
                ?>
            </div>
        </div>
    </div>
    <br><br>
    <div class="footer">
        <a href="https://www.instagram.com/">
            <img src="image/f1.png" alt="" width="40" height="40"></a>
        <a href="https://twitter.com/">
            <img src="image/f2.png" alt="" width="40" height="40"></a>
        <a href="https://web.whatsapp.com/">
            <img src="image/f3.png" alt="" width="40" height="40"></a>
    </div>

    </body>
</html>