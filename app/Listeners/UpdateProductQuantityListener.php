<?php

namespace App\Listeners;
use App\Events\ProductPurchased;
use App\Models\Products;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateProductQuantityListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ProductPurchased $event): void
    {
         // Update the product quantity in the database
         
         $product = Products::find($event->productId);
         if ($product) {
             $product->quantity -= $event->quantity;
             $product->save();
         }
    }
}
