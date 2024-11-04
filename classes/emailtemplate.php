<?php

class EmailTemplate
{
    public static function getVerificationTemplate($verificationLink)
    {
        return "
            <html>
            <head>
                <style>
                    .email-container {
                        font-family: Arial, sans-serif;
                        max-width: 600px;
                        margin: 0 auto;
                        padding: 20px;
                        border: 1px solid #ddd;
                        border-radius: 8px;
                    }
                    .header {
                        background-color: #4CAF50;
                        padding: 10px;
                        text-align: center;
                        color: white;
                        border-radius: 8px 8px 0 0;
                    }
                    .body {
                        margin: 20px 0;
                    }
                    .footer {
                        text-align: center;
                        font-size: 12px;
                        color: #888;
                    }
                    .button {
                        display: inline-block;
                        padding: 10px 20px;
                        color: #fff;
                        background-color: #4CAF50;
                        text-decoration: none;
                        border-radius: 5px;
                        margin-top: 10px;
                    }
                </style>
            </head>
            <body>
                <div class='email-container'>
                    <div class='header'>
                        <h2>Email Verification</h2>
                    </div>
                    <div class='body'>
                        <p>Dear user,</p>
                        <p>Please click the link below to verify your email address:</p>
                        <a href='$verificationLink' class='button'>Verify Email</a>
                    </div>
                    <div class='footer'>
                        <p>If you did not request this email, please ignore it.</p>
                    </div>
                </div>
            </body>
            </html>
        ";
    }
}


?>