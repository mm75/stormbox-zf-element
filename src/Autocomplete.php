<?php

namespace Inovadora\StormboxZfElement;

/**
 * Classe responsável por ...
 * PHP Version 5.6.0__son@inovadora.com.br>
 *
 * @author   Ladislau Perrony <ladislau.perrony@inovadora.com.br>
 * @author   Mario Mendonça <mario@inovadora.com.br>
 * @author   Mateus Calza <mateus@inovadora.com.br>
 * @author   Patrick Nascimento <patrick@inovadora.com.br>
 * @license  http://inovadora.com.br/licenca  Inovadora
 * @link     #
 * @version  01.00.000
 */
use \Zend_Form_Element_Hidden;
use \Zend_Form_Element_Text;

/**
 * Classe responsável por ...
 * PHP Version 5.6.0
 *
 * @category Autocomplete
 * @package  Element
 * @author   Jackson Veroneze <jackson@inovadora.com.br>
 * @author   Ladislau Perrony <ladislau.perrony@inovadora.com.br>
 * @author   Mario Mendonça <mario@inovadora.com.br>
 * @author   Mateus Calza <mateus@inovadora.com.br>
 * @author   Patrick Nascimento <patrick@inovadora.com.br>
 * @license  http://inovadora.com.br/licenca  Inovadora
 * @link     #
 * @version  01.00.000
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
     * Codigo html do elemento text. Vem de new Zend_Form_Element_Hidden...
     *
     * @var Zend_Form_Element_Hidden
     */
    private $elementAnchor;

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
     * Seta a opção de selecionar vários ids distintos.
     *
     * @var boolean
     */
    private $distinctList = true;

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
     * Limpa o valor corrente e o conteúdo quando o usuário digitar
     *
     * @var boolean
     */
    private $clearOnType = false;

    /**
     * Find when user enter on element
     *
     * @var boolean
     */
    private $autoFind = false;

    /**
     * Cria um item vazio para o valor ficar como nulo
     *
     * @var boolean
     */
    private $emptyItem;

    /**
     * Mínimo de caracteres para iniciar a busca
     *
     * @var integer
     */
    private $minLength = 1;

    /**
     * Recebe o array referente as referencias
     *
     * @var array
     */
    private $references;

    /**
     * Definir mais parâmetros a serem passados
     *
     * @var array
     */
    private $otherParams;

    /**
     * Define se o elemento estará habilitado/desabilitado
     *
     * @var boolean
     */
    private $enabled = true;

    /**
     * Define se o elemento terá o estado somente leitura
     *
     * @var boolean
     */
    private $readOnly = false;

    /**
     * Label do autocomplete
     *
     * @var string
     */
    private $label;

    public function __construct($spec)
    {
        $this->setIdElement($spec);

        $this->elementText = new \Zend_Form_Element_Hidden('text_' . $this->idElement);
        $this->elementAnchor = new \Zend_Form_Element_Text('anchor_' . $spec);

        $this->setUrl("index");

        parent::__construct($spec);
        parent::removeDecorator('HtmlTag')
                ->removeDecorator('Label');

        $this->elementText
                ->removeDecorator('HtmlTag')
                ->removeDecorator('Label');


        $optDesc = array('class' => 'descricao', 'tag' => 'span', 'escape' => false);
        $optErrors = array('Description', $optDesc);
        $elementDecorators = array('ViewHelper', 'Errors', $optErrors,
            array('HtmlTag', array('tag' => 'dd', 'class' => '')),
            array('Label', array('tag' => 'dt', 'class' => 'element', 'escape' => false)),
            array(array('row' => 'HtmlTag'), array('tag' => 'dl', 'class' => '')));
        $this->elementAnchor->setDecorators($elementDecorators);

        $this->elementText->setAttrib('data-autocomplete-text', $spec);
        $this->elementAnchor->setAttrib('data-autocomplete', $spec);
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

    function getElementAnchor()
    {
        return $this->elementAnchor;
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

    public function getDistinctList()
    {
        return $this->distinctList;
    }

    public function getOthersClean()
    {
        return $this->othersClean;
    }

    public function getOption()
    {
        return $this->option;
    }

    public function getClearOnType()
    {
        return $this->clearOnType;
    }

    public function getAutoFind()
    {
        return $this->autoFind;
    }

    public function getEmptyItem()
    {
        return $this->emptyItem;
    }

    public function getMinLength()
    {
        return $this->minLength;
    }

    public function getReferences()
    {
        return $this->references;
    }

    public function getOtherParams()
    {
        return $this->otherParams;
    }

    public function getEnabled()
    {
        return $this->enabled;
    }

    public function getReadOnly()
    {
        return $this->readOnly;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function setIdElement($idElement)
    {
        $this->idElement = $idElement;
        return $this;
    }

    public function setUrl($url)
    {
        $this->url = $url;
        $this->elementAnchor->setAttrib('data-autocomplete-url', $url);
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
        $this->elementAnchor->setAttrib('data-autocomplete-list', $list);

        if ($this->list === true) {
            $this->elementList = new Zend_Form_Element_Hidden('lista_' . $this->idElement);
            $this->elementDsList = new Zend_Form_Element_Hidden('ds_lista_' . $this->idElement);
        }

        return $this;
    }

    public function setDistinctList($distinctList)
    {
        $this->distinctList = $distinctList;
        $this->elementAnchor->setAttrib('data-autocomplete-distinctlist', $distinctList);
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
     * - recordText = se TRUE irá manter o texto digitado no autocomplete, mesmo que não encontre registros. (DEFAULT =
     * FALSE) caso encontre, irá respeitar o selectFirst, trazendo ou nao selecionado
     *
     * @param array $opcoes
     *
     * @return \Form_Element_Autocomplete
     */
    public function setOption(array $option)
    {
        $this->option = $option;
        foreach ($option as $key => $value) {
            $this->elementAnchor->setAttrib('data-autocomplete-' . strtolower($key), $value);
        }
        return $this;
    }

    public function setClearOnType($clearOnType)
    {
        $this->clearOnType = $clearOnType;
        $this->elementAnchor->setAttrib('data-autocomplete-clearontype', $clearOnType);
        return $this;
    }

    public function setAutoFind($autoFind)
    {
        $this->autoFind = $autoFind;
        $this->elementAnchor->setAttrib('data-autocomplete-autofind', $autoFind);
        return $this;
    }

    public function setEmptyItem($emptyItem)
    {
        $this->emptyItem = $emptyItem;
        $this->elementAnchor->setAttrib('data-autocomplete-emptyitem', $emptyItem);
        return $this;
    }

    public function setMinLength($minLength)
    {
        $this->minLength = $minLength;
        $this->elementAnchor->setAttrib('data-autocomplete-minlength', $minLength);
        return $this;
    }

    public function setReferences($references)
    {
        $this->references = $references;
        foreach ($references as $key => $value) {
            $this->elementAnchor->setAttrib('data-autocomplete-reference-' . $key, $value);
        }
        return $this;
    }

    public function setOtherParams($otherParams)
    {
        $this->otherParams = $otherParams;

        foreach ($otherParams as $key => $value) {
            $this->elementAnchor->setAttrib('data-autocomplete-otherparams-' . $key, $value);
        }
        return $this;
    }

    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
        return $this;
    }

    public function setReadOnly($readOnly)
    {
        $this->readOnly = $readOnly;
        return $this;
    }

    public function setAcAttrib($name, $value)
    {
        $this->elementText->setAttrib($name, $value);

        return $this;
    }

    public function setAcValue($value)
    {
        $this->elementText->setValue($value);
        return $this;
    }

    public function setAcLabel($label)
    {
        $this->label = $label;
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

    public function render(\Zend_View_Interface $view = null)
    {
        $optTag = array('tag' => 'dl', 'style' => 'display:none;');
        $hiddenDecorators = array('ViewHelper', 'Errors', 'Description',
            array('HtmlTag', array('tag' => 'dd')),
            array('Label', array('tag' => 'dt', 'class' => 'element')),
            array(array('row' => 'HtmlTag'), $optTag));

        $this->setDecorators($hiddenDecorators);

        $elementHidden = parent::render($view);

        $script = ' <script>applyAutocomplete(\'' . $this->idElement . '\')</script>';

        if (!$this->enabled) {
            $this->elementAnchor->setAttrib('disabled', 'disabled');
        }

        if ($this->readOnly) {
            $this->elementAnchor->setAttrib('readonly', 'readonly');
        }

        if ($this->list) {
            $this->elementAnchor->setLabel($this->label);
            return (string) $this->elementAnchor . $script;
        }

        $this->elementText->setLabel($this->label);
        $this->elementAnchor->setDecorators($hiddenDecorators);

        return $elementHidden . $this->elementText . $this->elementList . $this->elementDsList . $this->elementAnchor . $script;
    }

}
