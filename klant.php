<?php 
if(isset($_POST['Klant'])){
            try {
			    $stmt = $conn->prepare("SELECT * FROM todo ORDER BY prio asc"); 
			    $stmt->execute();

			    // set the resulting array to associative
			    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

			    ?>
			    					
				    <table class="table table-hover table-striped">
				    	<tr>
				    		<th>ID: </th>
				    		<th>Title: </th>
				    		<th>prio: </th>
				    		<th>Link: </th>
				    		<th>update </th>
				    	</tr>
				    <?php

				    foreach ($results as $row) {
				        echo "<tr>";
				        echo "<td>".$row['id']."</td>";
				        echo "<td>".$row['title']."</td>";
				        echo "<td>".$row['prio']."</td>";
				        echo "<td><a href='show".$row['id'].".php'>Link</a></td>";
				        echo "<td><a href='show".$row['id'].".php'>update: ".$row['title']."</a></td>";
				        echo "</tr>";
				    }
				    ?>
			    	</table>
			    <?php
			}
			catch(PDOException $e) {
			    echo "Error: " . $e->getMessage();
			}
			$conn = null;
			echo "</table>";
}
        ?>