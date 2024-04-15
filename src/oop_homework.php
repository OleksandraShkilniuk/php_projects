<?php
abstract class Node
{
    protected string $content = '';
    protected string $tagName;

    protected string $id = '';
    protected array $childElements = [];

    protected array $classes = [];

    protected array $attributes = [];
    public function render() :string
    {
        $childHtml = '';
        foreach($this->childElements as $childEl){
            $childHtml .= $childEl->render();
        }

        $classVal = '';
        foreach($this->classes as $class){
            $classVal .= $class;
        }

        $attributeVal = '';
        foreach($this->attributes as $attribute){
            $attributeVal .= $attribute;
        }

        return '<' . $this->tagName . ' id="' . $this->id . '" class="' . $classVal . '" ' . $attributeVal . '>'
            . $this->content . $childHtml . '</' . $this->tagName . '>';

    }

    public function addContent($content) :void
    {
        $this->content = $content;
    }

    public function addId($id) :void
    {
        $this->id = $id;
    }

    public function addChildEl($childEl) :void
    {
        $this->childElements[] = $childEl;
    }

    public function addClass($class) :void
    {
        $this->classes[] = $class;
    }

    public function addAttribute($attribute) :void
    {
        $this->attributes[] = $attribute;
    }
}

class BlockNode extends Node
{
    protected string $tagName = 'div';

}

class InlineNode extends Node
{
    protected string $tagName = 'span';
}

class ListItem extends Node
{
    protected string $tagName = 'li';
}

class ListNode extends Node
{
    protected string $tagName = 'ul';

    public function addListItem($content) :void
    {
        $listItem = new ListItem();
        $listItem->addContent($content);
        $this->addChildEl($listItem);
    }
}

class BlockListNode extends ListNode
{
    protected string $tagName = 'div';

    public function __construct($tagName, $class)
    {
        $this->tagName = $tagName;
        $this->classes[] = $class;
    }
}

class InputNode extends Node
{
    protected string $id = '';
    protected string $tagName = 'input';
    protected string $typeText = 'text';
    protected string $inputValue = '';
    protected string $placeholder = '';
    protected string $errorMessage = '';
    protected array $attributesInput=[];

    protected string $label = '';

    public function render() :string
    {
        $attributes = '';
        foreach ($this->attributesInput as $name => $value) {
            $attributes .= ' ' . $name . '="' . $value . '"';
        }

        $id = $this->id? $this->id : uniqid();
        $label = $this->label ? '<label for="' . $id . '">' . $this->label . '</label>' . "\n" : '';
        $errorMessage = $this->errorMessage ? '<div class="invalid-feedback">' . $this->errorMessage . '</div>': '';

        return $label . '<' . $this->tagName . ' id = "' . $id . '"' . ' type="' . $this->typeText . '"'
            . ' value="' . $this->inputValue . '"' .
            ' placeholder="' . $this->placeholder . '"' .
            $attributes . '>' . $errorMessage;
    }

    public function addChildEl($childEl) :void
    {
        return;
    }

    public function setType($typeText) :void
    {
        $this->typeText = $typeText;
    }

    public function setValue($inputValue) :void
    {
        $this->inputValue = $inputValue;
    }

    public function setPlaceholder($placeholder) :void
    {
        $this->placeholder = $placeholder;
    }

    public function setLabel($label) :void
    {
        $this->label = $label;
    }

    public function setId($id) :void
    {
        $this->id = $id;
    }

    public function addAttributeInput(string $name, string $value): void
    {
        $this->attributesInput[$name] = $value;
    }

    public function setError($errorMessage) :void
    {
        $this->errorMessage = $errorMessage;
    }


}



$span = new InlineNode();
$span->addContent('some inline content');
$div = new BlockNode();
$div->addId('top');
$div->addClass('class1');
$div->addClass(' class2');
$div->addAttribute('required');
$div->addContent('some content');
$div->addChildEl($span);
echo(htmlspecialchars($div->render()));
echo "<br>";
echo "<br>";

$olItem = new ListNode();
$olItem->addContent('some ul');
$olItem->addListItem('PLEASE WORK I BEG');
echo(htmlspecialchars($olItem->render()));
echo 'test';
echo "<br>";
$blockList = new BlockListNode('div', 'list-group');
$blockList->addContent('blocckkk');
$blockList->addListItem('block div list');
$blockList->addListItem('block div list2');
echo(htmlspecialchars($blockList->render()));

//input
echo "<br>";
echo "<br>";

$newinput = new InputNode();
$newinput->setType('email');
$newinput->setLabel('Name');
echo htmlspecialchars($newinput->render());

echo "<br>";
echo "<br>";

$div2 = new BlockNode();
$input = new InputNode();
$input->setLabel(' ');
$input->setError('some errr');
$div2->addChildEl($input);
echo (htmlspecialchars($div2->render()));