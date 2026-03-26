<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Contact Inquiry</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px;">
        <h2 style="color: #1a1a1a; border-bottom: 2px solid #c9a96e; padding-bottom: 10px;">New Contact Inquiry</h2>
        
        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <td style="padding: 8px; font-weight: bold; width: 120px;">Name:</td>
                <td style="padding: 8px;">{{ $inquiry->name }}</td>
            </tr>
            <tr>
                <td style="padding: 8px; font-weight: bold;">Email:</td>
                <td style="padding: 8px;">{{ $inquiry->email }}</td>
            </tr>
            @if($inquiry->phone)
            <tr>
                <td style="padding: 8px; font-weight: bold;">Phone:</td>
                <td style="padding: 8px;">{{ $inquiry->phone }}</td>
            </tr>
            @endif
            <tr>
                <td style="padding: 8px; font-weight: bold;">Subject:</td>
                <td style="padding: 8px;">{{ $inquiry->subject ?? 'No subject' }}</td>
            </tr>
            <tr>
                <td style="padding: 8px; font-weight: bold;">Message:</td>
                <td style="padding: 8px;">{{ $inquiry->message }}</td>
            </tr>
            <tr>
                <td style="padding: 8px; font-weight: bold;">Date:</td>
                <td style="padding: 8px;">{{ $inquiry->created_at->format('M d, Y h:i A') }}</td>
            </tr>
        </table>
    </div>
</body>
</html>
