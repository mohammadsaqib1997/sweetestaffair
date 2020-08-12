<?php

use App\Order;

return [
    "environment"  => "production", //use 'production' / 'sandbox'
    "api_key" => "sec_a7b4eb9a-91f2-4303-9858-8d95aac8d615",
    'redirect_url' => "http://thesweetestaffair.com/order-success",
    'cancel_url' => "http://thesweetestaffair.com/payment-cancel",
    'currency' => "PKR",
    'webhook_secret_key' => "b6d597491609670362fbce7e57909c5e7ddf9b953d8874d918415feed48f298d",
    'order_class' => Order::class // Order Class Here
];