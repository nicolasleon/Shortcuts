<?php
/*************************************************************************************/
/*      This file is part of the Shortcuts Module                                   */
/*                                                                                   */
/*      Copyright (c) Omnitic                                                        */
/*      email : nicolas@omnitic.com                                                  */
/*      web : http://www.omnitic.com                                                 */
/*                                                                                   */
/*      For the full copyright and license information, please view the LICENSE.txt  */
/*      file that was distributed with this source code.                             */
/*************************************************************************************/

namespace Shortcuts\Loop;

use Shortcuts\Model\ShortcutsQuery;
use Thelia\Model\BrandQuery;
use Propel\Runtime\ActiveQuery\Criteria;

use Thelia\Core\Template\Element\BaseLoop;
use Thelia\Core\Template\Element\LoopResult;
use Thelia\Core\Template\Element\LoopResultRow;
use Thelia\Core\Template\Element\PropelSearchLoopInterface;

use Thelia\Core\Template\Loop\Argument\Argument;
use Thelia\Core\Template\Loop\Argument\ArgumentCollection;

use Thelia\Type\TypeCollection;
use Thelia\Type;

/**
 * Class ShortcutsLoop
 * @package Shortcuts\Loop
 * @author Nicolas Léon <nicolas@omnitic.com>
 */
class ShortcutsLoop extends BaseLoop implements PropelSearchLoopInterface
{
    public $countable = true;

    /**
     *
     * @return \Thelia\Core\Template\Loop\Argument\ArgumentCollection
     */
    protected function getArgDefinitions()
    {
        return new ArgumentCollection(
            Argument::createIntTypeArgument('user_id')
        );
    }

    /**
     * this method returns a Propel ModelCriteria
     *
     * @return \Propel\Runtime\ActiveQuery\ModelCriteria
     */
    public function buildModelCriteria()
    {
        // Get current user id
        if ($this->securityContext->hasAdminUser()) {
            $adminUser = $this->securityContext->getAdminUser();
            $user_locale = $this->securityContext->getAdminUser()->getLocale();
            $search = ShortcutsQuery::create()->joinWithI18n($user_locale)->orderByPosition();
            $search->where('admin_id = '. $adminUser->getId() . ' OR admin_id IS NULL');

            return $search;
        } else {
            return array();
        }

    }

    /**
     * @param LoopResult $loopResult
     *
     * @return LoopResult
     */
    public function parseResults(LoopResult $loopResult)
    {

        foreach ($loopResult->getResultDataCollection() as $shortcut) {
            $loopResultRow = (new LoopResultRow($shortcut))
                ->set('ID', $shortcut->getId())
                ->set('TITLE', $shortcut->getTitle())
                ->set('URL', $shortcut->getUrl())
                ->set('ADMIN_ID', $shortcut->getAdminId())
                ->set('POSITION', $shortcut->getPosition());

            $loopResult->addRow($loopResultRow);
        }
        return $loopResult;
    }
}
