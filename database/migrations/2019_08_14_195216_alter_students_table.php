<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->integer('active')->after('date_of_birth')->default(1);
            $table->integer('deleted')->after('active')->default(1);
            $table->integer('deleted_by')->after('deleted')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->integer('active');
            $table->dropColumn('deleted');
            $table->dropColumn('deleted_by');
        });
    }
}
