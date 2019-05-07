<?php
/*************************************************************************************/
/*      This file is part of the Booking Module                                   */
/*                                                                                   */
/*      Copyright (c) Omnitic                                                        */
/*      email : bonjour@omnitic.com                                                  */
/*      web : http://www.omnitic.com                                                 */
/*                                                                                   */
/*      For the full copyright and license information, please view the LICENSE.txt  */
/*      file that was distributed with this source code.                             */
/*************************************************************************************/
namespace Shortcuts\Form;

use Shortcuts\Shortcuts;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\ExecutionContextInterface;
use Thelia\Model\ConfigQuery;
use Thelia\Form\BaseForm;
use Thelia\Core\Translation\Translator;

// use Shortcuts\Model\ShortcutsVehiclesQuery;
use Shortcuts\Model\BookingVehiclesQuery;

class ShortcutForm extends BaseForm
{

    protected function buildForm()
    {

        $this->formBuilder

            ->add("title", "text", array(
                'constraints' => array(
                    new Constraints\NotBlank()
                ),
                'attr' => ['id' => "title", 'class' => "normal form-control"],
                'label' => Translator::getInstance()->trans("Shortcut title", array(), Shortcuts::MODULE_DOMAIN)
            ))
            ->add("shortcut_url", "text", array(
                'constraints' => array(
                    new Constraints\NotBlank()
                ),
                'attr' => ['id' => "url", 'class' => "normal form-control"],
                'label' => Translator::getInstance()->trans("Shortcut url", array(), Shortcuts::MODULE_DOMAIN)
            ))
            ->add("locale", "hidden", array(
                'constraints' => array(
                    new Constraints\NotBlank()
                ),
                'label' => Translator::getInstance()->trans("Locale", array(), Shortcuts::MODULE_DOMAIN)
            ))
        ;
    }

    public function getName()
    {
        return "shortcut_form";
    }
}
