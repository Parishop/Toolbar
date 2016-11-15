<?php
namespace Parishop;

class Toolbar
{
    /**
     * @var \PHPixie\Template
     */
    protected $template;

    protected $container       = false;

    protected $containerCenter = false;

    protected $title;

    /**
     * @var Toolbar\Button[]
     */
    protected $buttons = [];

    /**
     * Toolbar constructor.
     * @param bool $container
     * @param bool $containerCenter
     */
    public function __construct($container = false, $containerCenter = false)
    {
        $this->container       = $container;
        $this->containerCenter = $containerCenter;
    }

    /**
     * @param string $task
     * @param string $text
     * @param string $icon
     * @param string $group
     */
    public function addButton($task, $text, $icon = null, $group = null)
    {
        $button = $this->buildButton('standard', $task, $text, $icon, $group);

        $this->buttons[$button->group()][] = $button;
    }

    /**
     * @param string $task
     * @param string $text
     * @param string $icon
     * @param string $group
     */
    public function addButtonConfirm($task, $text, $icon = null, $group = null)
    {
        $button = $this->buildButton('confirm', $task, $text, $icon, $group);

        $this->buttons[$button->group()][] = $button;
    }

    /**
     * @param string $text
     */
    public function addButtonHelp($text)
    {
        $button = $this->buildButton('confirm', 'help', $text, 'uk-icon-question', 'help');

        $this->buttons[$button->group()][] = $button;
    }

    /**
     * @return string
     */
    public function render()
    {
        $data = [
            'title'           => $this->title,
            'buttons'         => $this->buttons,
            'container'       => $this->container,
            'containerCenter' => $this->containerCenter,
        ];

        return $this->template()->get('toolbar', $data)->render();
    }

    /**
     * @return \PHPixie\Template
     */
    public function template()
    {
        if($this->template === null) {
            $slice          = new \PHPixie\Slice();
            $config         = $slice->arrayData(
                [
                    'resolver' => [
                        'locator' => [
                            'type'     => 'prefix',
                            'locators' => array(
                                'default' => array(
                                    'directory' => 'templates',
                                ),
                            ),
                        ],
                    ],
                ]
            );
            $filesystem     = new \PHPixie\Filesystem();
            $locator        = $filesystem->buildLocator(
                $slice->arrayData(
                    [
                        'type'      => 'directory',
                        'directory' => 'templates',
                    ]
                ), $filesystem->root(__DIR__ . '/assets')
            );
            $this->template = new \PHPixie\Template($slice, $locator, $config);
        }

        return $this->template;
    }

    public function title($title)
    {
        $this->title = $title;
    }

    protected function buildButton($type, $task, $text, $icon = null, $group = null)
    {
        $class = '\Parishop\Toolbar\Button\\' . ucfirst($type);
        if(class_exists($class)) {
            return new $class($this, $type, $task, $text, $icon, $group);
        }

        return new Toolbar\Button\Standard($this, $type, $task, $text, $icon, $group);
    }
}