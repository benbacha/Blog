<?php
namespace App\Entity;

use Core\Entity\Entity;

class PostEntity extends Entity
{

    protected $table ='articles';

    public function getUrl()
    {
        return 'index.php?p=posts.show&id='.$this->id;
    }

    public function getExtrait()
    {
        $html = '<p>'.substr($this->content,100).'...</p>';
        $html.= '<p><a href='.$this->getUrl().'>Voir la suite</a></p>';
        return $html;
    }

}
