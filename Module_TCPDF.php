<?php
namespace GDO\TCPDF;

use GDO\Core\GDO_Module;

final class Module_TCPDF extends GDO_Module
{
	public function includeTCPDF()
	{
		$path = $this->filePath('TCPDF/tcpdf.php');
		require_once $path;
	}
	
}
