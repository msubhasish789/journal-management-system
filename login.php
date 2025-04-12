<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel ="stylesheet" href="./css/style.css">
    <script>
        // Disable back button
        history.pushState(null, null, document.URL);
        window.addEventListener('popstate', function () {
            history.pushState(null, null, document.URL);
        });
    </script>
</head>
<body style="background-color: #f4f4f4; height: 100vh">
    <div class="login">
        <h1>Login</h1><br>
        <form method="post" action="process_login.php">
            <label for="author_id">Login As</label>
            <select id="role" name="role">
                <option value="1">Editor</option>
                <option value="2">Author</option>
                <option value="3">Reviewer</option>
            </select>

            <br><br>

            <label for="login_id">Login ID</label><br>
            <input type="login_id" name="login_id" placeholder="Enter your Login id" required><br><br>

            <label for="password">Password</label><br>
            <input type="password" name="password" placeholder="Enter your Password" required><br><br>

            <input type="submit" name="submit" value="Submit"  class="btn">
        </form>
        
    </div>
    <div class="login_sign_up">
        Do you not have any account?<a  href="signup.php">Sign UP</a>
    </div>
   
</body>
</html>