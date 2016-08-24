<?php
	/****************************************************************************************************

		The following example sends an email with only a text part (no html part).

	 ****************************************************************************************************/

	require ( 'examples.inc.php' ) ;

	$subject	=  "Example mail : text only (no html)" ;
	$text		=  "example text contents" ;

	$mail	=  new Mail ( $sender, $recipient, $subject, $text ) ;
	$mail -> Send ( ) ;

	echo ( "Mail sent\n" ) ;
