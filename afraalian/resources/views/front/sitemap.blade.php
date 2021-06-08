<?xml version="1.0" encoding="UTF-8"?>
<urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
<url>
  <loc>https://afraalian.com/</loc>
  <lastmod>2021-05-26T09:14:10+00:00</lastmod>
  <priority>1.00</priority>
</url>

@foreach($products as $product)
    <url>
        <loc>https://afraalian.com/product/{{ $product->slug }}</loc>
        <lastmod>{{ $product->updated_at }}</lastmod>
        <priority>0.80</priority>
    </url>
@endforeach

@foreach($articles as $article)
    <url>
        <loc>https://afraalian.com/article/{{ $article->slug }}</loc>
        <lastmod>{{ $article->updated_at }}</lastmod>
        <priority>0.80</priority>
    </url>
@endforeach
<url>
  <loc>https://afraalian.com/about</loc>
  <lastmod>2021-05-26T09:14:10+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>https://afraalian.com/contact</loc>
  <lastmod>2021-05-26T09:14:10+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>https://afraalian.com/login</loc>
  <lastmod>2021-05-26T09:14:10+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>https://afraalian.com/register</loc>
  <lastmod>2021-05-26T09:14:10+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>https://afraalian.com/cart</loc>
  <lastmod>2021-05-26T09:14:10+00:00</lastmod>
  <priority>0.80</priority>
</url>
</urlset>
