<?php
/*************************************************************************************/
/*      This file is part of the Thelia package.                                     */
/*                                                                                   */
/*      Copyright (c) OpenStudio                                                     */
/*      email : dev@thelia.net                                                       */
/*      web : http://www.thelia.net                                                  */
/*                                                                                   */
/*      For the full copyright and license information, please view the LICENSE.txt  */
/*      file that was distributed with this source code.                             */
/*************************************************************************************/

namespace Shortcuts;

use Thelia\Module\BaseModule;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Propel;
use Thelia\Install\Database;

use Shortcuts\Model\Shortcuts as Shortcut;
use Shortcuts\Model\ShortcutsQuery;

class Shortcuts extends BaseModule
{
    /** @var string */
    const DOMAIN_NAME = 'shortcuts';
    const MODULE_DOMAIN = 'shortcuts';

    /*
     * You may now override BaseModuleInterface methods, such as:
     * install, destroy, preActivation, postActivation, preDeactivation, postDeactivation
     *
     * Have fun !
     */
    /**
     * @param ConnectionInterface|null $con
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function postActivation(ConnectionInterface $con = null)
    {
        // Once activated, create the module schema in the Thelia database.
        $database = new Database($con);

        try {
            ShortcutsQuery::create()->findOne();
        } catch (\Exception $e) {
            // Create modules' tables
            $database->insertSql(null, array(
                __DIR__ . DS . 'Config'.DS.'thelia.sql' // The module schema
            ));

            // Add a default shortcut
            $shortcut = new Shortcut();
            $shortcut->setUrl('/admin/module/Shortcuts');
            $shortcut->setLocale('en_US');
            $shortcut->setTitle('Shortcuts settings');
            $shortcut->setLocale('fr_FR');
            $shortcut->setTitle('Configurtation des raccourcis');
            $shortcut->save();
        }
    }
}
