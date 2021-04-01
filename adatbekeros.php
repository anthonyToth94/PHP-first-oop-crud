<!DOCTYPE html>
<html>
<head>
	<title>Anti</title>
</head>
<body>
	<form method="GET" action="adatbekeros.php">
		<label>Elso szam:</label>
		<input type="text" name="text"><br><br>
			<label>Masodik szam:</label>
		<input type="text" name="text2"><br><br>
		<label>Harmadik elem:</label>
		<input type="text" name="text3"><br><br>

		<select name="person">
			<option value="Anti">Anti</option>
			<option value="Laci">Laci</option>
			<option value="Mazsi">Mazsi</option>
		</select>

		<input type="submit" name="szamol" value="Szamolas"><br><br>
		<input type="text" name="eredmenyhelye" value="<?php include('adatbekeros2.php');?>">
		<label><?php echo $hibak['hiba']; ?></label>
	</form>
</body>
</html>
<?php var_dump($lementhetem); ?>
