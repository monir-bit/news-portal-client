<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use DB;

class GenerateSlugs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:slugs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate slugs for categories, subcategories, and news';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Generating slugs...');

        // Generate slugs for categories
        $categories = DB::table('categories')->get();
        $this->info('Generating slugs for ' . $categories->count() . ' categories...');
        foreach ($categories as $category) {
            $slug = $this->generateSlug($category->name);
            // Make slug unique within categories
            $uniqueSlug = $this->makeUniqueSlug('categories', $slug, $category->id);
            DB::table('categories')->where('id', $category->id)->update(['slug' => $uniqueSlug]);
        }
        $this->info('Categories slugs generated!');

        // Generate slugs for subcategories
        $subcategories = DB::table('subcategories')->get();
        $this->info('Generating slugs for ' . $subcategories->count() . ' subcategories...');
        foreach ($subcategories as $subcategory) {
            $slug = $this->generateSlug($subcategory->name);
            // Make slug unique within subcategories
            $uniqueSlug = $this->makeUniqueSlug('subcategories', $slug, $subcategory->id, 'subcategories');
            DB::table('subcategories')->where('id', $subcategory->id)->update(['slug' => $uniqueSlug]);
        }
        $this->info('Subcategories slugs generated!');

        // Generate slugs for news (use chunking to avoid memory issues)
        $newsCount = DB::table('news')->count();
        $this->info('Generating slugs for ' . $newsCount . ' news articles...');
        $bar = $this->output->createProgressBar($newsCount);
        $bar->start();
        
        DB::table('news')->orderBy('id')->chunk(100, function ($articles) use ($bar) {
            foreach ($articles as $article) {
                $slug = $this->generateSlug($article->title);
                // Make slug unique within news
                $uniqueSlug = $this->makeUniqueSlug('news', $slug, $article->id, 'news');
                DB::table('news')->where('id', $article->id)->update(['slug' => $uniqueSlug]);
                $bar->advance();
            }
        });
        
        $bar->finish();
        $this->newLine();
        $this->info('News slugs generated!');

        $this->info('All slugs generated successfully!');
        return 0;
    }

    /**
     * Generate slug from text
     */
    private function generateSlug($text)
    {
        // Use Laravel's Str::slug for transliteration
        // It handles Unicode including Bengali
        $slug = Str::slug($text, '-', 'bn');
        
        // Fallback: if empty, create a simple slug
        if (empty($slug)) {
            // Remove special characters and convert to lowercase
            $slug = preg_replace('/[^a-z0-9]+/', '-', strtolower($text));
            $slug = trim($slug, '-');
        }
        
        // If still empty, use hash
        if (empty($slug)) {
            $slug = substr(md5($text), 0, 8);
        }
        
        return $slug;
    }

    /**
     * Make slug unique by appending number if needed
     */
    private function makeUniqueSlug($table, $slug, $currentId, $tableName = null)
    {
        $tableName = $tableName ?: $table;
        $originalSlug = $slug;
        $counter = 1;

        while (DB::table($tableName)
            ->where('slug', $slug)
            ->where('id', '!=', $currentId)
            ->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}