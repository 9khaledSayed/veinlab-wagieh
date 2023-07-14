<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('patients')->onDelete('cascade');
            $table->foreignId('employee_id')->constrained('employees');
            $table->foreignId('hospital_id')->nullable()->constrained('hospitals');
//            $table->foreignId('company_id')->nullable()->constrained('companies');
//            $table->foreignId('category_id')->nullable()->constrained('');
            $table->foreignId('doctor_id')->nullable()->constrained('doctors');
            $table->foreignId('promo_code_id')->nullable()->constrained('promo_codes');
            $table->enum('transfer', \App\Enums\InvoiceTransfer::values())->default(\App\Enums\InvoiceTransfer::REGULAR->value);
            $table->longText('main_analysis');
            $table->string('packages');
            $table->longText('purchases');
            $table->string('laboratories')->nullable();
            $table->decimal('total_price');
            $table->decimal('total_cost');
            $table->decimal('tax')->default(0);
            $table->decimal('discount')->default(0);
            $table->decimal('amount_paid')->nullable();
            $table->integer('pay_method')->default(1);
            $table->enum('payment_type', \App\Enums\PaymentType::values())->nullable();
            $table->string('serial_no');
            $table->string('policy_no')->nullable();
            $table->string('barcode');
            $table->string('doctor')->nullable();
            $table->integer('approved')->default(0);
            $table->dateTime('approved_date')->nullable();
            $table->integer('result_created')->default(0);
            $table->enum('invoice_is_free',[0,1])->default(0);
            $table->integer('status');
            $table->softDeletes();
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
        Schema::dropIfExists('invoices');
    }
}
