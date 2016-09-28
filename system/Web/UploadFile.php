<?php
/**
 * An UploadFile Object
 * 
 * @author Johnathan Hebert <johnathan@jdcommerce.com>
 */
class UploadFile extends File {
	public $file;
	public $name;
	public $type;
	public $size;
	public $tmpName;
	public $path;
	public $isUploadedFile;
	public $error;
	public $errorText;
	
	/**
	 * Error descriptions
	 * 
	 * These descriptions were taken from the PHP documentation at
	 * http://www.php.net/manual/en/features.file-upload.errors.php
	 * @var array
	 */
	public static $errorCodes = array(
		UPLOAD_ERR_OK=>"There is no error, the file uploaded with success.",
		UPLOAD_ERR_INI_SIZE=>"The uploaded file exceeds the upload_max_filesize directive in php.ini.",
		UPLOAD_ERR_FORM_SIZE=>"The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.",
		UPLOAD_ERR_PARTIAL=>"The uploaded file was only partially uploaded.",
		UPLOAD_ERR_NO_FILE=>"No file was uploaded.",
		UPLOAD_ERR_NO_TMP_DIR=>"Missing a temporary folder. Introduced in PHP 4.3.10 and PHP 5.0.3.",
		UPLOAD_ERR_CANT_WRITE=>"Failed to write file to disk. Introduced in PHP 5.1.0.",
		UPLOAD_ERR_EXTENSION=>"File upload stopped by extension. Introduced in PHP 5.2.0."
	);
	
	/**
	 * 
	 * @param array $file An element of the $_FILES array that is itself an array containing information on a single uploaded file 
	 */
	public function __construct(array $file) {
		$this->file = $file;
		$this->name = is_array($file["name"])?$file["name"][0]:$file["name"];
		$this->type = is_array($file["type"])?$file["type"][0]:$file["type"];
		$this->size = (int)(is_array($file["size"])?$file["size"][0]:$file["size"]);
		$this->tmpName = is_array($file["tmp_name"])?$file["tmp_name"][0]:$file["tmp_name"];
		$this->path = $this->tmpName;
		$this->error = (int)(is_array($file["error"])?$file["error"][0]:$file["error"]);
		$this->errorText = self::$errorCodes[$this->error];
		$this->isUploadedFile = is_uploaded_file($this->tmpName);
	}
	
	/**
	 * This will move the uploaded file from the upload temp directory to the 
	 * given destination
	 * 
	 * @param string $destination The full file system path to move the uploaded file to
	 */
	public function move($destination) {
		if (file_exists($this->tmpName) && move_uploaded_file($this->tmpName, $destination)) {
			$this->path = $destination;
		}
		
		return $this;
	}
	
	public function delete() {
		if (file_exists($this->path)) {
			unlink($this->path);
		}
		
		return $this;
	}
}
?>