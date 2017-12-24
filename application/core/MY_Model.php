<?php
/**
 * This <server-travelohealth> project created by :
 * Name         : syafiq
 * Date / Time  : 13 August 2017, 3:03 PM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class MY_Model
 * @property CI_DB_query_builder|CI_DB_pdo_driver db
 * */
class MY_Model extends CI_Model
{
    /**
     * @var CI_DB_result $result
     */
    protected $result;
    /**
     * @var string $query
     */
    protected $query;

    /**
     * @var array
     */
    protected $error;

    /**
     * @var array
     */
    protected $message;

    /**
     * @var stdClass
     */
    protected $_hook;

    /**
     * @var int
     */
    protected $insert_id;


    /**
     * @var string
     */
    protected $table;

    /**
     * @var array
     */
    private $last_data;

    /**
     * MY_Model constructor.
     */
    public function __construct($table = null)
    {
        parent::__construct();
        // Your own constructor code
        $this->result    = [];
        $this->error     = [];
        $this->message   = [];
        $this->query     = '';
        $this->insert_id = 0;
        $this->table     = $table;

        $this->_hook = new stdClass();
    }

    /**
     * @param string|array $data
     */
    public function appendError($data)
    {
        if (!is_array($data))
        {
            $data = [$data];
        }
        foreach ($data as $datum)
        {
            array_push($this->error, $datum);
        }
    }

    /**
     * @param string|array $data
     */
    public function appendMessage($data)
    {
        if (!is_array($data))
        {
            $data = [$data];
        }
        foreach ($data as $datum)
        {
            array_push($this->message, $datum);
        }
    }

    /**
     * @return CI_DB_result
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @return string
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * @return array
     */
    public function errors()
    {
        return $this->error;
    }

    /**
     * @return array
     */
    public function messages()
    {
        return $this->message;
    }

    /**
     * @param $events
     */
    public function trigger_events($events)
    {
        if (is_array($events) && !empty($events))
        {
            foreach ($events as $event)
            {
                $this->trigger_events($event);
            }
        }
        else
        {
            if (isset($this->_hook->$events) && !empty($this->_hook->$events))
            {
                foreach ($this->_hook->$events as $name => $hook)
                {
                    $this->_call_hook($events, $name);
                }
            }
        }
    }

    /**
     * @param $event
     * @param $name
     * @return bool|mixed
     */
    protected function _call_hook($event, $name)
    {
        if (isset($this->_hook->{$event}[$name]) && method_exists($this->_hook->{$event}[$name]->class, $this->_hook->{$event}[$name]->method))
        {
            $hook = $this->_hook->{$event}[$name];

            return call_user_func_array(array($hook->class, $hook->method), $hook->arguments);
        }

        return false;
    }

    /**
     * @param $event
     * @param $name
     * @param $class
     * @param $method
     * @param $arguments
     */
    public function set_hook($event, $name, $class, $method, $arguments)
    {
        $this->_hook->{$event}[$name]            = new stdClass;
        $this->_hook->{$event}[$name]->class     = $class;
        $this->_hook->{$event}[$name]->method    = $method;
        $this->_hook->{$event}[$name]->arguments = $arguments;
    }

    /**
     * @param $event
     * @param $name
     */
    public function remove_hook($event, $name)
    {
        if (isset($this->_hook->{$event}[$name]))
        {
            unset($this->_hook->{$event}[$name]);
        }
    }

    /**
     * @param $event
     */
    public function remove_hooks($event)
    {
        if (isset($this->_hook->$event))
        {
            unset($this->_hook->$event);
        }
    }

    /**
     * @return int
     */
    public function getInsertId()
    {
        return $this->insert_id;
    }

    /**
     * @return array
     */
    public function getLastData()
    {
        return $this->last_data;
    }


    /**
     * @param \Closure $function
     * @param bool $isRaw
     * @return bool
     */
    public function find($function, $isRaw = false)
    {
        $function($this->db);
        if (!$isRaw)
        {
            $this->db->from($this->table);
        }
        $this->result = $this->db->get();
        $this->query  = $this->db->last_query();

        return true;
    }

    /**
     * @param array $data
     * @return bool
     */
    public function insert($data)
    {
        $status          = $this->db->insert($this->table);
        $this->query     = $this->db->last_query();
        $this->insert_id = $this->db->insert_id("{$this->table}_id_seq");
        $this->last_data = $data;

        return $status;
    }

    /**
     * @param array $data
     * @param Closure $constraint
     * @return bool
     */
    public function update($data, \Closure $constraint)
    {
        $this->db->set($data);
        $constraint($this->db);
        $status          = $this->db->update($this->table);
        $this->query     = $this->db->last_query();
        $this->last_data = $data;

        return $status;
    }
}

?>
