<?php

namespace Inovadora\Autocomplete\Response;

/**
 * Classe responsável pelo teste unitário.
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
class ResponseTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var object
     */
    private $instance;

    /**
     * @var integer
     */
    private $limiteRegistros;

    /**
     * Método responsável por alocar os recursos necessários ao teste.
     * 
     * @return void
     */
    public function setUp()
    {
        $this->limiteRegistros = rand(1, 100);

        $this->instance = new \Inovadora\Autocomplete\Response\Response();

        for ($i = 0; $i < $this->limiteRegistros; $i++) {
            $others = new \Inovadora\Autocomplete\Response\DataItemOthers('field_' . $i, $i, 'content_' . $i);
            $additional = new \Inovadora\Autocomplete\Response\DataItemAditional('Label', $i);
            $dataItem = new \Inovadora\Autocomplete\Response\DataItem('Content_' . $i, $i, new \ArrayIterator([$others]), new \ArrayIterator([$additional]));
            $this->instance->setDataItem($dataItem);
        }

        $this->instance->setPagination(new \Inovadora\Autocomplete\Response\Pagination($this->limiteRegistros, 30, 1));
    }

    /**
     * Método responsável por remover os recursos definidos no setUp.
     * 
     * @return void
     */
    protected function tearDown()
    {
        
    }

    /**
     * Método responsável por testar.
     * 
     * @return void
     */
    public function testNotEmpty()
    {
        $this->assertNotEmpty($this->instance->toArray());
    }

    /**
     * Método responsável por testar.
     * 
     * @return void
     */
    public function testEqualsLimitRegistros()
    {
        $this->assertEquals($this->limiteRegistros, count($this->instance->toArray()['data']));
    }

    /**
     * Método responsável por testar.
     * 
     * @return void
     */
    public function testHasOthers()
    {
        $this->assertNotEmpty($this->instance->toArray()['data'][0]['others']);
    }

}
