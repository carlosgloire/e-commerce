<?php

// Create a new XML document
$xml = new DOMDocument();

// Set the document's root element
$root = $xml->createElement('urlset');
$xml->appendChild($root);

// Add each page to the sitemap
foreach ($pages as $page) {

    // Create a new <url> element
    $url = $xml->createElement('url');
    $root->appendChild($url);

    // Set the <loc> element
    $loc = $xml->createElement('loc');
    $loc->appendChild($xml->createTextNode($page['url']));
    $url->appendChild($loc);

    // Set the <lastmod> element
    $lastmod = $xml->createElement('lastmod');
    $lastmod->appendChild($xml->createTextNode($page['lastmod']));
    $url->appendChild($lastmod);

    // Set the <changefreq> element
    $changefreq = $xml->createElement('changefreq');
    $changefreq->appendChild($xml->createTextNode($page['changefreq']));
    $url->appendChild($changefreq);

    // Set the <priority> element
    $priority = $xml->createElement('priority');
    $priority->appendChild($xml->createTextNode($page['priority']));
    $url->appendChild($priority);

}

// Save the XML document
$xml->save('sitemap.xml');
