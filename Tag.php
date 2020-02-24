<?php
/**
 * @author PhpTheme Dev Team <dev@getphptheme.com>
 * @license MIT
 * @link http://getphptheme.com
 */
namespace PhpTheme\Tag;

use PhpTheme\HtmlHelper\HtmlHelper;
use PhpTheme\HtmlEscaper\HtmlEscaper;

class Tag implements TagInterface
{

    public $tag;

    public $defaultAttributes = [];

    public $attributes = [];

    public $renderEmpty = true;

    public $content;

    public $escapeContent = false;

    public function __construct(array $params = [])
    {
        foreach($params as $key => $value)
        {
            $this->$key = $value;
        }
    }

    public function getAttributes() : array
    {
        return $this->attributes;
    }

    public function getDefaultAttributes() : array
    {
        return $this->defaultAttributes;
    }

    public function getContent()
    {
        $return = $this->content;

        if ($this->escapeContent)
        {
            $return = HtmlEscaper::encode($return);
        }

        return $return;
    }

    public function toString() : string
    {
        $content = $this->getContent();

        if (!$content && !$this->renderEmpty)
        {
            return $content;
        }

        $attributes = HtmlHelper::mergeAttributes($this->getDefaultAttributes(), $this->getAttributes());

        return HtmlHelper::tag($this->tag, $content, $attributes);
    }

    public function __toString()
    {
        return $this->toString();
    }

}