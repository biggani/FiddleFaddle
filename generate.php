<?php
$doctypes = 
array(
	"html", //HTML5
	'HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"',//HTML 4.01 strict
	'HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"',//HTML 4.01 transitional
	'HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd"',//HTML 4.01 transitional
	'html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"', //XHTML1.0 strict
	'html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"',//XHTML 1.0 transitional
	'html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd"', //XHTML 1.0 frameset
	'html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"' // XHTML 1.1
	 );
$doc = new DOMDocument();
$html = $doc->appendChild($doc->createElement("html"));
$head = $html->appendChild($doc->createElement("head"));
$script = $doc->createElement("script",htmlentities($_REQUEST["JS"]));
$style = $head->appendChild($doc->createElement("style", htmlentities($_REQUEST["CSS"])));
$body = $html->appendChild($doc->createElement("body",htmlentities($_REQUEST["HTML"])));
/*$fragment = $doc->createDocumentFragment();
$fragment->appendXML(base64_decode($_POST["HTML"]));
$body->appendChild($fragment);*/
//$body->appendChild($doc->createCDATASection(base64_decode($_REQUEST["HTML"])));
if($_REQUEST["scriptMethod"] == 1){
	$head->appendChild($script);
}else{
	$body->appendChild($script);
}
$doc->formatOutput = true;
print "<!DOCTYPE ".($doctypes[$_REQUEST["docType"]]).">\n";
foreach($doc->childNodes as $node){
	print html_entity_decode($doc->saveXML($node));
}

?>
