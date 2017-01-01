<?
  require "inc/phpagi-2.14/phpagi-asmanager.php";
  $as = new AGI_AsteriskManager();
  if ($res = $as->connect("localhost", "sync", "!pass!sync")){
          $as->send_request('Command', array('Command'=>'reload'));
          $as->disconnect();

  } else {
        echo "Fail to reload";}
}
?>
