
<html>
    
<head>
    <style>
        .aaa{
            float: left;
            width: 30%;
            height: 400px;
            /* background-color: aqua; */
        }
        .bbb{
            float: left;
            width: 70%;
            height: 400px;
            /* background-color: aquamarine; */
        }
    </style>
    
</head>
<body>
    <div class="aaa" >
        <form method = "post" action = "../model/reg-logic.php">
            <input type="text" name="username" placeholder="username"> <br/> <br/>
            <input type="text" name="lastname" placeholder="lastname"> <br/> <br/>
            <input type="email" name="email" placeholder="email"> <br/> <br/>
            <input type="password" name="password" placeholder="passwors"> <br/> <br/>
            <input type="password" name="repassword" placeholder="repid password"> <br/> <br/>
            <button>send me</button>
        </form>
    </div>
    <div class="bbb">
    </div>
</body>
</html>