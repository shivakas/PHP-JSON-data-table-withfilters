<?php
	require_once 'classes\database.php'; //including class for db connection

	$database = new Database();
	$db = $database->dbConnection();//intializing db connection
	
	$homepage = file_get_contents('C:\xampp\htdocs\rexx\data\Code Challenge (Sales).json'); // extraxtig data from file
	$json = json_decode($homepage, true); // json array convertion
	
	foreach ($json as $key => $value) {
	  //check if record already exists
	  $sql='select * from sales where sale_id = ?';
	  $statement = $db->prepare($sql);
	  $statement->execute([$value["sale_id"]]);
	  $rows= $statement->fetchAll();
		if(empty($rows)){
			// inserting data in sales table
			$sql = 'INSERT INTO sales  VALUES (?, ?, ?, ?, ?, ?,?)'; 
			$statement = $db->prepare($sql);
			$statement->execute([$value["sale_id"],$value["customer_name"],$value["customer_mail"],$value["product_id"],$value["product_name"],$value["product_price"],$value["sale_date"]]);
		}
	}
    // fetching all dtat from table sales
	$sql = "SELECT * FROM sales";
	$statement = $db->prepare($sql);
	$statement->execute();
	$rows= $statement->fetchAll();

	//building a table to display slaes data
	echo '<input type="text" id=1 onkeyup="myFunction(this.id)" placeholder="filter for customer name"> <input type="text" id=4 onkeyup="myFunction(this.id)" placeholder="filter for product name"> <input type="text" id=5 onkeyup="myFunction(this.id)" placeholder="filter for product price"> <&nbsp>';
	echo '<table id="myTable" align="left" cellspacing="5" cellpadding="8">

	<tr><td align="left"><b>sale_id</b></td>
	<td align="left"><b>customer_name</b></td>
	<td align="left"><b>customer_mail</b></td>
	<td align="left"><b>product_id</b></td>
	<td align="left"><b>product_name</b></td>
	<td align="left"><b>product_price</b></td>
	<td align="left"><b>sale_date</b></td></tr>';

	foreach($rows as $row){
	echo '<tr><td align="left">' .
	$row[0] . '</td><td align="left">' .
	$row[1] . '</td><td align="left">' .
	$row[2] . '</td><td align="left">' .
	$row[3] . '</td><td align="left">' .
	$row[4] . '</td><td align="left">' .
	$row[5] . '</td><td align="left">'.
	$row[6] . '</td><td align="left">';
	echo '</tr>';

	}
	echo '<span id="val"></span>';
	echo '</table>';
?>

<script>
// script to calculate total product price
	var table = document.getElementById("myTable"), sumVal = 0, str="Total product price = ";
	for(var i = 1; i < table.rows.length; i++)
	{
		sumVal = sumVal + parseFloat(table.rows[i].cells[5].innerHTML);
	}

	document.getElementById("val").innerHTML = str.bold()+ sumVal;
</script>

<script>
//function to filter data and recalulate totla product price
	function myFunction(id) {
	  // Declare variables
	  var input, filter, table, tr, td, i, txtValue,sumVal = 0,str="Total product price = ";
	  input = document.getElementById(id);
	  filter = input.value.toUpperCase();
	  table = document.getElementById("myTable");
	  tr = table.getElementsByTagName("tr");

	  // Loop through all table rows, and hide those who don't match the search query
	  for (i = 1; i < tr.length; i++) {
		td = tr[i].getElementsByTagName("td")[id];
		if (td) {
		  txtValue = td.textContent || td.innerText;
		  if (txtValue.toUpperCase().indexOf(filter) > -1) {
			tr[i].style.display = "";
			sumVal = sumVal + parseFloat(table.rows[i].cells[5].innerHTML);
		  } else {
			  console.log(tr[i].cells[5].innerHTML);
				console.log(2);
			tr[i].style.display = "none";
		  }
		}
	  }
	  document.getElementById("val").innerHTML = str.bold()+ parseFloat(sumVal);    
	}
</script>