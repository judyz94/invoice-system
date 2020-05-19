<?php
class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email', 40)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
class CreatePasswordResetsTable extends Migration
{
    public function up()
    {
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email', 40)->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('password_resets');
    }
}
class CreateTableCities extends Migration
{
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 30);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
class CreateTableSellers extends Migration
{
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->integer('document')->unique();
            $table->string('email', 40)->unique();
            $table->integer('phone');
            $table->string('address', 40);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sellers');
    }
}
class CreateTableCustomers extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->integer('document')->unique();
            $table->string('email', 40)->unique();
            $table->integer('phone');
            $table->string('address', 40);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
class CreateTableInvoices extends Migration
{
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('expedition_date');
            $table->dateTime('due_date');
            $table->dateTime('receipt_date');
            $table->mediumText('sale_description');
            $table->float('total');
            $table->float('vat');
            $table->enum('status', ['sent','rejected','overdue','paid','cancelled']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
class CreateTableProducts extends Migration
{
    public function up()
    {
        Schema::create('invoicesProducts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('invoicesProducts');
    }
}
class CreateTableInvoicesProducts extends Migration
{
    public function up()
    {
        Schema::create('invoices_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('price');
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('invoices_products');
    }
}

