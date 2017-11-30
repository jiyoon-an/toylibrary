<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h3>Verify Your Email Address</h3>

        <div>
            Thank you for joining the Mt Roskill Toy Library.<br/>
            Please follow the link below to verify your email address
            {{ url('/register/verify/' . $confirmation_code) }}.<br/>
        </div>
        <br/><br/>
        <div>
        	Kind Regards,<br/>
        	<br/>
        	Support Team<br/>
        	Mt Roskill Toy Library<br/>
        	766 Sandringham Rd Ext, Mt Roskill | (Tel) 09 629 3500
        	 | <a href="http://www.mtroskilltoylibrary.org.nz/" target="_blank">www.mtroskilltoylibrary.org.nz</a>
        	 | <a href="http://www.migrantactiontrust.org.nz/" target="_blank">www.migrantactiontrust.org.nz</a>
        </div>

    </body>
</html>