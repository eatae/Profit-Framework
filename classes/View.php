<?php
namespace classes;

use traits\magic_trait;

require __DIR__ . '/../autoload.php';

/**
 * Class View
 * @package classes
 *
 * @property array $data
 */
class View
{
    use magic_trait;

    public function render($template)
    {
        //делаем обвязку-буфер
        ob_start();
        include $template;
        $content = ob_get_contents();
        ob_end_clean();

        //весь html в буфере, можем его колбасить
        return $content;
    }

    public function display($template)
    {
        echo $this->render($template);
    }
}