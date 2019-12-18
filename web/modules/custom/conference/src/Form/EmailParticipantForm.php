<?php
namespace Drupal\conference\Form;


use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Ajax\CssCommand;
use Drupal\Core\Ajax\HtmlCommand;
use Drupal\Core\Mail\MailManagerInterface;
use Drupal\Core\Mail\MailInterface;


class EmailParticipantForm extends FormBase
{
  public function getFormId(){
    return 'EmailForm';
  }

  public function buildForm(array $form, FormStateInterface $form_state)
  {
    $form['filter_by'] = [
      '#type' => 'select',
      '#title' => $this->t('Filter By'),
      '#options' => array(
        'all_participants' => $this->t('All Participants'),
        'programme' => $this->t('Programme'),
        'hotel' => $this->t('Hotel')
      ),
      '#ajax' => array(
        'callback' => array($this, 'addMoreField'),
        'event' => 'change', ),
      '#suffix' => '<span class="newFilter"></span>',
      '#default_value' => 'all_participants',
      '#required' => TRUE,
    ];

    $user = \Drupal::entityTypeManager()->getStorage('webform_submission')->loadMultiple();
    //ksm($user);
    $user_info = [];
    foreach ($user as $user_id)
    {
      $account = \Drupal\user\Entity\User::load($user_id->getOwnerId());
      //$user_info[] = $account->get('field_nom')->value .' '. $account->get('field_prenom')->value;
      $user_info[$account->get('mail')->value] = $account->get('mail')->value;


    }





    //ksm($user_info);
    $form['users'] = [
      '#type' => 'checkboxes',
      '#title' => $this->t('Send Mail To'),
      '#options' => $user_info,
      '#name' => 'user_info',
      '#access' => TRUE,
      '#required' => TRUE,
    ];
    $form['subject'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Subject'),
      '#required' => TRUE,
    ];
    $form['email_body'] = [
      '#type' => 'text_format',
      '#title' => $this->t('Email Body'),
      '#format' => 'basic_html',
      '#required' => TRUE,
    ];
    // Group submit handlers in an actions element with a key of "actions" so
    // that it gets styled correctly, and so that other modules may add actions
    // to the form. This is not required, but is convention.
    $form['actions'] = [
      '#type' => 'actions',
    ];
    // Add a submit button that handles the submission of the form.
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Send Email'),
    ];

    return $form;

  }

  //form validation
  public function validateForm(array &$form, FormStateInterface $form_state){
  }
  public function addMoreField(array &$form, FormStateInterface $form_state) {
    $response = new AjaxResponse();
    /*  get full object from webform_submission table */
    $programmes_nids = \Drupal::entityQuery('node')->condition('type','programmes')->execute();
    $programmes_info = \Drupal::entityTypeManager()->getStorage('node')->loadMultiple($programmes_nids);
    $hotels_nids = \Drupal::entityQuery('node')->condition('type','hotels')->execute();
    $hotels_info = \Drupal::entityTypeManager()->getStorage('node')->loadMultiple($hotels_nids);
    /* make new ajax response */
    $response = new AjaxResponse();
    /* make empty array of getting values of programmes and hotels*/
    $programmes = [];
    $hotels = [];
    foreach($programmes_info as $titre){
      $programmes[] = $titre->get('title')->value;
    }
    foreach($hotels_info as $titre){
      $hotels[] = $titre->get('title')->value;
    }
    $filter = $form_state->getValue('filter_by');
    if($filter == 'programme'){
      $form['filtered_list'] = [
        '#type' => 'select',
        '#title' => $this->t('Titre'),
        '#options' =>  $programmes,
        '#suffix' => '<span class="listByProgramme"></span>',
        '#empty_option' => 'Programme List Not Available',
      ];
    }
    else{
      $form['filtered_list'] = [
        '#type' => 'select',
        '#title' => $this->t('Hotel'),
        '#options' => $hotels,
        '#empty_option' => 'Hotel List Not Available',
        '#access' => TRUE,
        '#required' => TRUE,
      ];
    }
    $response->AddCommand(new HtmlCommand('.newFilter', $form['filtered_list']));
    return $response;
  }


  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    $subject = $form_state->getValue('subject');
    $body = $form_state->getValue('email_body')['value'];
    $user = $form_state->getValue('users');
    $user1 = array_filter($user);
    //ksm($user1);
    $params = array(
      'subject' => $subject,
      'body' => $body,
    );
    $mailManager = \Drupal::service('plugin.manager.mail');
    $module = 'conference';
    $key = 'mykey'; // Replace with Your key
    $to = 'bjsahay@gmail.com';
    $emails = ['bjsahay@gmail.com'];
    $langcode = \Drupal::currentUser()->getPreferredLangcode();
    $send = true;
    foreach($user1 as $email => $val){
      $result = $mailManager->mail($module, $key, $val, $langcode, $params, NULL, $send);}
    if ($result['result'] != true) {
      $message = t('There was a problem sending your email');
      drupal_set_message($message, 'error');
      \Drupal::logger('mail-log')->error($message);
      return;
    }
    $message = t('An email  has been sent to selected users');
    drupal_set_message($message);
    \Drupal::logger('mail-log')->notice($message);
  }


}
