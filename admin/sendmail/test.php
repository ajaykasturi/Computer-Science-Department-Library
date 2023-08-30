<!DOCTYPE html>
<html>
<head>
    <title>Contact Form</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <?php
    $dataToSend = array();
    $dataToSend['name'] = "ajay";
    $dataToSend['email'] = "ajaykasturi2081@gmail.com";
    $dataToSend['subject'] = "Security Alert";
    $dataToSend['message'] = "Your password changed successfully";
    echo "hello";
    $ch = curl_init('send_email.php');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($dataToSend));
    curl_exec($ch);
    curl_close($ch);
    echo "hello";
    ?>
    <h1>Contact Us</h1>
    <form id="contactForm">
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="subject">Subject:</label>
            <input type="text" id="subject" name="subject" required>
        </div>
        <div>
            <label for="message">Message:</label>
            <textarea id="message" name="message" required></textarea>
        </div>
        <div>
            <button type="submit">Send Message</button>
        </div>
    </form>
    <div id="responseMessage"></div>

    <script>
        $(document).ready(function() {
            $("#contactForm").submit(function(event) {
                event.preventDefault();

                // Serialize the form data
                var formData = $(this).serialize();
                console.log(formData);
                // Make the AJAX request
                $.ajax({
                    url: "send_email.php",
                    type: "POST",
                    data: formData,
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        // Process the response from the server
                        $("#responseMessage").text(response.message);
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX error:", error);
                    }
                });
            });
        });
    </script>
</body>
</html>
