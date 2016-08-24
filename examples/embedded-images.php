<?php
	/****************************************************************************************************

		The following example sends an email with text and html parts.
		
		The html part contains 2 images, located in the images/ subdirectory (the <img> tags 
		explicitly refer to files images/image1.jpg and images/image2.jpg).

		Note that, since html contents are provided in a variable ($html), there is no way for the 
		Mail class to locate the path to the images that are specified in the <img> tags. This is why
		we add an extra parameter :

			dirname ( __FILE__ )

		to the constructor of the class, to indicate the root path where referenced images are to be
		searched.

	 ****************************************************************************************************/

	require ( 'examples.inc.php' ) ;

	$subject	=  "Example mail : embedded images" ;
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

		example <span>Html</span> contents with images.
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
	$mail -> Send ( ) ;

	echo ( "Mail sent\n" ) ;
