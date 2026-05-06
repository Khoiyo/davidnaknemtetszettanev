<?php
    try {
    $conn = new PDO('mysql:host=localhost;dbname=nagylaszlo;charset=utf8',
            'nagylaszlo',
            'Admin12345',
	        	[
                	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            	]
	);
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>