<?php
$CFG = new \stdClass;
$CFG->TITLE = "File Server";
$CFG->USERS = [["username" => "user1",
				"password" => "change me!",
				"files" => [["path" => "/home/user/somefolder1"],
							["path" => "/home/user/somefile.mp4"]
							]
				],
				["username" => "user2",
				"password" => "change me!",
				"files" => [["path" => "/home/user/somefolder2"],
							["path" => "/home/user/somefolder3"]
							]
				]
			];
		
		
?>