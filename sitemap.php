<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'breakingnewsbd_admin_bangla');
define('DB_PASSWORD', 'G5YT,j1m5k(f');
define('DB_DATABASE', 'breakingnewsbd_admin_bangla');

class DB_Class
{
    private $connection;

    public function sql()
    {
        $this->connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

        if (!$this->connection->set_charset("utf8mb4")) {
            die("Error loading character set utf8mb4: " . $this->connection->error);
        }

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        } 

        return $this->connection;
    }

    public function sql_close()
    {
        return $this->connection->close();
    }
}

function createFullSitemap()
{
    // ডাটাবেজ সংযোগ স্থাপন
    $db = new DB_Class();
    $connection = $db->sql();

    // সাইটম্যাপ তৈরি
    $sitemap = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL . '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"></urlset>');

    // মেইন ডোমেইন (হোম পেজ) যোগ করা
    $url = $sitemap->addChild('url');
    $url->addChild('loc', 'https://breakingnews.com.bd/');
    $url->addChild('lastmod', date('Y-m-d\TH:i:s+00:00'));  // বর্তমান তারিখ এবং সময়
    $url->addChild('priority', '1.00');

    // প্রথমবার সব নিউজ পেজ সাইটম্যাপে যোগ করা
    $query = "SELECT article_id, article_entry_date FROM tbl_article ORDER BY article_entry_date DESC";
    $result = $connection->query($query);
    while ($row = $result->fetch_assoc()) {
        // চেক করব যে ইতিমধ্যে সাইটম্যাপে ইউআরএল রয়েছে কিনা
        $existingUrl = $sitemap->xpath("//loc[text()='https://breakingnews.com.bd/get-news/{$row['article_id']}/index.html']");

        if (empty($existingUrl)) {
            // যদি ইউআরএল না থাকে, তবেই সাইটম্যাপে যোগ করব
            $url = $sitemap->addChild('url');
            $url->addChild('loc', 'https://breakingnews.com.bd/get-news/' . $row['article_id'] );
            // নিশ্চিত করুন article_entry_date ফরম্যাট সঠিক
            $lastMod = strtotime($row['article_entry_date']) ? date('Y-m-d\TH:i:s+00:00', strtotime($row['article_entry_date'])) : date('Y-m-d\TH:i:s+00:00');
            $url->addChild('lastmod', $lastMod);
            $url->addChild('changefreq', 'daily');
            $url->addChild('priority', '0.8');
        }
    }

    // ক্যাটাগরি পেজের সাইটম্যাপ
    $categoryQuery = "SELECT id FROM tbl_category LIMIT 10";
    $categoryResult = $connection->query($categoryQuery);
    while ($category = $categoryResult->fetch_assoc()) {
        $url = $sitemap->addChild('url');
        $url->addChild('loc', 'https://breakingnews.com.bd/get-news-by-category/' . $category['id']);
        $url->addChild('lastmod', date('Y-m-d\TH:i:s+00:00'));  // আপনি এখানে ডেটা দিয়ে দিবেন
        $url->addChild('changefreq', 'monthly');
        $url->addChild('priority', '0.6');
    }

    // আর্কাইভ পেজের সাইটম্যাপ
    for ($page = 1; $page <= 100; $page++) {  // ধরুন 100 পেজের জন্য আর্কাইভ
        $url = $sitemap->addChild('url');
        $url->addChild('loc', 'https://breakingnews.com.bd/latest-news' . $page);
        $url->addChild('lastmod', date('Y-m-d\TH:i:s+00:00'));  // আপনি এখানে ডেটা দিয়ে দিবেন
        $url->addChild('changefreq', 'monthly');
        $url->addChild('priority', '0.5');
    }

    // সাইটম্যাপ XML ফাইল সংরক্ষণ
    $sitemap->asXML('sitemap2.xml');
    $db->sql_close();
}

// ফাংশন কল
createFullSitemap();
?>
