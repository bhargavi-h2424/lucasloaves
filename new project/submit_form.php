<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Determine if the form is a contact or order form based on submitted fields
    if (isset($_POST['message'])) {
        // Contact Form Submission (simulated)

        // Collect and sanitize contact form data
        $name = htmlspecialchars(trim($_POST['name']));
        $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
        $message = htmlspecialchars(trim($_POST['message']));

        // Basic validation for contact form
        if (empty($name) || empty($email) || empty($message)) {
            echo "All fields are required for the contact form.";
            exit;
        }

        // Simulate sending the contact form (instead of sending an actual email)
        echo "Contact form submitted successfully!";
        echo "<br><strong>Name:</strong> $name";
        echo "<br><strong>Email:</strong> $email";
        echo "<br><strong>Message:</strong> $message";
        exit;

    } elseif (isset($_POST['pickupTime'])) {
        // Order Form Submission (simulated)

        // Collect and sanitize order form data
        $pickupTime = htmlspecialchars(trim($_POST['pickupTime']));
        $orderDetails = "";

        // Products and their corresponding quantities
        $products = [
            'Sourdough White' => 'quantity-white',
            'Sourdough Rye' => 'quantity-rye',
            'Sourdough Spelt' => 'quantity-spelt',
            'Sourdough Seeded' => 'quantity-seeded'
        ];

        // Loop through products to gather order details
        foreach ($products as $breadType => $quantityField) {
            if (isset($_POST[$quantityField]) && (int)$_POST[$quantityField] > 0) {
                $quantity = (int)$_POST[$quantityField];
                $orderDetails .= "$quantity x $breadType\n";
            }
        }

        // Ensure some products were ordered
        if (empty($orderDetails)) {
            echo "No products were ordered.";
            exit;
        }

        // Simulate sending the order (instead of sending an actual email)
        echo "Order placed successfully!";
        echo "<br><strong>Order Details:</strong><br>" . nl2br($orderDetails);
        echo "<br><strong>Pick-up Time:</strong> $pickupTime";
        exit;
    } else {
        // No valid form data found
        echo "Invalid form submission.";
    }
} else {
    echo "Invalid request method.";
}
