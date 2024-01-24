<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Laravel Developer Coding Test - Project README

## Project Overview

This Laravel coding test is designed to evaluate your proficiency in utilizing Laravel's advanced features to create a sophisticated web application. The project involves the creation of Eloquent models, controller actions, middleware, queues, events and listeners, as well as import and export functionality.

## Project Structure

The project is structured to cover various aspects of Laravel development:

1. **Eloquent Models**
   - Created a model named `Product` with fields: id, name, price, and quantity.
   - Defined a relationship between the `Product` model and another model named `Category` in such a way that a product belongs to a category.

2. **Controller Actions**
   - Created a controller named `ProductController`.
   - Implemented the following actions:
     - `index`: Display a paginated list of products.
     - `create`: Display a form to create a new product.
     - `store`: Store a new product in the database.
     - `edit`: Display a form to edit an existing product.
     - `update`: Update the information on an existing product.
     - `destroy`: Delete a product.

3. **Middleware**
   - Created a middleware named `CheckAdmin` that checks if the logged-in user has the role of "admin."
   - Applied this middleware to the `ProductController` to restrict access to admin users only.

4. **Queues**
   - Implemented a job that sends an email to the user when a new product is created, utilizing Laravel's built-in mail functionality.

5. **Events and Listeners**
   - Created an event named `ProductPurchased` that is triggered when a product is purchased.
   - Implemented a listener that updates the product quantity when the `ProductPurchased` event is fired.

6. **Import and Export**
   - Implemented functionality to import all the products' data into the database.
   - Implemented functionality to export the data.

