<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="forgot-password.css">
    <title>Forgot Password</title>
</head>

<body>
    <header>
        <h1>Logo</h1>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
    </header>

    <div class="forgot-password-container">
        <h2>Forgot Password</h2>
        <p>Please provide your username and email to reset your password.</p>
        <form>
            <div class="form-group">
                <input type="text" id="username" required>
                <label for="username">Username</label>
            </div>
            <div class="form-group">
                <input type="email" id="email" required>
                <label for="email">Email</label>
            </div>
            <button class="reset-btn" type="submit">Get Password</button>
        </form>
    </div>

    <footer>
        <div id="footerRuler"></div>
        <div class="footerButton" id="toAbout">About</div>
        <div class="footerButton" id="toFaqs">FAQs</div>
        <p class="copyright">
            &copy; 2023 Your Company. All rights reserved.
        </p>
    </footer>
</body>

</html>
