<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Auction Result</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f8f9fa; padding: 20px;">
    <table width="100%" cellpadding="0" cellspacing="0" style="max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.05);">
        <tr>
            <td style="padding: 20px;">
                <h2 style="color: #dc3545;">Auction Result</h2>
                <p>Dear Bidder,</p>
                <p>Thank you for participating in the auction: <strong>{{ $car->name }}</strong>.</p>
                <p>Unfortunately, you were not the highest bidder this time.</p>

                <p>We appreciate your interest, and hope you'll try again in upcoming auctions.</p>

                <br>
                <p>Best regards,</p>
                <p><strong>The Car Auctions Team</strong></p>
            </td>
        </tr>
    </table>
</body>
</html>
