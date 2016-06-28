<?php

namespace Element;

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
     * @var array 
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

    public function getIdElement()
    {
        return $this->idElement;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getElementText()
    {
        return $this->elementText;
    }

    public function getElementList()
    {
        return $this->elementList;
    }

    public function getElementDsList()
    {
        return $this->elementDsList;
    }

    public function getList()
    {
        return $this->list;
    }

    public function getIdsReferences()
    {
        return $this->idsReferences;
    }

    public function getFormatResponse()
    {
        return $this->formatResponse;
    }

    public function getOthers()
    {
        return $this->others;
    }

    public function getOthersClean()
    {
        return $this->othersClean;
    }

    public function getOption()
    {
        return $this->option;
    }

    public function getClassElementAutocomplete()
    {
        return $this->classElementAutocomplete;
    }

    public function setIdElement($idElement)
    {
        $this->idElement = $idElement;
        return $this;
    }

    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    public function setElementText($elementText)
    {
        $this->elementText = $elementText;
        return $this;
    }

    public function setElementList(Zend_Form_Element_Hidden $elementList)
    {
        $this->elementList = $elementList;
        return $this;
    }

    public function setElementDsList(Zend_Form_Element_Hidden $elementDsList)
    {
        $this->elementDsList = $elementDsList;
        return $this;
    }

    public function setList($list)
    {
        $this->list = $list;
        return $this;
    }

    public function setIdsReferences($idsReferences)
    {
        $this->idsReferences = $idsReferences;
        return $this;
    }

    public function setFormatResponse($formatResponse)
    {
        $this->formatResponse = $formatResponse;
        return $this;
    }

    public function setOthers($others)
    {
        $this->others = $others;
        return $this;
    }

    public function setOthersClean($othersClean)
    {
        $this->othersClean = $othersClean;
        return $this;
    }

    public function setOption($option)
    {
        $this->option = $option;
        return $this;
    }

    public function setClassElementAutocomplete($classElementAutocomplete)
    {
        $this->classElementAutocomplete = $classElementAutocomplete;
        return $this;
    }

}
