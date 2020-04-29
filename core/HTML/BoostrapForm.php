<?php
namespace Core\HTML;

class BoostrapForm extends Form
{


    /**
     * @param $html
     * @return string
     */
    protected function surround($html){
        return "<div class=\"form-group\">{$html}</div>";
    }
    /**
     * @param $name
     * @return string
     */
    public function input($name){;

        return $this->surround(
            '<label>'.$name.'</label>'.
            '<input type="text" name="'.$name.'" value="'.$this->getValue($name).'" class="form-control">');
    }

    /**
     * @return string
     */
    public function submit(){
        return $this->surround( '<button type="sumbit" class="btn btn-primary">Envoyer</button>');
    }

}