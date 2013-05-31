<?php
  $userID = $_POST['formID'];
  if(empty($userID))
  {
    echo("You didn't select any buildings.");
  }
  else
  {
    $N = count($userID);
 
    echo("Vybrali ste $N uzivatelov: ");
    for($i=0; $i < $N; $i++)
    {
      echo($userID[$i] . " ");
    }
  }
?>