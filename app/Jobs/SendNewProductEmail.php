<?php

namespace App\Jobs;

use App\Mail\NewProductMail;
use App\Models\Products;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class SendNewProductEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $product;

    public function __construct(Products $product)
    {
        $this->product = $product;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        Log::info('Handling SendNewProductEmail job.');
        // Ensure the product instance is not a collection
        $productName = $this->product->name;
        $users = User::where('role', 'user')->get();

        foreach ($users as $user) {
            Mail::to($user->email)->send(new NewProductMail($productName));
        }
        Log::info('Email sent successfully.');
    }
}
