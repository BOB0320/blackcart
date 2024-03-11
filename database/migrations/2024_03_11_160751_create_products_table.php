<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->double('price', 15, 8); // Precision updated for price
            $table->text('currency'); // Changed from json to text
            $table->integer('inventory_level'); // Changed from string to integer
            $table->text('variations'); // Changed from json to text
            $table->integer('store_id')->unsigned();
            $table->foreign('store_id')->references('id')->on('stores');
            $table->timestamps();
        });

        // Mock products should have field names matching the database column names
        $mockProducts = [
            [
                'store_id' => 1,
                'name' => 'Cool Shirt', // Lowercase
                'price' => 19.99,
                'currency' => json_encode(['USD' => 19.99, 'CAD' => 25.99]), // JSON encoded as string
                'inventory_level' => 150,
                'variations' => json_encode(['Size' =>  'M', 'Color' => 'Blue']), // JSON encoded as string
                'created_at' => now(),
            ],
            [
                'store_id' => 1,
                'name' => 'Shirt', // Lowercase
                'price' => 19.99,
                'currency' => json_encode(['USD' => 19.99, 'CAD' => 25.99]), // JSON encoded as string
                'inventory_level' => 150,
                'variations' => json_encode(['Size' =>  'L', 'Color' => 'Red']), // JSON encoded as string
                'created_at' => now(),
            ],
            [
                'store_id' => 2,
                'name' => 'Cool Shirt', // Lowercase
                'price' => 19.99,
                'currency' => json_encode(['USD' => 19.99, 'CAD' => 25.99]), // JSON encoded as string
                'inventory_level' => 150,
                'variations' => json_encode(['Size' =>  'M', 'Color' => 'Blue']), // JSON encoded as string
                'created_at' => now(),
            ],
            // Add more mock product entries as needed
        ];

        DB::table('products')->insert($mockProducts);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
