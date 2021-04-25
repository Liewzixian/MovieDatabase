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
		<center><h2>Insert / Update / Delete Film</h2></center>


		<div class="inner_container">

			<?php
				if(isset($_POST['fetch_btn'])){
					//echo '<script type="text/javascript">alert("Go button Clicked")</script>';

					$film_id = $_POST['film_id'];

					if($film_id=="")
					{
						echo '<script type="text/javascript">alert("Enter film id to get film details")</script>';
					}
					else
					{
						$query = "select * from film where film_id=$film_id";
						$query_run = mysqli_query($con,$query);
						if($query_run)
						{
							if(mysqli_num_rows($query_run)>0)
							{
								$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
								@$film_id=$row['film_id'];
								@$rental_duration=$row['rental_duration'];
								@$language_id=$row['language_id'];
                @$title=$row['title'];
                @$replacement_cost=$row['replacement_cost'];
                @$description=$row['description'];
                @$length=$row['length'];
                @$rental_rate=$row['rental_rate'];
                @$rating=$row['rating'];
                @$FEATUREID=$row['FEATUREID'];
                @$release_year=$row['release_year'];
								@$Last_update=$row['last_update'];

							}
							else{
								echo '<script type="text/javascript">alert("Invalid film_id")</script>';
							}
						}
						else{
							echo '<script type="text/javascript">alert("Error in query")</script>';
						}

					}

				}
			?>

			<form action="film.php" method="post">

				<label><b>film ID</b>  </label><button id="btn_go" name="fetch_btn" type="submit">Go</button>

				<input type="number" placeholder="Enter film ID" name="film_id" value="<?php echo @$_POST['film_id'];?>" >
				<label><b>rental_duration</b></label>
				<input type="text" placeholder="Enter rental_duration" name="rental_duration" value="<?php echo $rental_duration; ?>">
				<label><b>language_id</b></label>
				<input type="number" placeholder="Enter language_id" name="language_id" value="<?php echo $language_id; ?>">
				<label><b>description</b></label>
        <input type="text" placeholder="Enter description" name="description" value="<?php echo $description; ?>">
				<label><b>Film title</b></label>
				<input type="text" placeholder="Enter title" name="title" value="<?php echo $title; ?>">
        <label><b>feature id  </b></label>
        <input type="number" placeholder="Enter feature id " name="FEATUREID" value="<?php echo $FEATUREID; ?>">
        <label><b>length </b></label>
        <input type="number" placeholder="Enter length " name="length" value="<?php echo $length; ?>">
        <label><b>replaceemnt cost </b></label>
        <input type="number" placeholder="Enter replacement cost" name="replacement_cost" value="<?php echo $replacement_cost; ?>">
        <label><b>rental rate </b></label>
        <input type="number" placeholder="Enter rental rate" name="rental_rate" value="<?php echo $rental_rate; ?>">
        <label><b>release year </b></label>
        <input type="text" placeholder="Enter release year" name="release_year" value="<?php echo $release_year; ?>">
        <label><b>rating </b></label>
        <input type="text" placeholder="Enter rating" name="rating" value="<?php echo $rating; ?>">
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
					@$film_id=$_POST['film_id'];
					@$rental_duration=$_POST['rental_duration'];
					@$language_id=$_POST['language_id'];
					@$title=$_POST['title'];
					@$rental_rate=$_POST['rental_rate'];
					@$length=$_POST['length'];
					@$replacement_cost=$_POST['replacement_cost'];
					@$description=$_POST['description'];
					@$FEATUREID=$_POST['FEATUREID'];
					@$rating=$_POST['rating'];
					@$release_year=$_POST['release_year'];
					@$Last_update=$_POST['Last_update'];


					if($film_id=="" || $rental_duration=="" || $language_id==""|| $title=="" ||$rental_rate=="" ||$description=="" || $Last_update==""|| $length==""|| $replacement_cost==""|| $rating==""|| $FEATUREID==""|| $release_year=="")
					{
						echo '<script type="text/javascript">alert("Insert values in all fields")</script>';
					}
					else{
						$query = "insert into film values($film_id,'$title','$description','$release_year',$language_id,$rental_duration,$rental_rate,$length,$replacement_cost,'$rating','$Last_update',$FEATUREID)";
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
					if($_POST['film_id']=="" || $_POST['rental_duration']=="" || $_POST['language_id']==""|| $_POST['title']==""|| $_POST['rental_rate']==""|| $_POST['description']=="" || $_POST['Last_update']==""||$_POST['replacement_cost']==""|| $_POST['FEATUREID']==""|| $_POST['length']==""|| $_POST['rating']==""|| $_POST['length']=="" )
					{
						echo '<script type="text/javascript">alert("Enter Data in All fields")</script>';
					}
					else
					{
						@$film_id=$_POST['film_id'];
						@$rental_duration=$_POST['rental_duration'];
						@$language_id=$_POST['language_id'];
						@$Last_update=$_POST['Last_update'];
						@$title=$_POST['title'];
						@$rental_rate=$_POST['rental_rate'];
						@$length=$_POST['length'];
						@$replacement_cost=$_POST['replacement_cost'];
						@$description=$_POST['description'];
						@$FEATUREID=$_POST['FEATUREID'];
						@$rating=$_POST['rating'];
						@$release_year=$_POST['release_year'];


						$query = "update film
							SET rental_duration=$rental_duration,language_id='$language_id',Last_update='$Last_update',title='$title'
              ,film_id=$film_id,description='$description',rental_rate=$rental_rate,length=$length,replacement_cost=$replacement_cost
              ,FEATUREID=$FEATUREID, rating ='$rating',release_year='$release_year'
							WHERE film_id=$film_id";

						$query_run = mysqli_query($con,$query);

							if($query_run)
							{
								echo '<script type="text/javascript">alert("FILM Updated successfully")</script>';
							}
							else{
								echo '<script type="text/javascript">alert("Error")</script>';
							}

					}
				}

				else if(isset($_POST['delete_btn']))
				{
					if($_POST['film_id']=="")
					{
						echo '<script type="text/javascript">alert("Enter film_id to delete film")</script>';
					}
				else{
						$film_id = $_POST['film_id'];
						$query = "delete from film
							WHERE film_id=$film_id";
						$query_run = mysqli_query($con,$query);
						if($query_run)
						{
							echo '<script type="text/javascript">alert("film deleted")</script>';
						}
						else
						{
							echo '<script type="text/javascript">alert("Error in query")</script>';
						}
					}


				}
			?>
			<a href ="index.php" class ="btn_back">Back</a>
			<a href ="filmall.php" class ="btn_back2">Select All</a>
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
