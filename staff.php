<?php

require 'dbconfig/config.php';
	@$staff_id="";
	$store_id="";
  $first_name="";
  $last_name="";
  $email="";
  $address_id="";
  $active="";
  $username="";
  $password="";
	$Last_update="";
	$picture="";

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
		<center><h2>Insert / Update / Delete Staff</h2></center>


		<div class="inner_container">

			<?php
				if(isset($_POST['fetch_btn'])){
					//echo '<script type="text/javascript">alert("Go button Clicked")</script>';

					$staff_id = $_POST['staff_id'];

					if($staff_id=="")
					{
						echo '<script type="text/javascript">alert("Enter email id to get staff details")</script>';
					}
					else
					{
						$query = "select * from staff where staff_id=$staff_id";
						$query_run = mysqli_query($con,$query);
						if($query_run)
						{
							if(mysqli_num_rows($query_run)>0)
							{
								$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
								@$staff_id=$row['staff_id'];
								@$email=$row['email'];
								@$store_id=$row['store_id'];
                @$first_name=$row['first_name'];
                @$address_id=$row['address_id'];
                @$last_name=$row['last_name'];
                @$active=$row['active'];
                @$username=$row['username'];
                @$password=$row['password'];
								@$Last_update=$row['last_update'];
								@$picture=$row['picture'];

							}
							else{
								echo '<script type="text/javascript">alert("Invalid staff_id")</script>';
							}
						}
						else{
							echo '<script type="text/javascript">alert("Error in query")</script>';
						}

					}

				}
			?>

			<form action="staff.php" method="post">

				<label><b>staff ID</b>  </label><button id="btn_go" name="fetch_btn" type="submit">Go</button>

				<input type="number" placeholder="Enter staff ID" name="staff_id" value="<?php echo @$_POST['staff_id'];?>" >
				<label><b>email</b></label>
				<input type="text" placeholder="Enter email" name="email" value="<?php echo $email; ?>">
				<label><b>store_id</b></label>
				<input type="number" placeholder="Enter store_id" name="store_id" value="<?php echo $store_id; ?>">
				<label><b>Firstname  </b></label>
        <input type="text" placeholder="Enter first name" name="first_name" value="<?php echo $first_name; ?>">
				<label><b>Lastname </b></label>
        <input type="text" placeholder="Enter last_name" name="last_name" value="<?php echo $last_name; ?>">
        <label><b>address id </b></label>
        <input type="number" placeholder="Enter address id " name="address_id" value="<?php echo $address_id; ?>">
        <label><b>active </b></label>
        <input type="number" placeholder="Enter active " name="active" value="<?php echo $active; ?>">
        <label><b>Username </b></label>
        <input type="text" placeholder="Enter username" name="username" value="<?php echo $username; ?>">
        <label><b>Password </b></label>
        <input type="text" placeholder="Enter password" name="password" value="<?php echo $password; ?>">
				<label><b>Picture </b></label>
				<input  type="file" name="picture"  accept="image/*" value=<img src="<?php echo $picture; ?>">
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
					@$staff_id=$_POST['staff_id'];
					@$email=$_POST['email'];
					@$store_id=$_POST['store_id'];
					@$first_name=$_POST['first_name'];
					@$address_id=$_POST['address_id'];
					@$active=$_POST['active'];
					@$username=$_POST['username'];
					@$last_name=$_POST['last_name'];
					@$Last_update=$_POST['Last_update'];
					@$password=$_POST['password'];
          @$picture =$_POST['picture'];

					if($staff_id=="" || $email=="" || $store_id==""|| $first_name=="" ||$address_id=="" ||$last_name=="" || $Last_update==""|| $active==""|| $username==""|| $password==""|| $picture=="")
					{
						echo '<script type="text/javascript">alert("Insert values in all fields")</script>';
					}
					else{
						$query = "insert into staff values($staff_id,'$first_name','$last_name',$address_id,'$picture','$email',$store_id,$active,'$username','$password','$Last_update')";
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
					if($_POST['staff_id']=="" || $_POST['email']=="" || $_POST['store_id']==""|| $_POST['first_name']==""|| $_POST['address_id']==""|| $_POST['last_name']=="" || $_POST['Last_update']==""|| $_POST['picture']=="")
					{
						echo '<script type="text/javascript">alert("Enter Data in All fields")</script>';
					}
					else
					{
						@$staff_id=$_POST['staff_id'];
						@$email=$_POST['email'];
						@$store_id=$_POST['store_id'];
						@$Last_update=$_POST['Last_update'];
						@$first_name=$_POST['first_name'];
						@$address_id=$_POST['address_id'];
						@$active=$_POST['active'];
						@$username=$_POST['username'];
						@$password=$_POST['password'];
						@$last_name=$_POST['last_name'];
						@$picture = $_POST['picture'];



						$query = "update staff
							SET email='$email',store_id=$store_id,Last_update='$Last_update',first_name='$first_name'
              ,staff_id=$staff_id,last_name='$last_name',address_id=$address_id,active=$active,username='$username',password='$password'
							,picture=$picture
							WHERE staff_id=$staff_id";

						$query_run = mysqli_query($con,$query);

							if($query_run)
							{
								echo '<script type="text/javascript">alert("staff Updated successfully")</script>';
							}
							else{
								echo '<script type="text/javascript">alert("Error")</script>';
							}

					}
				}

				else if(isset($_POST['delete_btn']))
				{
					if($_POST['staff_id']=="")
					{
						echo '<script type="text/javascript">alert("Enter staff_id to delete staff")</script>';
					}
				else{
						$staff_id = $_POST['staff_id'];
						$query = "delete from staff
							WHERE staff_id=$staff_id";
						$query_run = mysqli_query($con,$query);
						if($query_run)
						{
							echo '<script type="text/javascript">alert("staff deleted")</script>';
						}
						else
						{
							echo '<script type="text/javascript">alert("Error in query")</script>';
						}
					}


				}
			?>
			<a href ="index.php" class ="btn_back">Back</a>
			<a href ="staffall.php" class ="btn_back2">Select All</a>
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
