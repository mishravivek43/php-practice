<?php
//namespace log;
class logfile
{
private $_filename;
private $_filedata;

public function writefile($strfilename,$strfiledata)
{
	$this->_filename=$strfilename;
	$this->_filedata=$strfiledata;
	//$this->_checkpermission();
	$this->_checkdata();
	$myfile = fopen($this->_filename,"a+");
	fwrite($myfile,"\n".$this->_filedata);
	fclose($myfile);
}

public function readfile($strfilename)
{
	$this->_filename=$strfilename;
	$this->_checkfile();
	//fread($this->_filename);
	$myfile=fopen($this->_filename,"a+");
	return file_get_contents($this->_filename);
}

private function _checkpermission()
{
	if(!is_writable($this->_filename)) die ("change your CHMOD permission to -R 777 file directory");
}
private function _checkdata()
{
	if(empty($this->_filedata))
	die('Data is blank');
		
}
private function _checkfile()
{
	if (!file_exists($this->_filename))
	die('The file does not exist');
}
 
}

?>
