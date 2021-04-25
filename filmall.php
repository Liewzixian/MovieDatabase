<?php
require 'dbconfig/config.php';
@$film_id="";
@$language_id="";
@$title="";
@$description="";
@$rental_duration="";
@$rental_rate="";
@$length="";
@$replacement_cost="";
@$rating="";
@$FEATUREID="";
@$release_year="";
@$Last_update="";

?>
<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="Images/icon.jpg"/>
<h3>
<title>Movie Database</title>
<link rel="stylesheet" type="text/css" href="css/Style2.css" />
</h3>
<p><img src="Images/icon.jpg" width="100px" height = "100px"/><h2 style="color:#FFFFFF"> Welcome to Optimistic Force Movie Rental Store</h2></p>
<head>
<body style="background-color:#bdc3c7">
<audio src="Images/background.mp3" type="audio/mp3" autoplay loop>
		</audio>
            <nav id="navigation">
                <ul id="nav">
                    <li><a href="actor.php">Actor</a></li>
                    <li><a href="Category.php">Category</a></li>
                    <li><a href="country.php">Country</a></li>
                    <li><a href="city.php">City</a></li>
                    <li><a href="address.php">Address</a></li>
                    <li><a href="language.php">Language</a></li>
                    <li><a href="film category.php">Film_category</a></li>
                    <li><a href="film.php">Film</a></li>
                    <li><a href="store.php">Store</a></li>
                    <li><a href="staff.php">Staff</a></li>
                    <li><a href="film_actor.php">Film_Actor</a></li>
                    <li><a href="inventory.php">Inventory</a></li>
                    <li><a href="customer.php">Customer</a></li>
                    <li><a href="rental.php">Rental</a></li>
                    <li><a href="payment.php">Payment</a></li>
                    <li><a href="film feature.php">Film Feature</a></li>

                </ul>
            </nav>
			<br/>
			<br/>
  	<div id="main-wrapper2">
      <center><h1>Film Records</h1></center>
      <div class="inner_container2">
        <table class="select">
          <tr>
            <th> Film Id </th>
            <th> Tittle </th>
            <th> Description </th>
            <th> Release Year </th>
            <th> Language id </th>
            <th> Rental Duration </th>
            <th> Rental Rate </th>
            <th> Length </th>
            <th> Replacement Cost </th>
            <th> Rating </th>
            <th> FEATUREID </th>
            <th> Last Update </th>
          </tr>
    <?php
$query = "select * from film";
$query_run = mysqli_query($con, $query);
if ($query_run)
{
    if (mysqli_num_rows($query_run) > 0)
    {
        while ($row = $query_run->fetch_assoc())
        {
            echo "<tr><td>" . $row["film_id"] . " </td><td> " . $row["title"] . "</td><td>" . $row["description"] . "</td><td> ". $row["release_year"] . "</td><td> ". $row["language_id"] . "</td><td> ". $row["rental_duration"] . "</td><td> "
             . $row["rental_rate"] . "</td><td> ". $row["length"] . "</td><td> ". $row["replacement_cost"] . "</td><td> ". $row["rating"] . "</td><td> ". $row["FEATUREID"] . "</td><td> ". $row["last_update"] . "</td></tr>";
        }
    }
    else
    {
        echo "0 results";
    }
}
?>
<a href ="film.php" class ="btn_back3">Back</a>
</table>
</div>
</div>
<br/>
	<br/>
	<br/>
	<br/>
	<footer >
		<table cellpadding="10">
		<tr>
			<td style="color:#FFFFFF">For more information, you can visit us at:</td>
			<td style="color:#FFFFFF">Visit our shop at:</td>
			<td style="color:#FFFFFF">Send us an email at:</td>
			<td style="color:#FFFFFF">Contact us at:</td>
		</tr>

		<hr>
		</hr>
		<tr>

			<td style="color:#FFFFFF"><a href="https://www.instagram.com/?hl=en" target="_blank"><image src="Images/insta.jpg" height="55" width="50" target="_blank"></a>&emsp;&emsp;
			<a href="https://www.facebook.com/" target="_blank"><image src="Images/facebook.png" height="55" width="50" target="_blank"></a>&emsp;&emsp;
			<a href="https://twitter.com/?lang=en-my" target="_blank"><image src="Images/twitter.jpg" height="55" width="50" ></a></td>
			<td style="color:#FFFFFF"><address>	<br>Universiy of Nottingham</br>
							<br>Jalan Broga,</br>
							<br>Semenyih,Selangor</br>
							<br>Malaysia</br>
			<address></td>
			<td><p style="color:#FFFFFF"><a href="mailto:group18@gmail.com"><h4>group18@gmail.com</h4></a></p></td>
			<td style="color:#FFFFFF">012-34567890</td>
		</tr>
		<tr>
			<td style="color:#FFFFFF">&copy;Group 18</td>
		</tr>
		</table>
	</footer>
	</body>
	</html>
