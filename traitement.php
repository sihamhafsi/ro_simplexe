<!DOCTYPE html>

<?php include "./header.html" ?>

<?php


if(isset($_POST['continuer']))
  {   
   

     //creation des variables globales
  	session_start();
  	$_SESSION['vari']=$_POST['vari'];	
    $_SESSION['cont']=$_POST['cont'];
    

    //envoyer les donneés à resultat1.php
	echo '<form class="text-center" action="resultat.php" method="POST">' ;
	//creation des cases des variables 
	for($i=1;$i<=$_POST['vari'];$i++)
	{

          if($i==1) { echo$_SESSION['type'].' Z = '; }
          if($i!=$_POST['vari']) { echo '<input class="border-2 border-rose-600" type="number" step="0.001" name="cout[]">';  echo"X".$i."+"; }
          else { echo '<input class="border-2 border-rose-600" type="number" step="0.001" name="cout[]">';  echo"X".$i; }
    }

	echo '<br><br>';

	//creation des cases des contraintes
	echo'<p class="font-mono text-xl">Contraintes :</p>';
	echo'<br>';

	for($j=1;$j<=$_POST['cont'];$j++)
	{
		for($i=1;$i<=$_POST['vari'];$i++)
		{
			if($i!=$_POST['vari'])
			{    echo'<input class="border-2 border-rose-600" type="number" step="0.001" name="A[]">';  
			     echo"X".$i."+";
			}
			else
			{
                echo'<input class="border-2 border-rose-600" type="number" step="0.001" name="A[]">';
				echo"X".$i;
				//choix des bornes
				echo'<select class="border-2 border-rose-600" name=borne[]>
				     <option value="inf"> <=  </option>
				     <option value="sup"> >=   </option>
				     <option value="egal"> =   </option> 
				     
				     </select>';

				     

				echo'<input class="border-2 border-rose-600" type="number" step="0.001" name="b[]">';
				echo"</br>";
			}
		}
		echo"</br>";
	}

    echo'<br>';


    //les variables positives
    for($i=1;$i<=$_POST['vari'];$i++)
    {
    	echo' X'.$i.'≥0 ';
    	echo'<br>';
    }
	

   

	echo'<br>';
	echo'<center><input class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-8 py-3.5 text-center mr-3 mb-3" type="submit" value="continuer" name="continuer1"></center>';
    echo'</form>';

  }
  echo '<div style="background-color: #0a4275; height: 2.5rem;" class="text-center text-white"><center>[ Chaimaa KHALIL & Siham HAFSI ]</center></div>'


?>
</body>
</html>