
<html>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">
    <table width="100%" cellpadding="0" cellspacing="0" style="max-width: 600px; margin: auto; background-color: #fff; padding: 20px; border-radius: 5px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
        <tr>
            <td style="text-align: center;">
                <img src="logo_url_here" alt="Red Island Seafood" style="max-width: 150px; margin-bottom: 20px;">
            </td>
        </tr>
        <tr>
            <td style="padding: 20px; text-align: left;">
                <h1 style="color: #333;">Hello {{ $name }},</h1>
                <p style="line-height: 1.6;">{{$senderMessage}}</p>
                <p style="line-height: 1.6;">Here are your order details: {{$mailData}}</p>
            </td>
        </tr>
        <tr>
            <td style="padding: 20px; text-align: center; font-size: 12px; color: #777;">
                <p>If you have any questions, feel free to <a href="mailto:support@example.com" style="color: #3490dc;">contact us</a>.</p>
                <p>&copy; 2024 Red Island Seafood</p>
            </td>
        </tr>
    </table>
</body>
</html>

