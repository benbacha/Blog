<?php
namespace Core\HTML;
/**
 * Class From
 * Permet de générer un formaulaire
 */
class Form
{
    /**
     * @var Données par formulaire
     */
    protected $data;

    /**
     * @var string
     */
    public $surround ='p';

    /**
     * From constructor.
     * @param $data
     */
    public function __construct($data = array())
    {
        $this->data = $data;
    }

    /**
     * @param $html
     * @return string
     */
    protected function surround($html){
          return "<{$this->surround}>{$html}</{$this->surround}";
    }

    /**
     * @param $name
     * @return string
     */
    public function input($name){;
        return $this->surround('<input type="text" name="'.$name.'" value="'.$this->getValue($name).'">');
    }

    /**
     * @return string
     */
    public function submit(){
        return $this->surround( '<button type="sumbit">Envoyer</button>');
    }

    /**
     * @param $index
     * @return mixed|null
     */
    protected function getValue($index){
        return isset($this->data[$index])? $this->data[$index] : null;
    }

}