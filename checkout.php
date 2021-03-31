<?php
require 'vendor/autoload.php';
\Stripe\Stripe::setApiKey('sk_test_51IayEMLBAbbcyvIOhg5QHjtDohT8XrGHXD73PjOy3hTN1auOJ1dq9L3AzcdQerIGXNewTwnfW9YOZgj3Q7vhCFnV00Qn8SExsa');

header('Content-Type: application/json');

// $YOUR_DOMAIN = 'http://localhost:4242';



$checkout_session = \Stripe\Checkout\Session::create([
  'payment_method_types' => ['card'],
  'line_items' => [[
    'price_data' => [
      'currency' => 'usd',
      'unit_amount' => 2000,
      'product_data' => [
        'name' => 'Stubborn Attachments',
        'images' => ["https://i.imgur.com/EHyR2nP.png"],
      ],
    ],
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => 'http://localhost/gofashion/success.html',
  'cancel_url' => 'http://localhost/gofashion/cancel.html',
]);

echo json_encode(['id' => $checkout_session->id]);