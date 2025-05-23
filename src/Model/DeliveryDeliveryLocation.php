<?php
/**
 * DeliveryDeliveryLocation
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
 * DeliveryDeliveryLocation Class Doc Comment
 *
 * @category Class
 *
 * @author   Swagger Codegen team
 *
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class DeliveryDeliveryLocation implements ArrayAccess, ModelInterface
{
    const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $swaggerModelName = 'Delivery_deliveryLocation';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerTypes = [
        'id' => 'string',
        'scheme_id' => 'string',
        'scheme_agency_id' => 'string',
        'location_name' => 'string',
        'address' => '\Deegitalbe\LaravelTrustupIoStorecove\Model\Address',
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerFormats = [
        'id' => null,
        'scheme_id' => null,
        'scheme_agency_id' => null,
        'location_name' => null,
        'address' => null,
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
        'id' => 'id',
        'scheme_id' => 'schemeId',
        'scheme_agency_id' => 'schemeAgencyId',
        'location_name' => 'locationName',
        'address' => 'address',
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'scheme_id' => 'setSchemeId',
        'scheme_agency_id' => 'setSchemeAgencyId',
        'location_name' => 'setLocationName',
        'address' => 'setAddress',
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'scheme_id' => 'getSchemeId',
        'scheme_agency_id' => 'getSchemeAgencyId',
        'location_name' => 'getLocationName',
        'address' => 'getAddress',
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
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['scheme_id'] = isset($data['scheme_id']) ? $data['scheme_id'] : null;
        $this->container['scheme_agency_id'] = isset($data['scheme_agency_id']) ? $data['scheme_agency_id'] : null;
        $this->container['location_name'] = isset($data['location_name']) ? $data['location_name'] : null;
        $this->container['address'] = isset($data['address']) ? $data['address'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if (! is_null($this->container['id']) && (mb_strlen($this->container['id']) < 2)) {
            $invalidProperties[] = "invalid value for 'id', the character length must be bigger than or equal to 2.";
        }

        if (! is_null($this->container['location_name']) && (mb_strlen($this->container['location_name']) > 128)) {
            $invalidProperties[] = "invalid value for 'location_name', the character length must be smaller than or equal to 128.";
        }

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
     * Gets id
     *
     * @return string
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param  string  $id  The location identifier.
     * @return $this
     */
    public function setId($id)
    {

        if (! is_null($id) && (mb_strlen($id) < 2)) {
            throw new \InvalidArgumentException('invalid length for $id when calling DeliveryDeliveryLocation., must be bigger than or equal to 2.');
        }

        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets scheme_id
     *
     * @return string
     */
    public function getSchemeId()
    {
        return $this->container['scheme_id'];
    }

    /**
     * Sets scheme_id
     *
     * @param  string  $scheme_id  The schemeId of the location identifier (e.g. 'EAN')
     * @return $this
     */
    public function setSchemeId($scheme_id)
    {
        $this->container['scheme_id'] = $scheme_id;

        return $this;
    }

    /**
     * Gets scheme_agency_id
     *
     * @return string
     */
    public function getSchemeAgencyId()
    {
        return $this->container['scheme_agency_id'];
    }

    /**
     * Sets scheme_agency_id
     *
     * @param  string  $scheme_agency_id  DEPRECATED. The schemeAgencyId of the location identifier (e.g. 'ZZZ')
     * @return $this
     */
    public function setSchemeAgencyId($scheme_agency_id)
    {
        $this->container['scheme_agency_id'] = $scheme_agency_id;

        return $this;
    }

    /**
     * Gets location_name
     *
     * @return string
     */
    public function getLocationName()
    {
        return $this->container['location_name'];
    }

    /**
     * Sets location_name
     *
     * @param  string  $location_name  The name of the delivery location. Only used for DocumentOrder.
     * @return $this
     */
    public function setLocationName($location_name)
    {
        if (! is_null($location_name) && (mb_strlen($location_name) > 128)) {
            throw new \InvalidArgumentException('invalid length for $location_name when calling DeliveryDeliveryLocation., must be smaller than or equal to 128.');
        }

        $this->container['location_name'] = $location_name;

        return $this;
    }

    /**
     * Gets address
     *
     * @return \Deegitalbe\LaravelTrustupIoStorecove\Model\Address
     */
    public function getAddress()
    {
        return $this->container['address'];
    }

    /**
     * Sets address
     *
     * @param  \Deegitalbe\LaravelTrustupIoStorecove\Model\Address  $address  The address of the delivery location.
     * @return $this
     */
    public function setAddress($address)
    {
        $this->container['address'] = $address;

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
