<?php

namespace Drupal\conference\Controller;

use Drupal\user\UserInterface;
use Drupal\Core\Datetime\DrupalDateTime;
use Drupal\Core\Controller\ControllerBase;


class WebformUserProfileController extends ControllerBase{

    public function show_webform_user_profile(UserInterface $user){
        $date_formatter = \Drupal::service('date.formatter');
        $storage = \Drupal::entityTypeManager()->getStorage('webform_submission');
        $webform_submission = $storage->loadByProperties([
            'entity_type' => 'node',
            'uid' => $user->id(),
        ]);

        //ksm($webform_submission);

        $submission_data = array();


        foreach ($webform_submission as $submission) {
            //$created_date =  new DrupalDateTime($submission->getCreatedTime());
            //$formatted_date = \Drupal::service('date.formatter')->format($created_date->getTimestamp(), 'custom', 'F j, Y h:ia');
            $submission_data[] = [
              $submission->getSourceEntity()->getTitle(),
              $date_formatter->format($submission->getCreatedTime(), 'custom', 'd / m / Y'),
              $submission->getData()['adhesion']
            ];


            //$submission_data[] = $submission->getData();
            //ksm($submission_data);
        }


        $status_table = [
            '#type' => 'table',
            '#header' => [
              $this->t('Titre de Programme'),
              $this->t('Created Date'),
              $this->t('Status'),
            ],
            '#rows' => $submission_data,
            '#empty'=> $this->t('You are not register any conference yet'),
        ];
        return [
          $status_table
        ];

        //return['#markup' => 'user'];

    }

}
