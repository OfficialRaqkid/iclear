<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('clearances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            
            // Financial clearance fields
            $table->string('home_dean')->nullable();
            $table->string('library_incharge')->nullable();
            $table->string('department_dean')->nullable();
            $table->string('vp_sas')->nullable();
            $table->string('director_finance')->nullable();
            
            // Departmental clearance fields
            $table->string('csit_treasurer')->nullable();
            $table->string('csit_president')->nullable();
            $table->string('program_head')->nullable();
            
            // Records clearance fields
            $table->string('registrar')->nullable();
            $table->string('dept_head')->nullable();
            $table->string('vp_finance')->nullable();
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clearances');
    }
};