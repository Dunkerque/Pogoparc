<?php
	if ($idSU === $_SESSION["id"])
	{
		$properId = true;
	}

	else
	{
		$properId = false;
	}

	if ($properId == false)
	{
		require("views/display_delete_user.html");
	}

?>