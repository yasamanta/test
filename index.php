<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login form</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<h2> CONTACT INFO</h2>
<form action="config.php" method="post"  enctype="multipart/form-data">

    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name"><br>


    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name" ><br>


    <label for="age">Age:</label>
    <select id="age" name="age">
        <?php for($i = 18; $i <= 68; $i++):?>
            <option value=<?=$i?>><?=$i?></option>
        <?php endfor;?>

    </select>


    <label for="description">Description:</label>
    <textarea id="description" name="description" rows="4" cols="50"></textarea><br>


    <label for="height">Height:</label>
    <input type="number" id="height" name="height"><br>


    <label>Marital Status:</label>
    <input type="radio" id="married_m" name="married" value="1"> Married
    <input type="radio" id="married_s" name="married" value="0" > Single
     <br><br/>

    <label for="active">Active : </label>
    <input type="checkbox" id="active" name="active">
    <br><br/>


    <label for="image">Upload Image:</label>
    <input type="file" id="image_path" name="image_path"><br>
      <br><br/>

    <input type="submit" value="submit" name="submit">
</form>
</body>
</html>

