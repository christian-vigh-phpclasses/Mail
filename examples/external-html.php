<?php
	/****************************************************************************************************

		The following example sends an email with text and html parts.
		
		The html part contains 2 images, located in the images/ subdirectory (the <img> tags 
		explicitly refer to files images/image1.jpg and images/image2.jpg).

		In this example, the html contents are extracted from file "mail.html", which is located
		in the examples/ directory. The LoadHtml() method is called to define the html contents of
		the mail.

		The path used for getting images referenced by the html code will be the directory where
		the "main.html" file is located.

	 ****************************************************************************************************/

	require ( 'examples.inc.php' ) ;

	$subject	=  "Example mail : embedded images (html contents loaded from external file)" ;
	$text		=  "example text contents" ;

	$mail	=  new Mail ( $sender, $recipient, $subject, $text ) ;
	$mail -> LoadHtml ( dirname ( __FILE__ ) . '/mail.html' ) ;
	$mail -> Send ( ) ;

	echo ( "Mail sent\n" ) ;
