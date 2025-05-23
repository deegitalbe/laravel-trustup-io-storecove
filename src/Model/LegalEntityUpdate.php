<?php
/**
 * LegalEntityUpdate
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
 * LegalEntityUpdate Class Doc Comment
 *
 * @category Class
 *
 * @author   Swagger Codegen team
 *
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class LegalEntityUpdate implements ArrayAccess, ModelInterface
{
    const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $swaggerModelName = 'LegalEntityUpdate';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerTypes = [
        'id' => 'int',
        'party_name' => 'string',
        'line1' => 'string',
        'line2' => 'string',
        'city' => 'string',
        'zip' => 'string',
        'county' => 'string',
        'country' => '\Deegitalbe\LaravelTrustupIoStorecove\Model\Country',
        'tenant_id' => 'string',
        'public' => 'bool',
        'advertisements' => 'string[]',
        'third_party_username' => 'string',
        'third_party_password' => 'string',
        'rea' => '\Deegitalbe\LaravelTrustupIoStorecove\Model\Rea',
        'smart_inbox' => 'string',
        'acts_as_sender' => 'bool',
        'acts_as_receiver' => 'bool',
        'tax_registered' => 'bool',
        'classification_code' => 'string',
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerFormats = [
        'id' => 'int64',
        'party_name' => null,
        'line1' => null,
        'line2' => null,
        'city' => null,
        'zip' => null,
        'county' => null,
        'country' => null,
        'tenant_id' => null,
        'public' => null,
        'advertisements' => null,
        'third_party_username' => null,
        'third_party_password' => null,
        'rea' => null,
        'smart_inbox' => null,
        'acts_as_sender' => null,
        'acts_as_receiver' => null,
        'tax_registered' => null,
        'classification_code' => null,
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
        'party_name' => 'party_name',
        'line1' => 'line1',
        'line2' => 'line2',
        'city' => 'city',
        'zip' => 'zip',
        'county' => 'county',
        'country' => 'country',
        'tenant_id' => 'tenant_id',
        'public' => 'public',
        'advertisements' => 'advertisements',
        'third_party_username' => 'third_party_username',
        'third_party_password' => 'third_party_password',
        'rea' => 'rea',
        'smart_inbox' => 'smart_inbox',
        'acts_as_sender' => 'acts_as_sender',
        'acts_as_receiver' => 'acts_as_receiver',
        'tax_registered' => 'tax_registered',
        'classification_code' => 'classification_code',
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'party_name' => 'setPartyName',
        'line1' => 'setLine1',
        'line2' => 'setLine2',
        'city' => 'setCity',
        'zip' => 'setZip',
        'county' => 'setCounty',
        'country' => 'setCountry',
        'tenant_id' => 'setTenantId',
        'public' => 'setPublic',
        'advertisements' => 'setAdvertisements',
        'third_party_username' => 'setThirdPartyUsername',
        'third_party_password' => 'setThirdPartyPassword',
        'rea' => 'setRea',
        'smart_inbox' => 'setSmartInbox',
        'acts_as_sender' => 'setActsAsSender',
        'acts_as_receiver' => 'setActsAsReceiver',
        'tax_registered' => 'setTaxRegistered',
        'classification_code' => 'setClassificationCode',
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'party_name' => 'getPartyName',
        'line1' => 'getLine1',
        'line2' => 'getLine2',
        'city' => 'getCity',
        'zip' => 'getZip',
        'county' => 'getCounty',
        'country' => 'getCountry',
        'tenant_id' => 'getTenantId',
        'public' => 'getPublic',
        'advertisements' => 'getAdvertisements',
        'third_party_username' => 'getThirdPartyUsername',
        'third_party_password' => 'getThirdPartyPassword',
        'rea' => 'getRea',
        'smart_inbox' => 'getSmartInbox',
        'acts_as_sender' => 'getActsAsSender',
        'acts_as_receiver' => 'getActsAsReceiver',
        'tax_registered' => 'getTaxRegistered',
        'classification_code' => 'getClassificationCode',
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

    const ADVERTISEMENTS_INVOICE = 'invoice';

    const ADVERTISEMENTS_INVOICE_RESPONSE = 'invoice_response';

    const ADVERTISEMENTS_ORDER = 'order';

    const ADVERTISEMENTS_ORDERING = 'ordering';

    const ADVERTISEMENTS_ORDER_RESPONSE = 'order_response';

    const ADVERTISEMENTS_SELFBILLING = 'selfbilling';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getAdvertisementsAllowableValues()
    {
        return [
            self::ADVERTISEMENTS_INVOICE,
            self::ADVERTISEMENTS_INVOICE_RESPONSE,
            self::ADVERTISEMENTS_ORDER,
            self::ADVERTISEMENTS_ORDERING,
            self::ADVERTISEMENTS_ORDER_RESPONSE,
            self::ADVERTISEMENTS_SELFBILLING,
        ];
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
        $this->container['party_name'] = isset($data['party_name']) ? $data['party_name'] : null;
        $this->container['line1'] = isset($data['line1']) ? $data['line1'] : null;
        $this->container['line2'] = isset($data['line2']) ? $data['line2'] : null;
        $this->container['city'] = isset($data['city']) ? $data['city'] : null;
        $this->container['zip'] = isset($data['zip']) ? $data['zip'] : null;
        $this->container['county'] = isset($data['county']) ? $data['county'] : null;
        $this->container['country'] = isset($data['country']) ? $data['country'] : null;
        $this->container['tenant_id'] = isset($data['tenant_id']) ? $data['tenant_id'] : null;
        $this->container['public'] = isset($data['public']) ? $data['public'] : true;
        $this->container['advertisements'] = isset($data['advertisements']) ? $data['advertisements'] : null;
        $this->container['third_party_username'] = isset($data['third_party_username']) ? $data['third_party_username'] : null;
        $this->container['third_party_password'] = isset($data['third_party_password']) ? $data['third_party_password'] : null;
        $this->container['rea'] = isset($data['rea']) ? $data['rea'] : null;
        $this->container['smart_inbox'] = isset($data['smart_inbox']) ? $data['smart_inbox'] : null;
        $this->container['acts_as_sender'] = isset($data['acts_as_sender']) ? $data['acts_as_sender'] : true;
        $this->container['acts_as_receiver'] = isset($data['acts_as_receiver']) ? $data['acts_as_receiver'] : true;
        $this->container['tax_registered'] = isset($data['tax_registered']) ? $data['tax_registered'] : true;
        $this->container['classification_code'] = isset($data['classification_code']) ? $data['classification_code'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if (! is_null($this->container['party_name']) && (mb_strlen($this->container['party_name']) > 64)) {
            $invalidProperties[] = "invalid value for 'party_name', the character length must be smaller than or equal to 64.";
        }

        if (! is_null($this->container['party_name']) && (mb_strlen($this->container['party_name']) < 2)) {
            $invalidProperties[] = "invalid value for 'party_name', the character length must be bigger than or equal to 2.";
        }

        if (! is_null($this->container['line1']) && (mb_strlen($this->container['line1']) > 192)) {
            $invalidProperties[] = "invalid value for 'line1', the character length must be smaller than or equal to 192.";
        }

        if (! is_null($this->container['line1']) && (mb_strlen($this->container['line1']) < 2)) {
            $invalidProperties[] = "invalid value for 'line1', the character length must be bigger than or equal to 2.";
        }

        if (! is_null($this->container['line2']) && (mb_strlen($this->container['line2']) > 192)) {
            $invalidProperties[] = "invalid value for 'line2', the character length must be smaller than or equal to 192.";
        }

        if (! is_null($this->container['city']) && (mb_strlen($this->container['city']) > 64)) {
            $invalidProperties[] = "invalid value for 'city', the character length must be smaller than or equal to 64.";
        }

        if (! is_null($this->container['city']) && (mb_strlen($this->container['city']) < 2)) {
            $invalidProperties[] = "invalid value for 'city', the character length must be bigger than or equal to 2.";
        }

        if (! is_null($this->container['zip']) && (mb_strlen($this->container['zip']) > 32)) {
            $invalidProperties[] = "invalid value for 'zip', the character length must be smaller than or equal to 32.";
        }

        if (! is_null($this->container['zip']) && (mb_strlen($this->container['zip']) < 2)) {
            $invalidProperties[] = "invalid value for 'zip', the character length must be bigger than or equal to 2.";
        }

        if (! is_null($this->container['county']) && (mb_strlen($this->container['county']) > 64)) {
            $invalidProperties[] = "invalid value for 'county', the character length must be smaller than or equal to 64.";
        }

        if (! is_null($this->container['tenant_id']) && (mb_strlen($this->container['tenant_id']) > 64)) {
            $invalidProperties[] = "invalid value for 'tenant_id', the character length must be smaller than or equal to 64.";
        }

        if (! is_null($this->container['third_party_username']) && (mb_strlen($this->container['third_party_username']) > 64)) {
            $invalidProperties[] = "invalid value for 'third_party_username', the character length must be smaller than or equal to 64.";
        }

        if (! is_null($this->container['third_party_username']) && (mb_strlen($this->container['third_party_username']) < 2)) {
            $invalidProperties[] = "invalid value for 'third_party_username', the character length must be bigger than or equal to 2.";
        }

        if (! is_null($this->container['third_party_password']) && (mb_strlen($this->container['third_party_password']) > 64)) {
            $invalidProperties[] = "invalid value for 'third_party_password', the character length must be smaller than or equal to 64.";
        }

        if (! is_null($this->container['third_party_password']) && (mb_strlen($this->container['third_party_password']) < 2)) {
            $invalidProperties[] = "invalid value for 'third_party_password', the character length must be bigger than or equal to 2.";
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
     * @return int
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param  int  $id  The Storecove assigned id for the LegalEntity.
     * @return $this
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets party_name
     *
     * @return string
     */
    public function getPartyName()
    {
        return $this->container['party_name'];
    }

    /**
     * Sets party_name
     *
     * @param  string  $party_name  The name of the company.
     * @return $this
     */
    public function setPartyName($party_name)
    {
        if (! is_null($party_name) && (mb_strlen($party_name) > 64)) {
            throw new \InvalidArgumentException('invalid length for $party_name when calling LegalEntityUpdate., must be smaller than or equal to 64.');
        }
        if (! is_null($party_name) && (mb_strlen($party_name) < 2)) {
            throw new \InvalidArgumentException('invalid length for $party_name when calling LegalEntityUpdate., must be bigger than or equal to 2.');
        }

        $this->container['party_name'] = $party_name;

        return $this;
    }

    /**
     * Gets line1
     *
     * @return string
     */
    public function getLine1()
    {
        return $this->container['line1'];
    }

    /**
     * Sets line1
     *
     * @param  string  $line1  The first address line.
     * @return $this
     */
    public function setLine1($line1)
    {
        if (! is_null($line1) && (mb_strlen($line1) > 192)) {
            throw new \InvalidArgumentException('invalid length for $line1 when calling LegalEntityUpdate., must be smaller than or equal to 192.');
        }
        if (! is_null($line1) && (mb_strlen($line1) < 2)) {
            throw new \InvalidArgumentException('invalid length for $line1 when calling LegalEntityUpdate., must be bigger than or equal to 2.');
        }

        $this->container['line1'] = $line1;

        return $this;
    }

    /**
     * Gets line2
     *
     * @return string
     */
    public function getLine2()
    {
        return $this->container['line2'];
    }

    /**
     * Sets line2
     *
     * @param  string  $line2  The second address line, if applicable
     * @return $this
     */
    public function setLine2($line2)
    {
        if (! is_null($line2) && (mb_strlen($line2) > 192)) {
            throw new \InvalidArgumentException('invalid length for $line2 when calling LegalEntityUpdate., must be smaller than or equal to 192.');
        }

        $this->container['line2'] = $line2;

        return $this;
    }

    /**
     * Gets city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->container['city'];
    }

    /**
     * Sets city
     *
     * @param  string  $city  The city.
     * @return $this
     */
    public function setCity($city)
    {
        if (! is_null($city) && (mb_strlen($city) > 64)) {
            throw new \InvalidArgumentException('invalid length for $city when calling LegalEntityUpdate., must be smaller than or equal to 64.');
        }
        if (! is_null($city) && (mb_strlen($city) < 2)) {
            throw new \InvalidArgumentException('invalid length for $city when calling LegalEntityUpdate., must be bigger than or equal to 2.');
        }

        $this->container['city'] = $city;

        return $this;
    }

    /**
     * Gets zip
     *
     * @return string
     */
    public function getZip()
    {
        return $this->container['zip'];
    }

    /**
     * Sets zip
     *
     * @param  string  $zip  The zipcode.
     * @return $this
     */
    public function setZip($zip)
    {
        if (! is_null($zip) && (mb_strlen($zip) > 32)) {
            throw new \InvalidArgumentException('invalid length for $zip when calling LegalEntityUpdate., must be smaller than or equal to 32.');
        }
        if (! is_null($zip) && (mb_strlen($zip) < 2)) {
            throw new \InvalidArgumentException('invalid length for $zip when calling LegalEntityUpdate., must be bigger than or equal to 2.');
        }

        $this->container['zip'] = $zip;

        return $this;
    }

    /**
     * Gets county
     *
     * @return string
     */
    public function getCounty()
    {
        return $this->container['county'];
    }

    /**
     * Sets county
     *
     * @param  string  $county  County, if applicable
     * @return $this
     */
    public function setCounty($county)
    {
        if (! is_null($county) && (mb_strlen($county) > 64)) {
            throw new \InvalidArgumentException('invalid length for $county when calling LegalEntityUpdate., must be smaller than or equal to 64.');
        }

        $this->container['county'] = $county;

        return $this;
    }

    /**
     * Gets country
     *
     * @return \Deegitalbe\LaravelTrustupIoStorecove\Model\Country
     */
    public function getCountry()
    {
        return $this->container['country'];
    }

    /**
     * Sets country
     *
     * @param  \Deegitalbe\LaravelTrustupIoStorecove\Model\Country  $country  country
     * @return $this
     */
    public function setCountry($country)
    {
        $this->container['country'] = $country;

        return $this;
    }

    /**
     * Gets tenant_id
     *
     * @return string
     */
    public function getTenantId()
    {
        return $this->container['tenant_id'];
    }

    /**
     * Sets tenant_id
     *
     * @param  string  $tenant_id  The id of the tenant, to be used in case of multi-tenant solutions. This property will included in webhook events.
     * @return $this
     */
    public function setTenantId($tenant_id)
    {
        if (! is_null($tenant_id) && (mb_strlen($tenant_id) > 64)) {
            throw new \InvalidArgumentException('invalid length for $tenant_id when calling LegalEntityUpdate., must be smaller than or equal to 64.');
        }

        $this->container['tenant_id'] = $tenant_id;

        return $this;
    }

    /**
     * Gets public
     *
     * @return bool
     */
    public function getPublic()
    {
        return $this->container['public'];
    }

    /**
     * Sets public
     *
     * @param  bool  $public  Whether or not this LegalEntity is public. Public means it will be listed in the PEPPOL directory at https://directory.peppol.eu/ which is normally what you want. If you have a good reason to not want the LegalEntity listed, provide false. This property is ignored when for country SG, where it is always true.
     * @return $this
     */
    public function setPublic($public)
    {
        $this->container['public'] = $public;

        return $this;
    }

    /**
     * Gets advertisements
     *
     * @return string[]
     */
    public function getAdvertisements()
    {
        return $this->container['advertisements'];
    }

    /**
     * Sets advertisements
     *
     * @param  string[]  $advertisements  A list of document types to advertise. Use if this LegalEntity needs the ability to receive more than only invoice documents.
     * @return $this
     */
    public function setAdvertisements($advertisements)
    {
        $allowedValues = $this->getAdvertisementsAllowableValues();
        if (! is_null($advertisements) && array_diff($advertisements, $allowedValues)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'advertisements', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['advertisements'] = $advertisements;

        return $this;
    }

    /**
     * Gets third_party_username
     *
     * @return string
     */
    public function getThirdPartyUsername()
    {
        return $this->container['third_party_username'];
    }

    /**
     * Sets third_party_username
     *
     * @param  string  $third_party_username  The username to use to authenticate to a system through which to send the document, or to obtain tax authority approval to send it. This field is currently relevant only for India and mandatory when creating an IN LegalEntity.
     * @return $this
     */
    public function setThirdPartyUsername($third_party_username)
    {
        if (! is_null($third_party_username) && (mb_strlen($third_party_username) > 64)) {
            throw new \InvalidArgumentException('invalid length for $third_party_username when calling LegalEntityUpdate., must be smaller than or equal to 64.');
        }
        if (! is_null($third_party_username) && (mb_strlen($third_party_username) < 2)) {
            throw new \InvalidArgumentException('invalid length for $third_party_username when calling LegalEntityUpdate., must be bigger than or equal to 2.');
        }

        $this->container['third_party_username'] = $third_party_username;

        return $this;
    }

    /**
     * Gets third_party_password
     *
     * @return string
     */
    public function getThirdPartyPassword()
    {
        return $this->container['third_party_password'];
    }

    /**
     * Sets third_party_password
     *
     * @param  string  $third_party_password  The password to use to authenticate to a system through which to send the document, or to obtain tax authority approval to send it. This field is currently relevant only for India and mandatory when creating an IN LegalEntity.
     * @return $this
     */
    public function setThirdPartyPassword($third_party_password)
    {
        if (! is_null($third_party_password) && (mb_strlen($third_party_password) > 64)) {
            throw new \InvalidArgumentException('invalid length for $third_party_password when calling LegalEntityUpdate., must be smaller than or equal to 64.');
        }
        if (! is_null($third_party_password) && (mb_strlen($third_party_password) < 2)) {
            throw new \InvalidArgumentException('invalid length for $third_party_password when calling LegalEntityUpdate., must be bigger than or equal to 2.');
        }

        $this->container['third_party_password'] = $third_party_password;

        return $this;
    }

    /**
     * Gets rea
     *
     * @return \Deegitalbe\LaravelTrustupIoStorecove\Model\Rea
     */
    public function getRea()
    {
        return $this->container['rea'];
    }

    /**
     * Sets rea
     *
     * @param  \Deegitalbe\LaravelTrustupIoStorecove\Model\Rea  $rea  The REA details for the LegalEntity. Only applies to IT LegalEntities.
     * @return $this
     */
    public function setRea($rea)
    {
        $this->container['rea'] = $rea;

        return $this;
    }

    /**
     * Gets smart_inbox
     *
     * @return string
     */
    public function getSmartInbox()
    {
        return $this->container['smart_inbox'];
    }

    /**
     * Sets smart_inbox
     *
     * @param  string  $smart_inbox  DEPRECATED. Use the <<_openapi_receiveddocuments_resource>> endpoint. The email address of the Smart Inbox for this LegalEntity.
     * @return $this
     */
    public function setSmartInbox($smart_inbox)
    {
        $this->container['smart_inbox'] = $smart_inbox;

        return $this;
    }

    /**
     * Gets acts_as_sender
     *
     * @return bool
     */
    public function getActsAsSender()
    {
        return $this->container['acts_as_sender'];
    }

    /**
     * Sets acts_as_sender
     *
     * @param  bool  $acts_as_sender  Whether or not this LegalEntity can act as a sender of documents.
     * @return $this
     */
    public function setActsAsSender($acts_as_sender)
    {
        $this->container['acts_as_sender'] = $acts_as_sender;

        return $this;
    }

    /**
     * Gets acts_as_receiver
     *
     * @return bool
     */
    public function getActsAsReceiver()
    {
        return $this->container['acts_as_receiver'];
    }

    /**
     * Sets acts_as_receiver
     *
     * @param  bool  $acts_as_receiver  Whether or not this LegalEntity can act as a receiver of documents. If not, no identifiers will be provioned on any exchange network.
     * @return $this
     */
    public function setActsAsReceiver($acts_as_receiver)
    {
        $this->container['acts_as_receiver'] = $acts_as_receiver;

        return $this;
    }

    /**
     * Gets tax_registered
     *
     * @return bool
     */
    public function getTaxRegistered()
    {
        return $this->container['tax_registered'];
    }

    /**
     * Sets tax_registered
     *
     * @param  bool  $tax_registered  Whether or not this LegalEntity is tax registered. This influences the validation of the data presented when sending documents.
     * @return $this
     */
    public function setTaxRegistered($tax_registered)
    {
        $this->container['tax_registered'] = $tax_registered;

        return $this;
    }

    /**
     * Gets classification_code
     *
     * @return string
     */
    public function getClassificationCode()
    {
        return $this->container['classification_code'];
    }

    /**
     * Sets classification_code
     *
     * @param  string  $classification_code  The classification code for this LegalEntity. For Malaysia, this is the MSIC code. It is mandatory for MY legal entities.
     * @return $this
     */
    public function setClassificationCode($classification_code)
    {
        $this->container['classification_code'] = $classification_code;

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
