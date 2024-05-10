<?php
$xmlDoc = new DOMDocument();
$xmlDoc->load("Diary.xml");

$entries = $xmlDoc->getElementsByTagName("Entry");
$diaryEntries = [];

foreach ($entries as $entry) {
    $date = $entry->getElementsByTagName("Date")->item(0)->nodeValue;
    $title = $entry->getElementsByTagName("Title")->item(0)->nodeValue;
    $content = $entry->getElementsByTagName("Content")->item(0)->nodeValue;

    $diaryEntries[] = [
        "Date" => $date,
        "Title" => $title,
        "Content" => $content
    ];
}

header('Content-Type: application/json');
echo json_encode($diaryEntries);
?>