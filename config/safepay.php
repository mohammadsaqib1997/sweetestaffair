<?php

use App\Order;

return [
    "environment"  => "sandbox", //use 'production' for live payments
    "api_key" => "sec_de7cc295-0d56-4e63-b03f-b5bf41735413",
    'redirect_url' => "http://localhost:8000/order-success",
    'cancel_url' => "http://localhost:8000/payment-cancel",
    'currency' => "PKR",
    'webhook_secret_key' => "254e6296a47074ec05c97763875f4af5ba12a171ee78d3cc1377cdb71cd19cf1",
    'order_class' => Order::class // Order Class Here
];