<html lang="en">
<head></head>
<body style="background-color: #E4E4E4;padding: 20px; margin: 0; min-width: 640px;">
<table border="0" cellspacing="0" width="530" style="color:#262626;background-color:#fff;padding:27px 30px 20px 30px;margin:auto;border:1px solid #e1e1e1;">
    <tbody>
    <!-- header -->
    <tr style="background:#1254ad">
        <td style="padding-left:20px">
            <a target="_blank" style="text-decoration:none;color:inherit;font-family:'HelveticaNeue','Helvetica Neue',Helvetica,Arial,sans-serif;font-weight:normal;">
                <h1 style="color:#fff"><?= getenv('APP_OWNER') ?></h1>
            </a>
        </td>
    </tr>
    </tbody>

    {{ content() }}

    <!--footer-->
    <tbody>
    <tr>
        <td align="right" style="padding:25px 0  0 0;">
            <table border="0" cellspacing="0" cellpadding="0" style="padding-bottom:9px;" align="right">
                <tbody>
                <tr style="border-bottom:1px solid #999999;">
                    <td width="24" style="padding:0 7px 0 0;">
                        
                        

                    </td> 
                </tr>
                <tr style="height:1px; padding-top:15px">
                    <td><?= getenv('APP_OWNER') ?></td> 
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>

</body>
</html>
