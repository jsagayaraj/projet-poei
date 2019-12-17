<?php

namespace Drupal\conference\Access;

use Drupal\node\NodeInterface;
use Drupal\Core\Routing\RouteMatch;
use Drupal\Core\Access\AccessResult;
use Symfony\Component\Routing\Route;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Routing\Access\AccessInterface;



class ConferenceAccessCheck implements AccessInterface{

    public function access(RouteMatch $route, NodeInterface $node,  AccountInterface $account){

        //ksm($node);
        $allow = false;
        if($node->bundle() === 'programmes'){
            $organisateurs = $node->get('field_organisateurs_du_programme')->getValue();
           
                foreach($organisateurs as $organisateur){
                if($organisateur['target_id'] ===  $account->id()) {
                    $allow = true;
                }
            }
        }
        return AccessResult::allowedIf( $node->bundle() === 'programmes' && $allow);


    }
}