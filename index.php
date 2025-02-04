<?php
// Handle Contact Form Submission
$message_sent = false;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    // Simple Email Configuration (Replace with your email)
    $to = "your-email@example.com"; // Change this to your email
    $subject = "New Contact Form Submission";
    $body = "Name: $name\nEmail: $email\nMessage:\n$message";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        $message_sent = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduLearn - Online Courses</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7fc;
        }
        h1, h2 {
            text-align: center;
            color: #004aad;
        }
        .container {
            width: 80%;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .button {
            display: inline-block;
            padding: 12px 20px;
            font-size: 16px;
            background: #004aad;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: 0.3s;
        }
        .button:hover {
            background: #003080;
        }

        /* Header */
        .header {
            background: #004aad;
            color: white;
            padding: 20px 0;
            text-align: center;
            font-size: 24px;
        }

        /* Course Section */
        .courses {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }
        .course-card {
            width: 300px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        .course-card img {
            width: 100%;
            border-radius: 10px;
        }
        .course-title {
            font-size: 18px;
            font-weight: bold;
            margin: 10px 0;
        }
        .course-desc {
            font-size: 14px;
            color: #666;
        }

        /* Contact Form */
        .contact-form {
            margin-top: 40px;
            text-align: center;
        }
        input, textarea {
            width: 80%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        form {
            text-align: center;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <div class="header">
        <h1>EduLearn - Learn Online</h1>
    </div>

    <!-- Course Section -->
    <div class="container">
        <h2>Popular Courses</h2>
        <div class="courses">
            <div class="course-card">
                <img src="https://source.unsplash.com/300x200/?coding,technology" alt="Course 1">
                <div class="course-title">Web Development</div>
                <div class="course-desc">Learn HTML, CSS, JavaScript, and PHP.</div>
                <a href="#" class="button">Enroll Now</a>
            </div>

            <div class="course-card">
                <img src="https://source.unsplash.com/300x200/?ai,robotics" alt="Course 2">
                <div class="course-title">Machine Learning</div>
                <div class="course-desc">Introduction to AI, ML, and Deep Learning.</div>
                <a href="#" class="button">Enroll Now</a>
            </div>

            <div class="course-card">
                <img src="https://source.unsplash.com/300x200/?cybersecurity,hacking" alt="Course 3">
                <div class="course-title">Cybersecurity</div>
                <div class="course-desc">Protect yourself and organizations from cyber threats.</div>
                <a href="#" class="button">Enroll Now</a>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="container contact-form" id="contact">
        <h2>Contact Us</h2>
        <?php if ($message_sent): ?>
            <p style="color: green;">Message sent successfully! We'll get back to you soon.</p>
        <?php endif; ?>
        <form method="post">
            <input type="text" name="name" placeholder="Your Name" required><br>
            <input type="email" name="email" placeholder="Your Email" required><br>
            <textarea name="message" placeholder="Your Message" rows="4" required></textarea><br>
            <input type="submit" name="submit" value="Send Message" class="button">
        </form>
    </div>

</body>
</html>
