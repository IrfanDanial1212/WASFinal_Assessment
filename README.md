![images](https://github.com/IrfanDanial1212/WASFinal_Assessment/assets/85051702/5d2c2e7f-314e-4416-8a8a-db9a5219f532)

# INFO 4345 WEB APPLICATION SECURITY <br> SEMESTER 2, 2022/2023 

<H2> FINAL ASSESSMENT : WEB APPLICATION SECURITY ENHANCEMENT </H2>

Group Members : Sitta 
| No. | Name | Matric Number |  
|---|---|---|
| 1. | Muhammad Irfan Danial bin Baharim | 1927331 |
| 2. | Anwar bin Muzamir| 1928317 |
| 3. | Ikram Solehin bin Mohd Rizal | 2014303 |
| 4. | Azrul Zharfan bin Shuhaime | 1911399 |

<h5>Lecturer : Dr Muhamad Sadry Abu Seman </h5>

## Task Distribution

I. Input Validation ( Irfan )

II. Authentication ( Ikram )

III. Authorization ( Ikram )

IV. XSS and CSRF Prevention ( Azrul )

V. Database Security Principles ( Irfan )

VI. File Security Principles ( Anwar )

## Table of Contents
1. [Title of Web Application](#title)
2. [Introduction](#introduction)
3. [Objective](#objective)
4. [Enhancement](#enhancement)
   
    I. [Input Validation](#iv) <br>
    II. [Authentication](#authentic) <br>
    III. [Authorization](#authorize) <br>
    IV. [XSS and CSRF Prevention](#xss/csrf) <br>
    V. [Database Security Principles](#data) <br>
    VI. [File Security Principles](#file) <br>

6. [Refferences](#ref)



## 1. Title of Web Application<a name="title"></a> 

Title: 5 Budak Lapar (Ikram's previous Web Tech Project)

Reason: 
To protect the user data who register in 5 Budak Lapar Web Application

## 2. Introduction<a name="introduction"></a>
5 Budak Lapar is Web Application that selling fast food while 
pursuing sustainable development goal by allow the user to donate
money that will be used to supply food for needies. The web application
require user to register the account and some of their details will 
be taken and stored into database But the web application itself need 
to be enhance the security to prevent the data from being stolen by the attacker. 
The enhancement that will be impliment are input validation, 
authentication, authorization, XSS & CSRF prevention, database and file Security principles.

## 3. Objective<a name="objective"></a> 

The objective of applying web application security in 5 Budak Lapar are; <br>

I. Protect user data that register into 5 Budak Lapar Web Application <br>
II. Ensure the privacy and safety of the user order and donation <br>
III. Prevent any malicious attack such as SQL injection, XSS and CSRF from intefere the web application that may revoke the web application and steal the data 



## 4. Enhancement<a name="enhancement"></a>

### I. Input Validation<a name="iv"></a> 

<H4>Threat: ______ </H4>

<H4>Method Encounter </H4>
The pattern for name will match a string if it contains only alphabetic characters and whitespace, allowing for an empty string as well.

```
$namePattern = "/^[a-zA-Z\s]*$/";
```

The pattern for username will match a string if it contains only alphanumeric characters (letters and digits) and underscores, allowing for an empty string as well.

```
$usernamePattern = "/^[a-zA-Z0-9_]*$/";
```

The pattern will match a string if it represents a valid email address.

```
$emailPattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
```

The pattern password will match a string if it meets the password requirements of having at least one lowercase letter, one uppercase letter, one digit, and a minimum length of 8 characters.

```
$passwordPattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/";
```

### II. Authentication<a name="authentic"></a> 

<H4>Threat: Identity Theft</H4> 
Attackers can steal user credentials through techniques like phishing, social engineering, or password guessing. Once they gain access to user accounts, they can exploit personal information, commit fraudulent activities, or even impersonate the user for further malicious purposes. 

<H4>Method Encounter: 
To hide error message that expose file location. Only comment this line to show the error during development.

```
<?php
// Set error reporting to hide warnings
error_reporting(0);
```
Session

```
// Set the session timeout period in seconds (2 minutes)
$sessionTimeout = 120;

// Check if the session variable for the last activity timestamp exists
if (isset($_SESSION['lastActivityTimestamp'])) {
    // Get the current timestamp
    $currentTime = time();
    // Calculate the time elapsed since the last activity
    $elapsedTime = $currentTime - $_SESSION['lastActivityTimestamp'];

    // Check if the elapsed time exceeds the session timeout period
    if ($elapsedTime >= $sessionTimeout) {
        // Session has timed out, destroy the session and redirect to the login page
        session_destroy();
        header("Location: login.php");
        exit();
    }
}

// Update the last activity timestamp to the current time
$_SESSION['lastActivityTimestamp'] = time();

// Generate a unique token if it doesn't exist in the session
if (!isset($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}

// Verify token on subsequent requests
if (isset($_POST['submit'])) {
    // Check if the submitted token matches the one stored in the session
    if (isset($_SESSION['token']) && $_POST['token'] === $_SESSION['token']) {
        // Token is valid, perform the necessary actions
        // ...
    } else {
        // Token is invalid, handle the error appropriately
        // ...
    }
}
```

Registration

```
if(isset($_POST["submit"])){
  $name = $_POST["name"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];
```

```
 $duplicate = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' OR email = '$email'");
  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('Username or Email Has Already Taken'); </script>";
  }
  else{
    if($password == $confirmpassword){
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);
      $query = "INSERT INTO user VALUE ('','$name','$username','$email','$hashed_password')";
      mysqli_query($conn, $query);
      echo
      "<script> alert('Registration Successful'); </script>";
      header("Location: homepage.php");
    }
    else{
      echo
      "<script> alert('Password Does Not Match'); </script>";
    }
  }
```



### III. Authorization<a name="authorize"></a> 

<H4>Threat: Unauthorized Data Exposure </H4>
Attackers may gain access to sensitive data, such as confidential documents, customer information, or intellectual property. This can result in data breaches, privacy violations, financial loss, or damage to the organization's reputation. 

<H4>Method Encounter:</H4>

```
if(isset($_POST["submit"])){
  $usernameemail = $_POST["usernameemail"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$usernameemail'");

  if(mysqli_num_rows($result) == "1"){
    $row = mysqli_fetch_assoc($result);
    $storedPassword = $row['password'];

    // Check password from login and database
    if(password_verify($password, $storedPassword)){
      session_start();
      // Store username and password in session variables
      $_SESSION["username"] = $usernameemail;
      $_SESSION["password"] = $password;

      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      header("Location: home.php");
    }
    else{

      echo"<script> alert('Wrong Password'); </script>";
    }
    
  }
  else{
    echo "<script> alert('User Not Registered'); </script>";
  }
  

}
```


### IV. XSS and CSRF Prevention<a name="xss/csrf"></a> 

<H4>Threat: XSS and CSRF</H4>

XSS(Cross-Site Scripting) occurs when a web application allows untrusted user input to be included in its output without proper validation or sanitization. This vulnerability enables attackers to inject malicious scripts into web pages viewed by other users, leading to the execution of these scripts in their browsers. XSS attacks can be classified into three types: stored XSS, reflected XSS, and DOM-based XSS. The consequences of XSS attacks can range from stealing sensitive user information, session hijacking, defacement of websites, to even distributing malware. While, CSRF(Cross-Site Request Forgery) occurs when an attacker tricks a victim into executing unwanted actions on a web application on which the victim is authenticated. The attack takes advantage of the trust between the victim's browser and the targeted web application. By crafting a malicious HTML page or URL, the attacker can deceive the victim's browser into sending unauthorized requests to the vulnerable application, leading to actions performed on behalf of the victim without their knowledge or consent. CSRF attacks can perform actions such as changing user settings, making unauthorized purchases, or even manipulating sensitive data.

<H4>Method Encounter: Output Encoding and Use CSRF Token </H4>

<H5>Output Encoding</H5>

Output encoding is one of the method to prevent XSS attacks. This method will properly encode all user-generated content before displaying it in the HTML output.

In Comments.php:
```
function sanitizeInput($input)
{
    return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
}
```

By using a predefined function named 'htmlspecialchars' which will read all the character input by user as a word and not a script or codes.

<H5>Use CSRF Token</H5>

CSRF Token is one of the prevention method for CSRF attacks where the web application will generate a unique CSRF token for each user session and include it as a hidden field or header in each form or request that modifies data.

In Comments.php:
```
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Validate the CSRF token
    if (!empty($_POST['csrf_token']) && hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
<User Codes>
    } else {
        // Invalid CSRF token
        echo "Invalid CSRF token";
        exit;
    }

<input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
```

By validate the token on the server-side before processing the request will help in avoiding attacker to create unauthorize changes to user account.

### V. Database Security Principles<a name="data"></a>

<H4>Threat: SQL Injection</H4>
Code injection technique that attacker use to manipulate data driven web application by inserting malicious SQL statemets into text field to execute the injection. Similar to XSS but more focusing to database server. The effect of
the attak will alter existing record or add or drop the whole database, worst cases the database got steal.

<H4>Method Encounter: Prepared Statement(Also known as parameterized Queries)</H4>

The method used can prevent SQL injection attacks by separating the user-supplied data from the SQL query. The user-supplied data is not directly embedded in the SQL query, the data is passed to the database as a parameter. The database then binds the parameter to the appropriate placeholder in the SQL query. Which makes it will more difficult for thw attacker to inject malicious code.

In Registration.php:
```
$name = mysqli_real_escape_string($conn, $name);
$username = mysqli_real_escape_string($conn, $username);
$email = mysqli_real_escape_string($conn, $email);
$password = mysqli_real_escape_string($conn, $password);
```

### VI. File Security Principles<a name="file"></a>

<H4>Threat: Forceful browsing (directory enumeration and redirect workflow manipulation) </H4>

Attacker will breach through the web application without login or registration 
by searching unlinked pages. The attacker use to guess the directory of the web server which the files are stored. The attacker can bypass the web application workflow.

<H4>Method Encounter: Applying authorization </H4>

To view the donate and insert cart pages, user need to login or register first otherwise the web applicaton will not allow the user to view the page. Therefore, attacker cannot bypass the web application flow

The coding apply in donate & cart page: 
```
<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM user WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
}
else{
  header("Location: login.php");
}
?>
```

## 5. Refferences<a name="ref"></a>

1. Security Journey/HackEDU Team. (2020, February 11). How to prevent SQL Injection Vulnerabilities: How Prepared Statements Work. Securityjourney.com; Security Journey. 
https://www.securityjourney.com/post/how-to-prevent-sql-injection-vulnerabilities-how-prepared-statements-work <br>
2. myPHPnotes. (2017). PHP Security - Directory Traversal Example and Prevention [YouTube Video]. In YouTube.
https://www.youtube.com/watch?v=ZYbU9_cksUs <br>
3. TECHINSPEC. (2020). SQL Injection PHP Example | How to prevent SQL injection in PHP? [YouTube Video]. In YouTube.
https://www.youtube.com/watch?v=4o4BABR0Iho <br>


‌

‌








