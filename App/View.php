<?php
namespace App;

use App\traits;

require __DIR__ . '/../autoload.php';


class View implements \Countable
{
    use traits\count_magic_trait;

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
