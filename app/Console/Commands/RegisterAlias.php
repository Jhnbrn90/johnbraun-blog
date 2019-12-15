<?php

namespace App\Console\Commands;

use App\ArticleAlias;
use App\Post;
use Illuminate\Console\Command;

class RegisterAlias extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:alias {originalSlug} {alias}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Register new alias for a Post.';

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
        $post = Post::whereSlug($this->argument('originalSlug'))
            ->firstOrFail();

        ArticleAlias::create([
            'post_id' => $post->id,
            'slug' => $this->argument('alias')
        ]);

        $this->info("Created alias.");

        return;
    }
}
