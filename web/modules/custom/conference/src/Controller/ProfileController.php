<?php

namespace Drupal\conference\Controller;


use Drupal\Core\Controller\ControllerBase;

class ProfileController extends  ControllerBase
{
  public function show_profile()
  {
    //return ['#markup' => 'test'];
    $user = \Drupal::routeMatch()->getParameter('user');
    $account = \Drupal\user\Entity\User::load($user);
    $date_formatter = \Drupal::service('date.formatter');
    $user_profile = [];
    $user_profile[] = [
      $account->get('field_nom')->value,
      $account->get('field_prenom')->value,
      $account->get('mail')->value,
      $account->get('name')->value,
      $account->get('field_orginisation')->value,
      $account->get('field_site')->value,
      $account->getRoles()[1],
      $date_formatter->format($account->get('login')->value, 'custom', 'H:i'),

    ];
    $user_table = [
      '#type' => 'table',
      '#header' => ['Nom', 'Prenom', 'Email', 'Log In Name', 'Organisation', 'Site Personnel', 'Designation',
        'Last Login'],
      '#rows' => $user_profile,
      '#empty'=> $this->t('Sorry User Info Not Available'),
    ];
    return [$user_table];
  }
}
