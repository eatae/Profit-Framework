<?php
namespace App;

use App\Traits;

class View implements \Countable
{
    use Traits\DataCountable;

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
