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
class Pagination implements ToArray
{

    /**
     * @var integer
     */
    private $size = 0;

    /**
     * @var integer
     */
    private $perPage = 0;

    /**
     * @var integer
     */
    private $currentPage = 0;

    /**
     * Método construtor da classe.
     * 
     * @param integer $size
     * @param integer $perPage
     * @param integer $currentPage
     */
    public function __construct($size, $perPage, $currentPage)
    {
        $this->size = $size;
        $this->perPage = $perPage;
        $this->currentPage = $currentPage;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function getPerPage()
    {
        return $this->perPage;
    }

    public function getCurrentPage()
    {
        return $this->currentPage;
    }

    /**
     * Método responsável por retornar o objeto como array.
     * 
     * @return array
     */
    public function toArray()
    {
        $data = [
            'size' => $this->size,
            'per_page' => $this->perPage,
            'current_page' => $this->currentPage,
        ];
        
        return $data;
    }

}
