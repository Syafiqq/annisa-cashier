<?php
/**
 * This <annisa.com> project created by :
 * Name         : syafiq
 * Date / Time  : 20 December 2017, 5:47 AM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_Config config
 * @property CI_Loader load
 */
class Pusher_messaging_library
{

    /**
     * @var \Pusher\Pusher
     */
    private $pusher;

    public function __construct()
    {
        $this->config->load('pusher', true, true);

        $options = array(
            'cluster' => $this->config->item('pusher_cluster', 'pusher'),
            'encrypted' => true
        );

        $this->pusher = new Pusher\Pusher(
            $this->config->item('pusher_key', 'pusher'),
            $this->config->item('pusher_secret', 'pusher'),
            $this->config->item('pusher_app_id', 'pusher'),
            $options
        );
    }

    /**
     * __call
     *
     * Acts as a simple way to call model methods without loads of stupid alias'
     *
     * @param $method
     * @param $arguments
     * @return mixed
     * @throws Exception
     */
    public function __call($method, $arguments)
    {
        if (method_exists($this, $method))
        {
            return call_user_func_array([$this, $method], $arguments);
        }
        else
        {
            throw new Exception('Undefined Method');
        }
    }

    /**
     * __get
     *
     * Enables the use of CI super-global without having to define an extra variable.
     *
     * I can't remember where I first saw this, so thank you if you are the original author. -Militis
     *
     * @access    public
     * @param    $var
     * @return    mixed
     */
    public function __get($var)
    {
        return get_instance()->$var;
    }

    /**
     * @param string $topic
     * @param string|array $data
     * @return bool
     */

    public function sendToTopic($topic, $data = null)
    {
        $data = $this->makeItArray($data);

        $this->pusher->trigger($topic, 'my-event', $data);

        return 200;
    }

    /**
     * @param string|array $data
     * @return array
     */
    private function makeItArray($data)
    {
        if (!is_null($data) && !is_array($data))
        {
            $data = ['message' => $data];
        }

        return $data;
    }
}

?>
