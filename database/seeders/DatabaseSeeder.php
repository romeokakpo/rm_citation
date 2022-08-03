<?php

namespace Database\Seeders;

use App\Models\Citation;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Admin
        User::create([]);
        
        //Citations
        Citation::create(['file'=>'/storage/citations/photo_2022-08-02_19-05-53.jpg', 'texte'=>'']);
        Citation::create(['file'=>'/storage/citations/photo_2022-08-02_19-05-54.jpg', 'texte'=>'']);
        Citation::create(['file'=>'/storage/citations/photo_2022-08-02_19-05-55.jpg', 'texte'=>'']);
        Citation::create(['file'=>'/storage/citations/photo_2022-08-02_19-05-56.jpg', 'texte'=>'']);
        Citation::create(['file'=>'/storage/citations/photo_2022-08-02_19-05-57.jpg', 'texte'=>'']);
        Citation::create(['file'=>'/storage/citations/photo_2022-08-02_19-05-58.jpg', 'texte'=>'']);
        Citation::create(['file'=>'/storage/citations/photo_2022-08-02_19-05-59.jpg', 'texte'=>'']);
        Citation::create(['file'=>'/storage/citations/photo_2022-08-02_19-06-00.jpg', 'texte'=>'']);
        Citation::create(['file'=>'/storage/citations/photo_2022-08-02_19-22-23.jpg', 'texte'=>'']);
        Citation::create(['file'=>'/storage/citations/photo_2022-08-02_19-22-24.jpg', 'texte'=>'']);
        Citation::create(['file'=>'/storage/citations/photo_2022-08-02_19-22-25.jpg', 'texte'=>'']);
        Citation::create(['file'=>'/storage/citations/photo_2022-08-02_19-22-26.jpg', 'texte'=>'']);
        Citation::create(['file'=>'/storage/citations/photo_2022-08-02_19-22-27.jpg', 'texte'=>'']);
        Citation::create(['file'=>'/storage/citations/photo_2022-08-02_19-22-28.jpg', 'texte'=>'']);
        Citation::create(['file'=>'/storage/citations/photo_2022-08-02_19-22-29.jpg', 'texte'=>'']);
        Citation::create(['file'=>'/storage/citations/photo_2022-08-02_19-22-30.jpg', 'texte'=>'']);
        Citation::create(['file'=>'/storage/citations/photo_2022-08-02_19-22-32.jpg', 'texte'=>'']);
        Citation::create(['file'=>'/storage/citations/photo_2022-08-02_19-31-39.jpg', 'texte'=>'']);
        Citation::create(['file'=>'/storage/citations/photo_2022-08-02_19-31-40.jpg', 'texte'=>'']);
        Citation::create(['file'=>'/storage/citations/photo_2022-08-02_19-31-41.jpg', 'texte'=>'']);
        Citation::create(['file'=>'/storage/citations/photo_2022-08-02_19-31-42.jpg', 'texte'=>'']);
        Citation::create(['file'=>'/storage/citations/photo_2022-08-02_19-31-43.jpg', 'texte'=>'']);
        Citation::create(['file'=>'/storage/citations/photo_2022-08-02_19-31-44.jpg', 'texte'=>'']);
        Citation::create(['file'=>'/storage/citations/photo_2022-08-02_19-31-45.jpg', 'texte'=>'']);
        Citation::create(['file'=>'/storage/citations/photo_2022-08-02_19-31-46.jpg', 'texte'=>'']);
        Citation::create(['file'=>'/storage/citations/photo_2022-08-02_19-31-47.jpg', 'texte'=>'']);
        Citation::create(['file'=>'/storage/citations/photo_2022-08-02_19-31-48.jpg', 'texte'=>'']);
        Citation::create(['file'=>'/storage/citations/photo_2022-08-02_19-31-49.jpg', 'texte'=>'']);
        Citation::create(['file'=>'/storage/citations/photo_2022-08-02_19-31-50.jpg', 'texte'=>'']);
        Citation::create(['file'=>'/storage/citations/photo_2022-08-02_19-31-51.jpg', 'texte'=>'']);
        Citation::create(['file'=>'/storage/citations/photo_2022-08-02_19-31-52.jpg', 'texte'=>'']);
        Citation::create(['file'=>'/storage/citations/photo_2022-08-02_19-31-53.jpg', 'texte'=>'']);
        Citation::create(['file'=>'/storage/citations/photo_2022-08-02_19-31-54.jpg', 'texte'=>'']);
        Citation::create(['file'=>'/storage/citations/photo_2022-08-02_19-31-55.jpg', 'texte'=>'', 'today'=>1]);
    }
}
