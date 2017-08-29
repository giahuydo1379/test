<?php
use Phalcon\Di;
class OcCategoryDescription extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Column(type="integer", length=11, nullable=false)
     */
    public $category_id;

    /**
     *
     * @var integer
     * @Primary
     * @Column(type="integer", length=11, nullable=false)
     */
    public $language_id;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $name;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $description;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $meta_title;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $meta_description;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $meta_keyword;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("db549595537");
        $this->setSource("oc_category_description");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'oc_category_description';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return OcCategoryDescription[]|OcCategoryDescription|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return OcCategoryDescription|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }
    public static function find3($parameters = null) {
        $di = Di::getDefault();
        $modelsManager = $di->get('modelsManager');
        $query = $modelsManager->createQuery("SELECT OD.name
				FROM  OcCategoryDescription OD
				WHERE OD.name='Extras'");
        $occaegorydescription = $query->execute();
        return $occaegorydescription;
    }
}
