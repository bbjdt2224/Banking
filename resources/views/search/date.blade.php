@use App\lines;

<?php
	$search = Transactions::all()->where('account', '=', $_GET['account'])->where('date', '=', $_GET['date']);
	$table = "";
	foreach($search as $line){
		echo "<tr>";
			echo "<td>".\Carbon\Carbon::parse($line->date)->toFormattedDateString()."</td>";
			echo "<td>$".number_format($line->amount, 2)."</td>";
			echo "<td>".$line->store."</td>";
			echo "<td>".$line->description."</td>";
			echo "<td><a href='".$line->reciept."'' class='btn btn-primary'>Reciept</a></td>";
			echo "<td>";
				echo "<a href='../edit/".$line->account."/".$line->id."' class='btn btn-primary'>Edit</a>";
				echo "<a href='../delete/".$line->account."/".$line->id."' class='btn btn-danger'>X</a></td>";
		echo "</tr>";
			
			$total += $line->amount;
	}
?>

