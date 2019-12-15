<?php

namespace App\Console\Commands;

use App\Post;
use App\Services\WebmentionsCollector;
use Illuminate\Console\Command;

class UpdateWebmentions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'webmentions:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update all webmentions for all posts.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Updating all webmentions');

        $this->call('page-cache:clear');

        $posts = Post::all();

        $posts->each(function ($post) {
            (new WebmentionsCollector($post))->save();
        });

        $this->info('Done.');
        return;
    }
}
