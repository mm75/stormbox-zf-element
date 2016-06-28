<?php

namespace Autocomplete\Response;

/**
 * Classe responsável por ...
 *
 * PHP Version 5.6.0
 *
 * @category Autocomplete
 * @package  Response
 * @author Jackson Veroneze <jackson@inovadora.com.br>
 * @author Ladislau Perrony <ladislau.perrony@inovadora.com.br>
 * @author Mario Mendonça <mario@inovadora.com.br>
 * @author Mateus Calza <mateus@inovadora.com.br>
 * @author Patrick Nascimento <patrick@inovadora.com.br>
 * @license  http://inovadora.com.br/licenca  Inovadora
 * @link     #
 * @version 01.00.000
 */
use \ArrayIterator;

/**
 * Classe responsável por ...
 *
 * PHP Version 5.6.0
 *
 * @category Autocomplete
 * @package  Response
 * @author Jackson Veroneze <jackson@inovadora.com.br>
 * @author Ladislau Perrony <ladislau.perrony@inovadora.com.br>
 * @author Mario Mendonça <mario@inovadora.com.br>
 * @author Mateus Calza <mateus@inovadora.com.br>
 * @author Patrick Nascimento <patrick@inovadora.com.br>
 * @license  http://inovadora.com.br/licenca  Inovadora
 * @link     #
 * @version 01.00.000
 */
class DataItem implements ToArray
{

    /**
     * @var string
     */
    private $content = '';

    /**
     * @var integer
     */
    private $value = null;

    /**
     * @var ArrayIterator
     */
    private $additional = null;

    /**
     * @var ArrayIterator
     */
    private $others = null;

    /**
     * Método construtor da classe.
     * 
     * @param string $content
     * @param string $value
     * @param ArrayIterator $additional
     * @param ArrayIterator $others
     */
    public function __construct($content, $value, ArrayIterator $additional = null, ArrayIterator $others = null)
    {
        $this->content = $content;
        $this->value = $value;

        if (is_null($additional)) {
            $this->additional = new ArrayIterator();
        }

        if (is_null($others)) {
            $this->others = new ArrayIterator();
        }
    }

    /**
     * Método responsável por retornar o objeto como array.
     * 
     * @return array
     */
    public function toArray()
    {
        $data = [
            'content' => $this->content,
            'value' => $this->value,
            'additional' => $this->additional->getArrayCopy(),
            'others' => $this->others->getArrayCopy()
        ];

        return $data;
    }

}
