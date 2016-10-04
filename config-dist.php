<?php
$CFG = new \stdClass;
$CFG->TITLE = "File Server";
$CFG->USERS = [["username" => "user1",
				"password" => "change me!",
				"files" => [["path" => "/home/user/somefolder1", "recursive" => True],
							["path" => "/home/user/somefile"]
							]
				],
				["username" => "user2",
				"password" => "change me!",
				"files" => [["path" => "/home/user/somefolder2", "recursive" => True],
							["path" => "/home/user/somefolder3", "recursive" => False]
							]
				]
			];
		
		
?>