<!DOCTYPE html>

<?php include "./header.html" ?>
<?php 
session_start();
$_SESSION['type']=$_GET['type'];
?>

<form action="traitement.php" method="POST" >

<fieldset>
<legend class="text-center font-mono text-2xl"> Insértion des paramètres </legend><br>

<p class="text-center"><label class="text-center font-mono text-xl"> Nombre de Variables : </label><input class="border-2 border-rose-600" type="number" name="vari" /></p><br>
<p class="text-center"><label class="text-center font-mono text-xl"> Nombre de Contraintes : </label><input class="border-2 border-rose-600 ..." type="number" name="cont"  /></p>
</fieldset>
<br>
<p><center><input class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-8 py-3.5 text-center mr-3 mb-3" type="submit" value="continuer" name="continuer" /></center></p>

</form>
 


</body>
<footer id="footer" class="text-center text-white" style="background-color: #0a4275;"><center>[ Chaimaa KHALIL & Siham HAFSI ]</center></footer>
</html>