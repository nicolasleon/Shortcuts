<?php

namespace Shortcuts\Hook;

use Thelia\Core\Event\Hook\HookRenderEvent;
// use Thelia\Core\Event\Hook\HookRenderBlockEvent;
use Thelia\Core\Hook\BaseHook;

/**
 * Class Shortcuts
 * @package Shortcuts\Hook
 * @author Julien Chanséaume <jchanseaume@openstudio.fr>
 */
class Shortcuts extends BaseHook
{

    public function onMainTopbarTop(HookRenderEvent $event)
    {
        $event->add($this->render("shortcuts.hook.html", $event->getArguments()));
    }
}
