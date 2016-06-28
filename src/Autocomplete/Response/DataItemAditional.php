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
class DataItemAditional implements ToArray
{

    /**
     * @var string
     */
    private $label = '';

    /**
     * @var string
     */
    private $content = '';

    /**
     * Método construtor da classe.
     * 
     * @param string $label
     * @param string $content
     */
    public function __construct($label, $content)
    {
        $this->label = $label;
        $this->content = $content;
    }

    /**
     * Método responsável por retornar o objeto como array.
     * 
     * @return array
     */
    public function toArray()
    {
        $data = [
            'label' => $this->label,
            'content' => $this->content
        ];

        return $data;
    }

}
