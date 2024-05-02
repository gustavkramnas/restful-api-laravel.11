<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up()
    {
        Schema::create('absence_reports', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');
            $table->date('date');
            $table->string('reason');
            $table->string('absence_type');
            $table->boolean('absence_certificate');
            $table->json('absence_certificate_photos');
            $table->string('approval_by');
            $table->date('approval_date');
            $table->string('comments');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('absence_reports');
    }
};
