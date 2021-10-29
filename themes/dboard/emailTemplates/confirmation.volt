<tbody>
    <tr>
        <td style="padding:40px 0  0 0;">
            <p style="color:#000;font-size: 16px;line-height:24px;font-family:'HelveticaNeue','Helvetica Neue',Helvetica,Arial,sans-serif;font-weight:normal;">

            <h2 style="font-size: 14px;font-family:'HelveticaNeue','Helvetica Neue',Helvetica,Arial,sans-serif;">You're
                Almost There! Just Confirm Your Email</h2>

            <p style="font-size: 13px;line-height:24px;font-family:'HelveticaNeue','Helvetica Neue',Helvetica,Arial,sans-serif;">
                You've successfully been registerd with a <?= getenv('APP_OWNER') ?> Dashboard account. To activate it, please click below to verify your email
                address.

                <br>
                <br>
                <a style="background:#1254ad;color:#fff;padding:10px"
                   href="https://{{ publicUrl }}{{ confirmUrl }}">Confirm Registration</a>

                <br>
                <br>
                <?= getenv('APP_OWNER') ?>. Enjoy!
                <br>
            </p>
        </td>
    </tr>
</tbody>
