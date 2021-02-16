<?php
/**
 * @author hidehalo <tianchen_cc@yeah.net>
 */
namespace Hidehalo\View\Compilers\Tests;

use PHPUnit\Framework\TestCase;
use League\Flysystem\Adapter\Local;
use Illuminate\Filesystem\Filesystem;
use Hidehalo\View\Compilers\ShrinkCompiler;

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
}
