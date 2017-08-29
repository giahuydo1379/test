<?php

use Phalcon\Di;

class OcCategory extends \Phalcon\Mvc\Model {

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    public $category_id;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $image;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $parent_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=false)
     */
    public $top;

    /**
     *
     * @var integer
     * @Column(type="integer", length=3, nullable=false)
     */
    public $column;

    /**
     *
     * @var integer
     * @Column(type="integer", length=3, nullable=false)
     */
    public $sort_order;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=false)
     */
    public $status;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $date_added;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $date_modified;

    /**
     * Initialize method for model.
     */
    public function initialize() {
        $this->setSchema("db549595537");
        $this->setSource("oc_category");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource() {
        return 'oc_category';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return OcCategory[]|OcCategory|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null) {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return OcCategory|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null) {
        return parent::findFirst($parameters);
    }

    public static function find2($parameters = null) {
        $di = Di::getDefault();
        $modelsManager = $di->get('modelsManager');
        $query = $modelsManager->createQuery("SELECT OC.date_added FROM OcCategory OC WHERE OC.date_added = '2009-01-05 21:49:43'");
        $occaegory = $query->execute();
        return $occaegory;
    }

}
