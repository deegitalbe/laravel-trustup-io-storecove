<?php
/**
 * InvoiceRecipient
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
 * InvoiceRecipient Class Doc Comment
 *
 * @category Class
 *
 * @description DEPRECATED. Use the Routing object. The different ways to send the invoice to the recipient. The publicIdentifiers are used to send via the Peppol network, if the recipient is not registered on the Peppol network, the invoice will be sent to the email addresses in the emails property. This property is only mandatory when sending the invoice data using the &lt;&lt;_openapi_invoice&gt;&gt; property, not when sending using the &lt;&lt;_openapi_invoicedata&gt;&gt; property, in which case this information will be extracted from the &lt;&lt;_openapi_invoicedata&gt;&gt; object. If you do specify an &lt;&lt;_openapi_invoicerecipient&gt;&gt; object and an &lt;&lt;_openapi_invoicedata&gt;&gt; object, the data from the two will be merged.
 *
 * @author   Swagger Codegen team
 *
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class InvoiceRecipient implements ArrayAccess, ModelInterface
{
    const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $swaggerModelName = 'InvoiceRecipient';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerTypes = [
        'public_identifiers' => '\Deegitalbe\LaravelTrustupIoStorecove\Model\PublicIdentifiers',
        'emails' => 'string[]',
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerFormats = [
        'public_identifiers' => null,
        'emails' => 'email',
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
        'public_identifiers' => 'publicIdentifiers',
        'emails' => 'emails',
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'public_identifiers' => 'setPublicIdentifiers',
        'emails' => 'setEmails',
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'public_identifiers' => 'getPublicIdentifiers',
        'emails' => 'getEmails',
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
        $this->container['public_identifiers'] = isset($data['public_identifiers']) ? $data['public_identifiers'] : null;
        $this->container['emails'] = isset($data['emails']) ? $data['emails'] : null;
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
     * Gets public_identifiers
     *
     * @return \Deegitalbe\LaravelTrustupIoStorecove\Model\PublicIdentifiers
     */
    public function getPublicIdentifiers()
    {
        return $this->container['public_identifiers'];
    }

    /**
     * Sets public_identifiers
     *
     * @param  \Deegitalbe\LaravelTrustupIoStorecove\Model\PublicIdentifiers  $public_identifiers  The public identifiers for this invoice recipient. These are the identifiers used on the Peppol network. Note that when sending invoices with VAT (or with a taxExemptReason), a receiver VAT number is required and that should be one of these publicIdentifiers.
     * @return $this
     */
    public function setPublicIdentifiers($public_identifiers)
    {
        $this->container['public_identifiers'] = $public_identifiers;

        return $this;
    }

    /**
     * Gets emails
     *
     * @return string[]
     */
    public function getEmails()
    {
        return $this->container['emails'];
    }

    /**
     * Sets emails
     *
     * @param  string[]  $emails  The email addresses the invoice should be sent to if none of the other identifiers can be used
     * @return $this
     */
    public function setEmails($emails)
    {
        $this->container['emails'] = $emails;

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
