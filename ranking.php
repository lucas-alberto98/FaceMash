<?php 
	$conn = mysqli_connect("localhost","root","","facemash");

	if(!$conn){
		echo 'Not connection DB';
	}
?>
<html>
<head>
	<title>Ranking</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
	<div class="header">
		<a href="index.php" style="text-decoration:none"><h1>FACEMASH</h1></a>
		
	</div>
		<?php
			$i=1;
			$query="Select * from photos  order by rating desc";
			$sql=mysqli_query($conn, $query);

			while($row=mysqli_fetch_array($sql)){
			?>
			
				<div style="margin-bottom: 50px">
					<center>
						<h2> <?php echo $i; ?>º</h2>
						<p>Current rating : <b><?php echo $row['rating'] ?></b></p>
						<img src="images/<?php echo $row['photo']; ?>" >
						
					</center>
				</div>
				
			<?php
				$i++;
			}
		?>
</body>
</html>