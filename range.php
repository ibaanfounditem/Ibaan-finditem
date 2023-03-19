<?php
	require 'connect_db.php';
	if(ISSET($_POST['search'])){
		$date1 = date("Y-m-d", strtotime($_POST['date1']));
		$date2 = date("Y-m-d", strtotime($_POST['date2']));
		$query=mysqli_query($conn, "SELECT * FROM `tb_itemrecord` WHERE date(`date`) BETWEEN '$date1' AND '$date2'") or die(mysqli_error());
		$row=mysqli_num_rows($query);

		if($row>0){
			while($fetch=mysqli_fetch_array($query)){
?>
	<tr>
		<td style="text-align: center;"><?php echo $fetch['itemNo']?></td>
		<td style="text-align: center;"><?php echo $fetch['itemCategory']?></td>
		<td style="text-align: center;"><?php echo $fetch['itemLocation']?></td>
		<td style="text-align: center;"><?php echo $fetch['itemBrand']?></td>
        <td style="text-align: center;"><?php echo $fetch['itemColor']?></td>
        <td style="text-align: center;"><?php echo $fetch['itemDescription']?></td>
        <td style="text-align: center;"><?php echo $fetch['date']?></td>
	</tr>
<?php
			}
		}else{
			echo'
			<tr>
				<td colspan = "4"><center>No Record</center></td>
			</tr>';
		}
	}else{
		$query=mysqli_query($conn, "SELECT * FROM `tb_itemrecord`") or die(mysqli_error());
		while($fetch=mysqli_fetch_array($query)){
?>
	<tr>
		<td style="text-align: center;"><?php echo $fetch['itemNo']?></td>
		<td style="text-align: center;"><?php echo $fetch['itemCategory']?></td>
		<td style="text-align: center;"><?php echo $fetch['itemLocation']?></td>
		<td style="text-align: center;"><?php echo $fetch['itemBrand']?></td>
        <td style="text-align: center;"><?php echo $fetch['itemColor']?></td>
        <td style="text-align: center;"><?php echo $fetch['itemDescription']?></td>
        <td style="text-align: center;"><?php echo $fetch['date']?></td>
	</tr>
<?php
		}
	}
?>