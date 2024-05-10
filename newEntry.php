<?php

    $xml = new DOMDocument();
    $xml->load("Diary.xml");

    $rootTag = $xml->getElementsByTagName("Diary")->item(0);

	$dataTag = $xml->createElement("Entry");
	$date =  $xml->createElement("Date", $_REQUEST["date"]);
	$title =  $xml->createElement("Title", $_REQUEST["title"]);
	$content =  $xml->createElement("Content", $_REQUEST["content"]);

    $dataTag->appendChild($date);
    $dataTag->appendChild($title);
    $dataTag->appendChild($content);

    $rootTag->appendChild($dataTag);

    $xml->save("Diary.xml");
    header("Refresh: 1; URL=index.html");
    exit;

?>
