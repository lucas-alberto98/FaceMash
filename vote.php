<?php
	$conn = mysqli_connect("localhost","root","","facemash");

	if(!$conn){
		echo 'Not connection DB';
	}

	$winner=$_GET['photo'];
	$id1=$_GET['id1'];
	$id2=$_GET['id2'];

	$query1="SELECT * from photos where id=".$id1;
	$sql1=mysqli_query($conn, $query1);
	$row1=mysqli_fetch_array($sql1);

	$query2="SELECT * from photos where id=".$id2;
	$sql2=mysqli_query($conn, $query2);
	$row2=mysqli_fetch_array($sql2);

	echo "Rating of a=".$row1['rating'];
	echo "Rating of b=".$row2['rating'];
	$rA=$row1['rating'];
	$rB=$row2['rating'];

	$exA=1/(1+pow(10,(($rB-$rA)/400)));
	echo "<br>".$exA;
	$exB=1/(1+pow(10,(($rA-$rB)/400)));
	echo "<br>".$exB;

	if($winner=="first"){

		$k1=$row1['k'];
		
		echo "<br>".$k1;
		
		$rA=$rA + $k1*(1-$exA);
		
		echo "<br>".$rA;
		
		if($rA>=0){
			$sql = "UPDATE photos SET rating=".$rA."WHERE id=".$id1;
		}
		else{
			$sql = "UPDATE photos SET rating=0 WHERE id=".$id1;
		}

		mysqli_query($conn, $sql);
		
		if($rA>225){
			$sql = "UPDATE photos SET k=10 WHERE id=".$id1;
			mysqli_query($conn, $sql);
		}
		elseif($rA<=75){
			$sql = "UPDATE photos SET k=25 WHERE id=".$id1;
			mysqli_query($conn, $sql);
		}
		else{
			$sql = "UPDATE photos SET k=15 WHERE id=".$id1;
			mysqli_query($conn, $sql);
		}



		$k2=$row2['k'];
		echo "<br>".$k2;
		$rB=$rB + $k2*(0-$exA);
		echo "<br>".$rB;
		
		if($rA>=0){
			$sql = "UPDATE photos SET rating=".$rB."WHERE id=".$id2;
		}
		else{
			$sql = "UPDATE photos SET rating=0 WHERE id=".$id2;
		}
		
		mysqli_query($conn, $sql);
		
		if($rB>225){
			$sql = "UPDATE photos SET k=10 WHERE id=".$id2;
			mysqli_query($conn, $sql);
		}
		elseif($rB<=75){
			$sql = "UPDATE photos SET k=25 WHERE id=".$id2;
			mysqli_query($conn, $sql);
		}
		else{
			$sql = "UPDATE photos SET k=15 WHERE id=".$id2;
			mysqli_query($conn, $sql);
		}


	}

	elseif($winner=="second"){
		$k1=$row1['k'];
		echo "<br>".$k1;
		$rA=$rA + $k1*(0-$exA);
		echo "<br>".$rA;
		
		if($rA>=0){
		$sql = "UPDATE photos SET rating=".$rA."WHERE id=".$id1;
		}
		else{
			$sql = "UPDATE photos SET rating=0 WHERE id=".$id1;
		}
		
		mysqli_query($conn, $sql);
		
		if($rA>225){
			$sql = "UPDATE photos SET k=10 WHERE id=".$id1;
			mysqli_query($conn, $sql);
		}
		elseif($rA<=75){
			$sql = "UPDATE photos SET k=25 WHERE id=".$id1;
			mysqli_query($conn, $sql);
		}
		else{
			$sql = "UPDATE photos SET k=15 WHERE id=".$id1;
			mysqli_query($conn, $sql);
		}


		$k2=$row2['k'];
		echo "<br>".$k2;
		$rB=$rB + $k2*(1-$exA);
		echo "<br>".$rB;
		
		if($rA>=0){
		$sql = "UPDATE photos SET rating=".$rB."WHERE id=".$id2;
		}
		else{
			$sql = "UPDATE photos SET rating=0 WHERE id=".$id2;
		}
		
		mysqli_query($conn, $sql);
		
		if($rB>225){
			$sql = "UPDATE photos SET k=10 WHERE id=".$id2;
			mysqli_query($conn, $sql);
		}
		elseif($rB<=75){
			$sql = "UPDATE photos SET k=25 WHERE id=".$id2;
			mysqli_query($conn, $sql);
		}
		else{
			$sql = "UPDATE photos SET k=15 WHERE id=".$id2;
			mysqli_query($conn, $sql);
		}



	}

header('Location: index.php');
?>