<?php

namespace MVC\Lib;

class FileUpload
{
    const MAX_FILE_SIZE = 10 * 1024 * 1024; // 10MB

    private $name;
    private $type;
    private $size;
    private $error;
    private $tmpPath;

    private $fileType;
    private $allowedTypes = ["image"];

    private $fileExtension;
    private $allowedExtensions = ["jpg", "jpeg", "png", "gif", "webp"];


    public function __construct($file)
    {
        $this->type     = $file["type"];
        $this->name     = $this->changeName($file["name"]);
        $this->size     = $file["size"];
        $this->error    = $file["error"];
        $this->tmpPath  = $file["tmp_name"];
    }


    private function changeName($name)
    {
        $name = md5($name);
        $type = explode("/", $this->type);
        $this->fileType = $type[0];
        $this->fileExtension = $type[1];
        $newName = strtolower("$name.$type[1]");
        return $newName;
    }

    private function checkType()
    {
        return in_array($this->fileType, $this->allowedTypes) && in_array($this->fileExtension, $this->allowedExtensions);
    }

    private function checkSize()
    {
        return $this->size < self::MAX_FILE_SIZE;
    }


    public function upload()
    {
        if ($this->error != 0) {
            return false;
        } elseif (!$this->checkType()) {
            return false;
        } elseif (!$this->checkSize()) {
            return false;
        } else {
            return move_uploaded_file($this->tmpPath, IMAGES_PATH . $this->name);
        }
    }

    public function getFileName()
    {
        return $this->name;
    }
}
