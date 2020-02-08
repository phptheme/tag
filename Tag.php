<?php
/**
 * @author PhpTheme Dev Team <dev@getphptheme.com>
 * @license MIT
 * @link http://getphptheme.com
 */
namespace PhpTheme\Tag;

use PhpTheme\HtmlHelper\HtmlHelper;

abstract class Tag
{

    public $tag;

    public $defaultAttributes = [];

    public $attributes = [];

    public $renderEmpty = true;

    public $content;

    public function __construct(array $params = [])
    {
        foreach($params as $key => $value)
        {
            $this->$key = $value;
        }
    }

    public function getContent()
    {
        return $this->content;
    }

    public function toString() : string
    {
        $content = $this->getContent();

        if (!$content && !$this->renderEmpty)
        {
            return $content;
        }

        $attributes = HtmlHelper::mergeAttributes($this->defaultAttributes, $this->attributes);

        return HtmlHelper::tag($this->tag, $content, $attributes);
    }

    public function __toString()
    {
        return $this->toString();
    }

}