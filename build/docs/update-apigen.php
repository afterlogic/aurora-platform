<?php
echo "Start documentation custom process";

include "Parsedown.php";

$sDocsPath = dirname(__File__);
$sRootPath = dirname(dirname($sDocsPath));

$sMdFile = $sRootPath.'/apigen-overview.md';
$sDocsFile = $sDocsPath.'/docs/api/index.html';


if (file_exists($sMdFile) && file_exists($sDocsFile))
{
	$sMdText = file_get_contents($sMdFile);
	
	$Parsedown = new Parsedown();
	$sOverviewtext = $Parsedown->text($sMdText);
	
	$sDoc = file_get_contents($sDocsFile);
	
	if ($sOverviewtext && $sDoc) 
	{
		$sDoc = preg_replace("/id=\"content\".*(?:\r)*(?:\n)*.*<\/h1>/", "$0" . $sOverviewtext, $sDoc);
		file_put_contents($sDocsFile, $sDoc);
		
		echo "Overview was saccessully added";
	}
	else
	{
		echo "Can't insert overview";
	}
}
else
{
	echo "apigen-overview.md or documentation not found";
}