<html>
 <head>
  <title>PHP-Test</title>
 </head>
 <body>
 <form action="test.php" method="post" >
 <table style="width:100%">
  <tr>
    <th>Menge</th>
    <th>Artikel-Name</th> 
    <th>Einzelpreis</th>
    <th>Gesamtpreis</th>
  </tr>
  <tr>
    <th><input type="number" name="menge1" /></th>
    <th><input type="text" name="artikel_name1" /></th> 
    <th><input type="number" name="einzel1" /></th>
    <th><input type="number" name="gesamt1" /></th>
  </tr>
  <tr>
    <th><input type="number" name="menge2" /></th>
    <th><input type="text" name="artikel_name2" /></th> 
    <th><input type="number" name="einzel2" /></th>
    <th><input type="number" name="gesamt2" /></th>
  </tr>
  <tr>
    <th><input type="number" name="menge3" /></th>
    <th><input type="text" name="artikel_name3" /></th> 
    <th><input type="number" name="einzel3" /></th>
    <th><input type="number" name="gesamt3" /></th>
  </tr>
  <tr>
    <th><input type="number" name="menge4" /></th>
    <th><input type="text" name="artikel_name4" /></th> 
    <th><input type="number" name="einzel4" /></th>
    <th><input type="number" name="gesamt4" /></th>
  </tr>
  <tr>
    <th><input type="number" name="menge5" /></th>
    <th><input type="text" name="artikel_name5" /></th> 
    <th><input type="number" name="einzel5" /></th>
    <th><input type="number" name="gesamt5" /></th>
  </tr>
  <tr>
    <th><input type="number" name="menge6" /></th>
    <th><input type="text" name="artikel_name6" /></th> 
    <th><input type="number" name="einzel6" /></th>
    <th><input type="number" name="gesamt6" /></th>
  </tr>
  <tr>
    <th><input type="number" name="menge7" /></th>
    <th><input type="text" name="artikel_name7" /></th> 
    <th><input type="number" name="einzel7" /></th>
    <th><input type="number" name="gesamt7" /></th>
  </tr>
  <tr>
    <th><input type="number" name="menge8" /></th>
    <th><input type="text" name="artikel_name8" /></th> 
    <th><input type="number" name="einzel8" /></th>
    <th><input type="number" name="gesamt8" /></th>
  </tr>
  <tr>
    <th><input type="number" name="menge9" /></th>
    <th><input type="text" name="artikel_name9" /></th> 
    <th><input type="number" name="einzel9" /></th>
    <th><input type="number" name="gesamt9" /></th>
  </tr>
  <tr>
    <th><input type="number" name="menge10" /></th>
    <th><input type="text" name="artikel_name10" /></th> 
    <th><input type="number" name="einzel10" /></th>
    <th><input type="number" name="gesamt10" /></th>
  </tr>
  </table>

  <?php 
  $array_gesamt =array();
for($i=1; $i < 11; $i++)
{
  if(!empty($_POST['menge'.strval($i)] or $_POST['einzel'.strval($i)] or $_POST['gesamt'.strval($i)]))
  {
    $help = 0;
    $menge_str = $_POST['menge'.strval($i)]; 
    $menge = (int)$menge_str;
    

    if ($menge > 0 and $menge_str == $menge) 
    {
      echo '<p style="color:green">Die '.$i.'.Artikel-Menge ist '.$menge.'</p>'; 
      echo '<br>';
    }
    else{
      echo '<p style="color:red">Die '.$i.'.Artikel-Menge ist keine Ganzzahl oder ist kleiner als 1</p>'; 
      echo '<br>';
    }

    $art_name = $_POST['artikel_name'.strval($i)]; 
    if (!empty($art_name) and  strlen($art_name)<129) 
    {
      echo '<p style="color:green">Der '.$i.'.Artikel-Name ist '.$art_name.'</p>'; 
      echo '<br>';
    }
    else{
      echo '<p style="color:red">Der '.$i.'.Artikel-Name hat mehr las 128 Zeichen oder das Feld ist leer</p>'; 
      echo '<br>';
    }


    $einz_str = $_POST['einzel'.strval($i)]; 
    $einz_int= (int)$einz_str;
    $einz_float= (float)$einz_str;
    if ($einz_str == $einz_int)
    {
      if ($einz_int > 0 ) 
      {
        echo '<p style="color:green">Der '.$i.'.Einzelpreis ist '.$einz_int.'</p>'; 
        echo '<br>';
        $help = 1;
      }
      else{
        echo '<p style="color:red">Der '.$i.'.Einzelpreis ist kleiner als 1</p>'; 
        echo '<br>';
      }
    }
    else if ($einz_str == $einz_float)
    {
      if ($einz_float > 0 ) 
      {
        echo '<p style="color:green">Der '.$i.'.Einzelpreis ist '.$einz_float.'</p>'; 
        echo '<br>';
        $help = 2;
      }
      else{
        echo '<p style="color:red">Der '.$i.'.Einzelpreis ist kleiner als 1</p>'; 
        echo '<br>';
      }
    }
    
    

    $gesamt = $_POST['gesamt'.strval($i)]; 

    
    if($help == 1)
    {
      $genau_gesamt = $menge*$einz_int;
      if ($gesamt == $genau_gesamt) 
      {
        echo '<p style="color:green">Der '.$i.'.Gesamtpreis ist '.$gesamt.'</p>'; 
        echo '<br>';
        $array_gesamt[]=$gesamt;
      }
      else{
        echo '<p style="color:red">Der '.$i.'.Gesamtpreis ist falsch</p>'; 
        echo '<br>';
      }
    }
    else if($help == 2)
    {
      $gesamt_gesamt = $menge*$einz_float;
      if ($gesamt == $genau_gesamt) 
      {
        echo '<p style="color:green">Der '.$i.'.Gesamtpreis ist '.$gesamt.'</p>'; 
        echo '<br>';
        $array_gesamt[]=$gesamt;
      }
      else{
        echo '<p style="color:red">Der '.$i.'.Gesamtpreis ist falsch</p>'; 
        echo '<br>';
      }
    }
    
    echo '<br>';
  
  }
}
$summe = NULL; 

if(0 < sizeof($array_gesamt)){
  for($i=0; $i < sizeof($array_gesamt); $i++){
  $summe = $summe+$array_gesamt[$i];
  }
}
else{
echo '';
}
  ?> 
  <table style="width:100%">
    <tr> 
    <th colspan="3"> </th>
    <th style="line-height: 100px">
      Summe Gesammt:  <?php global $summe; echo $summe;  ?> 
    </th>
  </tr>
  <tr>
  <th colspan="3"> </th>
    <th><input type="submit" name="button" value="Angaben prüfen" /></th>
  </tr>
  </table>
 </body>
</html>
