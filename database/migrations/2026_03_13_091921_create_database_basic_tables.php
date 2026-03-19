<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {

        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category');
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->string('image')->nullable();
            $table->timestamps();
        });


        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->decimal('total', 8, 2);

            $table->enum('status', [
                'pending',
                'preparing',
                'on_the_way',
                'delivered'
            ])->default('pending');

            $table->timestamps();
        });


        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->text('message');
            $table->boolean('read')->default(false);
            $table->timestamps();
        });


        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->date('date');
            $table->time('time');
            $table->unsignedInteger('guests');

            $table->enum('status', [
                'pending',
                'accepted',
                'rejected'
            ])->default('pending');

            $table->timestamps();
        });


        Schema::create('order_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('order_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('dish_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->integer('quantity');
            $table->decimal('price', 8, 2);

            $table->unique(['order_id', 'dish_id']);

            $table->timestamps();
        });

    }


    public function down(): void
    {
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('reservations');
        Schema::dropIfExists('messages');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('dishes');
    }

};