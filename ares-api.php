<?php
$ico = "70994226";//default ičo české dráhy ftw
if(!empty($_GET["ico"])){
    $ico = $_GET["ico"];
}
$url = "http://wwwinfo.mfcr.cz/cgi-bin/ares/ares_es.cgi?ico=".$ico;
include "XmlResult.php";
include "JsonBuilder.php";

$reader = new XMLReader();
$json = new JsonBuilder();
if (!$reader->open($url)) {
    $json->set("errror", "failed to init reader");
    die($json->build());
}

//XML nodes names u kterých chceme najít data
$keys = array("ico", "ojm", "jmn", "p_dph");

$result = new XmlResult();
while ($reader->read()) {
    if ($reader->nodeType == XMLReader::ELEMENT){
        $name = explode(":", $reader->name)[1];
        if(in_array($name, $keys)){
            $value = $reader->readString();
            if(!empty($value)){
                if(startsWith($value, "dic=")){
                    $value = str_replace("dic=", "", $value);
                }
                switch ($name){
                    default: break;
                    case "ico":
                        $result->setIco($value);
                        break;
                    case "ojm":
                        $result->setTitle($value);
                        break;
                    case "jmn":
                        $result->setAddress($value);
                        break;
                    case "p_dph":
                        $result->setDic($value);
                        break;
                }
            }
        }
    }
}

if(!$result->validate()){
    $json->set("result", "no results found");
    die($json->build());
}

$json->set("result", "success");
$json->set("ico", $result->getIco());
$json->set("title", $result->getTitle());
$json->set("address", $result->getAddress());
if(!empty($result->getDic())){
    $json->set("dic", $result->getDic());
}
echo $json->build();

function startsWith($haystack, $needle) {
    return substr_compare($haystack, $needle, 0, strlen($needle)) === 0;
}
function endsWith($haystack, $needle) {
    return substr_compare($haystack, $needle, -strlen($needle)) === 0;
}
