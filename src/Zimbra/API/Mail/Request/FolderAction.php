<?php
/**
 * This file is part of the Zimbra API in PHP library.
 *
 * © Nguyen Van Nguyen <nguyennv1981@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zimbra\API\Mail\Request;

use Zimbra\Soap\Request;
use Zimbra\Soap\Struct\FolderActionSelector;

/**
 * FolderAction request class
 *
 * @package   Zimbra
 * @category  API
 * @author    Nguyen Van Nguyen - nguyennv1981@gmail.com
 * @copyright Copyright © 2013 by Nguyen Van Nguyen.
 */
class FolderAction extends Request
{
    /**
     * Select action to perform on folder
     * @var FolderActionSelector
     */
    private $_action;

    /**
     * Constructor method for FolderAction
     * @param  FolderActionSelector $action
     * @return self
     */
    public function __construct(FolderActionSelector $action)
    {
        parent::__construct();
        $this->_action = $action;
    }

    /**
     * Get or set action
     *
     * @param  FolderActionSelector $action
     * @return FolderActionSelector|self
     */
    public function action(FolderActionSelector $action = null)
    {
        if(null === $action)
        {
            return $this->_action;
        }
        $this->_action = $action;
        return $this;
    }

    /**
     * Returns the array representation of this class 
     *
     * @return array
     */
    public function toArray()
    {
        $this->array += $this->_action->toArray('action');
        return parent::toArray();
    }

    /**
     * Method returning the xml representation of this class
     *
     * @return SimpleXML
     */
    public function toXml()
    {
        $this->xml->append($this->_action->toXml('action'));
        return parent::toXml();
    }
}