<?php


namespace App\Table;
use Core\Table\Table;

class PostTable extends Table
{
    protected $table ='articles';
    /**
     * @return array
     */
       public function last():array {

           return $this->query("SELECT articles.id, title, slug, introduction, content, created_at, categories_id
                    FROM  articles 
                    LEFT JOIN categories on categories.id = articles.categories_id 
                    ORDER BY created_at DESC");
       }


    /**
     * @return array
     */
    public function find($id):array {

        return $this->query("SELECT articles.id, title, slug, introduction, content, created_at, categories_id,categories.nom as categorie
                    FROM  articles 
                    LEFT JOIN categories on categories.id = articles.categories_id 
                    where articles.id =?",[$id], true);
    }

    /**
     * @return array
     */
    public function lastByCategory($category_id):array {

        return $this->query("SELECT articles.id, title, slug, introduction, content, created_at, categories_id,categories.nom as categorie
                    FROM  articles 
                    LEFT JOIN categories on categories.id = articles.categories_id 
                    where articles.categories_id =?",[$category_id]);
    }
}