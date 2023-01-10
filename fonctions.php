
<?php

/////////////////////////////////récuperer l'emplacement du max dans une ligne /////////////////////////////////////
function emplacementMax($ligne)
{
	$k=$ligne[1];
	for($i=1;$i<=count($ligne);$i++)
	{
		if(($ligne[$i])>=$k)
		{$k=$ligne[$i];
	      $empl=$i;}
	 
	}
	
	return $empl;
}



/////////////////////////////////récuperer une ligne du tableau commençant par l'indice 1////////////////////////////////
function ligne($tab,$nbr,$l)//nbr est le nombre des elements de la ligne....$l est la ligne qu'on veut recuperer
{
	for($i=1;$i<=$nbr;$i++)
	{
		$lin[$i]=$tab[$l][$i];
	}
	return $lin;
}

//récuperer un colonne du tableau commençant par l'indice 1
function colonne($tab,$m,$col) //$m le nombre des contraintes (element du colonne) 
{
    for($i=1;$i<=$m;$i++)
	{
		$colonne[$i]=$tab[$i][$col];
	}
	return $colonne;	
}

/*
//fonction qui retourne la variable entrante
function entrante($tab,$nbr,$m)// $m indice sur la ligne (derniere ligne) et $nbr est le nombre des elements de la ligne ...dans le tab $m est le nombre des contraintes
{   
    $l0=ligne($tab,$nbr,$m);// $m doit etre la derniere ligne du tableau
	$i=emplacementMax($l0);//recupere l'indice du max dans la derniere ligne 
	$var=$tab[0][$i];//$var retourne la valeur avec l'indice du max colonne
	return $var;
}
*/



//calcul du ratio
function ratio($tab,$n,$m,$nbr)// $n -> nbr des var    $m -> nbr des contraintes    $nbr -> $n+$compt1+2*$c.....
{   
	//recuperer l'indice
	$line=ligne($tab,$nbr,$m+1);
	$indice=emplacementMax($line);
	//la colonne de la var entrante 
	$column=colonne($tab,$m,$indice);
	//la colonne B
	$B=colonne($tab,$m,$nbr+1);

	for($i=1;$i<=$m;$i++)
	{
		if($column[$i]>0)
		{
		  $ratio[$i]=($B[$i])/($column[$i]);	
		}
		else
		{
			$ratio[$i]=-2;
		}
		
	}

	return $ratio;
}

//récuperer l'emplacement du min dans une ligne
//cette fonction nous donne l'emplacement de la variable sortante
function vallMin($col)
{    
    $i=1;
	$k=$col[$i];
	while($col[$i]==-2)
	{$k=$col[$i+1];
	$i++;}
	for($j=$i+1;$j<=count($col);$j++)
	{ 
        //$e=0;
		if($col[$j]!=-2)
		{
			if($k>=$col[$j])
			{
				$k=$col[$j];
			}
			
		}
	}
	return $k;	
}
function emplacementMin($col)
{
	$k=vallMin($col);
	for($j=1;$j<=count($col);$j++)
	{ 
        //$e=0;
		if($col[$j]==$k)
		{
			$emplacement=$j;
			
		}
	}
	return $emplacement;
}


//Affiche le tableau avec le ratio et le pivot en rouge
function affichagePivot($tab1,$n,$m,$nbr)
{
	//le nouveau tableau transformé
	$cout=ligne($tab1,$nbr,$m+1);
	$emplMax=emplacementMax($cout);
	$ratio=ratio($tab1,$n,$m,$nbr);
	$emplMin=emplacementMin($ratio);
	
	$tab2=$tab1;
	/*$tab2[0][$nbr+2]="Ratio";
	for($i=1;$i<=$m;$i++)
	{
	  $tab2[$i][$nbr+2]=$ratio[$i];
	}*/
	//affichage
	echo'<br/><br/>';

     echo'<center><table class="MyTab" border="3">
     <tr>
     <td style="width:40px;">
     </td>';

   //premiere ligne les x1 .. e1 ...a1 ...et B
  for($i=1;$i<=$nbr+1;$i++)
  {
    echo"<td style='width:40px;'>";
    echo $tab2[0][$i];
    echo "</td>";
  }
 
 echo"</tr>";

  //premier colonne
for($i=1;$i<=$m;$i++)
{
	echo"<tr>
	     <td style='width:40px;'>";
	echo $tab2[$i][0];  
	echo"</td>";
	for($j=1;$j<=$nbr+1;$j++)  
	{   
		echo"<td style='width:40px;'>";
		if($i==$emplMin || $j==$emplMax)
		{
			echo '<p style="background-color: #FFFF8A;">' . $tab2[$i][$j] . '</p>';	
		}
		else echo $tab2[$i][$j];
	
		echo"</td>";
	} 
	echo"</tr>";
}

 //derniere ligne du cout 
echo "<tr>";
for($i=0;$i<=$nbr;$i++)
{
   echo"<td style='width:40px;'>";
   if($i==$emplMax)
		{
			echo '<p style="background-color: #FFFF8A;">' . $tab2[$m+1][$i] . '</p>';	
		}
   else echo $tab2[$m+1][$i];
   echo"</td>";
       
}
echo"<td "." />";
echo "</td>";

echo "</tr>"; 
 echo'</center></table>';
}

////////////////////////Affichage du tableau simple
function affichage($tab,$m,$nbr)
{
	
echo "<br/><br/>";

echo'<center><table class="MyTab" border="3">
     <tr>
     <td style="width:40px;">
     </td>';

   //premiere ligne les x1 .. e1 ...a1 ...et B
  for($i=1;$i<=$nbr;$i++)
  {
    echo"<td style='width:40px;'>";
    echo $tab[0][$i];
    echo "</td>";
  }
 echo"<td style='width:40px;'>B</td>";
 echo"</tr>";

  //premier colonne
for($i=1;$i<=$m;$i++)
{
	echo"<tr>
	     <td style='width:40px;'>";
	echo $tab[$i][0];  
	echo"</td>";
	for($j=1;$j<=$nbr+1;$j++)  
	{
		echo"<td style='width:40px;'>";
		echo $tab[$i][$j];
		echo"</td>";
	} 
	echo"</tr>";
}

 //derniere ligne du cout 
echo "<tr>";
for($i=0;$i<=$nbr;$i++)
{
   echo"<td style='width:40px;'>";
   echo $tab[$m+1][$i];
   echo"</td>";
       
}
echo"<td "." />";
echo "</td>";

echo "</tr>"; 
echo'</center></table>';
}
////////////////////////fonction que verifie la ligne du cout 
function verifier($tab,$n,$m,$nbr)
{
	$cout=ligne($tab,$nbr,$m+1);
	$k=0;
	for($i=1;$i<=$nbr;$i++)
	{
		if($cout[$i]<=0)
		{
			$k++;
		}
	}
	if($k==$nbr)
	{
		return 1;
	}
	return 0;
}




////////////////////////////////Echelonnage
function echelonner($tab,$n,$m,$nbr)
{
	$cout=ligne($tab,$nbr,$m+1);
	$emplMax=emplacementMax($cout);
	$ratio=ratio($tab,$n,$m,$nbr);
	$emplMin=emplacementMin($ratio);
	
	$colPivot=colonne($tab,$m+1,$emplMax);//on ajouter +1 pour ajouter la case du cout
	$linPivot=ligne($tab,$nbr,$emplMin);
	$pivot=$tab[$emplMin][$emplMax];
	//modification ligne pivot(division)
	for($i=1;$i<=$nbr;$i++)
	{
		$tab[$emplMin][$i]=(($linPivot[$i])/$pivot);
	}
	//ajouter case pour B
	$tab[$emplMin][$nbr+1]=($tab[$emplMin][$nbr+1])/$pivot;
	
	for($i=1;$i<=$m+1;$i++)//ce remplissage n'inclue pas la colonne B
	{
		if($i!=$emplMin)
		{
			 for($j=1;$j<=$nbr;$j++)
		{
			$tab[$i][$j]=$tab[$i][$j]-($colPivot[$i])*($tab[$emplMin][$j]);
		}
		}
			
	}
	for($i=1;$i<=$m;$i++)//ce remplissage n'inclue pas la colonne B
	{
		if($i!=$emplMin)
		{
		//remplissage de la colonne B
		$tab[$i][$nbr+1]=$tab[$i][$nbr+1]-($colPivot[$i])*($ratio[$emplMin]);
		}
			
	}
	//ajouter la variable entrante
     $tab[$emplMin][0]=$tab[0][$emplMax];
	
	return $tab;
}

///////////////////////////////recuperer les valeurs des X///////////////////////////////
function resultatX($tab,$n,$m,$nbr)
{
	
for($j=1;$j<=$n;$j++)
		{
			$valeur[$j]=0;
		}
for($i=1;$i<=$m;$i++)
{
    if($tab[$i][0][0]=='X')
	{   
        $indice=$tab[$i][0][1];
		$valeur[$indice]=$tab[$i][$nbr+1];
    }
	
}
  return $valeur;
}

///////////////////////////////recuperer les valeurs des a/////////////////////////////////
function resultatA($tab,$n,$m,$nbr1,$nbr)// $nbr1 = $compt1 + $compt3
{
	
for($j=1;$j<=$m;$j++)
		{
			$valeur[$j]=0;
		}
for($i=1;$i<=$m;$i++)
{
    if($tab[$i][0][0]=='a')
	{   
        $indice=$tab[$i][0][1];
		$valeur[$indice]=$tab[$i][$nbr+1];
    }
	
}
  return $valeur;
  //print_r($valeur);
}


//calcul de Za finale
function Za($tab,$n,$m,$nbr1,$nbr)//$nbr1 ici represente $compt2+$compt3
{
 $v=resultatA($tab,$n,$m,$nbr1,$nbr);
 $Za=0;
 //echo "La Solution est : ";
 
 for($i=1;$i<=$m;$i++)
{
    if($tab[$i][0][0]=='a')
	{   
        $indice=$tab[$i][0][1];
			$Za=$Za+$v[$indice];
	//echo "        a".$indice."=".$v[$i];
	
    }
	
}
echo "<br/>";


return $Za;
	
}




////////////////////////////echelonner le cout du premier tableau de la phase 1////////////////////////////////////
function echCout($tab,$n,$m,$nbr)
{
	$cout=ligne($tab,$nbr,$m+1);
	for($i=1;$i<=$nbr;$i++)
	{
		if($tab[$m+1][$i]==-1)
		{
			$indice=$tab[0][$i][1];
			for($j=1;$j<=$nbr;$j++)
			{
				$cout[$j]=$cout[$j]+$tab[$indice][$j];
			}	
			
		}
		
	}
	
  
	for($i=1;$i<=$nbr;$i++)
	{
		$tab[$m+1][$i]=$cout[$i];
	}
	
	return $tab;
	//print_r($indice);
	
}
//fonction qui echelonne le cout de la fin de la phase I et retourne le nouveau tableau de la phase 2
function echNewCout($NewCout,$array,$n,$m,$nbr)//$nbr=$compt1+$compt2
{
	$mimi=$NewCout;
	for($i=1;$i<=$n;$i++)
	{
		for($j=1;$j<=$m;$j++)
		{
			if($array[$j][0][0]=='X' && $array[$j][0][1]==$i)
			{
				//emplacement de la ligne avec laquelle on va echelonner
				for($k=1;$k<=$n+$nbr;$k++)//parcourir le NewCout en le echelonnant
				{
					
				     $mimi[$k]=$mimi[$k]-($NewCout[$i])*($array[$j][$k]);
				
				
				}
				
			}
		}
	}
	
	$mimi[0]="Coût";
	$mimi[$n+$nbr+1]=".";
	
	//remplir ce NewCout dans array
	for($p=0;$p<=$n+$nbr+1;$p++)
	{
		$array[$m+1][$p]=$mimi[$p];
	}
	
	return $array;
}





//calcul de Z finale
function Z($tab,$n,$m,$nbr)
{
	 $v=resultatX($tab,$n,$m,$nbr);
	 $Z=0;
	 echo "La solution est : ";
	for($i=1;$i<=$n;$i++)
	{
		$Z=$Z+$v[$i]*($_POST['cout'][$i-1]);
		echo "        X".$i."=".$v[$i];
		
	}
	echo "<br/>";

	echo "Z = ".$Z;
	
}

function verifierRatio($tab,$n,$m,$nbr)
{
	$ratio=ratio($tab,$n,$m,$nbr);
$p=0;
for($i=1;$i<=$m;$i++)
{
	//$p=0;
	if($ratio[$i]<=-2)
	{
		$p++;
	}
}
return $p;
}


 ?>
 
 <style>
 table,tr,td{
	 border: 2px solid #2E8BC0;
 }
 
 </style>
 









