<?php
$kandunganMesej = array
(
	0 => array 
	(
		'url' => '#',
		'userImage' => 'dist/img/user1-128x128.jpg',
		'mesejTajuk' => 'Support Team 1',
		'mesejMasa' => '5 mins',
		'mesejIsi' => 'Why not buy a new awesome theme?',
	),	
	1 => array 
	(
		'url' => '#',
		'userImage' => 'dist/img/user2-160x160.jpg',
		'mesejTajuk' => 'Support Team 2',
		'mesejMasa' => '10 mins',
		'mesejIsi' => 'Sudah 10 minit',
	),	
	2 => array 
	(
		'url' => '#',
		'userImage' => 'dist/img/user3-128x128.jpg',
		'mesejTajuk' => 'Tanya: Datang',
		'mesejMasa' => '15 mins',
		'mesejIsi' => 'Tengok wayang di pawagam, cerita apa ya?<br>'
			. 'Ingat mahu tonton Ada Apa Dengan Cinta',
	),	
	3 => array 
	(
		'url' => '#',
		'userImage' => 'dist/img/user4-128x128.jpg',
		'mesejTajuk' => 'Lisa: Jom Makan',
		'mesejMasa' => '20 mins',
		'mesejIsi' => 'Sudah 20 minit kita tunggu di kantin',
	),	
	4 => array 
	(
		'url' => '#',
		'userImage' => 'dist/img/user5-128x128.jpg',
		'mesejTajuk' => 'Support Team 5',
		'mesejMasa' => '25 mins',
		'mesejIsi' => 'Sudah 25 minit',
	), //*/
);

		$bilMesej = count($kandunganMesej); // nanti dapatkan count() dari array
		echo "\t\t";?><a href="#" class="dropdown-toggle" data-toggle="dropdown">
		<i class="fa fa-envelope-o"></i>
		<span class="label label-success"><?=$bilMesej?></span>
		</a>
		<ul class="dropdown-menu">
		<li class="header">Anda ada <?=$bilMesej?> mesej</li><?php
		foreach ($kandunganMesej as $keyMesej => $dataMesej):?>
		<li><!-- inner menu: contains the messages -->
			<ul class="menu">
				<li><!-- start message -->
				<a href="#">
				<div class="pull-left"><!-- User Image -->
				<img src="<?php echo $url . $dataMesej['userImage'] ?>" class="img-circle" alt="User Image">
				</div><!-- Message title and timestamp -->
				<h4><?php echo $dataMesej['mesejTajuk'] ?>
					<small><i class="fa fa-clock-o"></i><?php echo $dataMesej['mesejMasa'] ?></small>
				</h4><!-- The message -->
				<p><?php echo $dataMesej['mesejIsi'] ?></p>
				</a>
				</li><!-- end message -->
			</ul><!-- /.menu -->
		</li>
<?php	endforeach;
		echo "\t\t";?>
		<!-- <li class="footer"><a href="#">See All Messages</a></li> -->
		</ul>
