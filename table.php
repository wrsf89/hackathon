<?php
    include "db.php";
?>

<html>
<head>
    <title>data</title>
	<meta charset="utf-8">
    <style type="text/css">
        .table_titles, .table_cells {
                padding-right: 50px;
                padding-left: 50px;
                color: #fff;
        }
        .table_titles {
            color: #FFF;
            background-color: rgba( 102, 102, 102, 0.2 );
        }
        .table_cells {
            background-color: rgba( 0, 0, 0, 0.1 );
        }
        table {
            border: 2px solid #333;
			border-radius: 10px;
        }
        body { font-family: "Trebuchet MS", Arial; }
		
iframe::-webkit-scrollbar {
    display: none;
}


    </style>

</head>

<body>

<table border="0" cellspacing="0" cellpadding="3">
	<tr>
		<td class="table_titles">ID</td>
		<td class="table_titles">Time</td>
		<td class="table_titles">CarNumber</td>
        <td class="table_titles">Status</td>
        
     </tr>
						 
					<?php

					$query = "SELECT * FROM hackhistory WHERE idx <= 30000";
					$result = mysqli_query($dbh, $query);
					

					while($row = mysqli_fetch_array($result))
					{
						$time = date_create($row['time'], new DateTimeZone('Asia/Seoul'));
                        $time2 = date_format($time, 'H:i:s');
						
						
					echo "<tr>";
					echo "<td class='table_cells'>" . $row['idx'] . "</td>";
					echo "<td class='table_cells'>" . $time2 . "</td>";
					echo "<td class='table_cells'>" . $row['carnumber'] . "</td>";
                    echo "<td class='table_cells'>" . $row['status'] . "</td>";
					
					echo "</tr>";
					}
					echo "</table>";

					mysqli_close($dbh);
					?>
					
    </table>
    </body>
</html>