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
     * @var Zend_Form_Element_Text 
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
     * Recebe um array com as referencias de componentes autocomplete pai
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
        $this->setIdElement($spec);
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

    public function setElementText(Zend_Form_Element_Text $elementText)
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

        if ($this->_lista === true) {
            $this->elementList = new Zend_Form_Element_Hidden('lista_' . $this->idElement);
            $this->elementDsList = new Zend_Form_Element_Hidden('ds_lista_' . $this->idElement);
        }

        return $this;
    }

    public function setIdsReferences($idsReferences)
    {
        $this->idsReferences = $idsReferences;
        return $this;
    }

    /**
     * Recebe string contendo a ordem como os campos devem aparecer no autocomplete. Ex: arg[0] +" id:"+arg[1]
     * 
     * @param string $formatResponse
     * @return \Autocomplete\Element\Autocomplete
     */
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

    /**
     * Seta as opções necessárias de configuração para o Autocomplete:
     * - selectFirst = se TRUE irá trazer o primeiro registro do autocomplete selecionado. (DEFAULT = TRUE)
     * - recordText = se TRUE irá manter o texto digitado no autocomplete, mesmo que não encontre registros. (DEFAULT = FALSE)
     * 
     * caso encontre, irá respeitar o selectFirst, trazendo ou nao selecionado 
     * 
     * @param array $opcoes
     * @return \Form_Element_Autocomplete
     * 
     */
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

    public function setAcAttrib($name, $value)
    {
        $this->elementText->setAttrib($name, $value);

        if ($name === 'class') {
            $this->classElementAutocomplete = $value;
        }

        return $this;
    }

    public function setAcValue($value)
    {
        $this->elementText->setValue($value);
        return $this;
    }

    public function setAcLabel($label)
    {
        $this->elementText->setLabel($label);
        return $this;
    }

    public function addAcDecorators($decorators)
    {
        $this->elementText->addDecorators($decorators);
        return $this;
    }

    public function addDecorators(array $decorators)
    {
        if ($this->elementList !== null && $this->elementDsList !== null) {
            $this->elementList->addDecorators($decorators);
            $this->elementDsList->addDecorators($decorators);
        }

        return parent::addDecorators($decorators);
    }

    public function removeAcDecorator($decorators)
    {
        $this->elementText->removeDecorator($decorators);
        return $this;
    }

    public function setRequired($flag = true)
    {
        parent::setRequired($flag);
        $this->elementText->setRequired($flag);
        return $this;
    }

    public function setAcRequired($flag = true)
    {
        $this->elementText->setRequired($flag);
        return $this;
    }

    public function addValidator($validator, $breakChainOnFailure = false, $options = array())
    {
        parent::addValidator($validator, $breakChainOnFailure, $options);
        $this->elementText->addValidator($validator, $breakChainOnFailure, $options);
        return $this;
    }

    public function addError($message)
    {
        parent::addError($message);
        $this->elementText->addError($message);
        return $this;
    }

    public function addFilter($filter, $options = array())
    {
        parent::addFilter($filter, $options);
        $this->elementText->addFilter($filter);
        return $this;
    }

    public function isValid($value)
    {
        if (!$this->elementText->isValid($value)) {
            return false;
        }

        return parent::isValid($value);
    }

}
