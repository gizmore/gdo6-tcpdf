<?php
namespace GDO\TCPDF;

use GDO\Core\GDO_Module;
use GDO\File\GDT_ImageFile;
use GDO\File\GDO_File;
use GDO\File\FileUtil;
use GDO\DB\GDT_UInt;

/**
 * Includes and helpers for the TCPDF Library.
 * Uses GDOTCPDF tp create files in the gdo6/temp/tcpdf directory.
 * Generators (inheriting from GDOTCPDF) shall return a GDO_File.
 * 
 * @author gizmore
 * @version 6.10
 * @since 6.10
 * @see GDOTCPDF
 */
final class Module_TCPDF extends GDO_Module
{
	public $module_priority = 8;
	
	public function onInstall() { FileUtil::createDir($this->tempPath()); }

	public function includeTCPDF() { require_once $this->filePath('TCPDF/tcpdf.php'); }
	
	public function onLoadLanguage() { return $this->loadLanguage('lang/tcpdf'); }
	
	##############
	### Config ###
	##############
	public function getConfig()
	{
		return array(
			GDT_ImageFile::make('pdf_top_logo')->previewHREF(href('TCPDF', 'Logo', "&id=")),
			GDT_UInt::make('pdf_top_logo_height')->notNull()->initial('0'),
		);
	} 
	
	/**
	 * @return GDO_File
	 */
	public function cfgLogo() { return $this->getConfigValue('pdf_top_logo'); }
	public function cfgLogoId() { return $this->getConfigVar('pdf_top_logo'); }
	public function cfgLogoHeight() { return $this->getConfigVar('pdf_top_logo_height'); }
	
}
