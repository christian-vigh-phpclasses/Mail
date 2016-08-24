# CONTENTS OF THE EXAMPLES DIRECTORY #

## File examples.inc.php ##

This is the main include file for all the example. **You will have to redefine two variables here before trying to run the examples :**

- *$recipient* (mandatory) : each example script is sending an email to a recipient. This is the variable used for that, so redefine it to specify your own email address.
- *$sender* (optional) : the sender's email address, which can be a completely invented address. Specify *false* if you want to use the **sendmail_from** setting from your *php.ini* file.

## Directory data/ ##

Contains files that are used as attachments by the **attachments.Php** example script.

## Directory Images/ ##

Contains two images that are embedded in the html contents of several example scripts.

## File mail.html ##

Html file that contains mail contents used by the **external-html.php** example script.

## Example scripts ##

### textonly.php ###

Sends an email with only a text part (no html contents).

## text-and-html.php ##

Sends an email with both text and html parts.

## embedded-images.php ##

Sends an email containing embedded images. Html contents are given by a string.

## external-html.php ##

Sends an email whose html contents come from an external file, **mail.html**. The html contents reference two embedded images.

## attachments.php ##

Sends an email with embedded images and attachments (coming from the **data/** directory).
