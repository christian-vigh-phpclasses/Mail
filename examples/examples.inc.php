<?php
	/****************************************************************************************************

		This file is included by all the examples in this directory.
		Don't forget to set the $recipient and $sender variables !

	 ****************************************************************************************************/

	require ( dirname ( __FILE__ ) . '/../Mail.phpclass' ) ;

	// Recipient address - set it to your preferred own email address for your testings
	$recipient	=  "me@somewhere.com" ;

	// Sender address - set this variable to false if you want the Mail class to use the "sendmail_from" setting
	// of your php.ini file
	$sender		=  "mail-example@example.com" ;

