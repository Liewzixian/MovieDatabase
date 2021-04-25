<?php

require 'dbconfig/config.php';
	@$rentalid="";
	$rentaldate="";
  $inventory_id="";
  $customer_id="";
  $return_date="";
  $staff_id="";
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
		<center><h2>Insert / Update / Delete Rental</h2></center>


		<div class="inner_container">

			<?php
				if(isset($_POST['fetch_btn'])){
					//echo '<script type="text/javascript">alert("Go button Clicked")</script>';

					$rentalid = $_POST['rentalid'];

					if($rentalid=="")
					{
						echo '<script type="text/javascript">alert("Enter staff_id id to get Payment details")</script>';
					}
					else
					{
						$query = "select * from rental where rental_id=$rentalid";
						$query_run = mysqli_query($con,$query);
						if($query_run)
						{
							if(mysqli_num_rows($query_run)>0)
							{
								$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
								@$rentalid=$row['rental_id'];
								@$staff_id=$row['staff_id'];
								@$rentaldate=$row['rental_date'];
                @$inventory_id=$row['inventory_id'];
                @$customer_id=$row['customer_id'];
                @$return_date=$row['return_date'];
								@$Last_update=$row['last_update'];

							}
							else{
								echo '<script type="text/javascript">alert("Invalid rentalid")</script>';
							}
						}
						else{
							echo '<script type="text/javascript">alert("Error in query")</script>';
						}

					}

				}
			?>

			<form action="rental.php" method="post">

				<label><b>Rental ID</b>  </label><button id="btn_go" name="fetch_btn" type="submit">Go</button>

				<input type="number" placeholder="Enter rental ID" name="rentalid" value="<?php echo @$_POST['rentalid'];?>" >
				<label><b>staff_id</b></label>
				<input type="number" placeholder="Enter staff_id" name="staff_id" value="<?php echo $staff_id; ?>">
				<label><b>rentaldate</b></label>
				<input type="text" placeholder="Enter rentaldate" name="rentaldate" value="<?php echo $rentaldate; ?>">
				<label><b>inventory id  </b></label>
        <input type="text" placeholder="Enter inventory id" name="inventory_id" value="<?php echo $inventory_id; ?>">
				<label><b>Customer ID</b></label>
        <input type="number" placeholder="Enter customer id" name ="customer_id" value="<?php echo $customer_id; ?>">
				<label><b>return_date </b></label>
        <input type="text" placeholder="Enter return_date" name="return_date" value="<?php echo $return_date; ?>">
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
					@$rentalid=$_POST['rentalid'];
					@$staff_id=$_POST['staff_id'];
					@$rentaldate=$_POST['rentaldate'];
					@$inventory_id=$_POST['inventory_id'];
					@$customer_id=$_POST['customer_id'];
					@$return_date=$_POST['return_date'];
					@$Last_update=$_POST['Last_update'];


					if($rentalid=="" || $staff_id=="" || $rentaldate==""|| $inventory_id=="" ||$customer_id=="" ||$return_date=="" || $Last_update=="")
					{
						echo '<script type="text/javascript">alert("Insert values in all fields")</script>';
					}
					else{
						$query = "insert into rental values($rentalid,'$rentaldate',$inventory_id,$customer_id,'$return_date',$staff_id,'$Last_update')";
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
					if($_POST['rentalid']=="" || $_POST['staff_id']=="" || $_POST['rentaldate']==""|| $_POST['inventory_id']==""|| $_POST['customer_id']==""|| $_POST['return_date']=="" || $_POST['Last_update']=="")
					{
						echo '<script type="text/javascript">alert("Enter Data in All fields")</script>';
					}
					else
					{
						@$rentalid=$_POST['rentalid'];
						@$staff_id=$_POST['staff_id'];
						@$rentaldate=$_POST['rentaldate'];
						@$Last_update=$_POST['Last_update'];
						@$inventory_id=$_POST['inventory_id'];
						@$customer_id=$_POST['customer_id'];
						@$return_date=$_POST['return_date'];


						$query = "update rental
							SET staff_id=$staff_id,rental_date='$rentaldate',Last_update='$Last_update',inventory_id=$inventory_id ,customer_id=$customer_id,return_date='$return_date'
							WHERE rental_id=$rentalid";

						$query_run = mysqli_query($con,$query);

							if($query_run)
							{
								echo '<script type="text/javascript">alert("Payment Updated successfully")</script>';
							}
							else{
								echo '<script type="text/javascript">alert("Error")</script>';
							}

					}
				}

				else if(isset($_POST['delete_btn']))
				{
					if($_POST['rentalid']=="")
					{
						echo '<script type="text/javascript">alert("Enter rentalid to delete Payment")</script>';
					}
				else{
						$rentalid = $_POST['rentalid'];
						$query = "delete from rental
							WHERE rental_id=$rentalid";
						$query_run = mysqli_query($con,$query);
						if($query_run)
						{
							echo '<script type="text/javascript">alert("Payment Deleted")</script>';
						}
						else
						{
							echo '<script type="text/javascript">alert("Error in query")</script>';
						}
					}


				}
			?>
			<a href ="index.php" class ="btn_back">Back</a>
			<a href ="rentalall.php" class ="btn_back2">Select All</a>
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
