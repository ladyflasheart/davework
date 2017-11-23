<?php
namespace Davework\FileSpec\Slim;

use Davework\FileSpec\FileSpecInterface;

class ControllerFileSpec implements FileSpecInterface
{
    private $namespace;
    private $className;
    private $filePath;
    private $associatedFiles;

    public function __construct($topLevelNamespace, $fileName, $baseFilePath)
    {
        $this->namespace = $topLevelNamespace . '\Controller';
        $this->className = $fileName . 'Controller';
        $this->filePath = $baseFilePath . '/src/Controller/' . $fileName . 'Controller.php';

        $this->associatedFiles = [
            ControllerFunctionalTestFileSpec::class,
            FactoryFileSpec::class,
            FactoryFunctionalTestFileSpec::class,
        ];
    }

    public function getAssociatedFiles()
    {
        return $this->associatedFiles;
    }

    public function getFileContent($template)
    {
        return sprintf(
            $template,
            $this->namespace,
            $this->className);
    }

    public function getFilePath()
    {
        return $this->filePath;
    }

    public function getClassName()
    {
        return $this->className;
    }
}
