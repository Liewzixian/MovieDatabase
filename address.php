<?php

require 'dbconfig/config.php';
	@$addressid="";
	$address="";
	$district="";
  $city_id="";
  $postal_code="";
  $phone="";
	$Last_update="";
	$PREFIX="";

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
		<center><h2>Insert / Update / Delete Address</h2></center>


		<div class="inner_container">

			<?php
				if(isset($_POST['fetch_btn'])){
					//echo '<script type="text/javascript">alert("Go button Clicked")</script>';

					$addressid = $_POST['addressid'];

					if($addressid=="")
					{
						echo '<script type="text/javascript">alert("Enter address id to get Payment details")</script>';
					}
					else
					{
						$query = "select * from address where address_id=$addressid";
						$query_run = mysqli_query($con,$query);
						if($query_run)
						{
							if(mysqli_num_rows($query_run)>0)
							{
								$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
								@$addressid=$row['address_id'];
								@$address=$row['address'];
								@$district=$row['district'];
                @$city_id=$row['city_id'];
                @$postal_code=$row['postal_code'];
                @$phone=$row['phone'];
								@$PREFIX=$row['PREFIX'];
								@$Last_update=$row['last_update'];

							}
							else{
								echo '<script type="text/javascript">alert("Invalid addressid")</script>';
							}
						}
						else{
							echo '<script type="text/javascript">alert("Error in query")</script>';
						}

					}

				}
			?>

			<form action="address.php" method="post">

				<label><b>address ID</b>  </label><button id="btn_go" name="fetch_btn" type="submit">Go</button>
				<input type="number" placeholder="Enter address ID" name="addressid" value="<?php echo @$_POST['addressid'];?>" >
				<label><b>address</b></label>
				<input type="text" placeholder="Enter address" name="address" value="<?php echo $address; ?>">
				<label><b>district</b></label>
				<input type="text" placeholder="Enter district" name="district" value="<?php echo $district; ?>">
				<label><b>city id  </b></label>
        <input type="number" placeholder="Enter city id" name="city_id" value="<?php echo $city_id; ?>">
				<label><b>postal code </b></label>
        <input type="text" placeholder="Enter postal code" name="postal_code" value="<?php echo $postal_code; ?>">
				<label><b>phone </b></label>
        <input type="text" placeholder="Enter phone" name="phone" value="<?php echo $phone; ?>">
				<label><b>PREFIX </b></label>
				<input type="text" placeholder="Enter PREFIX" name="PREFIX" value="<?php echo $PREFIX; ?>">
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
					@$addressid=$_POST['addressid'];
					@$address=$_POST['address'];
					@$district=$_POST['district'];
          @$city_id=$_POST['city_id'];
          @$postal_code=$_POST['postal_code'];
          @$phone=$_POST['phone'];
					@$Last_update=$_POST['Last_update'];
					@$PREFIX=$_POST['PREFIX'];


					if($addressid=="" || $address=="" || $district==""|| $city_id=="" ||$postal_code=="" ||$phone=="" ||$PREFIX=="" || $Last_update=="")
					{
						echo '<script type="text/javascript">alert("Insert values in all fields")</script>';
					}
					else{
						$query = "insert into address values($addressid,'$address','$district',$city_id,$postal_code,$phone,'$Last_update',$PREFIX)";
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
					if($_POST['addressid']=="" || $_POST['address']=="" || $_POST['district']==""|| $_POST['city_id']==""|| $_POST['PREFIX']==""|| $_POST['postal_code']==""|| $_POST['phone']=="" || $_POST['Last_update']=="")
					{
						echo '<script type="text/javascript">alert("Enter Data in All fields")</script>';
					}
					else
					{
						@$addressid=$_POST['addressid'];
						@$address=$_POST['address'];
						@$district=$_POST['district'];
						@$Last_update=$_POST['Last_update'];
            @$city_id=$_POST['city_id'];
            @$postal_code=$_POST['postal_code'];
            @$phone=$_POST['phone'];
            @$PREFIX=$_POST['PREFIX'];

						$query = "update address
							SET address='$address',district='$district',Last_update='$Last_update',city_id=$city_id
              ,postal_code=$postal_code
              ,phone=$phone
							,PREFIX=$PREFIX
							WHERE address_id=$addressid";

						$query_run = mysqli_query($con,$query);

							if($query_run)
							{
								echo '<script type="text/javascript">alert("address Updated successfully")</script>';
							}
							else{
								echo '<script type="text/javascript">alert("Error")</script>';
							}

					}
				}

				else if(isset($_POST['delete_btn']))
				{
					if($_POST['addressid']=="")
					{
						echo '<script type="text/javascript">alert("Enter addressid to delete Payment")</script>';
					}
				else{
						$addressid = $_POST['addressid'];
						$query = "delete from address
							WHERE address_id=$addressid";
						$query_run = mysqli_query($con,$query);
						if($query_run)
						{
							echo '<script type="text/javascript">alert("address deleted")</script>';
						}
						else
						{
							echo '<script type="text/javascript">alert("Error in query")</script>';
						}
					}


				}
			?>
			<a href ="index.php" class ="btn_back">Back</a>
			<a href ="addressall.php" class ="btn_back2">Select All</a>
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
