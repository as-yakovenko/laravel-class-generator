<?php

namespace Yakovenko\LaravelClassGenerator\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;

class GenerateHelperCommand extends GeneratorCommand
{
    protected $signature    = 'yas:helper {name}';
    protected $description  = 'Generate a new Helper class';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/../stubs/helper.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace( $rootNamespace )
    {
        return $rootNamespace . '\Helpers';
    }

    /**
     * Replace the class name for the given stub.
     *
     * @param string $stub
     * @param string $name
     * @return string
     */
    protected function replaceClass( $stub, $name )
    {
        $name   = $this->qualifyClass( $name );
        $class  = str_replace( $this->getNamespace( $name ) . '\\', '', $name );

        return str_replace(['DummyClass', '{{ class }}', '{{class}}'], $class, $stub);
    }

    /**
     * Get the destination class path.
     *
     * @param string $name
     * @return string
     */
    protected function getPath( $name )
    {
        $name = $this->qualifyClass( $name );
        $name = str_replace( $this->rootNamespace(), '', $name );

        return base_path('app') . '/' . str_replace( '\\', '/', $name ) . 'Helper.php';
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['full', 'F', InputOption::VALUE_NONE, 'Generate a new Helper class with full options'],
        ];
    }
}
