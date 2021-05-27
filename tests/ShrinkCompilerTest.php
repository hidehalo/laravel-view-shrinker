<?php
/**
 * @author hidehalo <tianchen_cc@yeah.net>
 */
namespace Hidehalo\View\Compilers\Tests;

use PHPUnit\Framework\TestCase;
use Illuminate\Config\Repository;
use League\Flysystem\Adapter\Local;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Application;
use Hidehalo\View\Compilers\ShrinkCompiler;
use Hidehalo\View\Compilers\ShrinkCompilerServiceProvider;

class ShrinkCompilerTest extends TestCase
{
    public function testCompileString()
    {
        $local = new Local(__DIR__);
        $filesystem = new Filesystem($local);
        $cachePath = __DIR__.'/cache';
        $compiler = new ShrinkCompiler($filesystem, $cachePath);
        $html = 
        '<html>
            <head>
                <title>Test title</title>
                <body>
                    <p>
                        Hello world!
                    </p>
                </body>
            </head>
        </html>';
        $shrinked = $compiler->compileString($html);
        $this->assertEquals($shrinked, '<html><head><title>Test title</title><body><p>
                        Hello world!
                    </p></body></head></html>');
    }

    public function testConstructFromContainer()
    {
        $app = new Application();
        $app->register(new ShrinkCompilerServiceProvider($app));
        $local = new Local(__DIR__);
        $filesystem = new Filesystem($local);
        $app['files'] = $filesystem;
        $cachePath = __DIR__.'/cache';
        $app['config'] = new Repository([
            'view' => [
                'compiled' => $cachePath,
            ],
        ]);
        $compiler = $app->get('blade.compiler');
        $this->assertInstanceOf(ShrinkCompiler::class, $compiler);
        $this->assertSame($compiler, $app->get('blade.compiler'));
    }
}
