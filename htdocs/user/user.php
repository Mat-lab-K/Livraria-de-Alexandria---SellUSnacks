<?php

session_start();

$errors = [
    'login' => $_SESSION['login_error'] ?? '',
    'register' => $_SESSION['register_error'] ?? ''
];
$activeForm = $_SESSION['active_form'] ?? 'login';


unset($_SESSION['login_error']);
unset($_SESSION['register_error']);

function showError($error){
    return !empty($error) ? "<p class = 'error-message'>$error</p>" : '';
}

function isActiveForm($formname, $activeForm){
    return $formname === $activeForm ? 'active' : '';
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" media="screen" href="login.css">
        <title>Present Diary</title>
    </head>

    <body>
        <nav class="navbar">

				<ul> 

                    <li> <a href="/"> Home  </a> </li>
					<li> <a href="user.php">  User  </a> </li>
					<li> <a href="stats.php"> Stats </a> </li>
					<li> <a href="shelf.php"> Shelf </a> </li>
					<li> <a href="notes.php"> notes </a> </li>
				</ul>

			</nav>
        <div class="container">
            <div class="form-box <?= isActiveForm('login', $activeForm)?>" id="login_form">  
                <?=showError($errors['login']);?>  
                <h2>Login</h2>           
                 <form action="login_register.php" method="POST">	   
                 
			        	<input type="text"  id="username"  name="username" placeholder="Nome" required>
			        	<input type="password" id="password" name="password" placeholder="Password" required>
			        	<button type="submit" name="login">login</button>
                         
		        </form>
                <p>Dont have an account?<a href="#" onclick="showform('register_form')"> Register </a></p>
            </div>

            <div class="form-box <?= isActiveForm('register', $activeForm)?>" id="register_form"> 

                <?=showError($errors['register']);?>  

                <h2>Register</h2>           
                 <form action="login_register.php" method="POST">	   
                 
			        	<input type="text"      id="username"   name="username" placeholder="Nome" required>
                        <input type="email"     id="email"      name="email"    placeholder="Email"     required>
			        	<input type="password"  id="password"   name="password" placeholder="Password" required>
			        	<button type="submit" name="register">Register</button>
                        
		        </form>
                <p>Already have an account?<a href="#" onclick="showform('login_form')"> Login </a></p>
            </div>

        </div>
        <script src="script.js"></script>
    </body>

</html>