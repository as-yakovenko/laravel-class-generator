<?php

namespace Yakovenko\LaravelClassGenerator\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class GenerateTraitCommand extends Command
{
    protected $signature    = 'yas:trait {name}';
    protected $description  = 'Generate a new Trait class';

    public function __construct( protected Filesystem $files )
    {
        parent::__construct();
    }

    /**
     * Handles the command execution to generate a new Trait class.
     *
     * @return void
     */
    public function handle()
    {
        $name = $this->argument( 'name' );

        if ( !str_ends_with( $name, 'Trait' ) ) {
            $name .= 'Trait';
        }

        $this->generateClass( 'Traits', $name );
    }

    /**
     * Generates a new class file based on the provided type and name.
     *
     * @param string $type The type of class to generate (e.g., 'Traits').
     * @param string $name The name of the class to generate.
     *
     * @return void
     */
    protected function generateClass( string $type, string $name )
    {
        $path = $this->getClassPath( $type, $name );
        $stub = $this->getStub();
        $stub = $this->replacePlaceholders( $stub, $name );

        $this->files->ensureDirectoryExists( dirname( $path ) );
        $this->files->put( $path, $stub );

        $this->info( "Trait class {$name} created successfully at {$path}" );
    }

    /**
     * Generates the file path for the class to be created.
     *
     * @param string $type The type of class to generate (e.g., 'Traits').
     * @param string $name The fully qualified name of the class, including namespaces.
     * @return string The file path where the class will be created.
     */
    protected function getClassPath( string $type, string $name )
    {
        $namespace = str_replace( '\\', '/', $name );
        return base_path( "app/{$type}/{$namespace}.php" );
    }

    /**
     * Retrieves the content of the trait stub file.
     *
     * @return string The content of the trait stub file.
     */
    protected function getStub()
    {
        return file_get_contents( __DIR__ . '/../stubs/trait.stub' );
    }

    /**
     * Replaces placeholders in the stub with actual values.
     *
     * @param string $stub The content of the stub file.
     * @param string $name The name of the class to be generated.
     *
     * @return string The stub content with placeholders replaced by actual values.
     */
    protected function replacePlaceholders( string $stub, string $name )
    {
        $namespace = $this->getNamespace( $name );
        $className = $this->getClassName( $name );

        $stub = str_replace( '{{ namespace }}', $namespace, $stub );
        $stub = str_replace( '{{ class }}', $className, $stub );

        return $stub;
    }

    /**
     * Generates the namespace for the trait class based on the provided name.
     *
     * @param string $name The fully qualified name of the class, including namespaces.
     * @return string The namespace for the trait class.
     */
    protected function getNamespace( string $name )
    {
        $parts = explode( '\\', $name );
        array_pop( $parts );
        return 'App\Traits' . ( count( $parts ) ? '\\' . implode('\\', $parts) : '' );
    }

    /**
     * Extracts and returns the class name from a fully qualified class name.
     *
     * @param string $name The fully qualified name of the class, including namespaces.
     * @return string The class name extracted from the fully qualified name.
     */
    protected function getClassName( string $name )
    {
        $parts = explode( '\\', $name );
        return array_pop( $parts );
    }
}