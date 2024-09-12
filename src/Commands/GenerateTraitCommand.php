<?php

namespace Yakovenko\LaravelClassGenerator\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;

class GenerateTraitCommand extends GeneratorCommand
{
    protected $signature    = 'yas:trait {name}';
    protected $description  = 'Generate a new Trait class';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/../stubs/trait.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace( $rootNamespace )
    {
        return $rootNamespace . '\Traits';
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

        $class .= 'Trait';

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

        return base_path('app') . '/' . str_replace( '\\', '/', $name ) . 'Trait.php';
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['full', 'F', InputOption::VALUE_NONE, 'Generate a new Trait class with full options'],
        ];
    }
}
