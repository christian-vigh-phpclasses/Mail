# INTRODUCTION #

The **Mail** class is yet-another PHP mailer, with the following features :

- It entirely relies on the PHP *mail()* function, meaning that it will be automatically integrated into your production environment, using your *hp.ini* settings
- It allows you to specify both plain text and html parts, for messenging clients which cannot read html
- It automatically embeds images referenced by your html code, coming either from a string or from an external html file. 
- It allows you to add as many file attachments as you want.
- You can of course specify "To", "CC" or "BCC" recipients. The class will ignore any duplicates.   

# DEPENDENCIES #

The **Mail* class requires the Adavanced Regex package, located here :

	http://www.phpclasses.org/package/9336-PHP-Match-MSDOS-UNIX-patterns-with-regular-expressions.html

File **Regex.class.php** has been provided here for your convenience, but this may not be the latest version.

# EXAMPLES #

You can have a look at the **examples/** directory, to have an overview of the various usages of this class. The file [examples/README.md](examples/README.md "examples/README.md") explains how the examples are organized, and which example does what.

The basic usage of the **Mail** class is fairly simple ; the following example will send a plain text mail with subject "Mail subject", and contents "Mail contents", to the address "someone@example.com" :

	$mail 	=  new Mail ( false, "someone@example.com", "Mail subject", "Mail contents" ) ;
	$mail -> Send ( ) ;

An exception will be thrown if something goes wrong.

# REFERENCE #

## METHODS ##

### Constructor ###

The **Mail** class constructor has the following signature :

	$mail 	=  new Mail ( $from = false, $to = false, $subject = false, $text = false, $html = false, $html_base = false ) ;

It creates an instance of the class, and any parameters defined in the constructor can be specified later by using properties.

Parameters are the following 

- *$from* : Sender's email. It can be anything if your outgoing smtp server does not check the validity of the sender's email address, which is a common case on self-configured Unix systems. If you do not specify a value for this parameter, then you will have two choices :
	- Either set it later by assigning the *From* property, or
	- Let PHP use your settings defined in *php.ini* (**sendmail_from** setting)
- *to* : Either a string specifying the recipient's email, or an array of strings specifying multiple recipients. If you do not specify this parameter during object instantiation, you will still be able to specify recipients using the *AddRecipient()* method.
- *$subject* : Mail subject. You can specify it later by assigning the **Subject** property.
- *$text* : Plain text contents. You can specify it later by assigning the **Text** property. If no contents are provided for this value, then plain text contents will be extracted from the **Html** property.
- *$html* : Html contents. You can specify it later by assigning the **Html** property.
- *$html\_base* : The class automatically detects references to external images and embeds them in the outgoing mail. This parameter specifies the root path for the images. You can set it later by assigning the **HtmlBasePath* property.

### $mail -> AddRecipient ( $addresses... ) ###

Adds the specified addresses to the recipient list. 

The function's parameters can be any number of strings or arrays of strings containing the addresses.

Duplicate addresses will be ignored.

Example :

	$mail -> AddRecipient ( 'me@example.com', [ 'person1@example.com', 'person2@example.com' ] ) ;

You can also manually append addresses to the **To** property but in this case, there will be no checking on duplicates :

	$mail -> To [] 		=  'me@example.com' ;
	$mail -> To [] 		=  'person1@example.com' ; 	// etc.


### $mail -> AddCC ( $addresses... ) ###

Adds addresses to Carbon Copy recipients.

Behaves as the *AddRecipient()* method. You can also manually append addresses to the **CC** property.

### $mail -> AddBCC ( $addresses... ) ###

Adds addresses to Blind Carbon Copy recipients (ie, the recipients added by the *AddRecipient()* and *AddCC()* methods won't know that there are additional recipients specified as **BCC**).

Behaves as the *AddRecipient()* method. You can also manually append addresses to the **BCC** property.

### $mail -> AddMimeHeader ( $name, $value, $replace = true ) ; ###

Adds a MIME header or replaces an existing one.

### $mail -> AddAttachment ( $path, $name = false ) ###

Adds an attachment to the current mail. The *$name* parameter indicates the attachment file name that will be shown to the recipient when he will open its mail. If not specified, the filename portion of the *$path* parameter will be used.

### $contents = $mail -> GetContents ( ) ; ###

Returns the mail contents as plain text, including MIME headers, text and base64-encoded attachments.

### $mail -> LoadHtml ( $file, $base\_path = false ) ; ###

Html contents can be specified in two ways : either by specifying some value for the *$html* parameter of the class constructor, or setting later the **Html** property.

The *LoadHtml()* method provides a third way to load html contents, from an external file. This file can be a regular html page using <html>, <head> and <body> tags (or not) ; the following contents will be extracted from it to form the mail's html part :

- Any &lt;style&gt; contents located between the &lt;head&gt; and &lt;/head&gt; tags
- Any contents located between the &lt;body&gt; and &lt;/body&gt; tags

The *$base\_path* parameter indicates the root path for searching external images referenced by html contents.

### $mail -> Send ( ) ; ###

Sends the mail using the standard PHP *mail()* function.

An exception will be thrown if something goes wrong.

### $mail -> Validate ( ) ; ###

Validates an email by verifying the following elements :

- At least one recipient must have been specified
- The email originator must have been specified
		
It also provides default values for certain fields :

- If the **Subject** property is empty, it will be set to "(No subject)" 
- If the **ReplyTo** and **ErrorsTo** properties are empty, they will be set to the email
  originator.
- If the HTML content part is empty but not the text content part, HTML contents will
  be set to text contents (or vice-versa).
- If both content parts are empty, the string "\*\*\* EMPTY MESSAGE \*\*\*" will be inserted.

## PROPERTIES ##

### BCC ###

An array containing the Blind Carbon Copy recipients.

The preferred way of adding new BCC recipients is by using the *AddBCC()* method, which performs additional checkings, such as ignoring duplicate addresses.

### CC ###

An array containing the Carbon Copy recipients.

The preferred way of adding new CC recipients is by using the *AddCC()* method, which performs additional checkings, such as ignoring duplicate addresses.

### DestinatioCharset ###

MIME character set used for building mail contents. The default is ISO8859-1.

### ErrorsTo ###

Email address where error messages coming from mail servers will be sent.

### From ###

Sender's email address.

### Html ###

Html part of the mail contents.

### HtmlBasePath ###

Base path to be used for retrieving images referenced by the html contents.

### ReplyTo ###

Email address to be used when the recipient will reply to the mail.

### ReturnPath ###

Email address for the return path.

### ReturnReceiptTo ###

Email address to be used for read receipts.

### SourceCharset ###

Character set used in the source html contents.

### Subject ###

Mail subject.

### Text ###

Plain text part of the message contents.

### To ###
 
An array containing the list of recipients.

The preferred way of adding new recipients is by using the *AddRecipient()* method, which performs additional checkings, such as ignoring duplicate addresses.





