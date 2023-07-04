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
        <li><a class="active" href="home.php">Home</a></li>
        <li><a href="menu.php">Menu</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="donate.php">Donate</a></li>
        <li2><a href="cart.php">Cart</a></li2>
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
            <p style="color: #fbff00;">Welcome to</p>
            <p style="font-family: 'Broadway'; font-size: 50px; text-indent: 90px; color: #00ff7b;">5 Budak Lapar</p><br>
            <p>We serve the best burgers in town. <strong style="color: #fbff00;">GUARANTEED!</strong> Don't believe in us?</p>
            <p>Come and try it yourself at <strong style="color: #fbff00;">Taman Sri Gombak</strong>.</p>
            <p>We promise it won't be your last!</p>          
        </div>
    </div>
    
    <br><br>
    <div class="row">
        <div class="column left"></div>
        <div class="column middle" style="background-color: #2f8a7e;">
            <br>
            <p style="font-family: 'Broadway'; font-size: 50px; text-indent: 90px ; text-align: center; color: #00ff7b;">Subscribe to 5 Budak Gemok!</p><br>
            <p style="text-align: center;">Get updates about our <strong style="color: #fbff00;">new Menu</strong> and <strong style="color: #fbff00;">Donation</strong>!</p>          
        
            <br><br>
            <div class="column left"></div>
            <div class="column middle" style="background-color: #19d9bf;">
            <form id="sub" method="post">
                <label for="fname">First name</label><br>
                <input type="text" id="fname" name="fname" placeholder="First Name" required><br>
                <label for="lname">Last name</label><br>
                <input type="text" id="lname" name="lname" placeholder="Last Name" required><br><br>
          
                <label for="Age">Age</label><br>
                <input type="text" id="age" name="age" placeholder="18" required><br><br>
          
                <label for="phone">Tel number</label><br>
                <input type="tel" id="tel" name="tel" placeholder="012-34567890" required><br><br>
          
                <label for="email">Email</label><br>
                <input type="email" name="email" placeholder="abc@mail.com" required><br><br>
          
                <label for="address">Address</label><br>
                <input type="text" name="address" placeholder="No.17, Taman Batu..." required><br>
                
                <label for="city">City</label><br>
                <input type="text" name="city" placeholder="Gombak" required><br>

                <label for="zip">Zip Code</label><br>
                <input type="text" name="zip" placeholder="11950" required><br>
                
                <label for="state">State</label><br>
                <select id="state" name="state" required>
                    <option value="johor">Johor</option>
                    <option value="kedah">Kedah</option>
                    <option value="kelantan">Kelantan</option>
                    <option value="melaka">Melaka</option>
                    <option value="n9">Negeri Sembilan</option>
                    <option value="pahang">Pahang</option>
                    <option value="penang">Penang</option>
                    <option value="perak">Perak</option>
                    <option value="perlis">Perlis</option>
                    <option value="sabah">Sabah</option>
                    <option value="sarawak">Sarawak</option>
                    <option value="selangor">Selangor</option>
                    <option value="terengganu">Terengganu</option>
                </select><br><br>
          
                <button type="submit" onclick="subData()">Subsribe</button>
            </form>
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
