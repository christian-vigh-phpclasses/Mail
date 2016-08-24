<?php
	/****************************************************************************************************

		The following example sends an email with text and html parts.
		The html part will be displayed to your recipient if his messenging client supports viewing
		html contents.

	 ****************************************************************************************************/

	require ( 'examples.inc.php' ) ;

	$subject	=  "Example mail : text + html" ;
	$text		=  "example text contents" ;

	// Html contents - this will display the string "example Html contents", with a big "Html" word displayed in red
	// Note that you can use inline style definitions
	$html		=  <<<END
		<style>
			span
			   {
				color		:  #FF0000 ;
				font-size	:  24px ;
				font-weight	:  bold ;
			    }
		</style>

		example <span>Html</span> contents.
END;

	$mail	=  new Mail ( $sender, $recipient, $subject, $text, $html ) ;
	$mail -> Send ( ) ;

	echo ( "Mail sent\n" ) ;
