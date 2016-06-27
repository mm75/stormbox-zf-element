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
class Response
{

    /**
     * @var ArrayIterator
     */
    private $data = null;

    /**
     * @var Pagination
     */
    private $pagination = null;

    /**
     * Método construtor da classe.
     */
    public function __construct()
    {
        $this->data = new ArrayIterator();
    }

    /**
     * Método responsável por setar um item do resultado.
     * 
     * @param DataItem $dataItem
     * @return void
     */
    public function setDataItem(DataItem $dataItem)
    {
        $this->data->append($dataItem);
    }

    /**
     * Método responsável por setar a paginação.
     * 
     * @param Pagination $pagination
     * @return void
     */
    public function setPagination(Pagination $pagination)
    {
        $this->pagination = $pagination;
    }

    /**
     * Método responsável por retornar o objeto como array.
     * 
     * @return array
     */
    public function toArray()
    {
        $data = [
            'data' => $this->data->getArrayCopy(),
            'pagination' => $this->pagination->toArray(),
        ];

        return $data;
    }

}
