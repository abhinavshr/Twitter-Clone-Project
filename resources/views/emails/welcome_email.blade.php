<!-- welcome_email.blade.php -->

<h1>Welcome to Our Community, {{ $user->name }}!</h1>

<p>Dear {{ $user->name }},</p>

<p>We are thrilled to have you on board! Thank you for joining our community. We hope you will enjoy your time with us and take advantage of all the resources and opportunities we have to offer.</p>

<p>If you have any questions or need help getting started, please don't hesitate to reach out to us at <a href="mailto:support@example.com">support@example.com</a>.</p>

<p>Best regards,</p>
<p>The Team</p>

<p><a href="{{ route('login') }}">Login to Your Account</a></p>
