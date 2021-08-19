<?php

namespace Database\Factories;

use App\Archive;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArchiveFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Archive::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code_archive_id' => rand(1, 14),
            'nomor_surat' => \rand(200, 250),
            'nama_arsip' => $this->faker->text(20),
            'keterangan' => $this->faker->text(50),
            'tahun' => \rand(2019,2021),
            // 'file' => $this->faker->file('/public'),
            'file_name' => $this->text('UI Dashboard.pdf'),
        ];
    }
}
