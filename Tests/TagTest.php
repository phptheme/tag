<?php
/**
 * @author PhpTheme Dev Team <dev@getphptheme.com>
 * @license MIT
 * @link http://getphptheme.com
 */
namespace PhpTheme\Tag\Tests;

use PhpTheme\Tag\Tag;

class TagTest extends \PHPUnit\Framework\TestCase
{

    public function testIndex()
    {
        $tag = new Tag([
            'tag' => 'div',
            'content' => 'content',
            'defaultAttributes' => [
                'class' => 'class_1'
            ],
            'attributes' => [
                'class' => ['class_2']
            ]
        ]);

        $content = $tag->toString();

        $this->assertEquals($content, '<div class="class_1 class_2">content</div>');
    }

}