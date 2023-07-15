<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: #f2f2f2;
}

.container {
  background-color: #ffffff;
  border-radius: 5px;
  padding: 20px;
  width: 300px;
  max-width: 80%;
  margin: 0 auto;
  margin-top: 100px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

.container h2 {
  text-align: center;
  margin-bottom: 20px;
}

.container label {
  font-weight: bold;
}

.container input[type="text"],
.container input[type="password"] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
  border-radius: 4px;
}

.container button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin-top: 10px;
  border: none;
  cursor: pointer;
  width: 100%;
  border-radius: 4px;
}

.container button:hover {
  opacity: 0.8;
}

.container .cancelbtn {
  background-color: #f44336;
}

.container .psw {
  float: right;
}

.container .psw a {
  color: #04AA6D;
}

.container .psw a:hover {
  text-decoration: underline;
}

.container .imgcontainer {
  text-align: center;
  margin-bottom: 20px;
}

.container img.avatar {
  width: 100px;
  height: 100px;
  border-radius: 50%;
}

@media screen and (max-width: 500px) {
  .container {
    width: 90%;
  }
}
</style>
</head>
<body>

<div class="container">
  <h2>Login Form</h2>

  <form action="doctorlogin.php" method="post">
    <div class="imgcontainer">
      <img src="https://www.merriam-webster.com/words-at-play/the-history-of-doctor" alt="Avatar" class="avatar">
    </div>


    <label for="Name"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="Name" required>

    <label for="SSN"><b>SSN</b></label>
    <input type="password" placeholder="Enter SSN" name="SSN" required>


    <button type="submit">Login</button>

    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>

</body>
</html>
