PSR:
  - отделил функционал от действий: Router (от index), Config от UseConfig,
  - привел в порядок управляющие конструкции (if, try...),
  - скобочки функций, методов, классов на отдельных строках,
  - пустая строка после namespace, use.
  
Установил composer.

Установил psr/log:
  - log.txt в корне.
  - MyLogger - https://github.com/eatae/profitPHP2.local/blob/a82c7f4a93fb196400df5307a523820420a97ff8/App/MyLogger.php
  - MyLogger::log используем здесь - (AbstractLogException) - https://github.com/eatae/profitPHP2.local/blob/a82c7f4a93fb196400df5307a523820420a97ff8/App/Exceptions/AbstractLogException.php#L34
  - Далее реализуем. И в Controllers вызываем метод Exception - https://github.com/eatae/profitPHP2.local/blob/a82c7f4a93fb196400df5307a523820420a97ff8/App/Controllers/Index.php#L23
