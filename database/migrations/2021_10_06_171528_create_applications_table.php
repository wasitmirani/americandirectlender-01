<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->text('name')->nullable();
            $table->text('property_value')->nullable();
            $table->text('property_update')->nullable();
            $table->text('property_address')->nullable();
            $table->text('promotion_detail')->nullable();
            $table->string('property_type')->nullable();
            $table->string('hoa')->nullable();
            $table->string('fee')->nullable();
            $table->string('cash_out')->nullable();
            $table->string('refinance')->nullable();
            $table->string('payment_assurance')->nullable();
            $table->string('payment_surity')->nullable();
            $table->string('purchase')->nullable();
            $table->string('second_loan')->nullable();
            $table->string('loan_amount')->nullable();
            $table->string('investment_property')->nullable();
            $table->string('is_second_loan')->nullable();
            $table->string('cash_reserve')->nullable();
            $table->string('fico_one')->nullable();
            $table->string('fico_two')->nullable();
            $table->string('fico_three')->nullable();
            $table->string('doc_type')->nullable();
            $table->string('occupant')->nullable();
            $table->string('income_source')->nullable();
            $table->string('income_type')->nullable();
            $table->string('recent_business_Activity')->nullable();
            $table->string('business_type')->nullable();
            $table->string('is_online')->nullable();
            $table->string('tax_return')->nullable();
            $table->string('recent_business')->nullable();
            $table->string('is_online_reason')->nullable();
            $table->string('business_line')->nullable();
            $table->string('advice')->nullable();
            $table->string('is_business_partner')->nullable();
            $table->string('financial_history')->nullable();
            $table->string('monthly_rent')->nullable();
            $table->string('renovation')->nullable();
            $table->string('mortgage_statement')->nullable();
            $table->string('property_insured')->nullable();
            $table->string('liabilities_loans')->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
