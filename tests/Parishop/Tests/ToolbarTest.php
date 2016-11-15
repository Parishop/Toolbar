<?php
namespace Parishop\Tests;

class ToolbarTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Parishop\Toolbar
     */
    protected $toolbar;

    public function setUp()
    {
        $this->toolbar = new \Parishop\Toolbar();
    }

    public function test()
    {
        $this->toolbar->addButton('create', 'Создать');
        $this->toolbar->addButtonConfirm('confirm', 'Подтверждение');
        $this->toolbar->addButtonHelp('Помощь');
        $this->assertEquals(
            '<div class="uk-button-group">
        <button type="button" class="uk-button" onclick="Parishop.sendForm(\'create\');">Создать</button>
</div>
', $this->toolbar->render()
        );
    }

}
