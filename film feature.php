<?php

require 'dbconfig/config.php';
	$FEATUREID ="";
	$feature1="";
	$feature2="";

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
</head>
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

	<div id="main-wrapper">
		<center><h2>Insert / Update / Delete Film Feature</h2></center>


		<div class="inner_container">

			<?php
				if(isset($_POST['fetch_btn'])){
				//	echo '<script type="text/javascript">alert("Go button Clicked")</script>';

					$FEATUREID=$_POST['FEATUREID'];

					if(@$FEATUREID ==" ")
					{
						echo '<script type="text/javascript">alert("Enter FEATUREID to get film details")</script>';
					}
					else
					{
						$query = "select * from film_feature where FEATUREID =$FEATUREID";
						$query_run = mysqli_query($con,$query);
						if($query_run)
						{
							if(mysqli_num_rows($query_run)>0)
							{
								$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
								@$FEATUREID =$row['FEATUREID '];
								@$feature1=$row['feature1'];
								@$feature2=$row['feature2'];

							}
							else{
								echo '<script type="text/javascript">alert("Invalid FEATUREID ")</script>';
							}
						}
						else{
							echo '<script type="text/javascript">alert("Error in query")</script>';
						}

					}

				}
			?>

			<form action="film feature.php" method="post">

				<label><b>Feature ID</b>  </label><button id="btn_go" name="fetch_btn" type="submit">Go</button>

				<input type="number" placeholder="Enter Feature ID" name="FEATUREID" value="<?php echo @$_POST['FEATUREID'];?>" >
				<label><b>film feature1</b></label>
				<input type="text" placeholder="Enter feature 1" name="feature1" value="<?php echo $feature1; ?>">

				<label><b>film feature2 </b></label>
				<input type="text" placeholder="Enter feature 2" name="feature2"value="<?php echo $feature2; ?>" >

				<center>
					<button id="btn_insert" name="insert_btn" type="submit">Insert</button>
					<button id="btn_update" name="update_btn" type="submit">Update</button>
					<button id="btn_delete" name="delete_btn" type="submit">Delete</button>
				</center>
			</form>

			<?php

				if(isset($_POST['insert_btn'])){

					//echo '<script type="text/javascript">alert("Insert Clicked")</script>';
					@$FEATUREID =$_POST['FEATUREID'];
					@$feature1=$_POST['feature1'];
					@$feature2=$_POST['feature2'];


					if($FEATUREID =="" || $feature1=="" || $feature2=="")
					{
						echo '<script type="text/javascript">alert("Insert values in all fields")</script>';
					}
					else{
						$query = "insert into film_feature values($FEATUREID ,'$feature1','$feature2')";
						$query_run=mysqli_query($con,$query);
						if($query_run)
						{
								echo '<script type="text/javascript">alert("Values inserted successfully")</script>';
						}
						else{
							echo '<script type="text/javascript">alert("Values Not inserted")</script>';
						}
					}

				}

				else if(isset($_POST['update_btn']))
				{
					//echo '<script type="text/javascript">alert("Update Clicked")</script>';
					if($_POST['FEATUREID']=="" || $_POST['feature1']=="" ||  $_POST['feature2']=="")
					{
						echo '<script type="text/javascript">alert("Enter Data in All fields")</script>';
					}
					else
					{
						@$FEATUREID =$_POST['FEATUREID'];
						@$feature1=$_POST['feature1'];
						@$feature2=$_POST['feature2'];


						$query = "update film_feature
							SET feature1='$feature1',feature2='$feature2'
							WHERE FEATUREID =$FEATUREID ";

						$query_run = mysqli_query($con,$query);

							if($query_run)
							{
								echo '<script type="text/javascript">alert("FILM FEATURE Updated successfully")</script>';
							}
							else{
								echo '<script type="text/javascript">alert("Error")</script>';
							}

					}
				}

				else if(isset($_POST['delete_btn']))
				{
					if($_POST['FEATUREID']=="")
					{
						echo '<script type="text/javascript">alert("Enter FEATUREID to delete Payment")</script>';
					}
				else{
						$FEATUREID = $_POST['FEATUREID'];
						$query = "delete from film_feature
							WHERE FEATUREID =$FEATUREID ";
						$query_run = mysqli_query($con,$query);
						if($query_run)
						{
							echo '<script type="text/javascript">alert("feature deleted")</script>';
						}
						else
						{
							echo '<script type="text/javascript">alert("Error in query")</script>';
						}
					}


				}

			?>
			<a href ="index.php" class ="btn_back">Back</a>
			<a href ="filmfeatureall.php" class ="btn_back2">Select All</a>
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
