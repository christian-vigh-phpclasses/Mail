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

	// Html contents - this will display the string "example Html contents", with a big "Html" word displayed in red
	// Note that you can use inline style definitions and any html tags you like
	$html		=  <<<END
		<style>
			span
			   {
				color		:  #FF0000 ;
				font-size	:  24px ;
				font-weight	:  bold ;
			    }
		</style>

		This <span>Html</span> file contains two embedded images, and 3 attachments : file1.txt, file2.txt and zipdata.zip
		<br><br>
		Image 1 : <br>
		<img src="images/image1.jpg"/>
		<br>
		Image 2 : <br>
		<img src="images/image2.jpg"/>
		<br>
		<br>
		End of mail with embedded images.
END;

	$mail	=  new Mail ( $sender, $recipient, $subject, $text, $html, dirname ( __FILE__ ) ) ;
	$mail -> AddAttachment ( dirname ( __FILE__ ) . '/data/file1.txt' ) ;
	$mail -> AddAttachment ( dirname ( __FILE__ ) . '/data/file2.txt' ) ;

	$mail -> Send ( ) ;

	echo ( "Mail sent\n" ) ;
