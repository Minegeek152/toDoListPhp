<form action="" method="post">
  <div >
    <label for="name">Enter your task name: </label>
    <input type="text" name="name" id="name" required>
  </div>

  <div class="form-example">
    <input type="submit" value="Subscribe!">
  </div>
</form>

<?php  
require("../classes/Connection.php");
require("../utils.php");
require("../gateway/TacheGateWay.php");
require("../classes/Tache.php");

$connect=new Connection($dns,$user,$pass);

$taskGateway=new TacheGateway($connect);

if (isset($_POST['name'])) {
    $task=new Tache($_POST['name'],1);
    $taskGateway->newTache($task);

}
$taches=[];
$taches[]=$taskGateway->getAllTaches();
foreach ($taches as $key=>$row) {
    
    echo $row->getIdTache();
    if($row->isComplete()){
      $complete='oui';
    }
    else{
      $complete='non';
    }
    echo 'id tache : '.$row->getIdTache().' nom : '.$row->getIntitule().'   fait? : '.$complete.'  Dans liste : '.$row->getIdListe();
}
?>
