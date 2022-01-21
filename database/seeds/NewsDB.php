<?php

use Illuminate\Database\Seeder;
use App\News;

class NewsDB extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0;$i<100;$i++)
        {
            $add=new News;
            $add->title='news title'.rand(0,9);
            $add->add_by=1;
            $add->desc='news desc'.rand(0,9);
            $add->content='news content'.rand(0,9);
            $add->status='active';
            $add->save();
        }
    }
}
