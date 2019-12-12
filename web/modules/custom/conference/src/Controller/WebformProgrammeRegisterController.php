<?php

namespace Drupal\conference\Controller;

use Drupal\node\NodeInterface;
use Drupal\Core\Controller\ControllerBase;

class WebformProgrammeRegisterController extends ControllerBase{

    public function show_user_register_programme(NodeInterface $node){

        //return['#markup' => 'test'];
        $storage = \Drupal::entityTypeManager()->getStorage('webform_submission');
        $webform_submission = $storage->loadByProperties([
            'entity_type' => 'node',
            'entity_id' => $node->id(),
        ]);

        //ksm($webform_submission);

        $submission_data = array();
            foreach ($webform_submission as $submission) {
            $submission_data[] = [$submission->getData()['prenom'],$submission->getData()['nom'], $submission->getData()['email'], $submission->getData()['adhesion'], $submission->toLink('modifier', 'edit-form')];
            //$submission_data[] = $submission->getData();
            //ksm($submission_data);
        }
        $status_table = [
            '#type' => 'table',
            '#header' => ['Nom', 'Prenom', 'Email','Status', 'Action'],
            '#rows' => $submission_data,
            '#empty'=> $this->t('You are not register any conference yet'),
        ];
        return [$status_table];

    }


















        //     $user = \Drupal::routeMatch()->getParameter('user');
        //     $query = \Drupal::database()->select('webform_submission', 's');
        //     $query->fields('s', ['sid', 'entity_id'])
        //     ->condition('s.uid', $user);
        //     $sid_entity_id = $query->execute();

           
            
        //     if(!empty($sid_entity_id)){
        //     $user_programme_status = [];
        //     foreach($sid_entity_id as $info_ids){
            
        //     $query = \Drupal::database()->select('webform_submission', 'w');
        //     $query->join('webform_submission_data', 'd', "d.sid = $info_ids->sid AND d.name = 'adhesion'");
        //     $query->join('node_field_data', 'n', "n.nid = $info_ids->entity_id");
        //     $result = $query
        //         ->fields('d', array('value'))
        //         ->fields('n', array('title'))
        //         ->execute();
        //         foreach ($result as $record){
        //         $user_programme_status[]= [$record->title, $record->value,];
        //         }
        //         $status_table = [
        //             '#type' => 'table',
        //             '#header' => ['Programme Title', 'Adhesion'],
        //             '#rows' => $user_programme_status,
        //             '#empty'=> $this->t('You are not register any conference yet'),
        //         ];
        //         return [$status_table];
        //     }
        // }

        // $msg = $this->t('you are name @username', ['@username'=> $this->currentUser()->getDisplayName(),]);
        // return ['#markup' => $msg];

   
    //}
}