<?php
namespace Mvc\Core;

use Mvc\Config\Database;
use PDO;

class ResourceModel implements ResourceModelInterface {
    private $table;
    private $id;
    private $model;

    public function _init($table, $id, $model) 
    {
        $this->table = $table;
        $this->id = $id;
        $this->model = $model;
    }

    /**
     * Get all
     * @return mixed
     */

    public function all($model) 
    {
        $sql = "SELECT * FROM ".$this->table;
        $req = Database::getBdd()->prepare($sql);
        $req->execute();

        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Create & Update
     * @param array $attributes
     * @return mixed
     * && @param $id
     */

    public function save($model) 
    {
        /* Column Insert */
        $properties = $model->getProperties();
        $columnsInsert = implode(',', array_keys($properties));

        /* Value Insert */
        $placeNames = [];
        foreach ($properties as $key => $value) {
            array_push($placeNames, ':' . $key);
        }
        $valuesInsert = implode(',', $placeNames);

        /*Column Update */
        $columsUpdate = [];
        foreach (array_keys($properties) as $value) {
            if ($value !== 'id') {
                array_push($columsUpdate, $value . ' = :' . $value);
            }
        }
        $columsUpdate = implode(',', $columsUpdate);

        /* TRUE => Create, FALSE => Edit */
        if ($model->id === null) {
            $sql = 'INSERT INTO '.$this->table.' ('.$columnsInsert.', created_at, updated_at) VALUES ('.$valuesInsert.', :created_at, :updated_at)';
            $req = Database::getBdd()->prepare($sql);
            $date = array("created_at" => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'));

            return $req->execute(array_merge($properties, $date));
            
        }else {
            $sql = 'UPDATE '.$this->table.' SET ' . $columsUpdate . ', updated_at = :updated_at WHERE id = :id';
            $req = Database::getBdd()->prepare($sql);
            $date = array("id" => $model->id, 'updated_at' => date('Y-m-d H:i:s'));

            return $req->execute(array_merge($properties, $date));
        }
    }

    /**
     * Get one
     * @param $id
     * @return mixed
     */

    public function getId($id) 
    {        
        $class = get_class($this->model);
        $sql = "SELECT * FROM {$this->table} where id = :id";
        $req = Database::getBdd()->prepare($sql);
        $req->setFetchMode(PDO::FETCH_INTO, new $class);
        $req->execute(['id' => $id]);

        return $req->fetch();
    }

    /**
     * Delete
     * @param $id
     * @return mixed
     */

    public function delete($model) 
    {
        $sql = 'DELETE FROM '.$this->table.' WHERE id = '.$model->id;
        $req = Database::getBdd()->prepare($sql);
        return $req->execute(['id' => $model->id]);
    }

}
