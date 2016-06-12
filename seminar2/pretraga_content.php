<!-- Forma za pretragu linija te prikaz rezultata pretrage -->
<?php
	//popunjavanje drop down liste sa mogućnostima polazišta iz baze polazišta
	$results_name = array();
	$results_id = array();
	//konekcija na bazu podataka
	$mysqli = new mysqli("localhost","root","root","Seminar2");
	/* check connection */
	if (mysqli_connect_errno()) 
	{
	     echo $lang["db_error"];
	    exit();
	}
	 //set charset to utf8
	if (!$mysqli->set_charset("utf8")) 
	{
		 echo $lang["db_error"];
		exit();
	}
	$query = "SELECT * FROM Polaziste";
	
	
	if ($stmt = $mysqli->prepare($query)) 
	{
	    /* execute statement */
	    $stmt->execute();

	    $stmt->bind_result($id, $name);
	     $x = 0;
	    while ($stmt->fetch()) {
		array_push($results_name,$name);
		array_push($results_id,$id);
		
	    }
	
	    /* close statement */
	    $stmt->close();
	}
	else
	{
		 echo $lang["db_error"];
	}
	/* close connection */
	$mysqli->close();

	?>


<script> //skripta koja pomoću JQuerya dohvaća rezultate pretrage
	$(document).ready(function()
	{
		$(" #from ").change(function() 
		{
			$("#to").empty().append(" ");
			//alert($(" #from ").val());
			$.get("rezultat.php",{ from:$(" #from ").val()},function(data)
			{
				//alert(data);
				var to_array = JSON.parse(data);
				for(var i = 0; i < to_array.length;i++)	
				{		
					$('#to').append($('<option>', {
					value: to_array[i]["id"],
					text: to_array[i]["name"]
				}));		
				}						
					
				
				
			});
			
		});
		
		var buy_ticket_string = "<?php echo $lang["buy_ticket"]; ?>";
		$(" #submit ").click(function()
		{
			$("#rezultat_pretrage").empty();
			$.get("rezultat.php",{ from:$(" #from ").val(), to:$(" #to" ).val(), date:$(" #date ").val()},function(data)
			{
				//alert(data);
				var to_array = JSON.parse(data);
				if (typeof to_array !== 'undefined' && to_array.length > 0) 
				{
					var table = $('<table></table>').addClass('foo');
					for(var i = 0; i < to_array.length;i++)	
					{		
						var row = $('<tr></tr>').addClass('row');
						var td_number = $('<td></td>').addClass('bar').text(i+1);
						var td_date =  $('<td></td>').addClass('bar').text(to_array[i]["date"]);
						var td_from = $('<td></td>').addClass('bar').text($("#from option:selected").text());
						var td_to = $('<td></td>').addClass('bar').text($("#to option:selected").text());
						var td_link =  $('<td></td>').addClass('bar').html("<button name='kupovina' value="+to_array[i]['id']+" type='submit'>"+buy_ticket_string+"</button>");
						row.append(td_number);
						row.append(td_date);
						row.append(td_from);
						row.append(td_to);
						row.append(td_link);
						table.append(row);
					}
					
				$("#rezultat_pretrage").append(table);
				}
				else		
				{
					$("#rezultat_pretrage").append('<?php echo $lang["no_results"]; ?>');
				}						
				
			});
		});
		
	});
</script>
<div id="pretraga">
	
	<h4> <?php echo $lang["search_journey_schedule"]?> </h4>
		<label for="from"><?php echo $lang["starting_point"]?></label>
		<select class="pretraga" id="from" name="from"> 
			<option disabled selected value> <?php echo $lang["choose"]; ?> </option>
		<?php 
			for($i = 0; $i < count($results_id); $i++)
			{
				echo "<option value='" . $results_id[$i] . "'>" . $results_name[$i] . " </option>";
			}
		?>
		</select>
		</br>
		<label for="to"><?php echo $lang["destination"]?></label>
		<select class="pretraga" id="to" name="to">
		
		</select> </br>
		<label for="date"><?php echo $lang["date"]?></label>
		<input type="date" class="pretraga" id="date" name="date"></br>
		<button class="pretraga" id="submit"> Submit </button>
	</div><h4> <?php echo $lang["search_result"]?> </h4>
	<form action="kupovina.php" method="POST">
		<div id="rezultat_pretrage">
		
		
		
		</div>
	</form>