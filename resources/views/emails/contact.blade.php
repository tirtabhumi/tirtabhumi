<!DOCTYPE html>
<html>
<head>
    <title>New Contact Form Submission</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <h2 style="color: #4f46e5;">New Inquiry from {{ $data['name'] }}</h2>
    
    <p><strong>Name:</strong> {{ $data['name'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Subject:</strong> {{ $data['subject'] }}</p>
    
    <hr style="border: 0; border-top: 1px solid #eee; margin: 20px 0;">
    
    <h3 style="color: #333;">Message:</h3>
    <div style="background-color: #f9fafb; padding: 15px; border-radius: 8px; border: 1px solid #e5e7eb;">
        {!! nl2br(e($data['message'])) !!}
    </div>
</body>
</html>
