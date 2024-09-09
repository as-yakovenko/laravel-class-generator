<?php

namespace Yakovenko\LaravelClassGenerator\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;

class GenerateServiceCommand extends GeneratorCommand
{
    protected $signature    = 'yas:service {name}';
    protected $description  = 'Generate a new Service class';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/../stubs/service.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace( $rootNamespace )
    {
        return $rootNamespace . '\Services';
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

        return base_path('app') . '/' . str_replace( '\\', '/', $name ) . 'Service.php';
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['full', 'F', InputOption::VALUE_NONE, 'Generate a new Service class with full options'],
        ];
    }
}
