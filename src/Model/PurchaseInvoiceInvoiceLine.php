<?php
/**
 * PurchaseInvoiceInvoiceLine
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
 * PurchaseInvoiceInvoiceLine Class Doc Comment
 *
 * @category Class
 *
 * @author   Swagger Codegen team
 *
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class PurchaseInvoiceInvoiceLine implements ArrayAccess, ModelInterface
{
    const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $swaggerModelName = 'PurchaseInvoiceInvoiceLine';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerTypes = [
        'name' => 'string',
        'allowance_charge' => 'float',
        'amount_excluding_vat' => 'float',
        'vat' => '\Deegitalbe\LaravelTrustupIoStorecove\Model\VATDetails',
        'description' => 'string',
        'period_start' => 'string',
        'period_end' => 'string',
        'allowance_charge_array' => '\Deegitalbe\LaravelTrustupIoStorecove\Model\PurchaseInvoiceInvoiceLineAllowanceCharge[]',
        'allowance_charges' => 'float[]',
        'price' => '\Deegitalbe\LaravelTrustupIoStorecove\Model\PurchaseInvoiceInvoiceLinePrice',
        'units' => '\Deegitalbe\LaravelTrustupIoStorecove\Model\PurchaseInvoiceInvoiceLineItem',
        'amount_excluding_tax' => 'float',
        'tax' => '\Deegitalbe\LaravelTrustupIoStorecove\Model\PurchaseInvoiceTax',
        'accounting' => '\Deegitalbe\LaravelTrustupIoStorecove\Model\PurchaseInvoiceAccountingDetails',
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerFormats = [
        'name' => null,
        'allowance_charge' => null,
        'amount_excluding_vat' => null,
        'vat' => null,
        'description' => null,
        'period_start' => null,
        'period_end' => null,
        'allowance_charge_array' => null,
        'allowance_charges' => null,
        'price' => null,
        'units' => null,
        'amount_excluding_tax' => null,
        'tax' => null,
        'accounting' => null,
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
        'name' => 'name',
        'allowance_charge' => 'allowance_charge',
        'amount_excluding_vat' => 'amount_excluding_vat',
        'vat' => 'vat',
        'description' => 'description',
        'period_start' => 'period_start',
        'period_end' => 'period_end',
        'allowance_charge_array' => 'allowance_charge_array',
        'allowance_charges' => 'allowance_charges',
        'price' => 'price',
        'units' => 'units',
        'amount_excluding_tax' => 'amount_excluding_tax',
        'tax' => 'tax',
        'accounting' => 'accounting',
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'name' => 'setName',
        'allowance_charge' => 'setAllowanceCharge',
        'amount_excluding_vat' => 'setAmountExcludingVat',
        'vat' => 'setVat',
        'description' => 'setDescription',
        'period_start' => 'setPeriodStart',
        'period_end' => 'setPeriodEnd',
        'allowance_charge_array' => 'setAllowanceChargeArray',
        'allowance_charges' => 'setAllowanceCharges',
        'price' => 'setPrice',
        'units' => 'setUnits',
        'amount_excluding_tax' => 'setAmountExcludingTax',
        'tax' => 'setTax',
        'accounting' => 'setAccounting',
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'name' => 'getName',
        'allowance_charge' => 'getAllowanceCharge',
        'amount_excluding_vat' => 'getAmountExcludingVat',
        'vat' => 'getVat',
        'description' => 'getDescription',
        'period_start' => 'getPeriodStart',
        'period_end' => 'getPeriodEnd',
        'allowance_charge_array' => 'getAllowanceChargeArray',
        'allowance_charges' => 'getAllowanceCharges',
        'price' => 'getPrice',
        'units' => 'getUnits',
        'amount_excluding_tax' => 'getAmountExcludingTax',
        'tax' => 'getTax',
        'accounting' => 'getAccounting',
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
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['allowance_charge'] = isset($data['allowance_charge']) ? $data['allowance_charge'] : null;
        $this->container['amount_excluding_vat'] = isset($data['amount_excluding_vat']) ? $data['amount_excluding_vat'] : null;
        $this->container['vat'] = isset($data['vat']) ? $data['vat'] : null;
        $this->container['description'] = isset($data['description']) ? $data['description'] : null;
        $this->container['period_start'] = isset($data['period_start']) ? $data['period_start'] : null;
        $this->container['period_end'] = isset($data['period_end']) ? $data['period_end'] : null;
        $this->container['allowance_charge_array'] = isset($data['allowance_charge_array']) ? $data['allowance_charge_array'] : null;
        $this->container['allowance_charges'] = isset($data['allowance_charges']) ? $data['allowance_charges'] : null;
        $this->container['price'] = isset($data['price']) ? $data['price'] : null;
        $this->container['units'] = isset($data['units']) ? $data['units'] : null;
        $this->container['amount_excluding_tax'] = isset($data['amount_excluding_tax']) ? $data['amount_excluding_tax'] : null;
        $this->container['tax'] = isset($data['tax']) ? $data['tax'] : null;
        $this->container['accounting'] = isset($data['accounting']) ? $data['accounting'] : null;
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
     * Gets name
     *
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param  string  $name  A short name for the invoice line.
     * @return $this
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets allowance_charge
     *
     * @return float
     */
    public function getAllowanceCharge()
    {
        return $this->container['allowance_charge'];
    }

    /**
     * Sets allowance_charge
     *
     * @param  float  $allowance_charge  DEPRECATED - use allowance_charges.
     * @return $this
     */
    public function setAllowanceCharge($allowance_charge)
    {
        $this->container['allowance_charge'] = $allowance_charge;

        return $this;
    }

    /**
     * Gets amount_excluding_vat
     *
     * @return float
     */
    public function getAmountExcludingVat()
    {
        return $this->container['amount_excluding_vat'];
    }

    /**
     * Sets amount_excluding_vat
     *
     * @param  float  $amount_excluding_vat  DEPRECATED - use amount_excluding_tax. The amount excluding VAT.
     * @return $this
     */
    public function setAmountExcludingVat($amount_excluding_vat)
    {
        $this->container['amount_excluding_vat'] = $amount_excluding_vat;

        return $this;
    }

    /**
     * Gets vat
     *
     * @return \Deegitalbe\LaravelTrustupIoStorecove\Model\VATDetails
     */
    public function getVat()
    {
        return $this->container['vat'];
    }

    /**
     * Sets vat
     *
     * @param  \Deegitalbe\LaravelTrustupIoStorecove\Model\VATDetails  $vat  vat
     * @return $this
     */
    public function setVat($vat)
    {
        $this->container['vat'] = $vat;

        return $this;
    }

    /**
     * Gets description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     *
     * @param  string  $description  The description for the invoice line.
     * @return $this
     */
    public function setDescription($description)
    {
        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets period_start
     *
     * @return string
     */
    public function getPeriodStart()
    {
        return $this->container['period_start'];
    }

    /**
     * Sets period_start
     *
     * @param  string  $period_start  The start date of the period this invoice line relates to. Format \"YYYY-MM-DD\".
     * @return $this
     */
    public function setPeriodStart($period_start)
    {
        $this->container['period_start'] = $period_start;

        return $this;
    }

    /**
     * Gets period_end
     *
     * @return string
     */
    public function getPeriodEnd()
    {
        return $this->container['period_end'];
    }

    /**
     * Sets period_end
     *
     * @param  string  $period_end  The end date of the period this invoice line relates to. Format \"YYYY-MM-DD\".
     * @return $this
     */
    public function setPeriodEnd($period_end)
    {
        $this->container['period_end'] = $period_end;

        return $this;
    }

    /**
     * Gets allowance_charge_array
     *
     * @return \Deegitalbe\LaravelTrustupIoStorecove\Model\PurchaseInvoiceInvoiceLineAllowanceCharge[]
     */
    public function getAllowanceChargeArray()
    {
        return $this->container['allowance_charge_array'];
    }

    /**
     * Sets allowance_charge_array
     *
     * @param  \Deegitalbe\LaravelTrustupIoStorecove\Model\PurchaseInvoiceInvoiceLineAllowanceCharge[]  $allowance_charge_array  allowance_charge_array
     * @return $this
     */
    public function setAllowanceChargeArray($allowance_charge_array)
    {
        $this->container['allowance_charge_array'] = $allowance_charge_array;

        return $this;
    }

    /**
     * Gets allowance_charges
     *
     * @return float[]
     */
    public function getAllowanceCharges()
    {
        return $this->container['allowance_charges'];
    }

    /**
     * Sets allowance_charges
     *
     * @param  float[]  $allowance_charges  Deprecated.
     * @return $this
     */
    public function setAllowanceCharges($allowance_charges)
    {
        $this->container['allowance_charges'] = $allowance_charges;

        return $this;
    }

    /**
     * Gets price
     *
     * @return \Deegitalbe\LaravelTrustupIoStorecove\Model\PurchaseInvoiceInvoiceLinePrice
     */
    public function getPrice()
    {
        return $this->container['price'];
    }

    /**
     * Sets price
     *
     * @param  \Deegitalbe\LaravelTrustupIoStorecove\Model\PurchaseInvoiceInvoiceLinePrice  $price  The price for one item, excluding VAT.
     * @return $this
     */
    public function setPrice($price)
    {
        $this->container['price'] = $price;

        return $this;
    }

    /**
     * Gets units
     *
     * @return \Deegitalbe\LaravelTrustupIoStorecove\Model\PurchaseInvoiceInvoiceLineItem
     */
    public function getUnits()
    {
        return $this->container['units'];
    }

    /**
     * Sets units
     *
     * @param  \Deegitalbe\LaravelTrustupIoStorecove\Model\PurchaseInvoiceInvoiceLineItem  $units  The number of items
     * @return $this
     */
    public function setUnits($units)
    {
        $this->container['units'] = $units;

        return $this;
    }

    /**
     * Gets amount_excluding_tax
     *
     * @return float
     */
    public function getAmountExcludingTax()
    {
        return $this->container['amount_excluding_tax'];
    }

    /**
     * Sets amount_excluding_tax
     *
     * @param  float  $amount_excluding_tax  The amount excluding Tax. This is equal to quantity x price_amount + ∑ allowance_charges.
     * @return $this
     */
    public function setAmountExcludingTax($amount_excluding_tax)
    {
        $this->container['amount_excluding_tax'] = $amount_excluding_tax;

        return $this;
    }

    /**
     * Gets tax
     *
     * @return \Deegitalbe\LaravelTrustupIoStorecove\Model\PurchaseInvoiceTax
     */
    public function getTax()
    {
        return $this->container['tax'];
    }

    /**
     * Sets tax
     *
     * @param  \Deegitalbe\LaravelTrustupIoStorecove\Model\PurchaseInvoiceTax  $tax  The tax details for the invoice line.
     * @return $this
     */
    public function setTax($tax)
    {
        $this->container['tax'] = $tax;

        return $this;
    }

    /**
     * Gets accounting
     *
     * @return \Deegitalbe\LaravelTrustupIoStorecove\Model\PurchaseInvoiceAccountingDetails
     */
    public function getAccounting()
    {
        return $this->container['accounting'];
    }

    /**
     * Sets accounting
     *
     * @param  \Deegitalbe\LaravelTrustupIoStorecove\Model\PurchaseInvoiceAccountingDetails  $accounting  The accounting details for the invoice line.
     * @return $this
     */
    public function setAccounting($accounting)
    {
        $this->container['accounting'] = $accounting;

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
