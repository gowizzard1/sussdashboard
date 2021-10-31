<tbody>
    <tr>
        <td style="padding:40px 0  0 0;">
            <p style="color:#000;font-size: 16px;line-height:24px;font-family:'HelveticaNeue','Helvetica Neue',Helvetica,Arial,sans-serif;font-weight:normal;">

            <h2 style="font-size: 14px;font-family:'HelveticaNeue','Helvetica Neue',Helvetica,Arial,sans-serif;">One more step! Reset Your
                Password</h2>

            <p style="font-size: 13px;line-height:24px;font-family:'HelveticaNeue','Helvetica Neue',Helvetica,Arial,sans-serif;">
                To reset the password for the <?= getenv('APP_OWNER') ?> Dashboard account associated with your email, click on the button below. If you
                don't want to reset your password, please disregard this email.

                <br>
                <br>
                <a style="background:#1254ad;color:#fff;padding:10px" href="https://<?= $publicUrl ?><?= $resetUrl ?>">Reset Password</a>

                <br>
                <br>
                <?= getenv('APP_OWNER') ?>. Enjoy!
                <br>
            </p>
        </td>
    </tr>
</tbody>
