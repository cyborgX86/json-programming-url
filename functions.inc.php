<?php

/* getChannel devuelve un array con la hora, nombre y url del canal especificado
en el archivo json en función de la hora del sistema.*/

function getChannel(){

  global $programming;
  foreach ($programming as $channels) {
    $prevChannel = null;
    foreach ($channels as $channel) {

      if ($channel[Hour] == date ("H:i")){
        $currentChannel = $channel;
        break;

      }elseif ($channel[Hour] > date ("H:i")){
        /*para que el canal actual, $currentChannel, desde la última hora de 
        programación, sea el último canal del json, valoramos el primer elemento
        del array channels.*/
        if ($channels[0][Hour] > date ("H:i")){
          $currentChannel = end($channels);
          break;
        //en caso contrario:
        }else{
          if($prevChannel){
            $currentChannel = $prevChannel;
            break;
          }
        }
      }
      //canal última hora de programación.
      /*elseif (date ("H:i") > end($channels)[Hour]){
        $currentChanel = end($channels);
        break;
      }*/
      $prevChannel = $channel;
      /*fin foreach: canal última hora de programación por defecto, si no ha
      sido asignado (date ("H:i") > end($channels)[Hour]).*/
      $currentChannel = $channel; 
    }
  break;
  }
  return $currentChannel;
}

/* getProgramming devuelve una lista con el contenido de la programación definida
en el archivo json.*/

function getProgramming(){

  global $programming;

	foreach ($programming as $channels) {
	   echo '<ul class="navbar-brand"
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
               aria-expanded="false"><span class="caret"></span></a>
		             <ul class="dropdown-menu" role="menu">';
	   foreach ($channels as $channel) {
			    echo '<li>' . $channel[Hour] . ' - ' . $channel[Name] .'</li>
			          <li class="divider"></li>';
		 }
	echo '</ul></ul>';
	break;
	}
}

/*refreshTime devuelve el tiempo de refresco del navegador.*/

function refreshTime(){

  global $refreshTime;

  getChannel();
  if ((getChannel()[Name] == 'SmartPolitech') || (getChannel()[Name] == 'NoticiasEpcc')){
	   $refreshTime = 960;
  }
  return $refreshTime;
}

?>
