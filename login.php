<?php
include_once 'connection.php';
?>


<?php
  session_start();
  if(isset($_SESSION['uid'])){
      header('location: index.php');
  }

?>




<!-- NavBar -->
<?php 
    include_once ('header.php');
?>
<!-- CONTAINER -->
    <div class="container" id="pushUp">
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" maxlength="18" required>
                <small id="passwordSpecs" class="form-text text-muted">Maximum 18 characters allowed</small>
            </div>
            
            <button type="submit" class="btn btn-primary" name="login">Login</button>
        </form>
    </div>


    <script>
        $("#email").keypress(function(e) {
        $("#error_sp_msg").remove();
        var k = e.keyCode,
        $return = ((k >= 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 10 || k == 32 || k == 46 || k == 45 || k == 95 || (k >= 48 && k <= 57));
        if(!$return) {
            $("<span/>",{
                "id" : "error_sp_msg",
                "html" 	: "Special characters containing #$%^&*()+<>? are not allowed !!"
            }).insertAfter($(this));
            return false;
        }
        
        });




    </script>



    <?php
    if(isset($_POST['login']))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];


        $sql = "SELECT * FROM profile WHERE email='" . $_POST["email"] . "' and password = '". $_POST["password"]."'";

        $result = mysqli_query($conn, $sql);   // RUNS THE SQL query
        $row = mysqli_num_rows($result);       // checks the number of ROWS of the query

        if($row==0) {
            echo "Invalid Username or Password!";
        } 

        else {
            $data = mysqli_fetch_assoc($result);
            $id = $data['profile_id'];
            $_SESSION['uid'] = $id;
            header('location: index.php');
      }
    }

    ?>


    
    
</body>
</html>