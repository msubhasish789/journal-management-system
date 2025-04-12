<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signUp</title>
    <link rel ="stylesheet" href="./css/signup.css">
</head>
<body style="background-color: #f4f4f4; height: 100vh">
    <div class="login signup">
        <h1>SignUp</h1><br>
        <form method="post" action="process_signup.php">
            <label for="author_id">SignUp As</label>
            <select id="role" name="role">
                <option value="1">Editor</option>
                <option value="2">Author</option>
                <option value="3">Reviewer</option>
            </select>

            <br><br>

            <label for="fname">Name</label><br>
            <input type="f_name" name="fname" placeholder="Enter your Name" required><br><br>

            <label for="contact">Contact</label><br>
            <input type="numbe" name="cont" placeholder="Enter your Contact" required><br><br>

            <label for="email">Email</label><br>
            <input type="email" name="emai" placeholder="Enter your Email Address" required><br><br>

            <label for="password">Password</label><br>
            <input type="password" name="password" placeholder="Enter your Password" required><br><br>

            <input type="submit" name="submit" value="Submit"  class="btn">
        </form>
        
    </div>
    <div class="login_sign_up">
        Already have an account?<a  href="login.php">Login</a>
    </div>
    <script>
    function convertToLowercase() {
        var emailInput = document.getElementById('emailInput');
        emailInput.value = emailInput.value.toLowerCase();
    }
</script>
</html>



