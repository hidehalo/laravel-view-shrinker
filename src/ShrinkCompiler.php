<?php
/**
 * @author hidehalo <tianchen_cc@yeah.net>
 */
namespace Hidehalo\View\Compilers;

use Illuminate\View\Compilers\BladeCompiler;

class ShrinkCompiler extends BladeCompiler
{
    /**
     * @inheritDoc
     */
    public function compileString($value)
    {
        return trim(preg_replace('/>\s+</', '><', parent::compileString($value)));
    }
}
