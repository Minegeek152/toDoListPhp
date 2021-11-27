<form action="" method="post">
  <div >
    <label for="name">Enter your name: </label>
    <input type="password" name="name" id="name" required>
  </div>
  <div >
    <label for="name">Enter your password : </label>
    <input type="password" name="mdp" id="mdp" required>
  </div>

  <div class="form-example">
    <input type="submit" value="Subscribe!">
  </div>
</form>

<?php  
require("../classes/Connection.php");
require("../utils.php");
require("../gateway/UtilisateurGateway.php");
require("../classes/Utilisateur.php");

$connect=new Connection($dns,$user,$pass);
$user=new Utilisateur($_POST['name'],$_POST['mdp']);
$userGateway=new UtilisateurGateway($connect);
$userGateway->insert($user);
$userGateway->selectAll();
?>
