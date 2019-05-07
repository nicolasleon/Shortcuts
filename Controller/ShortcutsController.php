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

namespace Shortcuts\Controller;

use Shortcuts\Model\Shortcuts;
use Shortcuts\Model\ShortcutsQuery;
use Shortcuts\Model\ShortcutsI18n;
use Shortcuts\Model\ShortcutsQueryI18n;
use Shortcuts\Form\ShortcutForm;

use Symfony\Component\HttpFoundation\RedirectResponse;

use Thelia\Controller\Admin\BaseAdminController;
use Thelia\Core\Security\AccessManager;
use Thelia\Core\Security\Resource\AdminResources;
use Thelia\Tools\URL;

use Thelia\Form\Exception\FormValidationException;

/**
 * Class ShortcutsAdminController
 * @package Shortcuts\Controller
 * @author Nicolas Léon <nicolas@omnitic.com>
 */
class ShortcutsController extends BaseAdminController
{

    // private $img_folder;
    // private $src_folder;
    // protected $currentRouter = "router.shortcuts";

    protected $request;

    public function __construct()
    {
    }

    /**
    * Confirm a Shortcuts
    *
    */
    public function indexAction()
    {
        // die('ooops');
        return $this->render("shortcuts.index", array(
            'shortcuts' => array(),
        ));
    }

    /**
    * Create a shortcut
    *
    */
    public function createAction()
    {
        $shortcut_form = new ShortcutForm($this->getRequest());
        $shortcutForm = $this->validateForm($shortcut_form, "POST");

        // Get the current admin user
        $currentAdmin = $this->getSecurityContext()->getAdminUser();

        $shortcut = new Shortcuts();
        $shortcut->setLocale($shortcutForm->get('locale')->getData());
        $shortcut->setTitle($shortcutForm->get('title')->getData());
        $shortcut->setUrl($shortcutForm->get('shortcut_url')->getData());
        $shortcut->setAdminId($currentAdmin->getId());
        $shortcut->save();

        return new RedirectResponse(URL::getInstance()->absoluteUrl("/admin/module/Shortcuts"));
    }

    /**
    * Delete a Shortcuts
    *
    */
    public function deleteAction()
    {
        $shortcut_id = $_POST['shortcut_id'];

        $shortcut = ShortcutsQuery::create()->findPK($shortcut_id);

        $shortcut->delete();

        return new RedirectResponse(URL::getInstance()->absoluteUrl("/admin/module/Shortcuts"));
    }
}
