<?php

namespace Encore\Admin\Traits;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Tree;
use Encore\Admin\TreeMenu;

trait AdminBuilder
{
    /**
     * @param \Closure $callback
     *
     * @return Grid
     */
    public static function grid(\Closure $callback)
    {
        return new Grid(new static(), $callback);
    }

    /**
     * @param \Closure $callback
     *
     * @return Form
     */
    public static function form(\Closure $callback)
    {
        Form::registerBuiltinFields();

        return new Form(new static(), $callback);
    }

    /**
     * @param \Closure $callback
     *
     * @return Tree
     */
    public static function tree(\Closure $callback = null)
    {
        return new Tree(new static(), $callback);
    }

    /**
     * @param \Closure|null $callback
     * @return Tree
     */
    public static function treeMenu(\Closure $callback = null)
    {
        return new TreeMenu(new static(), $callback);
    }
}
