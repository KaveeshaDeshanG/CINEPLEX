
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animated Login Page</title>
    <style>
        *{
    margin: 0;
    padding: 0;
    color: rgb(250, 228, 200);
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;

}

section{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    width: 100%;
    background: url("image/log.jpg") no-repeat;
    background-position: center;
    background-size: cover;

}

.form-box{
    position: relative;
    width: 400px;
    height: 550px;
    background: transparent;
    backdrop-filter: blur(8px);
    border: 1px solid wheat;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    border-radius: 30px;
}

h2{
    font-size: 2em;
    text-align: center;
    text-shadow: 1px 1px 2px black;
}

.inputbox{
    position: relative;
    margin: 25px;
    width: 300px;
    border-bottom: 2px solid wheat;
    text-shadow: .5px .5px 4px black; 
}

.inputbox label{
    position: absolute;
    margin-top: -8px;
    top: 0%;
    left: 5px;
    transform: translatey(-50%);
    font: 1em;
    pointer-events: none;
    transition: .4s;

}

input:focus ~ label,
input:focus ~ :valid{
    top: -5px;
    text-shadow: none;
}


.inputbox input{
    width: 85%;
    height: 50px;
    background: transparent;
    border: none;
    outline: none;
    font-size: 1em;
    padding: 0 35px 0 5px;
    color: black;
}

.inputbox ion-icon{
    position: absolute;
    right: 10px;
    bottom: 15px;
    font-size: 1.5em;
}

.forgot{
    margin: 15px 0 2px 25px;
    font-size: 0.9rem;
    display: flex;
    

}

.forgot a{
    padding-left: 18%;
    color: rgb(8, 10, 10);
    text-decoration: underline;
    font-weight: 600;
    text-shadow: .5px .5px 2px black;
}

.forgot a:hover{
    text-decoration: none;
    text-shadow: 2px 2px 4px black;
}

button{
    width: 80%;
    height: 40px;
    border-radius: 40px;
    position: relative;
    background: orangered;
    outline: none;
    border: none;
    cursor: pointer;
    font-size: 1.2em;
    font-weight: 650;
    margin-top: 20px;
    box-shadow: .5px .5px 4px black;

}
button:hover{
    box-shadow: 2px 2px 8px black;
}
.register{
    font-size: 0.9rem;
    margin: 25px 0 10px;
}
.register a{
    color: rgb(0, 0, 0);
    text-decoration: underline;
    font-weight: 600;
    text-shadow: .5px .5px 2px black;
}

.register a:hover{
    text-decoration: none;
    text-shadow: 2px 2px 4px black;
}


    </style>
</head>
<body>


<section>
        <div class="form-box">
                <form action="Regi.php" method="post">
                    <h2>Register</h2>

                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="name" name="uName" id="uName">
                    <label for="uname">User Name</label>
                    </div>

                    <div class="inputbox">
                        <ion-icon name="call-outline"></ion-icon>
                        <input type="text" name="phone" id="phone">
                    <label for="phone">Phone Number</label>
                    </div>

                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="text" name="email" id="email">
                    <label for="Email">Email</label>
                    </div>
                    
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="text" name="password" id="password">
                        <label for="password">Password</label>   
                    </div>

                    <div class="forgot">
                        <input type="checkbox" name="checkbox" id="checkbox">
                        <label for="checkbox">&nbspRembember me!</label>
                        <a href="#">Forgot Password</a>
                        
                    </div>

                    <button>Register</button>

                    <div class="register">
                        <p>Do you have an account? &nbsp<a href="login.php">Login Here</a></p>
                    </div>
                    

                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>


