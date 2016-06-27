<?php

namespace Response;

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
class DataItemOthers implements ToArray
{

    /**
     * @var string
     */
    private $field = '';

    /**
     * @var string
     */
    private $value = '';

    /**
     * @var string
     */
    private $content = '';

    /**
     * Método construtor da classe.
     * 
     * @param string $field
     * @param string $value
     * @param string $content
     */
    public function __construct($field, $value, $content = null)
    {
        $this->field = $field;
        $this->value = $value;
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
            'field' => $this->field,
            'value' => $this->content,
            'content' => $this->content
        ];

        return $data;
    }

}
