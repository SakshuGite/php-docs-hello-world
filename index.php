<?php
// Handle Contact Form Submission
$message_sent = false;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    // Email Configuration (Replace with your email)
    $to = "your-email@example.com"; // Change this
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
    <title>DarkEdu - Online Courses</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #111;
            color: white;
            text-align: center;
        }
        h1, h2 {
            color: #e63946;
        }
        .container {
            width: 80%;
            margin: auto;
            background: #222;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(255, 0, 0, 0.5);
            margin-bottom: 20px;
        }

        /* Header */
        .header {
            background: #e63946;
            padding: 20px;
            font-size: 24px;
            font-weight: bold;
            text-transform: uppercase;
        }

        /* Button */
        .button {
            display: inline-block;
            padding: 12px 20px;
            font-size: 16px;
            background: #e63946;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: 0.3s;
            border: 2px solid white;
        }
        .button:hover {
            background: black;
            color: #e63946;
            border: 2px solid #e63946;
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
            background: #333;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(255, 0, 0, 0.3);
            text-align: center;
            transition: transform 0.3s ease;
        }
        .course-card:hover {
            transform: scale(1.05);
        }
        .course-card img {
            width: 100%;
            border-radius: 10px;
        }
        .course-title {
            font-size: 18px;
            font-weight: bold;
            margin: 10px 0;
            color: #e63946;
        }
        .course-desc {
            font-size: 14px;
            color: #bbb;
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
            border: 1px solid #e63946;
            border-radius: 5px;
            background: black;
            color: white;
        }
        input:focus, textarea:focus {
            border: 2px solid white;
            outline: none;
        }
        form {
            text-align: center;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <div class="header">
        DarkEdu - Learn With Passion
    </div>

    <!-- Course Section -->
    <div class="container">
        <h2>🔥 Popular Courses</h2>
        <div class="courses">
            <div class="course-card">
                <img src="https://source.unsplash.com/300x200/?coding,technology" alt="Course 1">
                <div class="course-title">Web Development</div>
                <div class="course-desc">Master HTML, CSS, JavaScript, and PHP.</div>
                <a href="#" class="button">Enroll Now</a>
            </div>

            <div class="course-card">
                <img src="https://source.unsplash.com/300x200/?ai,robotics" alt="Course 2">
                <div class="course-title">Machine Learning</div>
                <div class="course-desc">AI, ML, and Deep Learning for Beginners.</div>
                <a href="#" class="button">Enroll Now</a>
            </div>

            <div class="course-card">
                <img src="https://source.unsplash.com/300x200/?cybersecurity,hacking" alt="Course 3">
                <div class="course-title">Cybersecurity</div>
                <div class="course-desc">Learn Ethical Hacking and Digital Security.</div>
                <a href="#" class="button">Enroll Now</a>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="container contact-form" id="contact">
        <h2>📩 Contact Us</h2>
        <?php if ($message_sent): ?>
            <p style="color: green;">✅ Message sent successfully! We’ll get back to you soon.</p>
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
