<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter API Controller
 *
 * @package         CodeIgniter
 * @subpackage      Libraries
 * @category        Libraries
 * @author          Jeevan Lal
 * @license         MIT
 * @version         1.1.6
 */
class API_Controller extends CI_Controller
{
    /**
     * List of allowed HTTP methods
     *
     * @var array
     */
    protected $allowed_http_methods = ['get', 'delete', 'post', 'put', 'options', 'patch', 'head'];

    protected $API_KEY;
    protected $KEY_DB;
    // clue 
    // 
    /**
     * The request method is not supported by the following resource
     * @link http://www.restapitutorial.com/httpstatuscodes.html
     */
    const HTTP_METHOD_NOT_ALLOWED = 405;

    /**
     * The request cannot be fulfilled due to multiple errors
     */
    const HTTP_BAD_REQUEST = 400;

    /**
     * Request Timeout
     */
    const HTTP_REQUEST_TIMEOUT = 408;

    /**
     * The requested resource could not be found
     */
    const HTTP_NOT_FOUND = 404;

    /**
     * The user is unauthorized to access the requested resource
     */
    const HTTP_UNAUTHORIZED = 401;

    /**
     * The request has succeeded
     */
    const HTTP_OK = 200;

    /**
     * HTTP status codes and their respective description
     */
    const HEADER_STATUS_STRINGS = [
        '405' => 'HTTP/1.1 405 Method Not Allowed',
        '400' => 'BAD REQUEST',
        '408' => 'Request Timeout',
        '404' => 'NOT FOUND',
        '401' => 'UNAUTHORIZED',
        '200' => 'OK',
    ];

    /**
     * API LIMIT TABLE NAME
     */
    protected $API_LIMIT_TABLE_NAME;

    /**
     * API KEYS TABLE NAME
     */
    protected $API_KEYS_TABLE_NAME;

    /**
     * RETURN DATA
     */
    protected $return_other_data = [];
    
    public function __construct() {
        parent::__construct();
        $this->CI =& get_instance();

        // load api config file
        $this->CI->load->config('api');

        // set timezone for api limit
        date_default_timezone_set($this->CI->config->item('api_timezone'));

        // Load Config Items Values
        $this->API_LIMIT_TABLE_NAME = $this->CI->config->item('api_limit_table_name');
        $this->API_KEYS_TABLE_NAME  = $this->CI->config->item('api_keys_table_name');
    }


    /**
     * Public Response Function
     */
    public function api_return($data = NULL, $http_code = NULL)
    {
        ob_start();
        header('content-type:application/json; charset=UTF-8');
        header(self::HEADER_STATUS_STRINGS[$http_code], true, $http_code);
        print_r(json_encode($data));
        ob_end_flush();
    }
}
