<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employee_attendance_destinations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignIdFor(\App\Models\EmployeeAttendance::class, 'attendance_id')->constrained('employee_attendances');
            $table->text('destination')->nullable();
            $table->text('activity')->nullable();
            $table->timestamp('from')->nullable();
            $table->timestamp('to')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_attendance_destinations');
    }
};
