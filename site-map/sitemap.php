<?php
//sitemap.php
include '../db-queries/connect.php';
isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? $current_url = "https://" : $current_url = "http://";
$current_url.= $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];    ;
$query = "SELECT uri FROM page";
$result = mysqli_query($connection, $query);
$base_url = $current_url."/site-map";
header("Content-Type: application/xml; charset=utf-8");
echo '<!-- ?xml version="1.0" encoding="UTF-8"?-->' .PHP_EOL;
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://
www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">' .PHP_EOL;
while ($row = mysqli_fetch_array($result))
{
echo '<url>' . PHP_EOL;
echo '<loc>'.$base_url. $row["uri"] .'/</loc>' . PHP_EOL;
echo '<changefreq>daily</changefreq>'.PHP_EOL;
echo '</url>' . PHP_EOL;
}
echo '</urlset>'.PHP_EOL;
mysqli_close($connection);
?>
