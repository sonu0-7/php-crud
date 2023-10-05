<?php
				$food1_qty = 2;
				$food1_price = 10.99;
				$food1_total = $food1_qty * $food1_price;
				
				$food2_qty = 1;
				$food2_price = 15.99;
				$food2_total = $food2_qty * $food2_price;
				
				$food3_qty = 3;
				$food3_price = 8.99;
				$food3_total = $food3_qty * $food3_price;
				
				$food4_qty = 1;
				$food4_price = 12.99;
				$food4_total = $food4_qty * $food4_price;
				
				$food5_qty = 2;
				$food5_price = 9.99;
				$food5_total = $food5_qty * $food5_price;
				
				$food6_qty = 1;
				$food6_price = 11.99;
				$food6_total = $food6_qty * $food6_price;
				
				$total_qty = $food1_qty + $food2_qty + $food3_qty + $food4_qty + $food5_qty + $food6_qty;
				$gross_total = $food1_total + $food2_total + $food3_total + $food4_total + $food5_total + $food6_total;
				$sgst = $gross_total * 0.025;
				$sales_tax = $gross_total * 0.07;
			?>
			<tr>
				<td>Food1</td>
				<td><?php echo $food1_qty; ?></td>
				<td><?php echo '$'.$food1_price; ?></td>
				<td><?php echo '$'.$food1_total; ?></td>
			</tr>
			<tr>
				<td>Food2</td>
				<td><?php echo $food2_qty; ?></td>
				<td><?php echo '$'.$food2_price; ?></td>
				<td><?php echo '$'.$food2_total; ?></td>
			</tr>
			<tr>
				<td>Food3</td>
				<td><?php echo $food3_qty; ?></td>
				<td><?php echo '$'.$food3_price; ?></td>
				<td><?php echo '$'.$food3_total; ?></td>
			</tr>
			<tr>
				<td>Food4</td>
				<td><?php echo $food4_qty; ?></td>
				<td><?php echo '$'.$food4_price; ?></td>
				<td><?php echo '$'.$food4_total; ?></td>
			</tr>
			<tr>
				<td>Food5</td>
				<td><?php echo $food5_qty; ?></td>
				<td><?php echo '$'.$food5_price; ?></td>
				<td><?php echo '$'.$food5_total; ?></td>
			</tr>