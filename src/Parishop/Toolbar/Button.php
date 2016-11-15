<?php
namespace Parishop\Toolbar;

/**
 * Class Button
 * @package Parishop\Toolbar
 * @since   1.0
 */
abstract class Button
{
    /**
     * @var \Parishop\Toolbar
     */
    protected $toolbar;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     * @since 1.0
     */
    protected $task;

    /**
     * @var string
     */
    protected $text;

    /**
     * @var string
     */
    protected $icon;

    /**
     * @var string
     */
    protected $group;

    /**
     * Button constructor.
     * @param \Parishop\Toolbar $toolbar
     * @param string            $type
     * @param string            $task
     * @param string            $text
     * @param string            $icon
     * @param string            $group
     * @since 1.0
     */
    public function __construct(\Parishop\Toolbar $toolbar, $type, $task, $text, $icon = null, $group = null)
    {
        $this->toolbar = $toolbar;
        $this->type    = $type;
        $this->task    = $task;
        $this->text    = $text;
        $this->icon    = $icon;
        $this->group   = $group;
    }

    /**
     * @return string
     * @since 1.0
     */
    public function group()
    {
        return $this->group;
    }

    /**
     * @return string
     * @since 1.0
     */
    public function icon()
    {
        return $this->icon;
    }

    /**
     * @return string
     * @since 1.0
     */
    public function render()
    {
        return $this->toolbar->template()->get($this->type, ['button' => $this])->render();
    }

    /**
     * @return string
     * @since 1.0
     */
    public function task()
    {
        return $this->task;
    }

    /**
     * @return string
     * @since 1.0
     */
    public function text()
    {
        return $this->text;
    }

}

