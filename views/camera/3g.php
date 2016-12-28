<?php
/* @var $this yii\web\View */

$this->title = '3G-камеры';
?>
	<div id="page">
		<h3>3G-камеры</h3>

		<?php
		echo "<table class=docs_table><tr>
			  <td><table class=docs_menu_table>
				<tr><td><a href=camera/ip/>IP-камеры</a></td></tr>
				<tr><td><a href=camera/3g/>3G-камеры</a></td></tr>
		      </table></td>
			  <td style='padding-left: 20px;'><table width=500 border=0 align=center cellspacing=5>";
			foreach ($cameras as $row):
				echo "<tr><td><a href=camera/".$row['id'].">".$row['name']."</a><br></td></tr>";
				
				$base_dir = "camera";    
				$scan = scandir($base_dir, 1);  // сканируем папку base_dir	и сортируем в обратном порядке (параметр 1)
				
				echo "<tr><td><table border=0 width=700><tr>";
				
				for ($i=0; $i<5; $i++) // было $i<count($scan), написал 5, чтобы вывести за последние 3 дня, хуй его знает, почему так
				{
					if ($scan[$i] != '.' && $scan[$i] != '..' && is_dir($base_dir."/".$scan[$i]) && file_exists($base_dir."/".$scan[$i]."/".$row['folder']))   // выбираем только папки
					{			
						$photo = scandir($base_dir."/".$scan[$i]."/".$row['folder']."/1", 1);  // сканируем папки и сортируем фото в обратном порядке (параметр 1)
						
						for ($n=0; $n<1; $n++) // было $n<count($photo), сделал 1, чтобы вывести по одному снимку с каждой даты
						{ 
							if ($photo[$n] != '.' && $photo[$n] != '..' && is_file($base_dir."/".$scan[$i]."/".$row['folder']."/1/".$photo[$n]))  // выбираем только файлы
							{		 	 
								echo "<td align=center width=200>
										  <a href=http://dagavtodor.ru/camera/".$scan[$i]."/".$row['folder']."/1/".$photo[$n]." class=fancybox data-fancybox-group=gallery title='".$row['name']."'>

                                          <img src=http://dagavtodor.ru/camera/".$scan[$i]."/".$row['folder']."/1/".$photo[$n]." width=200>

								</a><br><br><br>
									  </td>";          	  			  
							}					
						} 						
					}
				}
				echo "</tr></table></td></tr>";
			endforeach;			
		echo "</table><br></td></tr></table>";
		?>

	</div>


