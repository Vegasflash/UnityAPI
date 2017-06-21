<htlm>
    <head>
        <title> API Homepage </title>
        <link rel="stylesheet" type="text/css" href="css/core.css"></link>
        <script src="js/core.js"></script>
    </head>
    <body>
    <form action="/api/sign-in">

        Email<span class ="required"></span>
        <input required type="text" name="email"></input>

        Birthdate<span class ="required"></span>
        <input required type="date" name="birthdate"></input><br>

        Username<span class ="required"></span>
        <input required type="text" name="username"></input><br>

        Firstname<span class ="required"></span>
        <input required type="text" name="firstname"></input><br>

        Lastname<span class ="required"></span>
        <input required type="text" name="lastname"></input><br>

        Password<span class ="required"></span>
        <input required type="password" name="password"></input><br>

        Confirm password<span class ="required"></span>
        <input onkeydown="processErrors()" id="passwordconfirmation" 
               required type="password" name="passwordconfirmation"></input><span class="handler"></span><br>

        <input type="submit" value="Sign in"></input>

    </form>
    </body>
</html>
