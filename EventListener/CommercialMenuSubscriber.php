<?php
/**
 * Created by PhpStorm.
 * User: miky
 * Date: 19/05/17
 * Time: 17:15
 */

namespace Miky\Bundle\CommercialBundle\EventListener;


use Miky\Bundle\AdminBundle\Menu\AdminMenuBuilder;
use Miky\Bundle\MenuBundle\Event\MenuBuilderEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class CommercialMenuSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return array(
            AdminMenuBuilder::EVENT_NAME => 'onAdminMenu',
        );
    }

    public function onAdminMenu(MenuBuilderEvent $event)
    {
        $menu = $event->getMenu();

        $commercialSubMenu = $menu
            ->addChild('commercial')
            ->setLabel('miky_commercial.commercial')
            ->setLabelAttribute('icon', 'users')
        ;
        $commercialSubMenu
            ->addChild('contact_sheet_list', array("route" => "miky_commercial_admin_contact_sheet_index" ))
            ->setLabel('miky_commercial.contact_sheets')
            ->setLabelAttribute('icon', 'users')
        ;

        $commercialSubMenu
            ->addChild('company_sheet_list', array("route" => "miky_commercial_admin_company_sheet_index" ))
            ->setLabel('miky_commercial.company_sheets')
            ->setLabelAttribute('icon', 'users')
        ;

    }
}