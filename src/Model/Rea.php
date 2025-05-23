<?php
/**
 * Rea
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
 * Rea Class Doc Comment
 *
 * @category Class
 *
 * @author   Swagger Codegen team
 *
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class Rea implements ArrayAccess, ModelInterface
{
    const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $swaggerModelName = 'Rea';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerTypes = [
        'province' => 'string',
        'identifier' => 'string',
        'capital' => 'float',
        'partners' => 'string',
        'liquidation_status' => 'string',
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerFormats = [
        'province' => null,
        'identifier' => null,
        'capital' => null,
        'partners' => null,
        'liquidation_status' => null,
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
        'province' => 'province',
        'identifier' => 'identifier',
        'capital' => 'capital',
        'partners' => 'partners',
        'liquidation_status' => 'liquidation_status',
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'province' => 'setProvince',
        'identifier' => 'setIdentifier',
        'capital' => 'setCapital',
        'partners' => 'setPartners',
        'liquidation_status' => 'setLiquidationStatus',
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'province' => 'getProvince',
        'identifier' => 'getIdentifier',
        'capital' => 'getCapital',
        'partners' => 'getPartners',
        'liquidation_status' => 'getLiquidationStatus',
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

    const PROVINCE_AG = 'AG';

    const PROVINCE_AL = 'AL';

    const PROVINCE_AN = 'AN';

    const PROVINCE_AO = 'AO';

    const PROVINCE_AQ = 'AQ';

    const PROVINCE_AR = 'AR';

    const PROVINCE_AP = 'AP';

    const PROVINCE_AT = 'AT';

    const PROVINCE_AV = 'AV';

    const PROVINCE_BA = 'BA';

    const PROVINCE_BT = 'BT';

    const PROVINCE_BL = 'BL';

    const PROVINCE_BN = 'BN';

    const PROVINCE_BG = 'BG';

    const PROVINCE_BI = 'BI';

    const PROVINCE_BO = 'BO';

    const PROVINCE_BZ = 'BZ';

    const PROVINCE_BS = 'BS';

    const PROVINCE_BR = 'BR';

    const PROVINCE_CA = 'CA';

    const PROVINCE_CL = 'CL';

    const PROVINCE_CB = 'CB';

    const PROVINCE_CI = 'CI';

    const PROVINCE_CE = 'CE';

    const PROVINCE_CT = 'CT';

    const PROVINCE_CZ = 'CZ';

    const PROVINCE_CH = 'CH';

    const PROVINCE_CO = 'CO';

    const PROVINCE_CS = 'CS';

    const PROVINCE_CR = 'CR';

    const PROVINCE_KR = 'KR';

    const PROVINCE_CN = 'CN';

    const PROVINCE_EN = 'EN';

    const PROVINCE_FM = 'FM';

    const PROVINCE_FE = 'FE';

    const PROVINCE_FI = 'FI';

    const PROVINCE_FG = 'FG';

    const PROVINCE_FC = 'FC';

    const PROVINCE_FR = 'FR';

    const PROVINCE_GE = 'GE';

    const PROVINCE_GO = 'GO';

    const PROVINCE_GR = 'GR';

    const PROVINCE_IM = 'IM';

    const PROVINCE_IS = 'IS';

    const PROVINCE_SP = 'SP';

    const PROVINCE_LT = 'LT';

    const PROVINCE_LE = 'LE';

    const PROVINCE_LC = 'LC';

    const PROVINCE_LI = 'LI';

    const PROVINCE_LO = 'LO';

    const PROVINCE_LU = 'LU';

    const PROVINCE_MC = 'MC';

    const PROVINCE_MN = 'MN';

    const PROVINCE_MS = 'MS';

    const PROVINCE_MT = 'MT';

    const PROVINCE_VS = 'VS';

    const PROVINCE_ME = 'ME';

    const PROVINCE_MI = 'MI';

    const PROVINCE_MO = 'MO';

    const PROVINCE_MB = 'MB';

    const PROVINCE_NA = 'NA';

    const PROVINCE_NO = 'NO';

    const PROVINCE_NU = 'NU';

    const PROVINCE_OG = 'OG';

    const PROVINCE_OT = 'OT';

    const PROVINCE__OR = 'OR';

    const PROVINCE_PD = 'PD';

    const PROVINCE_PA = 'PA';

    const PROVINCE_PR = 'PR';

    const PROVINCE_PV = 'PV';

    const PROVINCE_PG = 'PG';

    const PROVINCE_PU = 'PU';

    const PROVINCE_PE = 'PE';

    const PROVINCE_PC = 'PC';

    const PROVINCE_PI = 'PI';

    const PROVINCE_PT = 'PT';

    const PROVINCE_PN = 'PN';

    const PROVINCE_PZ = 'PZ';

    const PROVINCE_PO = 'PO';

    const PROVINCE_RG = 'RG';

    const PROVINCE_RA = 'RA';

    const PROVINCE_RC = 'RC';

    const PROVINCE_RE = 'RE';

    const PROVINCE_RI = 'RI';

    const PROVINCE_RN = 'RN';

    const PROVINCE_RO = 'RO';

    const PROVINCE_SA = 'SA';

    const PROVINCE_SS = 'SS';

    const PROVINCE_SV = 'SV';

    const PROVINCE_SI = 'SI';

    const PROVINCE_SR = 'SR';

    const PROVINCE_SO = 'SO';

    const PROVINCE_TA = 'TA';

    const PROVINCE_TE = 'TE';

    const PROVINCE_TR = 'TR';

    const PROVINCE_TO = 'TO';

    const PROVINCE_TP = 'TP';

    const PROVINCE_TN = 'TN';

    const PROVINCE_TV = 'TV';

    const PROVINCE_TS = 'TS';

    const PROVINCE_UD = 'UD';

    const PROVINCE_VA = 'VA';

    const PROVINCE_VE = 'VE';

    const PROVINCE_VB = 'VB';

    const PROVINCE_VC = 'VC';

    const PROVINCE_VR = 'VR';

    const PROVINCE_VV = 'VV';

    const PROVINCE_VI = 'VI';

    const PROVINCE_VT = 'VT';

    const PARTNERS_SU = 'SU';

    const PARTNERS_SM = 'SM';

    const LIQUIDATION_STATUS_LN = 'LN';

    const LIQUIDATION_STATUS_LS = 'LS';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getProvinceAllowableValues()
    {
        return [
            self::PROVINCE_AG,
            self::PROVINCE_AL,
            self::PROVINCE_AN,
            self::PROVINCE_AO,
            self::PROVINCE_AQ,
            self::PROVINCE_AR,
            self::PROVINCE_AP,
            self::PROVINCE_AT,
            self::PROVINCE_AV,
            self::PROVINCE_BA,
            self::PROVINCE_BT,
            self::PROVINCE_BL,
            self::PROVINCE_BN,
            self::PROVINCE_BG,
            self::PROVINCE_BI,
            self::PROVINCE_BO,
            self::PROVINCE_BZ,
            self::PROVINCE_BS,
            self::PROVINCE_BR,
            self::PROVINCE_CA,
            self::PROVINCE_CL,
            self::PROVINCE_CB,
            self::PROVINCE_CI,
            self::PROVINCE_CE,
            self::PROVINCE_CT,
            self::PROVINCE_CZ,
            self::PROVINCE_CH,
            self::PROVINCE_CO,
            self::PROVINCE_CS,
            self::PROVINCE_CR,
            self::PROVINCE_KR,
            self::PROVINCE_CN,
            self::PROVINCE_EN,
            self::PROVINCE_FM,
            self::PROVINCE_FE,
            self::PROVINCE_FI,
            self::PROVINCE_FG,
            self::PROVINCE_FC,
            self::PROVINCE_FR,
            self::PROVINCE_GE,
            self::PROVINCE_GO,
            self::PROVINCE_GR,
            self::PROVINCE_IM,
            self::PROVINCE_IS,
            self::PROVINCE_SP,
            self::PROVINCE_LT,
            self::PROVINCE_LE,
            self::PROVINCE_LC,
            self::PROVINCE_LI,
            self::PROVINCE_LO,
            self::PROVINCE_LU,
            self::PROVINCE_MC,
            self::PROVINCE_MN,
            self::PROVINCE_MS,
            self::PROVINCE_MT,
            self::PROVINCE_VS,
            self::PROVINCE_ME,
            self::PROVINCE_MI,
            self::PROVINCE_MO,
            self::PROVINCE_MB,
            self::PROVINCE_NA,
            self::PROVINCE_NO,
            self::PROVINCE_NU,
            self::PROVINCE_OG,
            self::PROVINCE_OT,
            self::PROVINCE__OR,
            self::PROVINCE_PD,
            self::PROVINCE_PA,
            self::PROVINCE_PR,
            self::PROVINCE_PV,
            self::PROVINCE_PG,
            self::PROVINCE_PU,
            self::PROVINCE_PE,
            self::PROVINCE_PC,
            self::PROVINCE_PI,
            self::PROVINCE_PT,
            self::PROVINCE_PN,
            self::PROVINCE_PZ,
            self::PROVINCE_PO,
            self::PROVINCE_RG,
            self::PROVINCE_RA,
            self::PROVINCE_RC,
            self::PROVINCE_RE,
            self::PROVINCE_RI,
            self::PROVINCE_RN,
            self::PROVINCE_RO,
            self::PROVINCE_SA,
            self::PROVINCE_SS,
            self::PROVINCE_SV,
            self::PROVINCE_SI,
            self::PROVINCE_SR,
            self::PROVINCE_SO,
            self::PROVINCE_TA,
            self::PROVINCE_TE,
            self::PROVINCE_TR,
            self::PROVINCE_TO,
            self::PROVINCE_TP,
            self::PROVINCE_TN,
            self::PROVINCE_TV,
            self::PROVINCE_TS,
            self::PROVINCE_UD,
            self::PROVINCE_VA,
            self::PROVINCE_VE,
            self::PROVINCE_VB,
            self::PROVINCE_VC,
            self::PROVINCE_VR,
            self::PROVINCE_VV,
            self::PROVINCE_VI,
            self::PROVINCE_VT,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getPartnersAllowableValues()
    {
        return [
            self::PARTNERS_SU,
            self::PARTNERS_SM,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getLiquidationStatusAllowableValues()
    {
        return [
            self::LIQUIDATION_STATUS_LN,
            self::LIQUIDATION_STATUS_LS,
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
        $this->container['province'] = isset($data['province']) ? $data['province'] : null;
        $this->container['identifier'] = isset($data['identifier']) ? $data['identifier'] : null;
        $this->container['capital'] = isset($data['capital']) ? $data['capital'] : null;
        $this->container['partners'] = isset($data['partners']) ? $data['partners'] : null;
        $this->container['liquidation_status'] = isset($data['liquidation_status']) ? $data['liquidation_status'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        $allowedValues = $this->getProvinceAllowableValues();
        if (! is_null($this->container['province']) && ! in_array($this->container['province'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'province', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        if (! is_null($this->container['identifier']) && (mb_strlen($this->container['identifier']) > 20)) {
            $invalidProperties[] = "invalid value for 'identifier', the character length must be smaller than or equal to 20.";
        }

        if (! is_null($this->container['identifier']) && (mb_strlen($this->container['identifier']) < 2)) {
            $invalidProperties[] = "invalid value for 'identifier', the character length must be bigger than or equal to 2.";
        }

        $allowedValues = $this->getPartnersAllowableValues();
        if (! is_null($this->container['partners']) && ! in_array($this->container['partners'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'partners', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getLiquidationStatusAllowableValues();
        if (! is_null($this->container['liquidation_status']) && ! in_array($this->container['liquidation_status'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'liquidation_status', must be one of '%s'",
                implode("', '", $allowedValues)
            );
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
     * Gets province
     *
     * @return string
     */
    public function getProvince()
    {
        return $this->container['province'];
    }

    /**
     * Sets province
     *
     * @param  string  $province  The provincia of the ufficio that issued the identifier.
     * @return $this
     */
    public function setProvince($province)
    {
        $allowedValues = $this->getProvinceAllowableValues();
        if (! is_null($province) && ! in_array($province, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'province', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['province'] = $province;

        return $this;
    }

    /**
     * Gets identifier
     *
     * @return string
     */
    public function getIdentifier()
    {
        return $this->container['identifier'];
    }

    /**
     * Sets identifier
     *
     * @param  string  $identifier  The identifier.
     * @return $this
     */
    public function setIdentifier($identifier)
    {
        if (! is_null($identifier) && (mb_strlen($identifier) > 20)) {
            throw new \InvalidArgumentException('invalid length for $identifier when calling Rea., must be smaller than or equal to 20.');
        }
        if (! is_null($identifier) && (mb_strlen($identifier) < 2)) {
            throw new \InvalidArgumentException('invalid length for $identifier when calling Rea., must be bigger than or equal to 2.');
        }

        $this->container['identifier'] = $identifier;

        return $this;
    }

    /**
     * Gets capital
     *
     * @return float
     */
    public function getCapital()
    {
        return $this->container['capital'];
    }

    /**
     * Sets capital
     *
     * @param  float  $capital  The captial for the company.
     * @return $this
     */
    public function setCapital($capital)
    {
        $this->container['capital'] = $capital;

        return $this;
    }

    /**
     * Gets partners
     *
     * @return string
     */
    public function getPartners()
    {
        return $this->container['partners'];
    }

    /**
     * Sets partners
     *
     * @param  string  $partners  The number of partners.
     * @return $this
     */
    public function setPartners($partners)
    {
        $allowedValues = $this->getPartnersAllowableValues();
        if (! is_null($partners) && ! in_array($partners, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'partners', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['partners'] = $partners;

        return $this;
    }

    /**
     * Gets liquidation_status
     *
     * @return string
     */
    public function getLiquidationStatus()
    {
        return $this->container['liquidation_status'];
    }

    /**
     * Sets liquidation_status
     *
     * @param  string  $liquidation_status  The liquidation status of the company.
     * @return $this
     */
    public function setLiquidationStatus($liquidation_status)
    {
        $allowedValues = $this->getLiquidationStatusAllowableValues();
        if (! is_null($liquidation_status) && ! in_array($liquidation_status, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'liquidation_status', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['liquidation_status'] = $liquidation_status;

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
