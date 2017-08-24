<?php


namespace Engine\Model\Entity;
use Engine\Model;

/**
 * Description of EntityMapper
 *
 * @author ivc_shipul
 */
abstract class EntityRepository extends Model {

    protected $db;
    protected $fields = array();
    protected $primaryKey;
    // Эти свойства переопределяются в классах наследниках
    protected $table;
    protected $entitylClass;
    protected $countRows;

    public function __construct($container) {
        parent::__construct($container);
        $this->describeFields();
    }

    /**
     * Поиск по id
     * @param type $id - первичный ключ
     * @return type
     */
    public function find($id) {
        $row = $this->db->select($this->table,array($this->primaryKey => $id))->fetch();
        return $row ? $this->createEntity($row) : null;
    }

    /**
     * конструктор запроса в бд 
     * @param array $conditions - условия
     * @param array $columns    - нужные столбцы
     * @param array $sort       - сортировка 
     * @param type $limit       - лимит
     * @param type $offset      -оффсет
     * @return type
     */
    public function findAll(array $conditions = array(),array $columns = array(), array $sort = array(), $limit = 0, $offset = 0) {
        $rows = $this->db->select($this->table, $conditions,$columns, $sort, $limit, $offset)->fetchAll();
        return $this->createEntities($rows);
    }

    public function save(Entity $entry) {        
        $data = array();
        foreach ($this->fields as $field) {
            $data[$field] = $entry->$field;            
        }
       
        if ($entry->{$this->primaryKey}) {            
            unset($data[$this->primaryKey]);
             $this->db->update($this->table, $data, array(
                        $this->primaryKey => $entry->{$this->primaryKey}
            ));
            return $entry;
        }
        $id = $this->db->insert($this->table, $data);
        if ($id) {
            $entry->{$this->primaryKey} = $id;
           
        }
        return $entry;
    }

    public function delete(Entity $entry) {
        $affected = $this->db->delete($this->table, array(
            $this->primaryKey => $entry->{$this->primaryKey}
        ));
        if ($affected) {
            $entry->{$this->primaryKey} = null;
            return true;
        }
        return false;
    }

    protected function describeFields() {
        $sql = sprintf('DESCRIBE %s;', $this->db->quoteIdentifier($this->table));
        $rows = $this->db->query($sql)->fetchAll();
        foreach ($rows as $row) {
            $this->fields[] = $row['Field'];
            if ($row['Key'] === 'PRI') {
                $this->primaryKey = $row['Field'];
            }
        }
    }

    protected function createEntity(array $row) {
        return new $this->entityClass($row);
    }

    protected function createEntities(array $rows) {
        return array_map(array($this, 'createEntity'), $rows);
    }

    public function getCountRows($countableColumn = '*') {
        $countableColumn === '*' 
                ? $sql = sprintf('SELECT count(*) as countRows FROM %s', $this->db->quoteIdentifier($this->table)) 
                : $sql = sprintf('SELECT count(%s) as countRows', $this->db->quoteIdentifier($countableColumn));

        $this->countRows = $this->db->query($sql)->fetchOne();
        return $this->countRows;

    }

}
