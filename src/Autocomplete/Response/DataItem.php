<?php

namespace Autocomplete\Response;

/**
 * Classe responsável por armazenar os itens da resposta.
 *
 * PHP Version 5.6.0
 *
 * @category Autocomplete
 * @package  Response
 * @author Jackson Veroneze <jackson@inovadora.com.br>
 * @author Ladislau Perrony <ladislau.perrony@inovadora.com.br>
 * @author Mario Mendonça <mario@inovadora.com.br>
 * @author Mateus Calza <mateus@inovadora.com.br>
 * @license  http://inovadora.com.br/licenca  Inovadora
 * @link     #
 * @version 01.00.000
 */

use \ArrayIterator;

/**
 * Classe responsável por armazenar os itens da resposta.
 *
 * PHP Version 5.6.0
 *
 * @category Autocomplete
 * @package  Response
 * @author Jackson Veroneze <jackson@inovadora.com.br>
 * @author Ladislau Perrony <ladislau.perrony@inovadora.com.br>
 * @author Mario Mendonça <mario@inovadora.com.br>
 * @author Mateus Calza <mateus@inovadora.com.br>
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
     * @param integer $value
     * @param ArrayIterator $additional
     * @param ArrayIterator $others
     */
    public function __construct($content, $value, ArrayIterator $additional = null, ArrayIterator $others = null)
    {
        $this->content = $content;
        $this->value = $value;
        $this->additional = new ArrayIterator();
        $this->others = new ArrayIterator();

        if (!is_null($additional)) {
            $this->additional = $additional;
        }

        if (!is_null($others)) {
            $this->others = $others;
        }
    }

    /**
     * Método responsável por retornar o objeto como array.
     * 
     * @return array
     */
    public function toArray()
    {
        $listAdditional = new ArrayIterator();
        $listOthers = new ArrayIterator();

        foreach ($this->additional as $additional) {
            $listAdditional->append($additional->toArray());
        }

        foreach ($this->others as $others) {
            $listOthers->append($others->toArray());
        }

        $data = [
            'content' => $this->content,
            'value' => $this->value,
            'additional' => $listAdditional->getArrayCopy(),
            'others' => $listOthers->getArrayCopy()
        ];

        return $data;
    }

}
