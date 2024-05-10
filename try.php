<?php
if(isset($_GET['date'])) {
    $date = $_GET['date'];

    $xmlFile = 'Diary.xml';
    $xml = simplexml_load_file($xmlFile);

    foreach($xml->Entry as $entry) {
        if((string)$entry->Date == $date) {
            $dom = dom_import_simplexml($entry);
            $dom->parentNode->removeChild($dom);
            break;
        }
    }

    file_put_contents($xmlFile, $xml->asXML());

    echo "Entry deleted successfully.";
} else {
    echo "Error: Date parameter is missing.";
}
?>
