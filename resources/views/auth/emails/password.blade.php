<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h3>Reset your Password</h3>

        <div>
            Click here to reset your password: 
            <a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> 
            	{{ $link }} 
            </a>
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


