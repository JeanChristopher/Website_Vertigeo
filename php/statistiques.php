<?php
session_start();

function visite() {
  $filename = 'data/compteur_visites.txt';

  if (file_exists($filename)){
    $counter = file_get_contents($filename);
  } else {
    $counter = 0;
  }

  $counter++;
  file_put_contents($filename,$counter,LOCK_EX);
  return $counter;
}

function visiteSession()
{
  $filename = 'data/compteur_visites_session.txt';

  if (file_exists($filename)){
    $counter = file_get_contents($filename);
  } else {
    $counter = 0;
  }

  if(!isset($_SESSION['compteur_de_visite_session']))
  {
          $_SESSION['compteur_de_visite_session'] = 'visite';
          $counter++;
          file_put_contents($filename,$counter,LOCK_EX);
  }

  return $counter;
}

function ipTracking(){

    $filename = 'data/ip_tracking.csv';
    error_log("ip tracking", 0);

    if (!file_exists($filename)){
        file_put_contents($filename,"IP,hostname,city,region,country,loc,org,postal\n",FILE_APPEND|LOCK_EX);
    }

    if(!isset($_SESSION['iptracked']))
    {
      error_log("ip tracking 2", 0);
            $_SESSION['iptracked'] = 'done';
            $array = json_decode(file_get_contents('http://ipinfo.io/'.$_SERVER['REMOTE_ADDR'].'/json'), true);

            if ($array != null){
              if (isset($array['loc'])){
                $string = "";
                $string .= addslashes($array['ip']).",";
                $string .= addslashes($array['hostname']).",";
                $string .= addslashes($array['city']).",";
                $string .= addslashes($array['region']).",";
                $string .= addslashes($array['country']).",";
                $string .= addslashes($array['loc']).",";
                $string .= addslashes($array['org']).",";
                $string .= addslashes($array['postal'])."\n";


                file_put_contents($filename,$string,FILE_APPEND|LOCK_EX);
              }
            }

    }


    return 1;
}

  echo ".";
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $request = $_POST;
    if (isset($request['statistics'])){
      visite();
      visiteSession();
      ipTracking();
    }

  }
?>
