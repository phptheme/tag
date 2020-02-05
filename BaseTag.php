<?php
/**
 * @author PhpTheme Dev Team <dev@getphptheme.com>
 * @license MIT
 * @link http://getphptheme.com
 */
namespace PhpTheme\Tag;

use PhpTheme\HtmlHelper\HtmlHelper;

abstract class BaseTag
{

    public $tag;

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

    public function __toString()
    {
        $content = $this->getContent();

        if (!$content && !$this->renderEmpty)
        {
            return '';
        }

        return HtmlHelper::tag($this->tag, $content, $this->attributes);
    }

}