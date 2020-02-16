<?php
/**
 * @author PhpTheme Dev Team <dev@getphptheme.com>
 * @license MIT
 * @link http://getphptheme.com
 */
namespace PhpTheme\Tag;

interface TagInterface
{

    public function __construct(array $params = []);
    
    public function getContent();
    
    public function toString() : string;

    public function getAttributes() : array;

    public function getDefaultAttributes() : array;
    
    public function __toString();
    
}