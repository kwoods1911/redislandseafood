
<html>
<body>
    <table width="100%" cellpadding="0" cellspacing="0">
       
        <tr>
            <td class="email-content">
                <h1>Hello {{ $name }},</h1>

                <div class="email-client-header">
                    <p>{{$senderMessage}}</p>
                </div>
                

                <div class="email-client-content">
                    <p>Here is your message: </p>
                    <p>{{$mailData}}</p>
                </div>
                
            </td>
        </tr>
        <tr>
            <td class="email-footer">
                <p>If you have any questions, feel free to <a href="mailto:redislandseafood@gmail.com">contact us</a>.</p>
                <p>&copy; 2024 Red Island Seafood</p>
            </td>
        </tr>
    </table>
</body>
</html>

