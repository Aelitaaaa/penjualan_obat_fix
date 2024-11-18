<?Php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoktersTable extends Migration
{
    public function up()
    {
        Schema::create('dokters', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->enum('jenis', ['umum', 'spesialis'])->nullable();
            $table->string('spesialis', 50)->nullable();
            $table->string('telp', 15)->unique();
            $table->bigInteger('tarif');
            $table->timestamps();
        });


        Schema::table('dokters', function (Blueprint $table) {
            DB::statement('ALTER TABLE dokters 
                MODIFY updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, 
                MODIFY created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP');
        });
    }

    public function down()
    {
        Schema::dropIfExists('dokters');
    }
}
