<form action="" method="post">
  <div >
    <label for="name">Enter your name: </label>
    <input type="text" name="name" id="name" required>
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
require("../gateway/MembreGateway.php");
require("../classes/Membre.php");

$connect=new Connection($dns,$user,$pass);

$userGateway=new MembreGateway($connect);

if (isset($_POST['name'],$_POST['mdp'])){
    $user=new Membre($_POST['name'],$_POST['mdp']);
    $userGateway->newMembre($user);
    
}


$users=$userGateway->getAllMembre();


foreach ($users as $row) {

    echo $row->getPseudo().'<br/>';    
}

echo $userGateway->findById(795);


?>
