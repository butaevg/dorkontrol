<?php
/* @var $this yii\web\View */

$this->title = $camera->name;
?>
	<div id="page">
		<h3><?php echo $camera->name; ?></h3>

		<?php
		echo "<p style='padding-left: 30px;'><a href=camera/3g/><<< все 3g-камеры</a></p><br>";
		
		$base_dir = "camera";    		
		$scan = scandir($base_dir, 1);  // сканируем папку base_dir	и сортируем в обратном порядке (параметр 1)
		
		for ($i=0; $i<count($scan); $i++) 
		{
			if ($scan[$i] != '.' && $scan[$i] != '..' && is_dir($base_dir."/".$scan[$i]) && file_exists($base_dir."/".$scan[$i]."/".$cam['folder']))   // выбираем только папки
			{			
				echo "<p><table border=0 width=900>
					<tr><td align=center colspan=4><b>Снимки за ".substr($scan[$i],8,2).".".substr($scan[$i],5,2).".".substr($scan[$i],0,4)."</b><br><br></td></tr>"; 
				$td = 0;  // Вспомогательная переменная для вывода фотографий по 3 штуки в строке
				
				$photo = scandir($base_dir."/".$scan[$i]."/".$cam['folder']."/1", 1);  // сканируем папки	и сортируем фото в обратном порядке (параметр 1)
				
				for ($n=0; $n<count($photo); $n++) 
				{ 
					if ($photo[$n] != '.' && $photo[$n] != '..' && is_file($base_dir."/".$scan[$i]."/".$cam['folder']."/1/".$photo[$n]))  // выбираем только файлы
					{		 
						if ($td == 0) echo "<tr>";  // Если значение временной переменной равно 0 выводим тэг начала строки таблицы <tr>		 
						echo "<td align=center width=200>
								  <a href=http://dagavtodor.ru/camera/".$scan[$i]."/".$cam['folder']."/1/".$photo[$n]." class=fancybox data-fancybox-group=gallery title='".$cam['name']."'>
									<img src=http://dagavtodor.ru/camera/".$scan[$i]."/".$cam['folder']."/1/".$photo[$n]." width=200>

								  </a><br><br>
							  </td>";          	  			  
						$td++;  // Увеличиваем значение временной переменной $td	 
						if ($td == 4) // выводим завершающий тэг </tr>, а значение самой переменной обнуляем		
						{
							echo "</tr>";
							$td = 0;
						} 		
					}					
				} 
				$td = 0;  // Обнуляем переменную $td, когда фото одного дня заканчиваются
				echo "</table></p>";
			}
		}
		?>

    </div>