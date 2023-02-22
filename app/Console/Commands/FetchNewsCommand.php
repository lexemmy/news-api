<?php

namespace App\Console\Commands;

use App\Models\News;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchNewsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:news';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch latest news from News API';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $apiKey = config('app.news_api_key');
        $url = 'https://newsapi.org/v2/top-headlines?country=ng&apiKey=' . $apiKey;

        $response = Http::get($url);

        $data = $response->json();

        foreach ($data['articles'] as $article) {
            News::firstOrCreate(
                ['title' => $article['title']],
                [
                    'author' => $article['author'],
                    'description' => $article['description'],
                    'url' => $article['url'],
                    'image_url' => $article['urlToImage'],
                    'published_at' => $article['publishedAt'],
                ]
            );
        }
    }
}
