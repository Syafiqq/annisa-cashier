<?php
/**
 * This <annisa.com> project created by :
 * Name         : syafiq
 * Date / Time  : 18 December 2017, 8:15 PM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_DB_query_builder|CI_DB_pdo_driver db
 *
 */
class M_transaksi_m extends MY_Model
{
    public function __construct()
    {
        parent::__construct('`transaksi_m`');
        // Your own constructor code
    }
}

?>
