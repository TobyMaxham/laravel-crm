<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();

            $table->string('name')
                ->comment('The name of the account');

            // email addresses
            $table->string('email')
                ->nullable()
                ->comment('The email of the account');

            $table->boolean('email_verified')
                ->default(false)
                ->comment('Whether the email has been verified');

            $table->timestamp('email_verified_at')
                ->nullable()
                ->comment('The date when the email was verified');

            $table->boolean('email_opt_out')
                ->default(false)
                ->comment('Whether the email has been opted out');

            $table->string('alternate_email')
                ->nullable()
                ->comment('The alternate email of the account');

            $table->boolean('alternate_email_verified')
                ->default(false)
                ->comment('Whether the alternate email has been verified');

            $table->timestamp('alternate_email_verified_at')
                ->nullable()
                ->comment('The date when the alternate email was verified');

            $table->boolean('alternate_email_opt_out')
                ->default(false)
                ->comment('Whether the alternate email has been opted out');

            // telephone numbers
            $table->string('office_phone')
                ->nullable()
                ->comment('The office phone of the account');

            $table->string('alternate_phone')
                ->nullable()
                ->comment('The alternate phone of the account');

            // billing address
            $table->string('billing_street')
                ->nullable()
                ->comment('The street of the billing address');

            $table->string('billing_street_2')
                ->nullable()
                ->comment('The street 2 of the billing address');

            $table->string('billing_street_3')
                ->nullable()
                ->comment('The street 3 of the billing address');

            $table->string('billing_city')
                ->nullable()
                ->comment('The city of the billing address');

            $table->string('billing_state')
                ->nullable()
                ->comment('The state of the billing address');

            $table->string('billing_postal_code')
                ->nullable()
                ->comment('The postal code of the billing address');

            $table->string('billing_country')
                ->nullable()
                ->comment('The country of the billing address');

            // shipping address
            $table->string('shipping_street')
                ->nullable()
                ->comment('The street of the shipping address');

            $table->string('shipping_street_2')
                ->nullable()
                ->comment('The street 2 of the shipping address');

            $table->string('shipping_street_3')
                ->nullable()
                ->comment('The street 3 of the shipping address');

            $table->string('shipping_city')
                ->nullable()
                ->comment('The city of the shipping address');

            $table->string('shipping_state')
                ->nullable()
                ->comment('The state of the shipping address');

            $table->string('shipping_postal_code')
                ->nullable()
                ->comment('The postal code of the shipping address');

            $table->string('shipping_country')
                ->nullable()
                ->comment('The country of the shipping address');


            $table->foreignIdFor(\App\Models\User::class)
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
};
