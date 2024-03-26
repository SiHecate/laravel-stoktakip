<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StockNotification extends Notification
{
    use Queueable;

    protected $product_stock;
    protected $product_name;
    protected $category_name;

    public function __construct($product_stock, $product_name, $category_name)
    {
        $this->product_stock = $product_stock;
        $this->product_name = $product_name;
        $this->category_name = $category_name;
    }

    public function via(object $notifiable): array
    {
        return ['broadcast'];
    }

    public function stockBroadcast(object $notifiable): BroadcastMessage
    {
        return new BroadcastMessage([
            'message' => 'Stock is running low, please check the stock',
            'product_name' => $this->product_name,
            'product_stock' => $this->product_stock,
            'category_name' => $this->category_name,
        ]);
    }
}
