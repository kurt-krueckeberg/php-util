<?php
use \SplFileObject as File;
/*
 *
 * EXPLANATION: Extracts the paragraph text from input-dialog.html and writes each as a single line in 'text.txt'.
 *
 */

$dom = new \DOMDocument();

@$dom->loadHTMLFile("./input-dialog.html");

/*
 * Alternative code:
 * 
$nodes = array();

$xpath = new DOMXPath($dom);

// select THE TEXT NODES of all p elements,
$found = $xpath->query('//p/text()');

$ofile1 = new File("./p1.txt", "w");

foreach($found as $textNode) {

    $new = preg_replace('/(\n)/', ' ', $textNode->nodeValue);

    $ofile1->fwrite($new . "\n");
}
 * 
 */

$paragraphs = $dom->getElementsByTagName('p');
$cnt = 0;

$ofile = new File("./new-text.txt", "w");

foreach ($paragraphs as $p) {

    $text = trim($p->textContent);

    $new = preg_replace('/(\n)/', ' ', $text);
    $new = preg_replace('/(\s\s)/', ' ', $new);

    $ofile->fwrite($new . "\n");

    ++$cnt;
}

echo $cnt . " line written to file new-text.txt\n";
 
return;
