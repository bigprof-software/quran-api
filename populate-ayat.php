<?php

define('AYAT_FILE', '/home/ubuntu/apps/quran-finder.com/app/quranText.php');
define('AYAT_DIACRITIZED_FILE', '/home/ubuntu/apps/quran-finder.com/app/quranTextSigned.php');

ob_start();

// open each file for text reading
$ayat = fopen(AYAT_FILE, 'r');
$ayatDiacritized = fopen(AYAT_DIACRITIZED_FILE, 'r');

/* 
For $ayatFile:
	ignoring the first line, for every line, the format is:
		suraNum/ayaNum:ayaText
	so we need to extract the ayaNum, suraNum, and ayaText, then save ayaText to the file "app/text/ar/$suraNum/$ayaNum/index.txt"
For $ayatDiacritizedFile:
	ignoring the first line, for every line, the format is:
		suraNum/ayaNum:ayaText
	so we need to extract the ayaNum, suraNum, and ayaText, then save ayaText to the file "app/text/ar/$suraNum/$ayaNum/diacritized/index.txt"
*/

// read the first line of each file
fgets($ayat);
fgets($ayatDiacritized);

// read each line of the file
while (!feof($ayat) && !feof($ayatDiacritized)) {
	// read the line
	$line = trim(fgets($ayat));
	$lineDiacritized = trim(fgets($ayatDiacritized));

	// if line is empty, skip
	if (empty($line) || empty($lineDiacritized)) continue;

	// extract the ayaNum, suraNum, and ayaText
	$line = explode(':', $line);
	$lineDiacritized = explode(':', $lineDiacritized);

	list($ayaNum, $suraNum) = explode('/', $line[0]);
	$ayaText = trim($line[1]);
	$ayaTextDiacritized = trim($lineDiacritized[1]);

	// Prepend unicode BOM to the text
	$ayaText = "\xEF\xBB\xBF" . $ayaText;
	$ayaTextDiacritized = "\xEF\xBB\xBF" . $ayaTextDiacritized;

	// save ayaText to the file "app/text/ar/$suraNum/$ayaNum/index.txt"
	$dir = __DIR__ . "/app/text/ar/$suraNum/$ayaNum";
	if (!file_exists($dir)) continue;
	file_put_contents("$dir/index.txt", $ayaText);

	// save ayaTextDiacritized to the file "app/text/ar/$suraNum/$ayaNum/diacritized/index.txt"
	$dir = __DIR__ . "/app/text/ar/$suraNum/$ayaNum/diacritized";
	if (!file_exists($dir)) continue;
	file_put_contents("$dir/index.txt", $ayaTextDiacritized);

	// single-line progress to stdout
	printf("\rProcessing Aya %03d of Sura %03d", $ayaNum, $suraNum);
	ob_flush();
	flush();

	// sleep for 1ms
	usleep(1000);
}

echo "\nDone!";