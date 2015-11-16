<?php 
  require_once("includes/common.php"); 
  nav_start_outer("Home");
  nav_start_inner();
?>
<b>Balance:</b> 
<?php 
  $sql = "SELECT Zoobars FROM Person WHERE PersonID=$user->id";
  $rs = $db->executeQuery($sql);
  $balance = $rs->getValueByNr(0,0);
  echo $balance > 0 ? $balance : 0;
?> zoobars<br/>
<b>Your profile:</b>
<form method="POST" name=profile_form
  action="<?php echo $_SERVER['PHP_SELF']?>">
<textarea name="profileupdate">
<?php
  if($_POST['profilesubmit']) {  // Check for profile submission
    $profile = $_POST['profileupdate'];
    if($user->id!="*") {
        $sql = "UPDATE Person SET Profile='$profile' ".
               "WHERE PersonID=$user->id";
        $db->executeQuery($sql);  // Overwrite profile in database
    }
  }
  $sql = "SELECT Profile FROM Person WHERE PersonID=$user->id";
  $rs = $db->executeQuery($sql);
  echo $rs->getValueByNr(0,0);  // Output the current profile
?>
</textarea><br/>
<input type=submit name="profilesubmit" value="Save"></form>
<?php 
  nav_end_inner();
  nav_end_outer(); 
?>
