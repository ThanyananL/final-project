<?php
	require_once 'PHPWord.php';
	

	// New Word Document
	$PHPWord = new PHPWord();

	// New portrait section
	$section = $PHPWord->createSection();

	// Add text elements
	$section->addText("วันนี้ วันที่ 31 พฤษภาคม 2555");
	$section->addTextBreak(2);

	$section->addText("สวัสดีครับ! ชาวไทยครีเอท", array('name'=>'Angsana New', 'color'=>'006699', 'size'=>'24'));
	$section->addTextBreak(2);

	$PHPWord->addFontStyle('rStyle', array('bold'=>true, 'italic'=>true, 'size'=>16));
	$PHPWord->addParagraphStyle('pStyle', array('align'=>'center', 'spaceAfter'=>100));
	$section->addText('I am styled by two style definitions.', 'rStyle', 'pStyle');
	$section->addText('I have only a paragraph style definition.', null, 'pStyle');

	// Save File
	$objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
	$objWriter->save('CreateWord1.docx');
?>