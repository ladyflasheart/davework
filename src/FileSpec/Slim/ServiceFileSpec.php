<?php
namespace Dbould\Davework\FileSpec\Slim;

use Dbould\Davework\FileSpec\FileSpecInterface;

class ServiceFileSpec implements FileSpecInterface
{
    private $namespace;
    private $className;
    private $filePath;
    private $associatedFiles;

    public function __construct($topLevelNamespace, $topLevelTestNamespace, $fileName, $baseFilePath, $requestedName, $requestedType, $module, $factoriesLiveWithClasses)
    {
        if (!is_null($module)) {
            $modulePath = $module . '/';
            $moduleNamespace = '\\' . $module;
        } else {
            $modulePath = '';
            $moduleNamespace = '';
        }

        $this->namespace = $topLevelNamespace . $moduleNamespace . '\Service';
        $this->className = $fileName;

        $this->filePath = $baseFilePath . '/' . $modulePath . 'Service/' . $fileName . '.php';

        $this->associatedFiles = [
            ServiceTestFileSpec::class,
            FactoryFileSpec::class,
            FactoryTestFileSpec::class,
        ];
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

    public function getAssociatedFiles()
    {
        return $this->associatedFiles;
    }
}
