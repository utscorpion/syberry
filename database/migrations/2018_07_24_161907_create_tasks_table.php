<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateTasksTable create a new table 'tasks'
 */
class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
            CREATE TABLE IF NOT EXISTS `tasks` (
              `id` INT NOT NULL AUTO_INCREMENT,
              `title` VARCHAR(45) NOT NULL,
              `body` TEXT NOT NULL,
              `status` ENUM(\'open\', \'close\') NOT NULL,
              `create_date` DATETIME NOT NULL,
            PRIMARY KEY (`id`)
            )
            DEFAULT CHARACTER SET utf8
            DEFAULT COLLATE utf8_general_ci
            ENGINE = InnoDB;            
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
