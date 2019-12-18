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
            $submission_data[] = [
                                  $submission->getData()['prenom'],
                                  $submission->getData()['nom'],
                                  $submission->getData()['email'],
                                  $submission->getData()['adhesion'],
                                  $submission->toLink('modifier', 'edit-form')
                                ];

            //$submission_data[] = $submission->getData();
            //ksm($submission_data);
        }
        $status_table = [
            '#type' => 'table',
            '#header' => [
              $this->t('Nom'),
              $this->t('Prenom'),
              $this->t('Email'),
              $this->t('Status'),
              $this->t('Action')
            ],
            '#rows' => $submission_data,
            '#empty'=> $this->t('You are not register any conference yet'),
        ];
        return [
          $status_table,
          '#cache' => [
            'max-age' => 0,
          ]

        ];

    }


}
