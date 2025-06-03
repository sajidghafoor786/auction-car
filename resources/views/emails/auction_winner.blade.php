<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>You Won the Auction!</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f8f9fa; padding: 20px;">
    <table width="100%" cellpadding="0" cellspacing="0" style="max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.05);">
        <tr>
            <td style="padding: 20px;">
                <h2 style="color: #28a745;">🎉 Congratulations!</h2>
                <p>Hi {{ $bid->user->name }},</p>
                <p>You’ve won the auction: <strong>{{ $auction->title }}</strong>.</p>
                <p>Your winning bid: <strong>${{ number_format($bid->amount, 2) }}</strong></p>

                <hr style="margin: 20px 0;">

                <p>We've attached a PDF with the full auction details for your reference.</p>

                <p>Thank you for participating!</p>
                <br>
                <p>Best regards,</p>
                <p><strong>The Skynet Auctions Team</strong></p>
            </td>
        </tr>
    </table>
</body>
</html>
