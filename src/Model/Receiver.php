<?php
/**
 * Receiver
 *
 * PHP version 5
 *
 * @category Class
 *
 * @author   Swagger Codegen team
 *
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Storecove API
 *
 * Storecove API
 *
 * OpenAPI spec version: 2.0.1
 * Contact: apisupport@storecove.nl
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 2.4.24
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Deegitalbe\LaravelTrustupIoStorecove\Model;

use ArrayAccess;
use Deegitalbe\LaravelTrustupIoStorecove\ObjectSerializer;

/**
 * Receiver Class Doc Comment
 *
 * @category Class
 *
 * @description The receiver of the document.
 *
 * @author   Swagger Codegen team
 *
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class Receiver implements ArrayAccess, ModelInterface
{
    const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $swaggerModelName = 'Receiver';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerTypes = [
        'business' => '\Deegitalbe\LaravelTrustupIoStorecove\Model\BusinessReceiver',
        'government' => '\Deegitalbe\LaravelTrustupIoStorecove\Model\GovernmentReceiver',
        'consumer' => '\Deegitalbe\LaravelTrustupIoStorecove\Model\ConsumerReceiver',
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerFormats = [
        'business' => null,
        'government' => null,
        'consumer' => null,
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'business' => 'business',
        'government' => 'government',
        'consumer' => 'consumer',
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'business' => 'setBusiness',
        'government' => 'setGovernment',
        'consumer' => 'setConsumer',
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'business' => 'getBusiness',
        'government' => 'getGovernment',
        'consumer' => 'getConsumer',
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param  mixed[]  $data  Associated array of property values
     *                         initializing the model
     */
    public function __construct(?array $data = null)
    {
        $this->container['business'] = isset($data['business']) ? $data['business'] : null;
        $this->container['government'] = isset($data['government']) ? $data['government'] : null;
        $this->container['consumer'] = isset($data['consumer']) ? $data['consumer'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }

    /**
     * Gets business
     *
     * @return \Deegitalbe\LaravelTrustupIoStorecove\Model\BusinessReceiver
     */
    public function getBusiness()
    {
        return $this->container['business'];
    }

    /**
     * Sets business
     *
     * @param  \Deegitalbe\LaravelTrustupIoStorecove\Model\BusinessReceiver  $business  business
     * @return $this
     */
    public function setBusiness($business)
    {
        $this->container['business'] = $business;

        return $this;
    }

    /**
     * Gets government
     *
     * @return \Deegitalbe\LaravelTrustupIoStorecove\Model\GovernmentReceiver
     */
    public function getGovernment()
    {
        return $this->container['government'];
    }

    /**
     * Sets government
     *
     * @param  \Deegitalbe\LaravelTrustupIoStorecove\Model\GovernmentReceiver  $government  government
     * @return $this
     */
    public function setGovernment($government)
    {
        $this->container['government'] = $government;

        return $this;
    }

    /**
     * Gets consumer
     *
     * @return \Deegitalbe\LaravelTrustupIoStorecove\Model\ConsumerReceiver
     */
    public function getConsumer()
    {
        return $this->container['consumer'];
    }

    /**
     * Sets consumer
     *
     * @param  \Deegitalbe\LaravelTrustupIoStorecove\Model\ConsumerReceiver  $consumer  consumer
     * @return $this
     */
    public function setConsumer($consumer)
    {
        $this->container['consumer'] = $consumer;

        return $this;
    }

    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param  int  $offset  Offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param  int  $offset  Offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param  int  $offset  Offset
     * @param  mixed  $value  Value to be set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param  int  $offset  Offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}
