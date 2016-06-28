<?php

namespace Autocomplete\Element;

/**
 * Classe responsável por ...
 *
 * PHP Version 5.6.0
 *
 * @category Autocomplete
 * @package  Element
 * @author Jackson Veroneze <jackson@inovadora.com.br>
 * @author Ladislau Perrony <ladislau.perrony@inovadora.com.br>
 * @author Mario Mendonça <mario@inovadora.com.br>
 * @author Mateus Calza <mateus@inovadora.com.br>
 * @author Patrick Nascimento <patrick@inovadora.com.br>
 * @license  http://inovadora.com.br/licenca  Inovadora
 * @link     #
 * @version 01.00.000
 */
use Autocomplete\Response\DataItemOthers;
use Zend_Form_Element_Hidden;
use Zend_Form_Element_Text;

/**
 * Classe responsável por ...
 *
 * PHP Version 5.6.0
 *
 * @category Autocomplete
 * @package  Element
 * @author Jackson Veroneze <jackson@inovadora.com.br>
 * @author Ladislau Perrony <ladislau.perrony@inovadora.com.br>
 * @author Mario Mendonça <mario@inovadora.com.br>
 * @author Mateus Calza <mateus@inovadora.com.br>
 * @author Patrick Nascimento <patrick@inovadora.com.br>
 * @license  http://inovadora.com.br/licenca  Inovadora
 * @link     #
 * @version 01.00.000
 */
class Autocomplete extends Zend_Form_Element_Hidden
{

    /**
     * Id do elemento que esta sendo criado. (hidden)
     * 
     * @var string 
     */
    private $idElement;

    /**
     * url para onde vai a requisicao
     * 
     * @var string 
     */
    private $url;

    /**
     * Codigo html do elemento text. Vem de new Zend_Form_Element_Text...
     * 
     * @var string 
     */
    private $elementText;

    /**
     * Codigo html do elemento lista. Vem de new Zend_Form_Element_Hidden... 
     * 
     * @var Zend_Form_Element_Hidden 
     */
    private $elementList = null;

    /**
     * Codigo html do elemento ds lista. Vem de new Zend_Form_Element_Hidden... 
     * 
     * @var Zend_Form_Element_Hidden 
     */
    private $elementDsList = null;

    /**
     * Seta a opção de selecionar vários ids
     * 
     * @var boolean 
     */
    private $list = false;

    /**
     * Recebe um arrai com as referencias de componentes autocomplete pai
     *
     * @var array
     */
    private $idsReferences;

    /**
     * Guarda uma string com a funcao javascript que seta o formato da resposta
     * 
     * @var string 
     */
    private $formatResponse;

    /**
     * Outros campos para onde a resposta deve ir
     * 
     * @var DataItemOthers 
     */
    private $others;

    /**
     * Campos que devem serem limpos após zerar o autocomplete
     * 
     * @var string 
     */
    private $othersClean;

    /**
     * Armazena todas as opções que forem setadas para o componente
     * 
     * @var array 
     */
    private $option;

    /**
     * Classe padrão para autocomplete
     * 
     * @var string 
     */
    private $classElementAutocomplete = 'input290';

    public function __construct($spec, $options = null)
    {
        $this->setIdElemento($spec);
        $this->setUrl("index");

        parent::__construct($spec, null);
        parent::removeDecorator('HtmlTag')
                ->removeDecorator('Label');

        $this->elementText = new Zend_Form_Element_Text('text_' . $this->idElement);
    }

}
