<?php

require 'dbconfig/config.php';
	@$actorid="";
	$firstname="";
	$Lastname="";
	$Last_update="";

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
		<center><h2>Insert / Update / Delete Actor</h2></center>


		<div class="inner_container">

			<?php
				if(isset($_POST['fetch_btn'])){
					//echo '<script type="text/javascript">alert("Go button Clicked")</script>';

					$actorid = $_POST['actorid'];

					if($actorid=="")
					{
						echo '<script type="text/javascript">alert("Enter actor id to get Payment details")</script>';
					}
					else
					{
						$query = "select * from actor where actor_id=$actorid";
						$query_run = mysqli_query($con,$query);
						if($query_run)
						{
							if(mysqli_num_rows($query_run)>0)
							{
								$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
								@$actorid=$row['actor_id'];
								@$firstname=$row['first_name'];
								@$Lastname=$row['last_name'];
								@$Last_update=$row['last_update'];

							}
							else{
								echo '<script type="text/javascript">alert("Invalid actorid")</script>';
							}
						}
						else{
							echo '<script type="text/javascript">alert("Error in query")</script>';
						}

					}

				}
			?>

			<form action="actor.php" method="post">

				<label><b>Actor ID</b>  </label><button id="btn_go" name="fetch_btn" type="submit">Go</button>

				<input type="number" placeholder="Enter Actor ID" name="actorid" value="<?php echo @$_POST['actorid'];?>" >
				<label><b>Actor FirstName</b></label>
				<input type="text" placeholder="Enter FirstName" name="firstname" value="<?php echo $firstname; ?>">
				<label><b>Actor Lastname</b></label>
				<input type="text" placeholder="Enter Lastname" name="Lastname" value="<?php echo $Lastname; ?>">
				<label><b>Last_update </b></label>
				<input type="text" placeholder="Enter Last_update" name="Last_update"value="<?php echo $Last_update; ?>" >

				<center>
					<button id="btn_insert" name="insert_btn" type="submit">Insert</button>
					<button id="btn_update" name="update_btn" type="submit">Update</button>
					<button id="btn_delete" name="delete_btn" type="submit">Delete</button>
				</center>
			</form>

			<?php

				if(isset($_POST['insert_btn'])){

					//echo '<script type="text/javascript">alert("Insert Clicked")</script>';
					@$actorid=$_POST['actorid'];
					@$firstname=$_POST['firstname'];
					@$Lastname=$_POST['Lastname'];
					@$Last_update=$_POST['Last_update'];


					if($actorid=="" || $firstname=="" || $Lastname=="" || $Last_update=="")
					{
						echo '<script type="text/javascript">alert("Insert values in all fields")</script>';
					}
					else{
						$query = "insert into actor values($actorid,'$firstname','$Lastname','$Last_update')";
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
					if($_POST['actorid']=="" || $_POST['firstname']=="" || $_POST['Lastname']=="" || $_POST['Last_update']=="")
					{
						echo '<script type="text/javascript">alert("Enter Data in All fields")</script>';
					}
					else
					{
						@$actorid=$_POST['actorid'];
						@$firstname=$_POST['firstname'];
						@$Lastname=$_POST['Lastname'];
						@$Last_update=$_POST['Last_update'];


						$query = "update actor
							SET first_name='$firstname',Last_name='$Lastname',Last_update='$Last_update'
							WHERE actor_id=$actorid";

						$query_run = mysqli_query($con,$query);

							if($query_run)
							{
								echo '<script type="text/javascript">alert("Actor Updated successfully")</script>';
							}
							else{
								echo '<script type="text/javascript">alert("Error")</script>';
							}

					}
				}

				else if(isset($_POST['delete_btn']))
				{
					if($_POST['actorid']=="")
					{
						echo '<script type="text/javascript">alert("Enter actorid to delete Payment")</script>';
					}
				else{
						$actorid = $_POST['actorid'];
						$query = "delete from actor
							WHERE actor_id=$actorid";
						$query_run = mysqli_query($con,$query);
						if($query_run)
						{
							echo '<script type="text/javascript">alert("Actor deleted")</script>';
						}
						else
						{
							echo '<script type="text/javascript">alert("Error in query")</script>';
						}
					}


				}
			?>
			<a href ="index.php" class ="btn_back">Back</a>
			<a href ="actorall.php" class ="btn_back2">Select All</a>
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
